<?php
include ("../db/db.php");
error_reporting(E_ALL);
ini_set('display_errors', 'on');

$pid = "";

$loan_amount = "";
$date_obtained = "";
$date_completion ="";

if($_POST == true){ 

  $pid = mysqli_real_escape_string($conn,$_POST['pid']);

  $loan_amount = mysqli_real_escape_string($conn,$_POST['loan_amount']);
  $date_obtained = mysqli_real_escape_string($conn,$_POST['date_obtained']);
  $date_completion = mysqli_real_escape_string($conn,$_POST['date_completion']);
  
	$sql = "INSERT INTO welfare_loan_info_tbl(personal_id,loan_amount,date_obtained,date_completion) VALUES('$pid','$loan_amount','$date_obtained','$date_completion')";

    if (mysqli_query($conn, $sql)) {
			$response['status'] = 'ok';
		}else{
			$response['status'] = 'error';
		}

    echo json_encode($response);

}

?>
