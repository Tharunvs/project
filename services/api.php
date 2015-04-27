<?php
 	require_once("Rest.inc.php");
	require_once("../include/config.php");
	class API extends REST {
	
		public $data = "";
		
		const DB_SERVER = "localhost";
		const DB_USER = "root";
		const DB_PASSWORD = "";
		const DB = "database";

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
			
			$query="SELECT * from tbl_product where product_category = $id order by product_id desc limit 0,2";
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
			
			$query="SELECT * from tbl_product where product_category = $id order by product_id desc";
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
			
			$query="SELECT * from tbl_product order by product_id desc";
			
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
		
		
		
		private function getfeatured(){	
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$query="SELECT * from tbl_product where featured = 1 order by product_id desc";
			
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
				$result['loginuser'] = $_SESSION['username'];
				
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
			$query="INSERT INTO tbl_user(user_name, user_address, user_city, user_state, user_phone, user_zipcode, user_email, user_password, user_status, user_dateadd, user_role) VALUES ('".$cust['user_name']."','".$cust['user_address']."','".$cust['user_city']."','".$cust['user_state']."','".$cust['user_phone']."','".$cust['user_zipcode']."','".$cust['user_email']."','".md5($cust['user_password'])."',1,'".date('Y-m-d')."',3)";
	
			//$query = "INSERT INTO tbl_user(".trim($columns,',').") VALUES(".trim($values,',').")";
			if(!empty($cust)){
				$r = $this->mysqli->query($query) or die($this->mysqli->error.__LINE__);
				$success = array('status' => "Success", "msg" => "User Created Successfully.", "data" => $cust);
				$this->response($this->json($success),200);
			}else
				$this->response('',204);	//"No Content" status
			}
		}
		
		private function updateUser(){
			if($this->get_request_method() != "POST"){
				$this->response('',406);
			}

			$cust = json_decode(file_get_contents("php://input"),true);
			$id = $cust['user_id']; 
			$sql="UPDATE tbl_user SET user_name='".$cust['user_name']."',user_address='".$cust['user_address']."',user_city='".$cust['user_city']."',user_state='".$cust['user_state']."',user_phone='".$cust['user_phone']."',user_zipcode='".$cust['user_zipcode']."',user_email='".$cust['user_email']."' WHERE user_id=$id";
	
			$sql = "select * from tbl_user where user_email = '".$cust['user_email']."'";
			$old = $this->mysqli->query($sql) or die($this->mysqli->error.__LINE__);
			
			if($this->mysqli->affected_rows > 0){
			    $error = array('status' => "Success", "msg" => "User Updated Sucessfully.");
				$this->response($this->json($error),200);
			}else{
			    $success = array('status' => "Error", "msg" => "User Not Updated.");
				$this->response($this->json($success),200);
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
			$query="INSERT INTO tbl_cart(product_id, user_id, quantity, status, datetime) VALUES ('".$id."','".$_SESSION['userid']."','1','Active','".date('Y-m-d H:i:s')."')";
	
			
			$r = $this->mysqli->query($query) or die($this->mysqli->error.__LINE__);
			$success = array('status' => "Success", "msg" => "Product Added To Your Cart.");
			$this->response($this->json($success),200);
			
		}
		}
		
		private function addtocart(){
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}

			$id = (int)$this->_request['id'];
			
			$qr = "delete from tbl_wishlist where user_id = '".$_SESSION['userid']."' and product_id = $id";
			$this->mysqli->query($qr) or die($this->mysqli->error.__LINE__);
			$sql = "select * from tbl_cart where user_id = '".$_SESSION['userid']."' and product_id = $id";
			$old = $this->mysqli->query($sql) or die($this->mysqli->error.__LINE__);
			if($old->num_rows > 0){
			    $error = array('status' => "Error", "msg" => "Product Already In Your Cart.");
				$this->response($this->json($error),200);
			}else{
			$query="INSERT INTO tbl_cart(product_id, user_id, quantity, status, datetime) VALUES ('".$id."','".$_SESSION['userid']."',1,'Active','".date('Y-m-d H:i:s')."')";
	
			
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
		   
		   private function getmywishlist(){
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}

			$query = "select * from tbl_wishlist join tbl_product on tbl_wishlist.product_id = tbl_product.product_id where user_id = '".$_SESSION['userid']."'";
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
		   
		   private function removecart(){
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
            
			$id = (int)$this->_request['id'];
			$query = "delete from tbl_cart where user_id = '".$_SESSION['userid']."' and product_id = $id";
			$this->mysqli->query($query) or die($this->mysqli->error.__LINE__);

			$this->response('',204);
			
		   }
		   
		   private function removewish(){
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
            
			$id = (int)$this->_request['id'];
			$query = "delete from tbl_wishlist where user_id = '".$_SESSION['userid']."' and product_id = $id";
			$this->mysqli->query($query) or die($this->mysqli->error.__LINE__);

			$this->response('',204);
			
		   }
		   
		   private function updatecart(){
			if($this->get_request_method() != "POST"){
				$this->response('',406);
			}
			$customer = json_decode(file_get_contents("php://input"),true);
			$id = (int)$customer['id'];
			$qnt = (int)$customer['quantity'];
			
			$query = "";
			if($qnt > 0){
			$query = "UPDATE tbl_cart SET quantity = ".$qnt." WHERE product_id=$id";
			if(!empty($customer)){
				$r = $this->mysqli->query($query) or die($this->mysqli->error.__LINE__);
				$success = array('status' => "Success", "msg" => "Customer ".$id." Updated Successfully.", "data" => $customer);
				$this->response($this->json($success),200);
			}else{
				$this->response('',204);	// "No Content" status
				}
			  
			}else{
			  $this->response('',204);
			}
		}
		
		private function getuserdetail(){	
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			$id = $_SESSION['userid'];
			
			$query="SELECT * from tbl_user where user_id = $id ";
			$r = $this->mysqli->query($query) or die($this->mysqli->error.__LINE__);
    
			if($r->num_rows > 0){
				$result = $r->fetch_assoc();
				//echo '<pre>'; print_r($result); die;
				$this->response($this->json($result), 200); // send user details
			}
			$this->response('',204);	// If no records "No Content" status
		}
		
		
		
			private function changepass(){
			if($this->get_request_method() != "POST"){
				$this->response('',406);
			}

			$cust = json_decode(file_get_contents("php://input"),true);
			//print_r($cust); die;
			$sql = "select * from tbl_user where user_email = '".$cust['email']."' and user_password = '".md5($cust['oldpassword'])."'";
			$old = $this->mysqli->query($sql) or die($this->mysqli->error.__LINE__);
			if($old->num_rows > 0){
			   
			   $update = "UPDATE tbl_user SET user_password = '".md5($cust['newpassword'])."' WHERE user_email='".$cust['email']."'";
               $this->mysqli->query($update) or die($this->mysqli->error.__LINE__);
			
			    $success = array('status' => "Success", "msg" => "Password Change Successfully.");
				$this->response($this->json($success),200);
			}else{
			    $success = array('status' => "Error", "msg" => "Email Or Password Not Available.");
				$this->response($this->json($success),200);

			}
			$this->response('',204);
		}
		
		private function changeStatus(){
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			
			$id = (int)$this->_request['id'];
			$status = (int)$this->_request['status'];
			if($status == 1){
			   $newstatus = 0;
			}else{
			   $newstatus = 1;
			}
			
			$update = "UPDATE tbl_product SET featured = ".$newstatus." WHERE product_id=$id";
			$this->mysqli->query($update) or die($this->mysqli->error.__LINE__);
			
			
			
			$this->response('',204);	// "No Content" status
		}
		
		private function getproductdetail(){	
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			$id = (int)$this->_request['id'];
			
			$query="SELECT * from tbl_product where product_id = $id ";
			$r = $this->mysqli->query($query) or die($this->mysqli->error.__LINE__);
    
			if($r->num_rows > 0){
				$result = $r->fetch_assoc();
				//echo '<pre>'; print_r($result); die;
				$this->response($this->json($result), 200); // send user details
			}
			$this->response('',204);	// If no records "No Content" status
		}
		
		
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