<!DOCTYPE html>
<html lang="en">
<?php 
session_start();
require_once('../mysql_connect.php');
$currentEmployeeNum = $_SESSION['emp_number'];
if(isset($_POST['link'])){
	$formNum = $_POST['link'];
}
if(isset($_POST['submit'])){
	$formNum = $_POST['submit'];
}
$currentDate = date('Y-m-d');
$statusA = 9992;
//Getting Employees who has pending absent reversal
$queryForEmployees="SELECT 	*
							FROM 	APPLICANTS A JOIN 	EMPLOYEES E ON A.APPNO = E.APPNO
												 JOIN	OVERTIMEREQUESTS OQ ON E.EMPLOYEENUMBER = OQ.EMPLOYEENUMBER
						   WHERE 	OQ.FORMNUMBER = '{$formNum}'";
$result=mysqli_query($dbc,$queryForEmployees);
$rows=mysqli_fetch_array($result,MYSQLI_ASSOC);
$names = $rows['FIRSTNAME'].' '.$rows['LASTNAME'];
$position = $rows['ACTUALPOSITION'];
$dateFiled = $rows['DATE'];
$applicableDate = $rows['APPLICABLEDATE'];
$reason = $rows['REASON'];
$startTime = $rows['TIMESTART'];
$endTime = $rows['TIMEEND'];
$project = $rows['PROJECT'];
$dmRemarks = $rows['DMREMARKS'];
$dmApproverID = $rows['DMAPPROVERID'];
$dmApprovedDate = $rows['DMAPPROVEDDATE'];
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
	if($dmApproverID ==$codeName[$y])
	{
		$actualName = $actualNames[$y];
	}
}
//get all actual position
$queryForActualPosition="SELECT 	*
							FROM 	emp_positions";
$resultP=mysqli_query($dbc,$queryForActualPosition);
while($rows=mysqli_fetch_array($resultP,MYSQLI_ASSOC))
{
	$actualPos[] = $rows['EPOSITION'];
	$codePos[] = $rows['POSITION'];
}
//create array containing actual position
$positionName = "";
for ($x=0;$x<count($actualPos);$x++)
{
	if($position==$codePos[$x])
	{
		$positionName = $actualPos[$x];
	}
}

if (isset($_POST['submit'])){
	$message=NULL;

	if (empty($_POST['remarks'])){
		$remarks=NULL;
		$message.='<p>You forgot to enter the time reversal!';
	}else
		$remarks=$_POST['remarks'];
		 									 
if(!isset($message)){
require_once('../mysql_connect.php');
$query="UPDATE 	overtimerequests
		   SET	HRREMARKS = '{$remarks}', HRAPPROVERID = '{$currentEmployeeNum}', HRAPPROVEDDATE = '{$currentDate}', STATUS = {'$statusA'}
		 WHERE	FORMNUMBER = '{$formNum}' ";
$result=mysqli_query($dbc,$query);
echo $remarks.$currentEmployeeNum.$currentDate;
echo "<div class='alert alert-success'>
  		<strong>Success!</strong> Request Updated!
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
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Latest compiled JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!--custom css-->
    <link rel="stylesheet" href="css/custom.css">
    <link rel="stylesheet" href="css/custom-theme.css">

    <title>Subordinate Overtime</title>
</head>
<body>

<!-- navbar -->
<div class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="home.html"><img src="asyalogo.jpg" /> </a>
        </div>
 
        <ul class="nav navbar-nav navbar-right">
            <li><a href="#"><span class="glyphicon glyphicon-envelope"></span></a></li>
            <li><a href="#"><span class="glyphicon glyphicon-calendar"></span></a></li>
            <li><a href="login.html">Logout</a></li>
        </ul>
    </div>
</div>

<div id="wrapper" class="container-fluid">

    <!-- Sidebar -->
    <div id="sidebar-wrapper" class="col-md-2">

        <div id="user-account">
            <h3>Welcome!</h3>
            <img class="img-circle img-responsive center-block" src="user.jpg" id="user-icon">
            <p>HR Manager</p>
        </div>

        <div class="sidebar-nav">

            <div class="list-group root">

                <!-- home -->
                <a href="home.php" class="list-group-item"><span class="glyphicon glyphicon-home"></span> Home</a>

                <!-- recruitment -->
                <a href="recruitment.php" class="list-group-item"><span class="glyphicon glyphicon-eye-open"></span> Recruitment</a>

                <!-- employee -->
                <a href="employees.php" class="list-group-item"><span class="glyphicon glyphicon-pawn"></span> Employees</a>				
               	
               	<!-- calendar -->
				<a href="Attendance.php" class="list-group-item"><span class="glyphicon glyphicon-calendar"></span> Attendance</a>
				
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
                
                <!-- reports -->
                <a href="#report-items1" class="list-group-item" data-toggle="collapse" data-parent=".sidebar-nav">
                    <span class="glyphicon glyphicon-list-alt"></span> Visual Reports <span class="caret"></span>
                </a>
                <!-- report items -->
                <div class="list-group collapse" id="report-items1">
                    <!-- employee reports -->
                        <a href="Report - EmployeeTardiness.php" class="list-group-item"> &#x25cf Employee Tardiness</a>
                        <a href="Report - EmployeeTenureOverall.php" class="list-group-item"> &#x25cf Employee Tenure</a>
                        <a href="Report - ManpowerArchitects.php" class="list-group-item"> &#x25cf Manpower Architects</a>
                        <a href="Report - ManpowerEngineers.php" class="list-group-item"> &#x25cf Manpower Engineers</a>
                        <a href="Report - RecruitmentNewlyHired.php" class="list-group-item">&#x25cf Recruitment Newly Hired</a>					
                </div>                
				
                <!-- requests -->
                <a href="#request-items" class="list-group-item active" data-toggle="collapse" data-parent=".sidebar-nav">
                    <span class="glyphicon glyphicon-list-alt"></span> Requests <span class="caret"></span>
                </a>
                <!-- report items -->
                <div class="list-group collapse" id="request-items">
                    <!-- employee reports -->
                        <a href="LeaveRequest.php" class="list-group-item"> &#x25cf Leave</a>
                        <a href="OvertimeRequest.php" class="list-group-item active"> &#x25cf Overtime</a>
                        <a href="UndertimeRequest.php" class="list-group-item"> &#x25cf Undertime</a>
                        <a href="AbsentReversalRequest.php" class="list-group-item"> &#x25cf Absent Reversal</a>
                        <a href="ItineraryAuthorizationRequest.php" class="list-group-item">&#x25cf Itinerary Authorization</a>	
                        <a href="ManpowerRequest.php" class="list-group-item"> &#x25cf Manpower</a>
                        <a href="ResignationRequest.php" class="list-group-item"> &#x25cf Resignation</a>
                        <a href="ChangeRecordRequest.php" class="list-group-item">&#x25cf Change Record</a>	                        				
                </div>				
				
                <a href="#" class="list-group-item"><span class="glyphicon glyphicon-info-sign"></span> About</a>
            </div>
        </div>

    </div>

    <!-- insert page content here -->
    <div id="page-content-wrapper">
        <h2 class="page-title">Detailed Overtime</h2>
         <div class="row">
                  <div class="col-lg-12">
                      <!--progress bar start-->
                      <section class="panel">
                          <div class="panel-body">
                              <form id="wizard-validation-form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                  <div>                                    
                                      <section>                                        		
										<div class="form-group clearfix">	
											<label class="col-sm-1 control-label">Name</label>
											<div class="col-sm-2">
											<?php echo $names?>
											</div>																																
											<label class="col-sm-1 control-label">Position</label>
											<div class="col-sm-2">
											<?php echo $positionName?>
											</div>
											<label class="col-sm-1 control-label">Project</label>
											<div class="col-sm-2">
											<?php echo $project?>
											</div>											
										</div>
										<br>
										<div class="form-group clearfix">	
											<label class="col-sm-1 control-label">Date Filed</label>
											<div class="col-sm-2">
											<?php echo $dateFiled?>
											</div>																																
											<label class="col-sm-1 control-label">Overtime Date</label>
											<div class="col-sm-2">
											<?php echo $applicableDate?>
											</div>
										</div>										
										<br>	
										<div class="form-group clearfix">	
											<label class="col-sm-1 control-label">Time Start</label>
											<div class="col-sm-2">
											<?php echo $startTime?>
											</div>																																
											<label class="col-sm-1 control-label">Time End</label>
											<div class="col-sm-2">
											<?php echo $endTime?>
											</div>
											<label class="col-sm-1 control-label">Total Time</label>
											<div class="col-sm-2">
											<?php echo $endTime - $startTime?>
											</div>
										</div>										
										<br>																																		
										<div class="form-group clearfix">
											<label class="col-sm-1 control-label">Reason</label>
												<div class="col-sm-6">
												<?php echo $reason?>
												</div>											
										</div>
																				
										<div class="form-group clearfix">
											<label class="col-sm-1 control-label">Approved By</label>
												<div class="col-sm-2">
												<?php echo $actualName?>
												</div>
												
											 <label class="col-sm-1 control-label">Approved Date</label>
												<div class="col-sm-2">
												<?php echo $dmApprovedDate?>
												</div>
												
											<label class="col-sm-1 control-label">Approver Remarks</label>
												<div class="col-sm-2">
												<?php echo $dmRemarks?>
												</div>
										</div>
										
										<div class="form-group clearfix">
											<label class="col-sm-1 control-label">HR Manager Remarks</label>
												<div class="col-sm-6">
													<input type="text" name="remarks" class="form-control">
												</div>											
										</div>
																																					  
										 	<div class="col-md-2">
												<button class="btn btn-success" type="submit" name="submit" value="<?php echo $formNum?>">Approve</button>
											</div>
										
											<div class="col-md-2">
												<button class="btn btn-danger"  name="reject" >Reject</button>
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

</body>

</html>