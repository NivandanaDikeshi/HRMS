<?php
include ("../db/db.php");
error_reporting(E_ALL);
ini_set('display_errors', 'on');

$pid = "";

$child_name = "";
$child_dob = "";

if($_POST == true){ 

  $pid = mysqli_real_escape_string($conn,$_POST['pid']);

  $child_name = mysqli_real_escape_string($conn,$_POST['child_name']);
  $child_dob = mysqli_real_escape_string($conn,$_POST['child_dob']);

	$sql = "INSERT INTO child_info_tbl(personal_id,child_name,child_dob) VALUES('$pid','$child_name','$child_dob')";

    if (mysqli_query($conn, $sql)) {
			$response['status'] = 'ok';
		}else{
			$response['status'] = 'error';
		}

    echo json_encode($response);

}

?>
