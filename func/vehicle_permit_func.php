<?php
include ("../db/db.php");
error_reporting(E_ALL);
ini_set('display_errors', 'on');

$pid = "";

$annual = "";
$permit_date = "";
$license_no ="";

if($_POST == true){ 

  $pid = mysqli_real_escape_string($conn,$_POST['pid']);

  $annual = mysqli_real_escape_string($conn,$_POST['annual']);
  $permit_date = mysqli_real_escape_string($conn,$_POST['permit_date']);
  $license_no = mysqli_real_escape_string($conn,$_POST['license_no']);
  
	$sql = "INSERT INTO vehicle_permit_info_tbl(personal_id,annual,permit_date,license_no) VALUES('$pid','$annual','$permit_date','$license_no')";

    if (mysqli_query($conn, $sql)) {
			$response['status'] = 'ok';
		}else{
			$response['status'] = 'error';
		}

    echo json_encode($response);

}

?>
