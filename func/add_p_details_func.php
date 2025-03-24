<?php
include ("../db/db.php");
error_reporting(E_ALL);
ini_set('display_errors', 'on');

$pid = "";

$name = "";
$designation = "";
$nic ="";
$id_cat = "";
$ministry_id_no = "";

$date_issue_ministry_id = "";
$date_expire_ministry_id = "";
$radios = "";
$civil_status = "";
$birthday = "";
  
$age = "";
$blood_group = "";
$passport_no = "";
$contact_no = "";
$email = "";

$p_address = "";
$t_address = "";
$district = "";
$div_sec = "";
$police_area = "";
$file = "";

if($_POST == true){ 

  $pid = mysqli_real_escape_string($conn,$_POST['pid']);

  $date_issue_ministry_id = mysqli_real_escape_string($conn,$_POST['date_issue_ministry_id']);
  $date_expire_ministry_id = mysqli_real_escape_string($conn,$_POST['date_expire_ministry_id']);
  $radios = mysqli_real_escape_string($conn,$_POST['radios']);
  $civil_status = mysqli_real_escape_string($conn,$_POST['civil_status']);
  $birthday = mysqli_real_escape_string($conn,$_POST['birthday']);
  
  $age = mysqli_real_escape_string($conn,$_POST['age']);
  $blood_group = mysqli_real_escape_string($conn,$_POST['blood_group']);
  $passport_no = mysqli_real_escape_string($conn,$_POST['passport_no']);
  $contact_no = mysqli_real_escape_string($conn,$_POST['contact_no']);
  $email = mysqli_real_escape_string($conn,$_POST['email']);
  
  $p_address = mysqli_real_escape_string($conn,$_POST['p_address']);
  $t_address = mysqli_real_escape_string($conn,$_POST['t_address']);
  $district = mysqli_real_escape_string($conn,$_POST['district']);
  $div_sec = mysqli_real_escape_string($conn,$_POST['div_sec']);
  $police_area = mysqli_real_escape_string($conn,$_POST['police_area']);
  
  if(isset($_FILES['file'])){
	$file = $_FILES['file']['name'];
  }
  
	$sql = "INSERT INTO personal_info_detail_tbl(personal_id,date_issue_ministry_id,date_expire_ministry_id,gender,civil_status,birthday,age,blood_group,passport_no,contact_no,email,p_address,t_address,district,div_sec,police_area,photo) VALUES('$pid','$date_issue_ministry_id','$date_expire_ministry_id','$radios','$civil_status','$birthday','$age','$blood_group','$passport_no','$contact_no','$email','$p_address','$t_address','$district','$div_sec','$police_area','$file')";

    if (mysqli_query($conn, $sql)) {
			$response['status'] = 'ok';
		}else{
			$response['status'] = 'error';
		}

    echo json_encode($response);

}

?>
