<?php 
error_reporting(E_ALL);ini_set('display_errors', 'on');include ("db/db.php");

$pid = $_GET['pid'];
		
		$sql = "SELECT
				designation_tbl.designation,
				personal_info_tbl.personal_info_id,
				personal_info_tbl.name,
				personal_info_tbl.designation_id,
				personal_info_tbl.nic,
				personal_info_tbl.ministry_id_cat,
				personal_info_tbl.ministry_id_no,
				personal_info_tbl.`status`,
				personal_info_tbl.date_added
				FROM
				personal_info_tbl
				Inner Join designation_tbl ON personal_info_tbl.designation_id = designation_tbl.designation_id
				WHERE
				personal_info_tbl.personal_info_id =  '$pid'";
		$result = mysqli_query($conn,$sql);
		$row = mysqli_fetch_array($result);
			$name = $row['name'];
			$designation_id = $row['designation_id'];
			$designation = $row['designation'];
			$nic = $row['nic'];
			$ministry_id_cat = $row['ministry_id_cat'];
			$ministry_id_no = $row['ministry_id_no'];
			
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
<link rel="stylesheet" href="css/datepicker.css" />
<link rel="stylesheet" href="css/bootstrap-wysihtml5.css" />
<link href="font-awesome/css/font-awesome.css" rel="stylesheet" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>

<style>
label{margin-left: 20px;}
#datepicker{width:180px; margin: 0 20px 20px 20px;}
#datepicker > span:hover{cursor: pointer;}
</style>

<script>
$(function () {
  $("#datepicker").datepicker({ 
        autoclose: true, 
        todayHighlight: true
  }).datepicker('update', new Date());
});
</script>


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
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="add_details.php" class="current">Add Details</a> <a href="#" class="current">Personal Information</a></div>
    <h1>Personal Information</h1>
  </div>
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
        <!--start register -->
		 <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Personal Information</h5>
        </div>
        <div class="widget-content nopadding">
          <form action="javascript:void(0);" id="form_submit" class="form-horizontal">
		  
            <div class="control-group">
              <label class="control-label">Name :</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="Name" name="name" value="<?php if(isset($_GET['pid']) == true){ echo $name; } ?>" />
				<input type="hidden" name="pid" value="<?php if(isset($_GET['pid']) == true){ echo $pid; } ?>" />
              </div>
            </div>
			
			<div class="control-group">
              <label class="control-label">Designation <span style="color:red;">*</span> :</label>
              <div class="controls">
			  <?php
			  $sql = "SELECT * FROM designation_tbl WHERE status='1' ORDER BY designation_id  DESC";
			  $result = mysqli_query($conn, $sql); 
			  ?>
			  
			  <select class="span4" name="designation" required>
			  <option selected value='0'>Select Designation</option>
			  <?php while ($row = mysqli_fetch_assoc($result)){ ?>
			  <option value="<?php echo $row['designation_id']; ?>"><?php echo $row['designation']; ?></option>
			  
			  <?php if(isset($_GET['pid']) == true){ ?>
                   <option value="<?php echo $designation_id; ?>" selected><?php echo $designation; ?></option>
              <?php } ?>
			  
			  <?php } ?>
			  </select>
			  
              </div>
            </div>
                      			
			<div class="control-group">
              <label class="control-label">NIC :</label>
              <div class="controls">
                <input type="text" class="span6" name="nic" placeholder="National identity Card No" value="<?php if(isset($_GET['pid']) == true){ echo $nic; } ?>" />
              </div>
            </div>
						
			<div class="control-group">
              <label class="control-label">Ministry ID Category <span style="color:red;">*</span> :</label>
              <div class="controls">
			  <select class="span4" name="id_cat" >
			  <option selected value='0'>Select ID Category</option>
			  <option value="Permanent" <?php if(isset($_GET['pid']) == true){ if($ministry_id_cat == "Permanent"){ echo "selected"; }} ?>>Permanent ID</option>
			  <option value="Temporary" <?php if(isset($_GET['pid']) == true){ if($ministry_id_cat == "Temporary"){ echo "selected"; }} ?>>Temporary ID</option>
			  </select>
              </div>
            </div>
			
			<div class="control-group">
              <label class="control-label">Ministry ID No <span style="color:red;">*</span> :</label>
              <div class="controls">
                <input type="text" class="span4" placeholder="Ministry ID No" name="ministry_id_no" required value="<?php if(isset($_GET['pid']) == true){ echo $ministry_id_no; } ?>"/>
              </div>
            </div>
			
			<div class="control-group">
              <label class="control-label">Date of Issue (Ministry ID No)  :</label>
              <div class="controls">
                <input type="date" class="span4" placeholder="Date of Issue (Ministry ID No)" name="date_issue_ministry_id" />
              </div>
            </div>
			
			<div class="control-group">
              <label class="control-label">Date of Expire (Ministry ID No)  :</label>
              <div class="controls">
                <input type="date" class="span4" placeholder="Date of Expire (Ministry ID No)" name="date_expire_ministry_id" />
              </div>
            </div>
			
			<div class="control-group">
              <label class="control-label">Gender :</label>
              <div class="controls">
               <label>
                  <input type="radio" name="radios" value="Male" />
                  Male</label>
                <label>
                  <input type="radio" name="radios" value="Female" />
                  Female</label>
                </div>
            </div>
			
			<div class="control-group">
              <label class="control-label">Civil Status :</label>
              <div class="controls">
			  <select class="span4" name="civil_status" >
			  <option selected value='0'>Select Civil Status</option>
			  <option value="Married">Married</option>
			  <option value="Unmarried">Unmarried</option>
			  </select>
              </div>
            </div>
			
			<div class="control-group">
              <label class="control-label">Birthday  :</label>
              <div class="controls">
                <div  data-date="12-02-2012" class="input-append date datepicker">
                  <input type="date" data-date="01-02-2013" data-date-format="dd-mm-yyyy" class="datepicker span11" name="birthday">
              </div>
            </div>
			
			<div class="control-group">
              <label class="control-label">Age  :</label>
              <div class="controls">
                <input type="text" class="span2" placeholder="Age" name="age" />
              </div>
            </div>
			
			<div class="control-group">
              <label class="control-label">Blood Group  :</label>
              <div class="controls">
                <select class="span4" name="blood_group" required>
					<option selected value='0'>Select Blood Group</option>
					<option value="O+">O+</option>
					<option value="O-">O-</option>
					<option value="A+">A+</option>
					<option value="A-">A-</option>
					<option value="B+">B+</option>
					<option value="B-">B-</option>
					<option value="AB+">AB+</option>
					<option value="AB-">AB-</option>
				</select>
              </div>
            </div>
			
			<div class="control-group">
              <label class="control-label">Passport No  :</label>
              <div class="controls">
                <input type="text" class="span4" placeholder="Passport No" name="passport_no" />
              </div>
            </div>
			
			<div class="control-group">
              <label class="control-label">Contact No :</label>
              <div class="controls">
                <input type="text" class="span6" placeholder="Contact No" name="contact_no" />
              </div>
            </div>
			
			<div class="control-group">
              <label class="control-label">Email Address :</label>
              <div class="controls">
                <input type="text" class="span7" placeholder="Email Address" name="email" />
              </div>
            </div>
			
			<div class="control-group">
              <label class="control-label">Permanent Address :</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="Permanent Address" name="p_address" />
              </div>
            </div>
			
			<div class="control-group">
              <label class="control-label">Temporary Address :</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="Temporary Address" name="t_address" />
              </div>
            </div>
			
			<div class="control-group">
              <label class="control-label">District :</label>
              <div class="controls">
                
					<?php
					  $sql4 = "SELECT * FROM district_tbl";
					  $result4 = mysqli_query($conn, $sql4); 
					  ?>
					  
					  <select class="span4" name="district" required>
					  
					  <option selected value='0'>Select District</option>
					  <?php while ($row4 = mysqli_fetch_assoc($result4)){ ?>
					  <option value="<?php echo $row4['district_id']; ?>"><?php echo $row4['district_name']; ?></option>
					  
					
					  
					  <?php } ?>
					  </select>
              </div>
            </div>
			
			<div class="control-group">
              <label class="control-label">Divisional Secretariat :</label>
              <div class="controls">
                <input type="text" class="span7" placeholder="Divisional Secretariat" name="div_sec" />
              </div>
            </div>
			
			<div class="control-group">
              <label class="control-label">Police Area :</label>
              <div class="controls">
                <input type="text" class="span7" placeholder="Police Area" name="police_area" />
              </div>
            </div>
			
			 <div class="control-group">
              <label class="control-label">Photograph :</label>
              <div class="controls">
                <input type="file" class="span11" name="file"/>
              </div>
            </div>
									
            <div class="form-actions">
              <button type="submit" class="btn btn-success">Save</button>
			 </div>
          
        </div>
		</form>
      </div>
	  <!--end register-->
	  
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
<script src="js/bootstrap-datepicker.js"></script> 
<script src="js/matrix.form_common.js"></script> 
<script src="js/masked.js"></script> 
<script src="js/jquery.uniform.js"></script>





<script src="js/jquery.toggle.buttons.js"></script> 

 
<script src="js/select2.min.js"></script> 


<script src="js/wysihtml5-0.3.0.js"></script> 
<script src="js/jquery.peity.min.js"></script> 
<script src="js/bootstrap-wysihtml5.js"></script> 


<script>
$("#form_submit").on('submit', (function(e) {
      e.preventDefault();
      $.ajax({

        url: "func/add_p_details_func.php",
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
              //swal({
                //title: "",
                //text: "Successfully Added!",
                //type: "success",
                //timer:6000,
                //showConfirmButton: false,
              //});
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
