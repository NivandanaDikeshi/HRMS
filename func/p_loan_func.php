<?php
include ("../db/db.php");
error_reporting(E_ALL);
ini_set('display_errors', 'on');

$pid = "";

$p_loan_amount = "";
$p_date_obtained = "";
$p_date_completion ="";

if($_POST == true){ 

  $pid = mysqli_real_escape_string($conn,$_POST['pid']);

  $p_loan_amount = mysqli_real_escape_string($conn,$_POST['p_loan_amount']);
  $p_date_obtained = mysqli_real_escape_string($conn,$_POST['p_date_obtained']);
  $p_date_completion = mysqli_real_escape_string($conn,$_POST['p_date_completion']);
  
	$sql = "INSERT INTO property_loan_info_tbl(personal_id,p_loan_amount,p_date_obtained,p_date_completion) VALUES('$pid','$p_loan_amount','$p_date_obtained','$p_date_completion')";

    if (mysqli_query($conn, $sql)) {
			$response['status'] = 'ok';
		}else{
			$response['status'] = 'error';
		}

    echo json_encode($response);

}

?>
