<?php
include ("../db/db.php");
error_reporting(E_ALL);
ini_set('display_errors', 'on');

$pid = "";

$date_join = "";
$div_att = "";
$acting_arrangement = "";
$date_transfer ="";

if($_POST == true){ 

  $pid = mysqli_real_escape_string($conn,$_POST['pid']);

  $date_join = mysqli_real_escape_string($conn,$_POST['date_join']);
  $div_att = mysqli_real_escape_string($conn,$_POST['div_att']);
  $acting_arrangement = mysqli_real_escape_string($conn,$_POST['acting_arrangement']);
  $date_transfer = mysqli_real_escape_string($conn,$_POST['date_transfer']);

	$sql = "INSERT INTO ministry_info_tbl(personal_id,date_join,div_att,acting_arrangement,date_transfer) VALUES('$pid','$date_join','$div_att','$acting_arrangement','$date_transfer')";

    if (mysqli_query($conn, $sql)) {
			$response['status'] = 'ok';
		}else{
			$response['status'] = 'error';
		}

    echo json_encode($response);

}

?>
