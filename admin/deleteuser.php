<?php
include('../include/config.php');
$arr = '';
if(!empty($_GET['name'])){
$name = $_GET['name'];
$query="DELETE FROM tbl_user WHERE user_id =$name";

$result = $mysqli->query($query) or die($mysqli->error.__LINE__);

$arr['message'] = 'User Deleted SuccessFuuly';
}

if(!empty($_GET['category'])){
$name = $_GET['category'];
$query="DELETE FROM tbl_category WHERE category_id =$name";

$result = $mysqli->query($query) or die($mysqli->error.__LINE__);

$arr['success'] = 'Category Deleted SuccessFuuly';
}

if(!empty($_GET['product'])){
$name = $_GET['product'];
$query="DELETE FROM tbl_product WHERE product_id =$name";

$result = $mysqli->query($query) or die($mysqli->error.__LINE__);

$arr['success'] = 'Product Deleted SuccessFully';
}

if(!empty($_GET['status'])){
$status = $_GET['status'];
if($status == 'Pending'){
   $new = 'Approved';
   $order_id = $_GET['id'];

$query="UPDATE tbl_order SET status='".$new."' where order_id = $order_id";

$result = $mysqli->query($query) or die($mysqli->error.__LINE__);

$arr['success'] = 'Product Deleted SuccessFully';
}

}


$json_response = json_encode($arr);

// # Return the response
echo $json_response;
?>
