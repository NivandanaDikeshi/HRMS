<?php
include ("../db/db.php");
error_reporting(E_ALL);
ini_set('display_errors', 'on');

$pid = "";

$lang = "";
$due_date2 = "";
$pass_date2 ="";

if($_POST == true){ 

  $pid = mysqli_real_escape_string($conn,$_POST['pid2']);

  $lang = mysqli_real_escape_string($conn,$_POST['lang']);
  $due_date = mysqli_real_escape_string($conn,$_POST['due_date2']);
  $pass_date = mysqli_real_escape_string($conn,$_POST['pass_date2']);

	$sql = "INSERT INTO lang_info_tbl(personal_id,lang,due_date,pass_date) VALUES('$pid','$lang','$due_date','$pass_date')";

    if (mysqli_query($conn, $sql)) {
			$response['status'] = 'ok';
		}else{
			$response['status'] = 'error';
		}

    echo json_encode($response);

}

?>
