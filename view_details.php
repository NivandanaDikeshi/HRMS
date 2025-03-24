<?php 
error_reporting(E_ALL);ini_set('display_errors', 'on');include ("db/db.php");
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
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">View Details</a> </div>
    <h1>View Details</h1>
  </div>
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
	  
	  <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Registered Employees</h5>
          </div>
          <div class="widget-content nopadding">
		  <?php
		  $sql = "SELECT * FROM personal_info_tbl WHERE status='1' ORDER BY personal_info_id  DESC";
		  $result = mysqli_query($conn, $sql); 
		  ?>
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>#</th>
				  <th>Name</th>
				  <th>Designation</th>
                  <th>NIC</th>
                  <th>Ministry ID Category</th>
				  <th>Ministry ID No</th>
                  <th>Update</th>
                </tr>
              </thead>
              <tbody>
                <?php $i = 1; while ($row = mysqli_fetch_assoc($result)){ ?>
                <tr class="gradeX">
                  <td><?php echo $i; ?></td>
				  <td><?php echo $row['name']; ?></td>
                  <td>
				  <?php
					$desig_id = $row['designation_id'];
					$sql3 = "SELECT * FROM designation_tbl WHERE designation_id='$desig_id'";
					$result3 = mysqli_query($conn,$sql3);
					$row3 = mysqli_fetch_array($result3);
					$designation_name = $row3['designation'];
					echo $designation_name; 
					?>
				  </td>
                  <td><?php echo $row['nic']; ?></td>
				  <td><?php echo $row['ministry_id_cat']; ?></td>
				  <td><?php echo $row['ministry_id_no']; ?></td>
                  <td class="center">
				  <div class="btn-group">
				  <button data-toggle="dropdown" class="btn btn-warning dropdown-toggle">View Details<span class="caret"></span></button>
				  <ul class="dropdown-menu">
					<li><a href="personal_details.php?pid=<?php echo $row['personal_info_id']; ?>">Personal Information</a></li>
					<li><a href="duty_details.php?pid=<?php echo $row['personal_info_id']; ?>">Duty Information </a></li>
					<li><a href="ministry_details.php?pid=<?php echo $row['personal_info_id']; ?>">Details of Ministry /Department </a></li>
					<li><a href="trg_details.php?pid=<?php echo $row['personal_info_id']; ?>">Training Information</a></li>
					<li><a href="eb_details.php?pid=<?php echo $row['personal_info_id']; ?>">Efficiency Exam information </a></li>
					<li><a href="train_warrant_details.php?pid=<?php echo $row['personal_info_id']; ?>">Train Warrant Details</a></li>
					<li><a href="family_details.php?pid=<?php echo $row['personal_info_id']; ?>">Family Details</a></li>
					<li><a href="leave_permit_details.php?pid=<?php echo $row['personal_info_id']; ?>">Leave Details</a></li>
					<li><a href="leave_permit_details.php?pid=<?php echo $row['personal_info_id']; ?>">Vehicle Permit Details</a></li>
					<li><a href="loan_details.php?pid=<?php echo $row['personal_info_id']; ?>">Loan Details</a></li>
					<li><a href="promotion_details.php?pid=<?php echo $row['personal_info_id']; ?>">Promotion Details</a></li>
				  </ul>
				  </ul>
				</div>
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
</body>
</html>
