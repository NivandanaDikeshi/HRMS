<?php 
error_reporting(E_ALL);ini_set('display_errors', 'on');include ("db/db.php");

$pid = $_GET['pid'];

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
  <h1><a href="dashboard.html">Matrix Admin</a></h1>
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
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Tables</a> </div>
    <h1>Leave/ Vehicle Permit Information</h1>
  </div>
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span6">
        <!--start Details of Ministry /Department  -->
		 <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Leave Information</h5>
        </div>
        <div class="widget-content nopadding">
          <form action="javascript:void(0);" id="form_submit" class="form-horizontal">
            <?php $year = date('Y'); ?>
            			
			<div class="control-group">
              <label class="control-label">Year :</label>
              <div class="controls">
                <input type="text" class="span4" placeholder="Year" value="<?php echo $year; ?>" disabled   />
				<input type="hidden" value="<?php echo $year; ?>" name="leave_year"/>
				<input type="hidden" name="pid" value="<?php if(isset($_GET['pid']) == true){ echo $pid; } ?>" />
              </div>
            </div>
            			
			<div class="control-group">
              <label class="control-label">Leave Type :</label>
              <div class="controls">
                <select class="span8" name="leave_type">
				<option value="0" selected>Select Leave Type</option>
				<option value="local">...Local....</option>
				<option value="Annual">Annual</option>
				<option value="Casual">Casual</option>
				<option value="Sick leave">Sick leave</option>
				<option value="Accident leave">Accident leave</option>
				<option value="Special Sick Leave">Special sick leave</option>
				<option value="Special leave">Special leave</option>
				<option value="Maternity leave">Maternity leave</option>
				<option value="Paternity  Leave">Paternity  Leave</option>
				<option value="Local Study Leave with Pay">Local Study Leave with Pay</option>
				<option value="Local Study Leave with Pay">Local Study Leave with Pay </option>
				<option value="Local Leave Under P.A.C.14/2022">Local Leave Under P.A.C.14/2022</option>
				<option value="foreign">...Foreign....</option>
				<option value="Study Leave with pay">Study Leave with pay </option>
				<option value="Study Leave without pay">Study Leave without pay </option>
				<option value="Foreign leave under P.A.C.14/2022">Foreign leave under P.A.C.14/2022</option>
				<option value="Foreign leave under section XII 16 of  Establishment Code">Foreign leave under section XII 16 of  Establishment Code</option>
				
				</select>
              </div>
            </div>
			
			<div class="control-group">
              <label class="control-label">Days Count :</label>
              <div class="controls">
                <input type="text" class="span4" placeholder="Days Count" name="day_count" />
              </div>
            </div>
			
			<div class="control-group">
              <label class="control-label">From :</label>
              <div class="controls">
                <input type="date" class="span4" placeholder="Days Count" name="from_date" />
              </div>
            </div>
			
			<div class="control-group">
              <label class="control-label">To :</label>
              <div class="controls">
                <input type="date" class="span4" placeholder="Days Count" name="to_date" />
              </div>
            </div>
						
            <div class="form-actions">
              <button type="submit" class="btn btn-success">Save</button>
            </div>
          </form>
        </div>
      </div>
	  <!--end Details of Ministry /Department -->
	  
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            
          </div>
          <div class="widget-content nopadding">
		  
		  <?php
		  $sql = "SELECT * FROM leave_info_tbl WHERE personal_id='$pid' and status='1' ORDER BY leave_info_id  DESC";
		  $result = mysqli_query($conn, $sql); 
		  ?>
		  
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                   <th>SN</th>
				  <th>Year</th>
                  <th>Leave Type</th>
                  <th>Days Count</th>
				  <th>From</th>
				  <th>To</th>
				  <th>Update</th>
				  <th>Delete</th>
                </tr>
              </thead>
              <tbody>
			  <?php $i = 1; while ($row = mysqli_fetch_assoc($result)){ ?>
                <tr class="gradeX">
                  <td><?php echo $i; ?></td>
				  <td><?php echo $row['leave_year']; ?></td>
                  <td><?php echo $row['leave_type']; ?></td>
                  <td><?php echo $row['day_count']; ?></td>
				  <td><?php echo $row['from_date']; ?></td>
				  <td><?php echo $row['to_date']; ?></td>
                  <td class="center"><button class="btn btn-success btn-mini">Update</button></td>
				  <td class="center"><button class="btn btn-warning btn-mini">Delete</button></td>
				 </tr>
                <?php $i++; } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
	  
	  <div class="span6">
        <!--start Secondary language  -->
		 <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Vehicle Permit Information  </h5>
        </div>
        <div class="widget-content nopadding">
          <form action="javascript:void(0);" id="form_vehicle" class="form-horizontal">
            
            <div class="control-group">
              <label class="control-label">Annual :</label>
              <div class="controls">
                <input type="text" class="span4" placeholder="Annual" name="annual" />
              </div>
			  <input type="hidden" name="pid" value="<?php if(isset($_GET['pid']) == true){ echo $pid; } ?>" />
            </div>
            			
			<div class="control-group">
              <label class="control-label">Date :</label>
              <div class="controls">
                <input type="date" class="span4" placeholder="Date" name="permit_date" />
              </div>
            </div>
			
			<div class="control-group">
              <label class="control-label">License No :</label>
              <div class="controls">
                <input type="text" class="span4" placeholder="License No" name="license_no" />
              </div>
            </div>
			
						
            <div class="form-actions">
              <button type="submit" class="btn btn-success">Save</button>
            </div>
          </form>
        </div>
      </div>
	  <!--end Secondary language  -->
	  
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            
          </div>
          <div class="widget-content nopadding">
		  
		  <?php
		  $sql2 = "SELECT * FROM vehicle_permit_info_tbl WHERE personal_id='$pid' and status='1' ORDER BY vehicle_permit_id  DESC";
		  $result2 = mysqli_query($conn, $sql2); 
		  ?>
		  
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>SN</th>
				  <th>Annual</th>
                  <th>Date</th>
                  <th>License No</th>
                  <th>Update</th>
				  <th>Delete</th>
                </tr>
              </thead>
              <tbody>
			  <?php $i = 1; while ($row2 = mysqli_fetch_assoc($result2)){ ?>
                <tr class="gradeX">
                  <td><?php echo $i; ?></td>
				  <td><?php echo $row2['annual']; ?></td>
                  <td><?php echo $row2['permit_date']; ?></td>
                  <td><?php echo $row2['license_no']; ?></td>
                  <td class="center"><button class="btn btn-success btn-mini">Update</button></td>
				  <td class="center"><button class="btn btn-warning btn-mini">Delete</button></td>
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

        url: "func/leave_func.php",
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
              window.location.href = "add_details.php";

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
	
	
	
	$("#form_vehicle").on('submit', (function(e) {
      e.preventDefault();
      $.ajax({

        url: "func/vehicle_permit_func.php",
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
              window.location.href = "add_details.php";

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
