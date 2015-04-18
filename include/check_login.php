<?php
include('config.php');
if(!empty($_GET['check'])){
	//echo '<pre>'; print_r($_SESSION);
	$arr['loginid'] = $_SESSION['userid'];
	$arr['loginemail'] = $_SESSION['email'];
}

if(!empty($_GET['logout'])){
    session_unset();
    session_destroy();
    $arr['logout'] = 'Logout Successfully';
}
$json_response = json_encode($arr);


echo $json_response;
?>