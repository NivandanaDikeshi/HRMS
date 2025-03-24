<?php
include ("../db/db.php");
error_reporting(E_ALL);
ini_set('display_errors', 'on');

$pid = "";

$leave_year = "";
$leave_type = "";
$day_count ="";
$from_date = "";
$to_date = "";

if($_POST == true){ 

  $pid = mysqli_real_escape_string($conn,$_POST['pid']);

  $leave_year = mysqli_real_escape_string($conn,$_POST['leave_year']);
  $leave_type = mysqli_real_escape_string($conn,$_POST['leave_type']);
  $day_count = mysqli_real_escape_string($conn,$_POST['day_count']);
  $from_date = mysqli_real_escape_string($conn,$_POST['from_date']);
  $to_date = mysqli_real_escape_string($conn,$_POST['to_date']);
  
	$sql = "INSERT INTO leave_info_tbl(personal_id,leave_year,leave_type,day_count,from_date,to_date) VALUES('$pid','$leave_year','$leave_type','$day_count','$from_date','$to_date')";

    if (mysqli_query($conn, $sql)) {
			$response['status'] = 'ok';
		}else{
			$response['status'] = 'error';
		}

    echo json_encode($response);

}

?>
