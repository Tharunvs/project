<?php
include('../include/config.php');

$query="select tbl_order.*,tbl_user.user_name,tbl_user.user_email from tbl_order join tbl_user on tbl_order.user_id = tbl_user.user_id order by id desc";
$result = $mysqli->query($query) or die($mysqli->error.__LINE__);

$arr = array();
if($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
		$arr[] = $row;	
	}
}
# JSON-encode the response
$json_response = json_encode($arr);

// # Return the response
echo $json_response;
?>
