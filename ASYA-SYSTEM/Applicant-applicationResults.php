<!DOCTYPE html>
<html lang="en">
<?php
session_start();
require_once('../mysql_connect.php');
if(isset($_POST['emplink'])){
	$appNum= $_POST['emplink'];
}
if(isset($_POST['accept'])){
	$appNum = $_POST['accept'];
}
if(isset($_POST['reject'])){
	$appNum = $_POST['reject'];
}
$currentEmployeeNum = $_SESSION['emp_number'];
//Getting Applicants Info
$query="SELECT * FROM applicants WHERE APPNO = '{$appNum}'";
$result=mysqli_query($dbc,$query);
$rows=mysqli_fetch_array($result,MYSQLI_ASSOC);
$name = $rows['FIRSTNAME'].' '.$rows['LASTNAME'];
$firstName = $rows['FIRSTNAME'];
$lastName = $rows['LASTNAME'];
$email = $rows['EMAIL'];
// Query for Initial Interview Details
$query1 = "SELECT 	*
		 	 FROM	app_evaluation
			WHERE	APPNO = '{$appNum}'
			  AND	EVALUATION = 0
			";
$result1=mysqli_query($dbc,$query1);
$rows=mysqli_fetch_array($result1,MYSQLI_ASSOC);
$dateEvaluated = $rows['DATE'];
$score = $rows['TOTALSCORE'];
$remarks = $rows['REMARKS'];
$aremarks = $rows['AREMARKS'];
$evaluator = $rows['EVALUATORID'];

$query2 = "SELECT 	*
			 FROM	emp_contract
			WHERE	APPNO = '{$appNum}'
			";
$result2=mysqli_query($dbc,$query2);
$rows=mysqli_fetch_array($result2,MYSQLI_ASSOC);
$workingDays = $rows['WORKINGDAYS'];
$pay = $rows['COMPENSATION'];	
$startDate = $rows['STARTCONTRACT'];
$startTime = $rows['TIMESTART'];
$endTime = $rows['TIMEEND'];
$dateC = $rows['DATE'];
$evaluatorC = $rows['EMPLOYEENUMBER'];
//Getting actual evaluator name
$queryForActualName="SELECT 	*
							FROM 	employees e JOIN applicants a ON e.APPNO = a.APPNO";
$resultN=mysqli_query($dbc,$queryForActualName);
while($rows=mysqli_fetch_array($resultN,MYSQLI_ASSOC))
{
	$actualNames[] = $rows['FIRSTNAME'].' '.$rows['LASTNAME'];
	$codeName[] = $rows['EMPLOYEENUMBER'];
}
$actualName = "";
for ($y=0;$y<count($actualNames);$y++)
{
	if($evaluator ==$codeName[$y])
	{
		$actualName = $actualNames[$y];
	}
}
$actualNameC = "";
for ($y=0;$y<count($actualNames);$y++)
{
	if($evaluatorC ==$codeName[$y])
	{
		$actualNameC = $actualNames[$y];
	}
}

if (isset($_POST['accept'])){
	$queryA = " UPDATE 	applicants
				   SET	APPSTATUS = 6004
				 WHERE	APPNO = '{$appNum}'
			  ";
	$resultA=mysqli_query($dbc,$queryA);	
}
if (isset($_POST['reject'])){
	$queryR = " UPDATE 	applicants
				   SET	APPSTATUS = 6003
				WHERE	APPNO = '{$appNum}'
	";
	$resultR=mysqli_query($dbc,$queryR);
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

    <!--custom css-->
    <link rel="stylesheet" href="css/custom.css">
    <link rel="stylesheet" href="css/custom-theme.css">
    <script> $('.datepicker').datepicker(); </script>
    
        <!-- Custom styles for this template -->

    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet"/>
		
    <title>Application Status</title>
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
            <li><a href="login.php">Logout</a></li>
            
        </ul>
        <ul class="nav navbar-nav">
            <li><a href="#initial">Initial Interview Details</a></li>
            <li><a href="#technical">Technical Interview Details</a></li>
            <li><a href="#contract">Contract Information</a></li>
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
      		
		<div class="row">
			<div class="row">
                  <aside class="profile-nav col-lg-12">
                      <section class="panel">
                          <div class="user-heading">
                              <h1><?php echo $name ?></h1>
                              <p><?php echo $email ?></p>
                              <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">	
	                              <button onclick="myFunction()" class="btn btn-success" name="accept" value="<?php echo $appNum?>" >Accept</button>
	                              <button onclick="myFunction1()" class="btn btn-default" name="reject" value="<?php echo $appNum?>" >Reject</button> 
                              </form>                             
                          </div>						 
                      </section>
                  </aside>
               </div>
                  <aside class="profile-info col-lg-12">
                      <section class="panel">
                          <div class="panel-body bio-graph-info">
					        <a class="anchor" name="initial"></a>
					        <h2 class="page-title">Initial Interview Details</h2>
					        <div class="filldiv">
					               <section class="panel">
					                   <div class="panel-body">					                        
					                         <div>                                    
					                            <section>                                        		
													<div class="form-group clearfix">																																
														<label class="col-sm-3 control-label">Date Interviewed:</label>
														<div class="col-sm-3">
															<?php echo $dateEvaluated?>
														</div>
														<label class="col-sm-3 control-label">Evaluator:</label>
														<div class="col-sm-3">
															<?php echo $actualName?>
														</div>
													</div>
													<br>
													<div class="form-group clearfix">	
														<label class="col-sm-3 control-label">Remarks:</label>
														<div class="col-sm-3">
															<?php echo $remarks?>
														</div>		
														<label class="col-sm-3 control-label">Verdict:</label>
														<div class="col-sm-3">
															<?php echo $aremarks?>
														</div>																														
													</div>
													<br>
													<div class="form-group clearfix">																																
														<label class="col-sm-3 control-label">Total Score:</label>
														<div class="col-sm-3">
															<?php echo $score?>
														</div>
													</div>
					                             </section>
					                          </div>
					                     </div>
					                 </section>
					        </div>
					
					        <!-- Technical Interview section -->
					        <a class="anchor" name="technical"></a>
					        <h2 class="page-title">Technical Interview Details</h2>
					        <div class="filldiv">
					               <section class="panel">
					                   <div class="panel-body">					                        
					                         <div>                                    
					                            <section>                                        		
												<?php 
													if($aremarks == "For Hiring")
													{
														echo "<h3> *Dont need Technical Intterview because applicant is already for hiring.</h3>";
													}
													else
													{
														
													}
												?>																	
					                             </section>
					                          </div>					                          
					                     </div>
					                 </section>			
					        </div>
					
					        <!-- Contract section -->
					        <a class="anchor" name="contract"></a>
					        <h2 class="page-title">Contract Information</h2>
					        <div class="row filldiv">
					               <section class="panel">
					                   <div class="panel-body">					                       
					                         <div>                                    
					                            <section>                                        		
													<div class="form-group clearfix">																																
														<label class="col-sm-3 control-label">Date of Contract:</label>
														<div class="col-sm-3">
															<?php echo $dateC?>
														</div>
														<label class="col-sm-3 control-label">Evaluator:</label>
														<div class="col-sm-3">
															<?php echo $actualNameC?>
														</div>
													</div>
													<br>
													<div class="form-group clearfix">	
														<label class="col-sm-3 control-label">Working Days:</label>
														<div class="col-sm-3">
															<?php echo $workingDays?>
														</div>		
														<label class="col-sm-3 control-label">Working Hours:</label>
														<div class="col-sm-3">
															<?php echo $startTime?> to
															<?php echo $endTime?>
														</div>																													
													</div>
													<br>
													<div class="form-group clearfix">																																
														<label class="col-sm-3 control-label">Employment Start:</label>
														<div class="col-sm-3">
															<?php echo $startDate?>
														</div>
														<label class="col-sm-3 control-label">Compentsation:</label>
														<div class="col-sm-3">
															<?php echo $pay ?>
														</div>
													</div>																														
					                             </section>
					                          </div>
					                     </div>
					                 </section>
					        </div>							
                          </div>						  						  
                      </section>
				  </aside>
			</div>		
       
    </div>

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
	 <script>
		function myFunction() {
	    var x;
	    if (confirm("Accepted Applicant!") == true) {
	        window.location.href='recruitment.php';
	    } else {
	        x = "You pressed Cancel!";
	    }

		function myFunction1() {
		    var x;
		    if (confirm("Rejected Applicant!") == true) {
		        window.location.href='recruitment.php';
		    } else {
		        x = "You pressed Cancel!";
		    }
	}
	</script> 
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
</body>

</html>