<?php 
error_reporting(E_ALL); 
ini_set('display_errors', 'on'); 
include ("db/db.php");

// Ensure pid is sanitized to avoid SQL Injection
$pid = isset($_GET['pid']) ? htmlspecialchars($_GET['pid']) : null;
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
  <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,700,800" rel="stylesheet" type="text/css">
</head>
<body>

<!--Header-part-->
<div id="header">
  <h1><a href="dashboard.html">Matrix Admin</a></h1>
</div>

<!--top-Header-menu-->
<div id="user-nav" class="navbar navbar-inverse">
  <ul class="nav">
    <li class="dropdown" id="profile-messages"><a href="#" data-toggle="dropdown" class="dropdown-toggle"><i class="icon icon-user"></i>  <span class="text">Welcome User</span><b class="caret"></b></a>
      <ul class="dropdown-menu">
        <li><a href="#"><i class="icon-user"></i> My Profile</a></li>
        <li class="divider"></li>
        <li><a href="login.php"><i class="icon-key"></i> Log Out</a></li>
      </ul>
    </li>
    <li><a href="#"><i class="icon icon-cog"></i> <span class="text">Settings</span></a></li>
    <li><a href="login.php"><i class="icon icon-share-alt"></i> <span class="text">Logout</span></a></li>
  </ul>
</div>

<div id="sidebar">
  <a href="#" class="visible-phone"><i class="icon icon-th"></i>Tables</a>
  <?php include('include/nav.php'); ?>
</div>

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Tables</a> </div>
    <h1>Duty Information</h1>
  </div>

  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
        <!--start register-->
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
            <h5>Duty Information</h5>
          </div>
          <div class="widget-content nopadding">
            <form id="form_submit" class="form-horizontal" enctype="multipart/form-data">
              <div class="control-group">
                <label class="control-label">Grade :</label>
                <div class="controls">
                <select class="span4" name="grade" required>
                    <option selected value="0">Select Position Grade</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="Special">Special</option>
                    <option value="Super">Super</option>
                    </select>
                </div>
              </div>

              <div class="control-group">
                <label class="control-label">Position :</label>
                <div class="controls">
                  <select class="span4" name="position" required>
                    <option selected value="0">Select Position</option>
                    <option value="Secretary">Secretary</option>
                    <option value="Add. Secretary">Add. Secretary</option>
                    <option value="Director General">Director General</option>
                    <option value="CFO">CFO</option>
                    <option value="Chief of National Intelligence">Chief of National Intelligence</option>
                    <option value="Sen. Ass. Secretary">Sen. Ass. Secretary</option>
                    <option value="Director">Director</option>
                    <option value="Chief Internal Aviator">Chief Internal Aviator</option>
                    <option value="Legal Advisor">Legal Advisor</option>
                    <option value="Deputy Director">Deputy Director</option>
                    <option value="Assistant Director">Assistant Director</option>
                    <option value="Assistant Director (Super Numeric)">Assistant Director (Super Numeric)</option>
                    <option value="Deputy Controller of Explosives">Deputy Controller of Explosives</option>
                    <option value="Assistant Controller of Explosives">Assistant Controller of Explosives</option>
                    <option value="Accountant">Accountant</option>
                    <option value="Internal Auditor">Internal Auditor</option>
                    <option value="Legal Officer">Legal Officer</option>
                    <option value="Mechanical Engineer">Mechanical Engineer</option>
                    <option value="Secretary's Coordinator Secretary">Secretary's Coordinator Secretary</option>
                    <option value="Administrative Officer">Administrative Officer</option>
                    <option value="Coordinator Secretary (Sadahiru Seya)">Coordinator Secretary (Sadahiru Seya)</option>
                    <option value="Language Translator">Language Translator</option>
                    <option value="Information and Communication Technology Officer">Information and Communication Technology Officer</option>
                    <option value="Research Officer">Research Officer</option>
                    <option value="Subject Clark">Subject Clark</option>
                    <option value="Librarian">Librarian</option>
                    <option value="Cameraman">Cameraman</option>
                    <option value="Driver">Driver</option>
                    <option value="Officer Assistant">Officer Assistant</option>
                  </select>
                </div>
              </div>

              <div class="control-group">
                <label class="control-label">Division :</label>
                <div class="controls">
                  <input type="text" class="span6" placeholder="Division" name="division" />
                </div>
              </div>

              <div class="control-group">
                <label class="control-label">Date of Duty Assume :</label>
                <div class="controls">
                  <input type="text" class="span2" placeholder="YYYY/MM/DD" name="join_date" />
                </div>
              </div>

              <div class="control-group">
                <label class="control-label">Personal File No :</label>
                <div class="controls">
                  <input type="text" class="span6" placeholder="Personal file No" name="personal_file_no" />
                </div>
              </div>

              <div class="control-group">
                <label class="control-label">Appointment Letter Number :</label>
                <div class="controls">
                  <input type="text" class="span11" placeholder="Appointment Letter Number" name="appt_letter_no" />
                  <input type="hidden" name="pid" value="<?php echo $pid; ?>" />
                </div>
              </div>

              <div class="control-group">
                <label class="control-label">Subject Clerk No :</label>
                <div class="controls">
                  <input type="text" class="span7" placeholder="Subject Clerk No" name="subject_clerk_no" />
                </div>
              </div>

              <div class="control-group">
                <label class="control-label">Widow and Orphans Pension No :</label>
                <div class="controls">
                  <input type="text" class="span11" placeholder="Widow and Orphans Pension No" name="pension_no" />
                </div>
              </div>

              <div class="control-group">
              <label class="control-label">Type :</label>
              <div class="controls">
               <label>
                  <input type="radio" name="radios" value="Permanent" />
                  Permanent</label>
                <label>
                  <input type="radio" name="radios" value="Temporary" />
                  Temporary</label>
                </div>
            </div>

              <div class="control-group">
                <label class="control-label">Date Of Retirement :</label>
                <div class="controls">
                  <input type="text" class="span11" placeholder="YYYY/MM/DD" name="date_retire" />
                </div>
              </div>

              <div class="control-group">
                <label class="control-label">Salary Code :</label>
                <div class="controls">
                  <input type="text" class="span7" placeholder="Salary Code" name="salary_code" />
                </div>
              </div>

              <div class="control-group">
                <label class="control-label">Salary Scale :</label>
                <div class="controls">
                  <input type="text" class="span7" placeholder="Salary scale" name="salary_scale" />
                </div>
              </div>

              <div class="form-actions">
                <button type="submit" class="btn btn-success">Save</button>
              </div>
            </form>
          </div>
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
<script src="js/jquery.toggle.buttons.js"></script> 
<script src="js/select2.min.js"></script> 
<script src="js/wysihtml5-0.3.0.js"></script> 
<script src="js/jquery.peity.min.js"></script> 
<script src="js/bootstrap-wysihtml5.js"></script> 

<script>
$("#form_submit").on('submit', (function(e) {
    e.preventDefault();
    $.ajax({
        url: "func/add_duty_details.php",
        type: "POST",
        dataType: 'json',
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function() {},
        success: function(data) {
            if (!data) {
                swal("", "Something went wrong! Please Try Again", "warning");
            } else {
                switch (data.status) {
                    case 'error':
                        swal("SQL Error!", "Please Try Again!", "warning");
                        break;
                    case 'empty':
                        swal("", "Invalid Details, Please Try Again!", "warning");
                        break;
                    case 'exists':
                        swal("", "Already Exist!", "warning");
                        break;
                    case 'ok':
                        swal({
                            title: "",
                            text: "Successfully Added!",
                            type: "success",
                            timer: 6000,
                            showConfirmButton: false,
                        });
                        window.location.href = "add_details.php";
                        break;
                    default:
                        swal("", "Something went wrong! Please Try Again", "warning");
                }
            }
        },
        error: function() {
            swal("", "Error, please try again.", "error");
        }
    });
}));
</script>

</body>
</html>

