<?php
include ("../db/db.php");
error_reporting(E_ALL);
ini_set('display_errors', 'on');

$pid = "";

$issue_date = "";
$number = "";
$train_class = "";
$radios1 ="";
$no_members = "";

if($_POST == true){ 

  $pid = mysqli_real_escape_string($conn,$_POST['pid']);

  $issue_date = mysqli_real_escape_string($conn,$_POST['issue_date']);
  $number = mysqli_real_escape_string($conn,$_POST['number']);
  $train_class = mysqli_real_escape_string($conn,$_POST['train_class']);
  $radios1 = mysqli_real_escape_string($conn,$_POST['radios1']);
  $no_members = mysqli_real_escape_string($conn,$_POST['no_members']);


	$sql = "INSERT INTO train_warrant_info_tbl(personal_id,issue_date,number,train_class,warrant_type,no_members) VALUES('$pid','$issue_date','$number','$train_class','$radios1','$no_members')";

    if (mysqli_query($conn, $sql)) {
			$response['status'] = 'ok';
		}else{
			$response['status'] = 'error';
		}

    echo json_encode($response);

}

?>
