<?php
include('../include/config.php');
$name = $_GET['name'];
$query="DELETE FROM tbl_category WHERE user_id =$name";

$result = $mysqli->query($query) or die($mysqli->error.__LINE__);

$arr = array();
$arr['message'] = 'Category Deleted SuccessFully';
$json_response = json_encode($arr);

// # Return the response
echo $json_response;
?>
