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
    <h1>Obtained Train Warrant Information </h1>
  </div>
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
        <!--start Details of Ministry /Department  -->
		 <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Obtained Train Warrant Information </h5>
        </div>
        <div class="widget-content nopadding">
          <form action="javascript:void(0);" id="form_submit" class="form-horizontal">
            <div class="control-group">
              <label class="control-label">Issue Date :</label>
              <div class="controls">
                <input type="date" class="span2" placeholder="yyyy-mm-dd" name="issue_date" />
              </div>
            </div>
            			
			<div class="control-group">
              <label class="control-label">Number :</label>
              <div class="controls">
                <input type="text" class="span4" placeholder="Number" name="number" />
				<input type="hidden" name="pid" value="<?php if(isset($_GET['pid']) == true){ echo $pid; } ?>" />
              </div>
            </div>
            			
			<div class="control-group">
              <label class="control-label">Class :</label>
              <div class="controls">
			  <select class="span3"  name="train_class" >
              <option value='0' selected>Select Class</option>
			  <option value='1'>1st Class</option>
			  <option value='2'>2nd Class</option>
			  <option value='3'>3rd Class</option>
				</select>
              </div>
            </div>
			
			<div class="control-group">
              <label class="control-label">Warrant Type  :</label>
              <div class="controls">
               <label>
                  <input type="radio" name="radios1" value="one_way" />
                  One way only</label>
                <label>
                  <input type="radio" name="radios1" value="return" />
                  With return warrants</label>
                </div>
            </div>
			
			<div class="control-group">
              <label class="control-label">Number Of Members :</label>
              <div class="controls">
                <input type="text" class="span3" placeholder="Number Of Members" name="no_members" />
              </div>
            </div>
						
      <div class="control-group">
        <label class="control-label">Cancellation Date :</label>
        <div class="controls">
          <input type="date" class="span2" placeholder="yyyy-mm-dd" name="cancellation_date" />
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
		  $sql = "SELECT * FROM train_warrant_info_tbl WHERE personal_id='$pid' and status='1' ORDER BY train_warrant_info_id  DESC";
		  $result = mysqli_query($conn, $sql); 
		  ?>
		  
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>SN</th>
				  <th>Issue Date</th>
                  <th>Number</th>
                  <th>Class</th>
				  <th>Warrant Type</th>
                  <th>Number Of Members</th>
				<th>Update</th>
				<th>Delete</th>
                </tr>
              </thead>
              <tbody>
			  <?php $i = 1; while ($row = mysqli_fetch_assoc($result)){ ?>
                <tr class="gradeX">
                  <td><?php echo $i; ?></td>
                  <td><?php echo $row['issue_date']; ?></td>
                  <td><?php echo $row['number']; ?></td>
                  <td class="center"><?php echo $row['train_class']; ?></td>
				  <td><?php if($row['warrant_type'] == 'one_way'){ echo "One way only"; } if($row['warrant_type'] == 'return'){ echo "With return warrants"; } ?></td>
				  <td><?php echo $row['no_members']; ?></td>
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

        url: "func/train_warrant_func.php",
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
