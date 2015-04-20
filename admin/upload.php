<?php 
include('../include/config.php');
$_SERVER['REQUEST_METHOD'];
//echo '<pre>'; print_r($_FILES); die;
$target_path = "upload/";

$target_path = $target_path . time().'-'.basename( $_FILES['file']['name']); 

if(move_uploaded_file($_FILES['file']['tmp_name'], $target_path)) {
    $arr['image'] = time().'-'.basename( $_FILES['file']['name']); 
    $arr['success'] = basename( $_FILES['file']['name']);
} else{
    $arr['error'] = basename( $_FILES['file']['name']);
}

$json_response = json_encode($arr);

// # Return the response
echo $json_response;
?>