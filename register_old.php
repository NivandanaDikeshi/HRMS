<?php error_reporting(E_ALL);ini_set('display_errors', 'on');include ("db/db.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>::HRMS-MOD::</title>
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
  <h1><a href="#">HRMS MOD</a></h1>
</div>
<!--close-Header-part--> 

<!--top-Header-menu-->
<div id="user-nav" class="navbar navbar-inverse">
  <ul class="nav">
    <li  class="dropdown" id="profile-messages" ><a title="" href="#" data-toggle="dropdown" data-target="#profile-messages" class="dropdown-toggle"><i class="icon icon-user"></i>  <span class="text">Welcome User</span><b class="caret"></b></a>
      <ul class="dropdown-menu">
        <li><a href="profile.html"><i class="icon-user"></i> My Profile</a></li>
        <li class="divider"></li>
        <li><a href="login.php"><i class="icon-key"></i> Log Out</a></li>
      </ul>
    </li>
    <li class=""><a title="" href="#"><i class="icon icon-cog"></i> <span class="text">Settings</span></a></li>
    <li class=""><a title="" href="login.php"><i class="icon icon-share-alt"></i> <span class="text">Logout</span></a></li>
  </ul>
</div>

<!--start-top-serch-->
<div id="search">
  <input type="text" placeholder="Search here..."/>
  <button type="submit" class="tip-bottom" title="Search"><i class="icon-search icon-white"></i></button>
</div>
<!--close-top-serch--> 

<!--sidebar-menu-->

<div id="sidebar"> <a href="#" class="visible-phone"><i class="icon icon-th"></i>Register</a>
  <?php include('include/nav.php'); ?>
</div>
										
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Register</a> </div>
    <h1>Register</h1>
  </div>

  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
        <!--start register -->
		 <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Register</h5>
        </div>
		
		<?php if(isset($_GET['flag']) == true){ ?>
		
			<?php if($_GET['flag'] == '1'){ ?>
				<div class="alert alert-success">
				  <button class="close" data-dismiss="alert">×</button>
				  <strong>Success!</strong> Registered Successfully!
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
          <form action="javascript:void(0);" id="form_submit" class="form-horizontal">
            <div class="control-group">
              <label class="control-label">Name :</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="Name" name="name" />
              </div>
            </div>
            
            <div class="control-group">
              <label class="control-label">Designation :</label>
              <div class="controls">
                <input type="text" class="span7" placeholder="Designation" name="designation" />
              </div>
            </div>
			
			<div class="control-group">
              <label class="control-label">National Identity Card No :</label>
              <div class="controls">
                <input type="text" class="span4" placeholder="NIC" name="nic" maxlength = "10" />
              </div>
            </div>
			
			<div class="control-group">
              <label class="control-label">Ministry ID Category :</label>
              <div class="controls">
			  <select class="span4" name="id_cat">
			  <option selected value='0'>Select ID Category</option>
			  <option value="Permanent">Permanent ID</option>
			  <option value="Temporary">Temporary ID</option>
			  </select>
              </div>
            </div>
			
			<div class="control-group">
              <label class="control-label">Ministry ID No :</label>
              <div class="controls">
                <input type="text" class="span4" placeholder="Ministry ID No" name="ministry_id_no" />
              </div>
            </div>
			
            <div class="form-actions">
              <button type="submit" class="btn btn-success">Register</button>
            </div>
          </form>
        </div>
      </div>
	  <!--end register-->
	  
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Data table</h5>
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
                  <td><?php echo $row['designation']; ?></td>
                  <td><?php echo $row['nic']; ?></td>
				  <td><?php echo $row['ministry_id_cat']; ?></td>
				  <td><?php echo $row['ministry_id_no']; ?></td>
                  <td><button class="btn btn-success btn-mini">Update</button>
					<button class="btn btn-warning btn-mini">Delete</button>
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
<div class="row-fluid">
  <div id="footer" class="span12"> 2023 &copy; Developed by <a href="http://crd.lk">Centre for Defence Research and Development</a> </div>
</div>
<!--end-Footer-part-->
<script src="js/jquery.min.js"></script> 
<script src="js/jquery.ui.custom.js"></script> 
<script src="js/bootstrap.min.js"></script> 
<script src="js/jquery.uniform.js"></script> 
<script src="js/select2.min.js"></script> 
<script src="js/jquery.dataTables.min.js"></script> 
<script src="js/matrix.js"></script> 
<script src="js/matrix.tables.js"></script>
<script src="css/scripts/jquery.min.js"></script>


<script>
$("#form_submit").on('submit', (function(e) {
      e.preventDefault();
      $.ajax({

        url: "func/register_func.php",
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
              window.location.href = "register.php?flag=1";

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
