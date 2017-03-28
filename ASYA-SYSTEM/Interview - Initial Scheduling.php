<!DOCTYPE html>
<html lang="en">
<?php
session_start();
require_once('../mysql_connect.php');

//This will be generated based on current user
$currentEmployeeNum = $_SESSION['emp_number'];
if(isset($_POST['emplink'])){
	$appNum= $_POST['emplink'];
}
if(isset($_POST['submit'])){
	$appNum = $_POST['submit'];
}


// Get other applicant info
$queryForAppDetails="SELECT * FROM applicants WHERE APPNO = '{$appNum}'";
$resultNum=mysqli_query($dbc,$queryForAppDetails);
$rows=mysqli_fetch_array($resultNum,MYSQLI_ASSOC);
$appEmail = $rows['EMAIL'];
$fName = $rows['FIRSTNAME'];
$lName = $rows['LASTNAME'];
$appName = $rows['FIRSTNAME'].' '.$rows['LASTNAME'];
$appMNum =  $rows['MOBILENO'];
$appTNum =  $rows['TELEPHONENO'];
$evaluation = 0;// 0 kasi ang tech evaluation

if (isset($_POST['submit'])){
$message=NULL;
	
  if (empty($_POST['date'])){
  	$date=NULL;
  	$message.='<p>Please Choose a DAte!';
  }else
  	$date=$_POST['date'];
  
  if (empty($_POST['remarks'])){
  	$remarks=NULL;
  	$message.='<p>Walang pumasok wd';
  }else
  	$remarks=$_POST['remarks'];
  
  if (empty($_POST['start'])){
	$start=NULL;
	$message.='<p>Please Choose a WHS!';
  }else
  	$start=$_POST['start'];
  	
  if (empty($_POST['end'])){
	$end=NULL;
	$message.='<p>Please Choose a WHE';
  }else
  {
	  if($_POST['end']<$start)
	  {	  	
	  	$message.='<p>Working Hours End must be later';	  	
	  }
	  else {
	  	$end=$_POST['end'];
	  }
  }
  
	if(!isset($message)){
		$queryinsert="insert into app_evaluation (APPNO,DATESCHED,TIMESCHEDSTART,TIMESCHEDEND,REMARKSSCHED, EVALUATION)
						   values ('{$appNum}','{$date}','{$start}','{$end}','{$remarks}','{$evaluation}')";
		$resultinsert= mysqli_query($dbc,$queryinsert);
	$message = "Success!";
	}
	 
	
	}/*End of main Submit conditional*/

if (isset($message)){
 echo '<font color="red">'.$message. '</font>';
}
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="img/favicon.php">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Latest compiled JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!--for graphs/charts-->
    <script src="js/raphael-min.js"></script>
    <link rel="stylesheet" href="css/morris.css">
    <script src="js/morris.min.js"></script>

    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen"/>
    <link rel="stylesheet" href="css/owl.carousel.css" type="text/css">
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />

    <link rel="stylesheet" type="text/css" href="assets/bootstrap-fileupload/bootstrap-fileupload.css" />
    <link rel="stylesheet" type="text/css" href="assets/bootstrap-wysihtml5/bootstrap-wysihtml5.css" />
    <link rel="stylesheet" type="text/css" href="assets/bootstrap-datepicker/css/datepicker.css" />
    <link rel="stylesheet" type="text/css" href="assets/bootstrap-timepicker/compiled/timepicker.css" />
    <link rel="stylesheet" type="text/css" href="assets/bootstrap-colorpicker/css/colorpicker.css" />
    <link rel="stylesheet" type="text/css" href="assets/bootstrap-daterangepicker/daterangepicker-bs3.css" />
    <link rel="stylesheet" type="text/css" href="assets/bootstrap-datetimepicker/css/datetimepicker.css" />
    <link rel="stylesheet" type="text/css" href="assets/jquery-multi-select/css/multi-select.css" />
    <!--custom css-->
    <link rel="stylesheet" href="css/custom.css">
    <link rel="stylesheet" href="css/custom-theme.css">
    <script> $('.datepicker').datepicker(); </script>
    
    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet"/>

    <title>Scheduling</title>
</head>
<body>

<!-- navbar -->
<div class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="home.php"><img src="asyalogo.jpg" /> </a>
        </div>
    
        <ul class="nav navbar-nav navbar-right">
            <li><a href="#"><span class="glyphicon glyphicon-envelope"></span></a></li>
            <li><a href="#"><span class="glyphicon glyphicon-calendar"></span></a></li>
            <li><a href="login.php">Logout</a></li>
        </ul>
    </div>
</div>

<div id="wrapper" class="container-fluid">

    <!-- Sidebar -->
    <div id="sidebar-wrapper" class="col-md-2">

        <div id="user-account">
            <h3>Welcome!</h3>
            <img class="img-circle img-responsive center-block" src="user.jpg" id="user-icon">
            <p>Username Here</p>
        </div>

        <div class="sidebar-nav">

            <div class="list-group root">

                <!-- home -->
                <a href="home.php" class="list-group-item"><span class="glyphicon glyphicon-home"></span> Home</a>

                <!-- recruitment -->
                <a href="recruitment.php" class="list-group-item active"><span class="glyphicon glyphicon-eye-open"></span> Recruitment</a>

                <!-- employee -->
                <a href="employees.php" class="list-group-item"><span class="glyphicon glyphicon-pawn"></span> Employees</a>
				
				<!-- calendar -->
				<a href="Calendar.php" class="list-group-item"><span class="glyphicon glyphicon-calendar"></span> Calendar</a>

                <!-- reports -->
                <a href="#report-items" class="list-group-item" data-toggle="collapse" data-parent=".sidebar-nav">
                    <span class="glyphicon glyphicon-list-alt"></span> Reports <span class="caret"></span>
                </a>
                <!-- report items -->
                <div class="list-group collapse" id="report-items">
                    <!-- employee reports -->
                        <a href="LeaveReport.php" class="list-group-item"> &#x25cf Leave</a>
                        <a href="OvertimeReport.php" class="list-group-item"> &#x25cf Overtime</a>
                        <a href="UndertimeReport.php" class="list-group-item"> &#x25cf Undertime</a>
                        <a href="AbsentReversalReport.php" class="list-group-item"> &#x25cf Absent Reversal</a>
                        <a href="ItineraryAuthorizationReport.php" class="list-group-item">&#x25cf Itinerary Authorization</a>					
                </div>
				
                <!-- requests -->
                <a href="#request-items" class="list-group-item" data-toggle="collapse" data-parent=".sidebar-nav">
                    <span class="glyphicon glyphicon-list-alt"></span> Requests <span class="caret"></span>
                </a>
                <!-- report items -->
                <div class="list-group collapse" id="request-items">
                    <!-- employee reports -->
                        <a href="LeaveRequest.php" class="list-group-item"> &#x25cf Leave</a>
                        <a href="OvertimeRequest.php" class="list-group-item"> &#x25cf Overtime</a>
                        <a href="UndertimeRequest.php" class="list-group-item"> &#x25cf Undertime</a>
                        <a href="AbsentReversalRequest.php" class="list-group-item"> &#x25cf Absent Reversal</a>
                        <a href="ItineraryAuthorizationRequest.php" class="list-group-item">&#x25cf Itinerary Authorization</a>					
                </div>				
				
                <a href="#" class="list-group-item"><span class="glyphicon glyphicon-info-sign"></span> About</a>
            </div>
        </div>

    </div>

    <!-- insert page content here -->
    			<div id="page-content-wrapper">
	    			<section class="panel">		
	    					<div class="panel-heading">    			
									<h1 class="panel-title"><b>Schedule Interview</b>
									<span class="panel-subheader pull-right"><?php echo date("m/d/Y")  ?>						
									</span>
									</h1>
							</div>
							<div class="panel-body">
									<div class="form">
										<form class="cmxform form-horizontal tasi-form" id="commentForm" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
											  <div class="form-group ">
												  <label for="cname" class="control-label col-lg-2"><b>Applicant Name:</b></label>
												  <div class="col-lg-4">
													<?php echo $appName ?>											  									
												  </div>									  										  
											  </div>
											  <div class="form-group ">
											  	 <label for="cname" class="control-label col-lg-2"><b>(Note):</b></label>
												  <div class="col-lg-10">
													<p> Please contact the applicant for scheduling.<b>(Mobile: <?php echo" $appMNum "?>)</b></p> 											  									
												  </div>
											  </div>
											  <div class="form-group">
												  <label class="control-label col-lg-2"><b>Interview Date:</b></label>
		                                          <div class="col-lg-4">
													<div class="form-group">																										
														<input type="date" required name="date" class="form-control">
													</div>
		                                          </div>
												  <label class="control-label col-lg-2"><b>Interview Time:</b></label>
												  <div class="col-lg-2">
													  <div class="input-group bootstrap-timepicker">
														  <input required name="start" type="text" class="form-control timepicker-24">
															<span class="input-group-btn">
															<button class="btn btn-default" type="button"><i class="fa fa-clock-o"></i></button>
															</span>
													  </div>
		                                             <span class="help-block">
		                                               (time range)
		                                             </span>											  
												  </div>										  
												  <div class="col-lg-2">										  
													  <div class="input-group bootstrap-timepicker">
														  <input required name="end" type="text" class="form-control timepicker-24">
															<span class="input-group-btn">
															<button class="btn btn-default" type="button"><i class="fa fa-clock-o"></i></button>
															</span>
													  </div>
												  </div>										  
											  </div>											  
											<div class="form-group">
												<label class="control-label col-lg-2">Remarks:</label>
													<div class="col-lg-6">
														<input type="text" name="remarks" class="form-control">
													</div>											
												</div>									  
											<div class="panel-footer text-right">
											<button class="btn btn-success" type="submit" name="submit" value="<?php echo $appNum?>" onclick="myFunction()">Schedule</button>
											<a class="btn btn-default"  href="recruitment.php"> Previous </a> 
											</div>									
										</form>
									</div>					  
							</div>
						</section>
					</div>
	 <script>
		function myFunction() {
		    var x;
		    if (confirm("Scheduling Success!") == true) {
		        window.location.href="home.php";
		    } else {
		        x = "You pressed Cancel!";
		    }
		}
	</script> 
</div>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="js/jquery.js"></script>
    <script src="js/jquery-ui-1.9.2.custom.min.js"></script>
    <script src="js/jquery-migrate-1.2.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="js/jquery.scrollTo.min.js"></script>
    <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
    <script type="text/javascript" src="assets/data-tables/jquery.dataTables.js"></script>
    <script type="text/javascript" src="assets/data-tables/DT_bootstrap.js"></script>
    <script src="js/respond.min.js" ></script>

  <!--right slidebar-->
  <script src="js/slidebars.min.js"></script>

    <!--common script for all pages-->
    <script src="js/common-scripts.js"></script>

      <!--script for this page only-->
      <script src="js/editable-table.js"></script>

      <!-- END JAVASCRIPTS -->
      <script>
          jQuery(document).ready(function() {
              EditableTable.init();
          });
      </script>
	  
	     <!-- js placed at the end of the document so the pages load faster -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="js/jquery.scrollTo.min.js"></script>
    <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="js/respond.min.js" ></script>
  
    <!--this page plugins-->

  <script type="text/javascript" src="assets/fuelux/js/spinner.min.js"></script>
  <script type="text/javascript" src="assets/bootstrap-fileupload/bootstrap-fileupload.js"></script>
  <script type="text/javascript" src="assets/bootstrap-wysihtml5/wysihtml5-0.3.0.js"></script>
  <script type="text/javascript" src="assets/bootstrap-wysihtml5/bootstrap-wysihtml5.js"></script>
  <script type="text/javascript" src="assets/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
  <script type="text/javascript" src="assets/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js"></script>
  <script type="text/javascript" src="assets/bootstrap-daterangepicker/moment.min.js"></script>
  <script type="text/javascript" src="assets/bootstrap-daterangepicker/daterangepicker.js"></script>
  <script type="text/javascript" src="assets/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
  <script type="text/javascript" src="assets/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>
  <script type="text/javascript" src="assets/jquery-multi-select/js/jquery.multi-select.js"></script>
  <script type="text/javascript" src="assets/jquery-multi-select/js/jquery.quicksearch.js"></script>


  <!--summernote-->
  <script src="assets/summernote/dist/summernote.min.js"></script>

  <!--right slidebar-->
  <script src="js/slidebars.min.js"></script>

  <!--common script for all pages-->
    <script src="js/common-scripts.js"></script>
    <!--this page  script only-->
    <script src="js/advanced-form-components.js"></script>
</body>

</html>