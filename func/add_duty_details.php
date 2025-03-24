<?php
include ("../db/db.php");
error_reporting(E_ALL);
ini_set('display_errors', 'on');

$pid = "";

$appt_letter_no = "";
$grade = "";
$position ="";
$division = "";
$join_date = "";

$personal_file_no = "";
$subject_clerk_no = "";
$pension_no = "";
$date_retire = "";
$salary_code = "";
  
$salary_scale = "";


if($_POST == true){ 

  $pid = mysqli_real_escape_string($conn,$_POST['pid']);

  $appt_letter_no = mysqli_real_escape_string($conn,$_POST['appt_letter_no']);
  $grade = mysqli_real_escape_string($conn,$_POST['grade']);
  $position = mysqli_real_escape_string($conn,$_POST['position']);
  $division = mysqli_real_escape_string($conn,$_POST['division']);
  $join_date = mysqli_real_escape_string($conn,$_POST['join_date']);
  
  $personal_file_no = mysqli_real_escape_string($conn,$_POST['personal_file_no']);
  $subject_clerk_no = mysqli_real_escape_string($conn,$_POST['subject_clerk_no']);
  $pension_no = mysqli_real_escape_string($conn,$_POST['pension_no']);
  $date_retire = mysqli_real_escape_string($conn,$_POST['date_retire']);
  $salary_code = mysqli_real_escape_string($conn,$_POST['salary_code']);
  
  $salary_scale = mysqli_real_escape_string($conn,$_POST['salary_scale']);

  
	$sql = "INSERT INTO duty_info_tbl(personal_id,appt_letter_no,grade,position,division,join_date,personal_file_no,subject_clerk_no,pension_no,date_retire,salary_code,salary_scale) VALUES('$pid','$appt_letter_no','$grade','$position','$division','$join_date','$personal_file_no','$subject_clerk_no','$pension_no','$date_retire','$salary_code','$salary_scale')";

    if (mysqli_query($conn, $sql)) {
			$response['status'] = 'ok';
		}else{
			$response['status'] = 'error';
		}

    echo json_encode($response);

}

?>
