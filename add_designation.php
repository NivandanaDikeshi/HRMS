<?php 
error_reporting(E_ALL);ini_set('display_errors', 'on');include ("db/db.php"); 

if($_GET == true){
	
	if(isset($_GET['uid']) == true){
		
		$uid = $_GET['uid'];
		
		$sql = "SELECT * FROM `personal_info_tbl` WHERE personal_info_id='$uid'";
		$result = mysqli_query($conn,$sql);
		$row = mysqli_fetch_array($result);
			$name = $row['name'];
			$designation = $row['designation'];
			$nic = $row['nic'];
			$ministry_id_cat = $row['ministry_id_cat'];
			$ministry_id_no = $row['ministry_id_no'];
	}
	
	if(isset($_GET['did']) == true){
		
		$did = $_GET['did'];
		
		$sql = "UPDATE `personal_info_tbl` SET status='0' WHERE personal_info_id='$did'";
		$result = mysqli_query($conn,$sql);
		header("Location:register.php?flag=3");
	
	}
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>::HRMS::</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="css/bootstrap.min.css" />
<link rel="stylesheet" href="css/bootstrap-responsive.min.css" />
<link rel="stylesheet" href="css/uniform.css" />
<link rel="stylesheet" href="css/select2.css" />
<link rel="stylesheet" href="css/matrix-style.css" />
<link rel="stylesheet" href="css/matrix-media.css" />
<link href="font-awesome/css/font-awesome.css" rel="stylesheet" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
</head>
<body>

<!--Header-part-->
<div id="header">
  <h1><a href="#">::HRMS-MOD::</a></h1>
</div>
<!--close-Header-part--> 

<!--top-Header-menu-->
<div id="user-nav" class="navbar navbar-inverse">
  <ul class="nav">
    <li  class="dropdown" id="profile-messages" ><a title="" href="#" data-toggle="dropdown" data-target="#profile-messages" class="dropdown-toggle"><i class="icon icon-user"></i>  <span class="text">Welcome User</span><b class="caret"></b></a>
      <ul class="dropdown-menu">
        <li><a href="#"><i class="icon-user"></i> My Profile</a></li>
        <li class="divider"></li>
        <li><a href="#"><i class="icon-check"></i> My Tasks</a></li>
        <li class="divider"></li>
        <li><a href="login.html"><i class="icon-key"></i> Log Out</a></li>
      </ul>
    </li>
    <li class="dropdown" id="menu-messages"><a href="#" data-toggle="dropdown" data-target="#menu-messages" class="dropdown-toggle"><i class="icon icon-envelope"></i> <span class="text">Messages</span> <span class="label label-important">5</span> <b class="caret"></b></a>
      <ul class="dropdown-menu">
        <li><a class="sAdd" title="" href="#"><i class="icon-plus"></i> new message</a></li>
        <li class="divider"></li>
        <li><a class="sInbox" title="" href="#"><i class="icon-envelope"></i> inbox</a></li>
        <li class="divider"></li>
        <li><a class="sOutbox" title="" href="#"><i class="icon-arrow-up"></i> outbox</a></li>
        <li class="divider"></li>
        <li><a class="sTrash" title="" href="#"><i class="icon-trash"></i> trash</a></li>
      </ul>
    </li>
    <li class=""><a title="" href="#"><i class="icon icon-cog"></i> <span class="text">Settings</span></a></li>
    <li class=""><a title="" href="login.html"><i class="icon icon-share-alt"></i> <span class="text">Logout</span></a></li>
  </ul>
</div>

<!--start-top-serch-->
<div id="search">
  <input type="text" placeholder="Search here..."/>
  <button type="submit" class="tip-bottom" title="Search"><i class="icon-search icon-white"></i></button>
</div>
<!--close-top-serch--> 

<!--sidebar-menu-->

<div id="sidebar"> <a href="#" class="visible-phone"><i class="icon icon-th"></i>Tables</a>
  <?php include('include/nav.php'); ?>
</div>
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Add Designation</a> </div>
    <h1>Add Designation</h1>
  </div>
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
        
		<!--start register -->
		 <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Add Designation</h5>
        </div>
		
		<?php if(isset($_GET['flag']) == true){ ?>
		
			<?php if($_GET['flag'] == '1'){ ?>
				<div class="alert alert-success">
				  <button class="close" data-dismiss="alert">×</button>
				  <strong>Success!</strong> Designation Added Successfully!
				</div>
			  <?php } ?>
			  
			  <?php if($_GET['flag'] == '2'){ ?>
				<div class="alert alert-info">
				  <button class="close" data-dismiss="alert">×</button>
				  <strong>Success!</strong> Updated Successfully!
				</div>
			  <?php } ?>
			  
			  <?php if($_GET['flag'] == '3'){ ?>
				<div class="alert alert-error">
				  <button class="close" data-dismiss="alert">×</button>
				  <strong>Success!</strong> Deleted Successfully!
				</div>
			  <?php } ?>
			  
		<?php } ?>

					
        <div class="widget-content nopadding">
          <form action="javascript:void(0);" id="<?php if(isset($_GET['uid']) == true){ echo "form_update"; } else{ echo "form_submit"; } ?>" class="form-horizontal">
           
             <div class="control-group">
              <label class="control-label">Designation <span style="color:red;">*</span> :</label>
              <div class="controls">
                <input type="text" class="span7" placeholder="Designation" name="designation" required value="<?php if(isset($_GET['uid']) == true){ echo $designation; } ?>"/>
              </div>
            </div>
			
			<div class="form-actions">
			<?php if(isset($_GET['uid']) == true){ ?>
              <button type="submit" class="btn btn-success">Update</button>
			<?php }else { ?>
			<button type="submit" class="btn btn-success">Register</button>
			<?php } ?>
            </div>
          </form>
        </div>
      </div>
	  <!--end register-->
	  
	  
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Added Designations</h5>
          </div>
          <div class="widget-content nopadding">
		  
		  <?php
		  $sql = "SELECT * FROM designation_tbl WHERE status='1' ORDER BY designation_id  DESC";
		  $result = mysqli_query($conn, $sql); 
		  ?>
		  
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>#</th>
				  <th>Designation</th>
                  <th>Update</th>
                </tr>
              </thead>
              <tbody>
			  <?php $i = 1; while ($row = mysqli_fetch_assoc($result)){ ?>
                <tr class="gradeX">
                  <td><?php echo $i; ?></td>
				  <td><?php echo $row['designation']; ?></td>
                  <td><a href="add_designation.php?uid=<?php echo $row['designation_id']; ?>"><button class="btn btn-success btn-mini">Update</button></a>
					<a href="add_designation.php?did=<?php echo $row['designation_id']; ?>" onclick="return confirm('Are you sure you want to Delete?')"><button class="btn btn-warning btn-mini">Delete</button></a>
				  </td>
                </tr>                                                         
                <?php $i++; } ?>
				</tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!--Footer-part-->
<?php include('include/footer.php'); ?>
<!--end-Footer-part-->
<script src="js/jquery.min.js"></script> 
<script src="js/jquery.ui.custom.js"></script> 
<script src="js/bootstrap.min.js"></script> 
<script src="js/jquery.uniform.js"></script> 
<script src="js/select2.min.js"></script> 
<script src="js/jquery.dataTables.min.js"></script> 
<script src="js/matrix.js"></script> 
<script src="js/matrix.tables.js"></script>

<script>
$("#form_submit").on('submit', (function(e) {
      e.preventDefault();
      $.ajax({

        url: "func/add_designation_func.php",
        type: "POST",
        dataType: 'json',
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function() {},
        success: function(data) {
          if (data === '') {
            swal("", "Something went wrong! Please Try Again", "warning");

          } else {

            if (data.status === 'error') {
              swal("SQL Error!", "Please Try Again!", "warning");

            } else if (data.status === 'empty') {
              swal("", "Invalid Details, Please Try Again!", "warning");

            } else if (data.status === 'exists') {
              swal("", "Already Exist!", "warning");

            } else if (data.status === 'ok') {
              swal({
                title: "",
                text: "Successfully Added!",
                type: "success",
                timer:6000,
                showConfirmButton: false,
              });
              window.location.href = "add_designation.php?flag=1";

            } else {
              swal("", "Something went wrong! Please Try Again", "warning");
            }
          }
        },
        error: function(e) {

          alert("Error");
        }
      });
    }));
	
	$("#form_update").on('submit', (function(e) {
      e.preventDefault();
      $.ajax({

        url: "func/update_register_func.php",
        type: "POST",
        dataType: 'json',
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function() {},
        success: function(data) {
          if (data === '') {
            swal("", "Something went wrong! Please Try Again", "warning");

          } else {

            if (data.status === 'error') {
              swal("SQL Error!", "Please Try Again!", "warning");

            } else if (data.status === 'empty') {
              swal("", "Invalid Details, Please Try Again!", "warning");

            } else if (data.status === 'exists') {
              swal("", "Already Exist!", "warning");

            } else if (data.status === 'ok') {
              swal({
                title: "",
                text: "Successfully Added!",
                type: "success",
                timer:6000,
                showConfirmButton: false,
              });
              window.location.href = "register.php?flag=2";

            } else {
              swal("", "Something went wrong! Please Try Again", "warning");
            }
          }
        },
        error: function(e) {

          alert("Error");
        }
      });
    }));
	
</script>

</body>
</html>
