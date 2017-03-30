<!DOCTYPE html>
<html lang="en">
<?php
session_start();
require_once('../../mysql_connect.php');
$appNum= $_SESSION['emp_appno'];
$status = 9991;
$currentDate = date('Y-m-d');
// get user info
$queryForInfo="SELECT * 
				 FROM applicants a JOIN employees e ON a.APPNO = e.APPNO
				WHERE a.APPNO = '{$appNum}'";
$resultNames=mysqli_query($dbc,$queryForInfo);
$rows=mysqli_fetch_array($resultNames,MYSQLI_ASSOC);
$appFirstName = $rows['FIRSTNAME'];
$appLastName = $rows['LASTNAME'];
$appPosition = $rows['APPPOSITION'];
$employeeNum = $rows['EMPLOYEENUMBER'];

if (isset($_POST['submit'])){
$message=NULL;

   if (empty($_POST['date'])){
    $date=NULL;
     $message.='<p>You forgot to enter the time reversal!';
  }else
    $date=$_POST['date'];
   
  if (empty($_POST['morningIn'])){
  $morningIn=NULL;
  $message.='<p>You forgot to enter the purpose!';
  }else
    $morningIn=$_POST['morningIn'];
    
  if (empty($_POST['lunchIn'])){
  $lunchIn=NULL;
  $message.='<p>You forgot to enter the purpose!';
  }else
  $lunchIn=$_POST['lunchIn'];
  
  if (empty($_POST['breakIn'])){
  	$breakIn=NULL;
  	$message.='<p>You forgot to enter the purpose!';
  }else
  	$breakIn=$_POST['breakIn'];
  
  if (empty($_POST['lunchOut'])){
  	$lunchOut=NULL;
  	$message.='<p>You forgot to enter the purpose!';
  }else
  	$lunchOut=$_POST['lunchOut'];
  
  if (empty($_POST['breakOut'])){
  	$breakOut=NULL;
  	$message.='<p>You forgot to enter the purpose!';
  }else
  	$breakOut=$_POST['breakOut'];
  
  if (empty($_POST['afternoonOut'])){
  	$afternoonOut=NULL;
  	$message.='<p>You forgot to enter the purpose!';
  }else
  	$afternoonOut=$_POST['afternoonOut'];
  
  if (empty($_POST['reason'])){
  	$reason=NULL;
  	$message.='<p>You forgot to enter the purpose!';
  }else
  	$reason=$_POST['reason'];
  	
  $isSeen = 1;

    if(!isset($message)){
	  require_once('../../mysql_connect.php');
	  $query="insert into reversalrequests (EMPLOYEENUMBER,DATE,REASON,STATUS,TABLEDATE,MORNINGTIMEIN_REQUEST,BREAKTIMEIN_REQUEST,LUNCHTIMEIN_REQUEST,LUNCHTIMEOUT_REQUEST,BREAKTIMEOUT_REQUEST,AFTERNOONTIMEOUT_REQUEST, isSeen) 
	  				   values 	('{$employeeNum}','{$currentDate}','{$reason}','{$status}','{$date}','{$morningIn}','{$breakIn}','{$lunchIn}','{$lunchOut}','{$breakOut}','{$afternoonOut}','{$isSeen}')";
	  $result=mysqli_query($dbc,$query);	 
	  echo "<div class='alert alert-success'>
  				<strong>Success!</strong> Request Sent!
			</div>";
}
}

if (isset($message)){
 echo '<font color="red">'.$message. '</font>';
}

?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <!-- Latest compiled JavaScript -->
    <script src="../js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../css/owl.carousel.css" type="text/css">
    <link href="../assets/font-awesome/css/font-awesome.css" rel="stylesheet" />

    <link rel="stylesheet" type="text/css" href="../assets/bootstrap-timepicker/compiled/timepicker.css" />
    <link rel="stylesheet" type="text/css" href="../assets/bootstrap-daterangepicker/daterangepicker-bs3.css" />
    <link rel="stylesheet" type="text/css" href="../assets/bootstrap-datetimepicker/css/datetimepicker.css" />
     <link rel="stylesheet" type="text/css" href="../assets/bootstrap-wysihtml5/bootstrap-wysihtml5.css" />

    <!--custom css-->
    <link rel="stylesheet" href="css/custom-theme.css">
    <link rel="stylesheet" href="css/custom.css">
    <!--custom css-->
    <link rel="stylesheet" href="../css/custom.css">
    <link rel="stylesheet" href="../css/custom-theme.css">
    <script> $('.datepicker').datepicker(); </script>  
    <!-- Custom styles for this template -->
    <link href="../css/style.css" rel="stylesheet">
    <link href="../css/style-responsive.css" rel="stylesheet"/>
    <title>Absent Reversal Form</title>
</head>
<body>

<!-- navbar -->

<div class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="home.html"><img src="asyalogo.jpg" /> </a>
        </div>
        <!-- right side stuffs -->
        <ul class="nav navbar-nav navbar-right">
            <li><a href="#"><span class="glyphicon glyphicon-envelope"></span></a></li>
            <li><a href="#"><span class="glyphicon glyphicon-calendar"></span></a></li>
            <li><a href="../login.php">Logout</a></li>
        </ul>
    </div>
</div> 

<div id="wrapper" class="container-fluid">

    <!-- Sidebar -->
    <div id="sidebar-wrapper" class="col-md-2">

        <div id="user-account">
            <h3>Welcome!</h3>
            <img class="img-circle img-responsive center-block" src="user.jpg" id="user-icon">
            <p>Employee</p>
        </div>

        <div class="sidebar-nav">

            <div class="list-group root">

				  <!-- home -->
                <a href="home.php" class="list-group-item"><span class="glyphicon glyphicon-home"></span> Home</a>
			
				 <!-- employee info -->
                <a href="Employee info.php" class="list-group-item"><span class="glyphicon glyphicon-user"></span> Employee</a>
			
                <!-- reports -->
                <a href="#report-items" class="list-group-item active" data-toggle="collapse" data-parent=".sidebar-nav">
                    <span class="glyphicon glyphicon-list-alt"></span> Request <span class="caret"></span>
                </a>
                <!-- report items -->
                <div class="list-group collapse" id="report-items">

                    <!-- FORMS -->
                   <a href="#attendance-reports" class="list-group-item" data-toggle="collapse">
                        <a href="Form - Absent Reversal.php" class="list-group-item active">Absent Reversal</a>
						<a href="Form - Change Record.php" class="list-group-item">Change Record</a>
						<a href="Form - Itenerary Authorization.php" class="list-group-item">Itinerary Authorization</a>
						<a href="Form - Leave.php" class="list-group-item">Leave</a>
                        <a href="Form - Overtime.php" class="list-group-item">Overtime</a>
                        <a href="Form - Resignation.php" class="list-group-item">Resignation</a>
                        <a href="Form - Undertime.php" class="list-group-item">Undertime</a>
                    </a>
                   
                </div>

                <a href="#" class="list-group-item"><span class="glyphicon glyphicon-info-sign"></span> About</a>
            </div>
        </div>

    </div>

    <!-- insert page content here -->
    <div id="page-content-wrapper">
        <h2 class="page-title">Absent Reversal Form</h2>
         <div class="row">
                  <div class="col-lg-12">
                      <!--progress bar start-->
                      <section class="panel">
                          <div class="panel-body">
                              <form id="wizard-validation-form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                  <div>                                    
                                      <section>                                        		
										<div class="form-group clearfix">																							
											 <label class="col-sm-1 control-label">Date</label>
												<div class="col-sm-3">
													<input type="date" required name="date" class="form-control">
												</div>
										</div>
																																			
										<div class="form-group clearfix">
											<label class="col-sm-1 control-label">Morning In</label>
												<div class="col-sm-2">
													  <div class="input-group bootstrap-timepicker">
														  <input required name="morningIn" type="text" class="form-control timepicker-24">
															<span class="input-group-btn">
															<button class="btn btn-default" type="button"><i class="fa fa-clock-o"></i></button>
															</span>
													  </div>
												</div>
												
											<label class="col-sm-1 control-label">Lunch In</label>
												<div class="col-sm-2">
													  <div class="input-group bootstrap-timepicker">
														  <input required name="lunchIn" type="text" class="form-control timepicker-24">
															<span class="input-group-btn">
															<button class="btn btn-default" type="button"><i class="fa fa-clock-o"></i></button>
															</span>
													  </div>
												</div>
												
											 <label class="col-sm-1 control-label">Break In</label>
												<div class="col-sm-2">
													  <div class="input-group bootstrap-timepicker">
														  <input required name="breakIn" type="text" class="form-control timepicker-24">
															<span class="input-group-btn">
															<button class="btn btn-default" type="button"><i class="fa fa-clock-o"></i></button>
															</span>
													  </div>
												</div>
										</div>
										
										<div class="form-group clearfix">
											<label class="col-sm-1 control-label">Lunch Out</label>
												<div class="col-sm-2">
													  <div class="input-group bootstrap-timepicker">
														  <input required name="lunchOut" type="text" class="form-control timepicker-24">
															<span class="input-group-btn">
															<button class="btn btn-default" type="button"><i class="fa fa-clock-o"></i></button>
															</span>
													  </div>
												</div>
												
											 <label class="col-sm-1 control-label">Break Out</label>
												<div class="col-sm-2">
													<div class="input-group bootstrap-timepicker">
														  <input required name="breakOut" type="text" class="form-control timepicker-24">
															<span class="input-group-btn">
															<button class="btn btn-default" type="button"><i class="fa fa-clock-o"></i></button>
															</span>
													  </div>
												</div>
												
											<label class="col-sm-1 control-label">Afternoon Out</label>
												<div class="col-sm-2">
													<div class="input-group bootstrap-timepicker">
														  <input required name="afternoonOut" type="text" class="form-control timepicker-24">
															<span class="input-group-btn">
															<button class="btn btn-default" type="button"><i class="fa fa-clock-o"></i></button>
															</span>
													  </div>
												</div>
										</div>
										
										<div class="form-group clearfix">
											<label class="col-sm-1 control-label">Reason</label>
												<div class="col-sm-6">
													<input type="text" required name="reason" class="form-control">
												</div>
												
										</div>
																												
                                    
                                          <div class="form-group clearfix">
                                              <div class="col-lg-12">
                                                  <input id="acceptTerms" name="acceptTerms" type="checkbox" class="required">
                                                  <label for="acceptTerms">I hereby certify that the information provided is correct. Any falsification of information in this regard may form ground for disciplinary action.</label>
                                              </div>
                                          </div>

										  
										 <div class="col-md-2 employee-info-button">
												<button class="btn btn-success" type="submit" name="submit" onclick="myFunction()">Submit</button>
											</div>
											
											<div class="col-md-2 employee-info-button">
												<a href="home.php" class="btn btn-default">Cancel</a>
											</div>
                                      </section>
                                  </div>
                              </form>
                          </div>
                      </section>
                  </div>
              </div>

            <div class="text-right" style="margin-right: 30px">
                <a href="#"><span class="glyphicon glyphicon-print"> Print</span></a>
            </div>
        </div>
    </div>
	 <script>
	function myFunction() {
	    var x;
	    if (confirm("Request Sent!") == true) {
	        window.location.href="home.php";
	    } else {
	        x = "You pressed Cancel!";
	    }
	}
	</script> 
    <!-- js placed at the end of the document so the pages load faster -->
    <script src="../js/jquery.js"></script>
    <script src="../js/jquery-ui-1.9.2.custom.min.js"></script>
    <script src="../js/jquery-migrate-1.2.1.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="../js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="../js/jquery.scrollTo.min.js"></script>
    <script src="../js/jquery.nicescroll.js" type="text/javascript"></script>
    <script type="text/javascript" src="../assets/data-tables/jquery.dataTables.js"></script>
    <script type="text/javascript" src="../assets/data-tables/DT_bootstrap.js"></script>
    <script src="../js/respond.min.js" ></script>
  	<script type="text/javascript" src="../assets/bootstrap-wysihtml5/wysihtml5-0.3.0.js"></script>
 	 <script type="text/javascript" src="../assets/bootstrap-wysihtml5/bootstrap-wysihtml5.js"></script>

  <!--common script for all pages-->
  <script src="../js/common-scripts.js"></script>
  <script type="text/javascript" src="../assets/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
  <script type="text/javascript" src="../assets/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js"></script>
  <script type="text/javascript" src="../assets/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>
  <script src="../js/advanced-form-components.js"></script>
</body>

</html>