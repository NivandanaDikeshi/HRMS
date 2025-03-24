<?php
include ("../db/db.php");
error_reporting(E_ALL);
ini_set('display_errors', 'on');

$pid = "";

$name_spouse = "";
$kinship = "";
$work_place = "";
$contact_no ="";
$children_count = "";
$mother_name = "";
$father_name = "";

if($_POST == true){ 

  $pid = mysqli_real_escape_string($conn,$_POST['pid']);

  $name_spouse = mysqli_real_escape_string($conn,$_POST['name_spouse']);
  $kinship = mysqli_real_escape_string($conn,$_POST['kinship']);
  $work_place = mysqli_real_escape_string($conn,$_POST['work_place']);
  $contact_no = mysqli_real_escape_string($conn,$_POST['contact_no']);
  $children_count = mysqli_real_escape_string($conn,$_POST['children_count']);
  $mother_name = mysqli_real_escape_string($conn,$_POST['mother_name']);
  $father_name = mysqli_real_escape_string($conn,$_POST['father_name']);


	$sql = "INSERT INTO family_info_tbl(personal_id,name_spouse,kinship,work_place,contact_no,children_count,mother_name,father_name) VALUES('$pid','$name_spouse','$kinship','$work_place','$contact_no','$children_count','$mother_name','$father_name')";

    if (mysqli_query($conn, $sql)) {
			$response['status'] = 'ok';
		}else{
			$response['status'] = 'error';
		}

    echo json_encode($response);

}

?>
