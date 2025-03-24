<?php
include ("../db/db.php");
error_reporting(E_ALL);
ini_set('display_errors', 'on');

$pid = "";

$course_name = "";
$radios1 = "";
$country_name = "";
$from_date ="";
$to_date = "";
$course_fee = "";
$incidental = "";
$combined = "";
$warm_cloth = "";
$warm_cloth_last_date = "";

if($_POST == true){ 

  $pid = mysqli_real_escape_string($conn,$_POST['pid']);

  $course_name = mysqli_real_escape_string($conn,$_POST['course_name']);
  $radios1 = mysqli_real_escape_string($conn,$_POST['radios1']);
  $country_name = mysqli_real_escape_string($conn,$_POST['country_name']);
  $from_date = mysqli_real_escape_string($conn,$_POST['from_date']);
  
  $to_date = mysqli_real_escape_string($conn,$_POST['to_date']);
  $course_fee = mysqli_real_escape_string($conn,$_POST['course_fee']);
  $incidental = mysqli_real_escape_string($conn,$_POST['incidental']);
  $combined = mysqli_real_escape_string($conn,$_POST['combined']);
  $warm_cloth = mysqli_real_escape_string($conn,$_POST['warm_cloth']);
  $warm_cloth_last_date = mysqli_real_escape_string($conn,$_POST['warm_cloth_last_date']);

	$sql = "INSERT INTO trg_info_tbl(personal_id,course_name,foreign_local,country_name,from_date,to_date,course_fee,incidental,combined,warm_cloth,warm_cloth_last_date) VALUES('$pid','$course_name','$radios1','$country_name','$from_date','$to_date','$course_fee','$incidental','$combined','$warm_cloth','$warm_cloth_last_date')";

    if (mysqli_query($conn, $sql)) {
			$response['status'] = 'ok';
		}else{
			$response['status'] = 'error';
		}

    echo json_encode($response);

}

?>
