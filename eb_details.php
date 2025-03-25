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
  <h1><a href="#">HRMS</a></h1>
</div>
<!--close-Header-part--> 

<!--top-Header-menu-->
<div id="user-nav" class="navbar navbar-inverse">
  <ul class="nav">
    <li  class="dropdown" id="profile-messages" ><a title="" href="#" data-toggle="dropdown" data-target="#profile-messages" class="dropdown-toggle"><i class="icon icon-user"></i>  <span class="text">Welcome User</span><b class="caret"></b></a>
      <ul class="dropdown-menu">
        <li><a href="#"><i class="icon-user"></i> My Profile</a></li>
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

<div id="sidebar"> <a href="#" class="visible-phone"><i class="icon icon-th"></i>Tables</a>
  <?php include('include/nav.php'); ?>
</div>
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Tables</a> </div>
    <h1>Efficiency Exam /Secondary Language Information</h1>
  </div>
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span6">
        <!--start Details of Ministry /Department  -->
		 <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Efficiency Exam Information  </h5>
        </div>
        <div class="widget-content nopadding">
         <form action="javascript:void(0);" id="form_exam" class="form-horizontal">
            <div class="control-group">
              <label class="control-label">Select E.B (I, II, III)  :</label>
              <div class="controls">
			  <select class="span5" name="eb">
			  <option selected>Select E.B</option>
			  <option value="eb1">E.B I</option>
			  <option value="eb2">E.B II</option>
			  <option value="eb3">E.B III</option>
			  </select>
               </div>
            </div>
            			
			<div class="control-group">
              <label class="control-label">Due Date :</label>
              <div class="controls">
                <input type="text" class="span4" placeholder="yyyy-mm-dd" name="due_date" />
				<input type="hidden" name="pid" value="<?php if(isset($_GET['pid']) == true){ echo $pid; } ?>" />
              </div>
            </div>
            			
			<div class="control-group">
              <label class="control-label">Passed Date :</label>
              <div class="controls">
                <input type="text" class="span4" placeholder="yyyy-mm-dd" name="pass_date" />
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
		  $sql = "SELECT * FROM eb_info_tbl WHERE personal_id='$pid' and status='1' ORDER BY eb_info_id  DESC";
		  $result = mysqli_query($conn, $sql); 
		  ?>
		  
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>SN</th>
				  <th>E.B. (I, II, III) </th>
                  <th>Due Date</th>
                  <th>Passed Date</th>
                  <th>Update</th>
				  <th>Delete</th>
                </tr>
              </thead>
              <tbody>
			  <?php $i = 1; while ($row = mysqli_fetch_assoc($result)){ ?>
                <tr class="gradeX">
                  <td><?php echo $i; ?></td>
                  <td><?php echo $row['eb']; ?></td>
                  <td><?php echo $row['due_date']; ?></td>
				  <td><?php echo $row['pass_date']; ?></td>
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
          <h5>Secondary Language  Information  </h5>
        </div>
        <div class="widget-content nopadding">
          <form action="javascript:void(0);" id="form_lang" class="form-horizontal">
            <div class="control-group">
              <label class="control-label">Secondary Language  :</label>
              <div class="controls">
			  <select class="span8" name="lang">
			  <option selected>Select Secondary Language</option>
			  <option value="Sinhala">Sinhala</option>
			  <option value="English">English</option>
			  <option value="Tamil">Tamil</option>
			  </select>
               </div>
            </div>
            			
			<div class="control-group">
              <label class="control-label">Due Date :</label>
              <div class="controls">
                <input type="text" class="span4" placeholder="yyyy-mm-dd" name="due_date2" />
				<input type="hidden" name="pid2" value="<?php if(isset($_GET['pid']) == true){ echo $pid; } ?>" />
              </div>
            </div>
            			
			<div class="control-group">
              <label class="control-label">Passed Date :</label>
              <div class="controls">
                <input type="text" class="span4" placeholder="yyyy-mm-dd" name="pass_date2" />
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
		  $sql = "SELECT * FROM lang_info_tbl WHERE personal_id='$pid' and status='1' ORDER BY lang_info_id  DESC";
		  $result = mysqli_query($conn, $sql); 
		  ?>
		  
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>SN</th>
				  <th>Secondary Language </th>
                  <th>Due Date</th>
                  <th>Passed Date</th>
                  <th>Update</th>
				  <th>Delte</th>
                </tr>
              </thead>
              <tbody>
			  <?php $i = 1; while ($row = mysqli_fetch_assoc($result)){ ?>
                <tr class="gradeX">
                  <td><?php echo $i; ?></td>
				  <td><?php echo $row['lang']; ?></td>
                  <td><?php echo $row['due_date']; ?></td>
                  <td><?php echo $row['pass_date']; ?></td>
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
$("#form_exam").on('submit', (function(e) {
      e.preventDefault();
      $.ajax({

        url: "func/add_exam_func.php",
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
	
$("#form_lang").on('submit', (function(e) {
      e.preventDefault();
      $.ajax({

        url: "func/add_lang_func.php",
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
