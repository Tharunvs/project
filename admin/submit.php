
<?php 
include('../include/config.php');
$_SERVER['REQUEST_METHOD'];
$data = json_decode(file_get_contents("php://input"),true);

if(isset($data['user_id']) && ($data['user_id'] > 0)){
    $id = $data['user_id'];
	$role =  $data['user_role'];
    $query="select * from tbl_user where user_email='".$data['user_email']."' and user_id !=$id";
	$result = $mysqli->query($query) or die($mysqli->error.__LINE__);
	$arr = array();
	if($result->num_rows > 0) {
	$arr['error'] = 'Email Already Exists';
	}else{
	$query="UPDATE tbl_user SET user_name='".$data['user_name']."',user_nickname='".$data['user_nickname']."',user_address='".$data['user_address']."',user_gender='".$data['user_gender']."',user_email='".$data['user_email']."' WHERE user_id=$id";
	$result = $mysqli->query($query) or die($mysqli->error.__LINE__);
	$arr['success'] = 'User Update SuccessFully';
	}
}else{
	$query="select * from tbl_user where user_email='".$data['email']."'";
	$result = $mysqli->query($query) or die($mysqli->error.__LINE__);

	$arr = array();
	if($result->num_rows > 0) {
	$arr['error'] = 'Email Already Exists Please Enter Another Email';
	}else{
	$query="INSERT INTO tbl_user(user_name, user_nickname, user_address, user_gender, user_email, user_password, user_status, user_dateadd, user_role) VALUES ('".$data['user']."','".$data['nickname']."','".$data['address']."','".$data['gender']."','".$data['email']."','".md5($data['password'])."',1,'".date('Y-m-d')."',3)";
	$result = $mysqli->query($query) or die($mysqli->error.__LINE__);
	$arr['success'] = 'User Added SuccessFully';
	}
}
$json_response = json_encode($arr);

// # Return the response
echo $json_response;


?>

                    