<?php
include ("../db/db.php");
error_reporting(E_ALL);
ini_set('display_errors', 'on');


$name = "";
$designation = "";
$nic ="";
$id_cat = "";
$ministry_id_no = "";

if (isset($_POST['name'])) {

  $name = mysqli_real_escape_string($conn,$_POST['name']);
  $designation = mysqli_real_escape_string($conn,$_POST['designation']);
  $nic = mysqli_real_escape_string($conn,$_POST['nic']);
  $id_cat = mysqli_real_escape_string($conn,$_POST['id_cat']);
  $ministry_id_no = mysqli_real_escape_string($conn,$_POST['ministry_id_no']);

  $sql = "INSERT INTO personal_info_tbl(name,designation_id,nic,ministry_id_cat,ministry_id_no) VALUES('$name','$designation','$nic','$id_cat','$ministry_id_no')";

    if (mysqli_query($conn, $sql)) {
			$response['status'] = 'ok';
		}else{
			$response['status'] = 'error';
		}

    echo json_encode($response);

}

?>
