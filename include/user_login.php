<?php
include('config.php');

$_SERVER['REQUEST_METHOD'];
$data = json_decode(file_get_contents("php://input"),true);
$query="select * from tbl_user where user_email='".$data['email']."' and user_password='".md5($data['password'])."' and user_role = 3";
	
$result = $mysqli->query($query) or die($mysqli->error.__LINE__);
   
$arr = array();
if($result->num_rows > 0) {
$row = $result->fetch_array();
$_SESSION["userid"] = $row['user_id'];
$_SESSION["email"] = $row['user_email'];
$_SESSION["username"] = $row['user_name'];
$_SESSION["role"] = $row['user_role'];
$arr['loginid'] = $row['user_id'];
$arr['loginemail'] = $row['user_email'];
$arr['error'] = '';
$arr['success'] = 'User Login SuccessFully';
}else{
$arr['success'] = '';
$arr['error'] = 'Invalid Username Or Password';
}
$json_response = json_encode($arr);


echo $json_response;

?>