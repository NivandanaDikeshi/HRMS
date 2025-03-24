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
    <h1>Training Information </h1>
  </div>
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
        <!--start Details of Ministry /Department  -->
		 <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Training Information </h5>
        </div>
        <div class="widget-content nopadding">
          <form action="javascript:void(0);" id="form_submit" class="form-horizontal">
            <div class="control-group">
              <label class="control-label">Name Of The Course  :</label>
              <div class="controls">
                <input type="text" class="span8" placeholder="Name Of The Course" name="course_name" />
				<input type="hidden" name="pid" value="<?php if(isset($_GET['pid']) == true){ echo $pid; } ?>" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Local/ Foreign  :</label>
              <div class="controls">
               <label>
                  <input type="radio" name="radios1" value="Local" />
                  Local</label>
                <label>
                  <input type="radio" name="radios1" value="Foreign" />
                  Foreign</label>
                </div>
            </div>
			
			<div class="control-group">
              <label class="control-label">If Foreign, Country :</label>
              <div class="controls">
                <input type="text" class="span4" placeholder="Country" name="country_name" />
              </div>
            </div>
            			
			<div class="control-group">
              <label class="control-label">Duration :</label>
              <div class="controls">
                From : <input type="text" class="span3" placeholder="yyyy-mm-dd" name="from_date" />   To : <input type="text" class="span3" placeholder="yyyy-mm-dd" name="to_date" />
              </div>
            </div>
			
			<div class="control-group">
              <label class="control-label">Course Fee :</label>
              <div class="controls">
                <input type="text" class="span3" placeholder="Course Fee" name="course_fee" />
              </div>
            </div>
			
			<div class="control-group">
              <label class="control-label">Allowances Given :</label>
              <div class="controls">
                
		<div class="widget-box">
          <div class="widget-content nopadding">
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>SN</th>
				  <th>Allowance Name</th>
                  <th>Amount (USD)</th>
                </tr>
              </thead>
              <tbody>
                <tr class="odd gradeX">
                  <td>1</td>
				  <td>Incidental Allowance </td>
                  <td><input type="text" class="span3" placeholder="Incidental Allowance" name="incidental" /></td>
                 </tr>
                <tr class="even gradeC">
                  <td>2</td>
				  <td>Combined  Allowance</td>
                  <td><input type="text" class="span3" placeholder="Combined Allowance" name="combined" /></td>
                </tr>
                <tr class="odd gradeA">
                  <td>3</td>
				  <td>Warm Cloth Allowance</td>
                  <td><input type="text" class="span3" placeholder="Warm Cloth Allowance" name="warm_cloth" /><br><br>
				  Last Given Date : <input type="text" class="span3" placeholder="yyyy-mm-dd" name="warm_cloth_last_date" /></td>
                </tr>
                
              </tbody>
            </table>
          </div>
        </div>
				
				
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
            <h5>Data table</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Name Of The Course </th>
                  <th>Local/ Foreign</th>
                  <th>Duration</th>
                  <th>Course Fee</th>
				  <th>Allowances Given</th>
				  <th>Update</th>
                </tr>
              </thead>
              <tbody>
                <tr class="gradeX">
                  <td>Trident</td>
                  <td>InternetExplorer 4.0</td>
                  <td>Win 95+</td>
                  <td class="center">4</td>
				  <td>Win 95+</td>
				  <td>Win 95+</td>
                </tr>
               
                
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

        url: "func/trg_details_func.php",
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
