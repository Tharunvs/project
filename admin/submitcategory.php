
<?php 
include('../include/config.php');
$_SERVER['REQUEST_METHOD'];
$data = json_decode(file_get_contents("php://input"),true);

if(isset($data['category_id']) && ($data['category_id'] > 0)){
    $id = $data['category_id'];
    $query="select * from tbl_category where category_title='".$data['category_title']."' and category_id !=$id";
	$result = $mysqli->query($query) or die($mysqli->error.__LINE__);
	$arr = array();
	if($result->num_rows > 0) {
	$arr['error'] = 'Category Title Already Exists';
	}else{
	$query="UPDATE tbl_category SET category_title='".$data['category_title']."',status='Active' WHERE category_id=$id";
	$result = $mysqli->query($query) or die($mysqli->error.__LINE__);
	$arr['success'] = 'Category Update SuccessFully';
	}
}else{
	$query="select * from tbl_category where category_title='".$data['category_title']."'";
	$result = $mysqli->query($query) or die($mysqli->error.__LINE__);

	$arr = array();
	if($result->num_rows > 0) {
	$arr['error'] = 'Category Title Already Exists';
	}else{
	$query="INSERT INTO tbl_category(category_title, status) VALUES ('".$data['category_title']."','Active')";
	$result = $mysqli->query($query) or die($mysqli->error.__LINE__);
	$arr['success'] = 'Category Added SuccessFully';
	}
}
$json_response = json_encode($arr);

// # Return the response
echo $json_response;


?>

                    