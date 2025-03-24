<?php
include ("../db/db.php");
error_reporting(E_ALL);
ini_set('display_errors', 'on');

$personal_info_id = "";
$name = "";
$designation = "";
$nic ="";
$id_cat = "";
$ministry_id_no = "";

if (isset($_POST['name'])) {

  $personal_info_id = mysqli_real_escape_string($conn,$_POST['personal_info_id']);
  $name = mysqli_real_escape_string($conn,$_POST['name']);
  $designation = mysqli_real_escape_string($conn,$_POST['designation']);
  $nic = mysqli_real_escape_string($conn,$_POST['nic']);
  $id_cat = mysqli_real_escape_string($conn,$_POST['id_cat']);
  $ministry_id_no = mysqli_real_escape_string($conn,$_POST['ministry_id_no']);

  $sql = "UPDATE personal_info_tbl SET name='$name',designation_id='$designation',nic='$nic',ministry_id_cat='$id_cat',ministry_id_no='$ministry_id_no' WHERE personal_info_id='$personal_info_id'";

    if (mysqli_query($conn, $sql)) {
			$response['status'] = 'ok';
		}else{
			$response['status'] = 'error';
		}

    echo json_encode($response);

}

?>
