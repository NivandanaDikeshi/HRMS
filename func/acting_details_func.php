<?php
include ("../db/db.php");
error_reporting(E_ALL);
ini_set('display_errors', 'on');

$pid = "";

$appt_date = "";
$division = "";
$position ="";
$nature_appt = "";
$allowance = "";

if($_POST == true){ 

  $pid = mysqli_real_escape_string($conn,$_POST['pid']);

  $appt_date = mysqli_real_escape_string($conn,$_POST['appt_date']);
  $division = mysqli_real_escape_string($conn,$_POST['division']);
  $position = mysqli_real_escape_string($conn,$_POST['position']);
  $nature_appt = mysqli_real_escape_string($conn,$_POST['nature_appt']);
  $allowance = mysqli_real_escape_string($conn,$_POST['allowance']);
  
	$sql = "INSERT INTO acting_info_tbl(personal_id,date_appt,division,position,nature_appt,allowance) VALUES('$pid','$appt_date','$division','$position','$nature_appt','$allowance')";

    if (mysqli_query($conn, $sql)) {
			$response['status'] = 'ok';
		}else{
			$response['status'] = 'error';
		}

    echo json_encode($response);

}

?>
