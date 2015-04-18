<?php
 	require_once("Rest.inc.php");
	require_once("../include/config.php");
	class API extends REST {
	
		public $data = "";
		
		const DB_SERVER = "localhost";
		const DB_USER = "root";
		const DB_PASSWORD = "";
		const DB = "angular";

		private $db = NULL;
		private $mysqli = NULL;
		public function __construct(){
			parent::__construct();				// Init parent contructor
			$this->dbConnect();					// Initiate Database connection
		}
		
		/*
		 *  Connect to Database
		*/
		private function dbConnect(){
			$this->mysqli = new mysqli(self::DB_SERVER, self::DB_USER, self::DB_PASSWORD, self::DB);
		}
		
		/*
		 * Dynmically call the method based on the query string
		 */
		public function processApi(){
			$func = strtolower(trim(str_replace("/","",$_REQUEST['x'])));
			if((int)method_exists($this,$func) > 0)
				$this->$func();
			else
				$this->response('',404); // If the method not exist with in this class "Page not found".
		}
				
		private function login(){
			if($this->get_request_method() != "POST"){
				$this->response('',406);
			}
			$email = $this->_request['email'];		
			$password = $this->_request['pwd'];
			if(!empty($email) and !empty($password)){
				if(filter_var($email, FILTER_VALIDATE_EMAIL)){
					$query="SELECT uid, name, email FROM users WHERE email = '$email' AND password = '".md5($password)."' LIMIT 1";
					$r = $this->mysqli->query($query) or die($this->mysqli->error.__LINE__);

					if($r->num_rows > 0) {
						$result = $r->fetch_assoc();	
						// If success everythig is good send header as "OK" and user details
						$this->response($this->json($result), 200);
					}
					$this->response('', 204);	// If no records "No Content" status
				}
			}
			
			$error = array('status' => "Failed", "msg" => "Invalid Email address or Password");
			$this->response($this->json($error), 400);
		}
		
		private function categories(){	
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			$query="SELECT * from tbl_category";
			$r = $this->mysqli->query($query) or die($this->mysqli->error.__LINE__);

			if($r->num_rows > 0){
				$result = array();
				while($row = $r->fetch_assoc()){
					$result[] = $row;
				}
				$this->response($this->json($result), 200); // send user details
			}
			$this->response('',204);	// If no records "No Content" status
		}
		
		private function product(){	
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			$id = (int)$this->_request['id'];
			
			$query="SELECT * from tbl_product where product_category = $id limit 0,2";
			$r = $this->mysqli->query($query) or die($this->mysqli->error.__LINE__);

			if($r->num_rows > 0){
				$result = array();
				while($row = $r->fetch_assoc()){
					$result[] = $row;
				}
				//echo '<pre>'; print_r($result); die;
				$this->response($this->json($result), 200); // send user details
			}
			$this->response('',204);	// If no records "No Content" status
		}
		
		private function allproduct(){	
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			$id = (int)$this->_request['id'];
			
			$query="SELECT * from tbl_product where product_category = $id";
			//$query="SELECT * from tbl_product";
			$r = $this->mysqli->query($query) or die($this->mysqli->error.__LINE__);

			if($r->num_rows > 0){
				$result = array();
				while($row = $r->fetch_assoc()){
					$result[] = $row;
				}
				//echo '<pre>'; print_r($result); die;
				$this->response($this->json($result), 200); // send user details
			}
			$this->response('',204);	// If no records "No Content" status
		}
		
		private function allproducts(){	
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$query="SELECT * from tbl_product";
			
			$r = $this->mysqli->query($query) or die($this->mysqli->error.__LINE__);

			if($r->num_rows > 0){
				$result = array();
				while($row = $r->fetch_assoc()){
					$result[] = $row;
				}
				
				$this->response($this->json($result), 200); // send user details
			}
			$this->response('',204);	// If no records "No Content" status
		}
		
		private function session(){	
		    
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			if(isset($_SESSION['userid'])){
				$result = array();
				$result['loginid'] = $_SESSION['userid'];
				$result['loginemail'] = $_SESSION['email'];
				
				$this->response($this->json($result), 200); // send user details
			}
			$this->response('',204);	// If no records "No Content" status
		}
		
		private function saveUser(){
			if($this->get_request_method() != "POST"){
				$this->response('',406);
			}

			$cust = json_decode(file_get_contents("php://input"),true);
			
			$sql = "select * from tbl_user where user_email = '".$cust['user_email']."'";
			$old = $this->mysqli->query($sql) or die($this->mysqli->error.__LINE__);
			if($old->num_rows > 0){
			    $error = array('status' => "Error", "msg" => "This Email Already Registered.", "data" => $cust);
				$this->response($this->json($error),200);
			}else{
			$query="INSERT INTO tbl_user(user_name, user_address, user_email, user_password, user_status, user_dateadd, user_role) VALUES ('".$cust['user_name']."','".$cust['user_address']."','".$cust['user_email']."','".md5($cust['user_password'])."',1,'".date('Y-m-d')."',3)";
	
			//$query = "INSERT INTO tbl_user(".trim($columns,',').") VALUES(".trim($values,',').")";
			if(!empty($cust)){
				$r = $this->mysqli->query($query) or die($this->mysqli->error.__LINE__);
				$success = array('status' => "Success", "msg" => "User Created Successfully.", "data" => $cust);
				$this->response($this->json($success),200);
			}else
				$this->response('',204);	//"No Content" status
			}
		}
		
		
		private function wishlist(){
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}

			$id = (int)$this->_request['id'];
			
			$sql = "select * from tbl_wishlist where user_id = '".$_SESSION['userid']."' and product_id = $id";
			$old = $this->mysqli->query($sql) or die($this->mysqli->error.__LINE__);
			if($old->num_rows > 0){
			    $error = array('status' => "Error", "msg" => "Product Already In Your Wishlist.");
				$this->response($this->json($error),200);
			}else{
			$query="INSERT INTO tbl_wishlist(product_id, user_id, status, datetime) VALUES ('".$id."','".$_SESSION['userid']."','Active','".date('Y-m-d H:i:s')."')";
	
			
			$r = $this->mysqli->query($query) or die($this->mysqli->error.__LINE__);
			$success = array('status' => "Success", "msg" => "Product Added To Your Wishlist.");
			$this->response($this->json($success),200);
			
		}
		}
		
		private function addcart(){
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}

			$id = (int)$this->_request['id'];
			
			$sql = "select * from tbl_cart where user_id = '".$_SESSION['userid']."' and product_id = $id";
			$old = $this->mysqli->query($sql) or die($this->mysqli->error.__LINE__);
			if($old->num_rows > 0){
			    $error = array('status' => "Error", "msg" => "Product Already In Your Cart.");
				$this->response($this->json($error),200);
			}else{
			$query="INSERT INTO tbl_cart(product_id, user_id, status, datetime) VALUES ('".$id."','".$_SESSION['userid']."','Active','".date('Y-m-d H:i:s')."')";
	
			
			$r = $this->mysqli->query($query) or die($this->mysqli->error.__LINE__);
			$success = array('status' => "Success", "msg" => "Product Added To Your Cart.");
			$this->response($this->json($success),200);
			
		}
		}
		
		private function checkinwish(){
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}

			$id = (int)$this->_request['id'];
			
			$sql = "select * from tbl_wishlist where user_id = '".$_SESSION['userid']."' and product_id = $id";
			$old = $this->mysqli->query($sql) or die($this->mysqli->error.__LINE__);
			if($old->num_rows > 0){
			    $error = array('status' => true);
				$this->response($this->json($error),200);
			}else{
			
			$success = array('status' => false);
			$this->response($this->json($success),200);
			
		}
		}
		
		private function checkincart(){
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}

			$id = (int)$this->_request['id'];
			
			$sql = "select * from tbl_cart where user_id = '".$_SESSION['userid']."' and product_id = $id";
			$old = $this->mysqli->query($sql) or die($this->mysqli->error.__LINE__);
			if($old->num_rows > 0){
			    $error = array('status' => true);
				$this->response($this->json($error),200);
			}else{
			
			$success = array('status' => false);
			$this->response($this->json($success),200);
			
		   }
		}
		
		private function getmycart(){
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}

			$query = "select * from tbl_cart join tbl_product on tbl_cart.product_id = tbl_product.product_id where user_id = '".$_SESSION['userid']."'";
			$r = $this->mysqli->query($query) or die($this->mysqli->error.__LINE__);

			if($r->num_rows > 0){
				$result = array();
				while($row = $r->fetch_assoc()){
					$result[] = $row;
				}
				//echo '<pre>'; print_r($result); die;
				$this->response($this->json($result), 200); // send user details
			}
			$this->response('',204);
			
		   }
		
		/*
		private function customer(){	
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			$id = (int)$this->_request['id'];
			if($id > 0){	
				$query="SELECT distinct c.customerNumber, c.customerName, c.email, c.address, c.city, c.state, c.postalCode, c.country FROM angularcode_customers c where c.customerNumber=$id";
				$r = $this->mysqli->query($query) or die($this->mysqli->error.__LINE__);
				if($r->num_rows > 0) {
					$result = $r->fetch_assoc();	
					$this->response($this->json($result), 200); // send user details
				}
			}
			$this->response('',204);	// If no records "No Content" status
		}
		
		private function insertCustomer(){
			if($this->get_request_method() != "POST"){
				$this->response('',406);
			}

			$customer = json_decode(file_get_contents("php://input"),true);
			$column_names = array('customerName', 'email', 'city', 'address', 'country');
			$keys = array_keys($customer);
			$columns = '';
			$values = '';
			foreach($column_names as $desired_key){ // Check the customer received. If blank insert blank into the array.
			   if(!in_array($desired_key, $keys)) {
			   		$$desired_key = '';
				}else{
					$$desired_key = $customer[$desired_key];
				}
				$columns = $columns.$desired_key.',';
				$values = $values."'".$$desired_key."',";
			}
			$query = "INSERT INTO angularcode_customers(".trim($columns,',').") VALUES(".trim($values,',').")";
			if(!empty($customer)){
				$r = $this->mysqli->query($query) or die($this->mysqli->error.__LINE__);
				$success = array('status' => "Success", "msg" => "Customer Created Successfully.", "data" => $customer);
				$this->response($this->json($success),200);
			}else
				$this->response('',204);	//"No Content" status
		}
		private function updateCustomer(){
			if($this->get_request_method() != "POST"){
				$this->response('',406);
			}
			$customer = json_decode(file_get_contents("php://input"),true);
			$id = (int)$customer['id'];
			$column_names = array('customerName', 'email', 'city', 'address', 'country');
			$keys = array_keys($customer['customer']);
			$columns = '';
			$values = '';
			foreach($column_names as $desired_key){ // Check the customer received. If key does not exist, insert blank into the array.
			   if(!in_array($desired_key, $keys)) {
			   		$$desired_key = '';
				}else{
					$$desired_key = $customer['customer'][$desired_key];
				}
				$columns = $columns.$desired_key."='".$$desired_key."',";
			}
			$query = "UPDATE angularcode_customers SET ".trim($columns,',')." WHERE customerNumber=$id";
			if(!empty($customer)){
				$r = $this->mysqli->query($query) or die($this->mysqli->error.__LINE__);
				$success = array('status' => "Success", "msg" => "Customer ".$id." Updated Successfully.", "data" => $customer);
				$this->response($this->json($success),200);
			}else
				$this->response('',204);	// "No Content" status
		}
		
		private function deleteCustomer(){
			if($this->get_request_method() != "DELETE"){
				$this->response('',406);
			}
			$id = (int)$this->_request['id'];
			if($id > 0){				
				$query="DELETE FROM angularcode_customers WHERE customerNumber = $id";
				$r = $this->mysqli->query($query) or die($this->mysqli->error.__LINE__);
				$success = array('status' => "Success", "msg" => "Successfully deleted one record.");
				$this->response($this->json($success),200);
			}else
				$this->response('',204);	// If no records "No Content" status
		}
		
		*/
		private function json($data){
			if(is_array($data)){
				return json_encode($data);
			}
		}
	}
	
	// Initiiate Library
	
	$api = new API;
	$api->processApi();
?>