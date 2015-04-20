<?php
include('../include/config.php');

if(!empty($_GET['name'])){
    $name = $_GET['name'];
	$query="select * from tbl_user where user_id = $name";
	$result = $mysqli->query($query) or die($mysqli->error.__LINE__);
	$row = '';
	if($result->num_rows > 0) {
	   $row = $result->fetch_assoc();
	}
}

if(!empty($_GET['category'])){
    $name = $_GET['category'];
	$query="select * from tbl_category where category_id = $name";
	$result = $mysqli->query($query) or die($mysqli->error.__LINE__);
	$row = '';
	if($result->num_rows > 0) {
	   $row = $result->fetch_assoc();
	}
}

if(!empty($_GET['product'])){
    $name = $_GET['product'];
	$query="select * from tbl_product where product_id = $name";
	$result = $mysqli->query($query) or die($mysqli->error.__LINE__);
	$row = '';
	if($result->num_rows > 0) {
	   $row = $result->fetch_assoc();
	}
}
# JSON-encode the response
$json_response = json_encode($row);

// # Return the response
echo $json_response;
?>
