<?php
include ("../db/db.php");
error_reporting(E_ALL);
ini_set('display_errors', 'on');

$pid = "";

$eb = "";
$due_date = "";
$pass_date ="";

if($_POST == true){ 

  $pid = mysqli_real_escape_string($conn,$_POST['pid']);

  $eb = mysqli_real_escape_string($conn,$_POST['eb']);
  $due_date = mysqli_real_escape_string($conn,$_POST['due_date']);
  $pass_date = mysqli_real_escape_string($conn,$_POST['pass_date']);

	$sql = "INSERT INTO eb_info_tbl(personal_id,eb,due_date,pass_date) VALUES('$pid','$eb','$due_date','$pass_date')";

    if (mysqli_query($conn, $sql)) {
			$response['status'] = 'ok';
		}else{
			$response['status'] = 'error';
		}

    echo json_encode($response);

}

?>
