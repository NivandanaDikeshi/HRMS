<?php
include ("../db/db.php");
error_reporting(E_ALL);
ini_set('display_errors', 'on');


$designation = "";

if (isset($_POST['designation'])) {

  $designation = mysqli_real_escape_string($conn,$_POST['designation']);
  
  $sql = "INSERT INTO designation_tbl(designation) VALUES('$designation')";

    if (mysqli_query($conn, $sql)) {
			$response['status'] = 'ok';
		}else{
			$response['status'] = 'error';
		}

    echo json_encode($response);

}

?>
