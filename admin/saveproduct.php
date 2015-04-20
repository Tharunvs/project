
<?php 
include('../include/config.php');
$_SERVER['REQUEST_METHOD'];

$data = json_decode(file_get_contents("php://input"),true);

if(!empty($data['product_id'])){

$img = $data['old_image'];
if(isset($data['product_image']) && (is_array($data['product_image']))){
foreach($data['product_image'] as $image){
if(!empty($image)){
   $img = $img.','.$image;
 }
}
}else{
$img = $data['old_image'];
}

$id=$data['product_id'];
$query="select * from tbl_product where product_title='".$data['product_title']."' and product_id != $id";
$result = $mysqli->query($query) or die($mysqli->error.__LINE__);

$arr = array();
if($result->num_rows > 0) {
$arr['error'] = 'Product Title Already Available';
}else{
$query = "UPDATE tbl_product SET product_title='".$data['product_title']."',product_desc='".$data['product_desc']."',product_price=".$data['product_price'].",product_image='".$img."',product_category='".$data['product_category']."',product_brand='".$data['product_brand']."',status='Active' WHERE product_id = $id";
$result = $mysqli->query($query) or die($mysqli->error.__LINE__);
$arr['success'] = 'Product Updated SuccessFully';
}

}else{
$img = '';
foreach($data['product_image'] as $image){
if(!empty($image)){
   if(!empty($img)){
   $img = $img.','.$image;
   }else{
   $img = $image;
   }
 }
}


$query="select * from tbl_product where product_title='".$data['product_title']."'";
$result = $mysqli->query($query) or die($mysqli->error.__LINE__);

$arr = array();
if($result->num_rows > 0) {
$arr['error'] = 'Product Title Already Available';
}else{
$query = "INSERT INTO tbl_product( product_title, product_desc, product_price, product_image, product_category, product_brand, status) VALUES ('".$data['product_title']."','".$data['product_desc']."','".$data['product_price']."','".$img."',".$data['product_category'].",'".$data['product_brand']."','Active')";
$result = $mysqli->query($query) or die($mysqli->error.__LINE__);
$arr['success'] = 'Product Added SuccessFully';
}

}

$json_response = json_encode($arr);

// # Return the response
echo $json_response;


?>

                    