<!DOCTYPE html>
<html lang="en">
<?php
session_start();
$currentEmployeeNum = $_SESSION['emp_number'];
require_once('../mysql_connect.php');
$appNum= $_POST['emplink'];
//Current year anf month
$time=strtotime(date('Y-m-d'));
$month=date("F",$time);
$year=date("Y",$time);
// Get employee INFO
$query="  SELECT 	A.FIRSTNAME,A.LASTNAME,A.MIDDLENAME,E.EMPLOYEENUMBER,E.DEPT,E.ACTUALPOSITION,E.STATUS,A.BIRTHDATE,EC.STARTCONTRACT
			FROM 	applicants A 
			JOIN 	employees E ON A.APPNO = E.APPNO 
			JOIN 	emp_contract EC ON E.APPNO = EC.APPNO 
	   	   WHERE 	A.APPNO = '{$appNum}'";
$result=mysqli_query($dbc,$query);
$rows=mysqli_fetch_array($result,MYSQLI_ASSOC);
$name = $rows['FIRSTNAME'].' '.$rows['LASTNAME'];
$firstName = $rows['FIRSTNAME'];
$lastName = $rows['LASTNAME'];
$middleName = $rows['MIDDLENAME'];
$employeeNum = $rows['EMPLOYEENUMBER'];
$birthday = $rows['BIRTHDATE'];
$startDate = $rows['STARTCONTRACT'];
// To convert to actual readable info
$dept = $rows['DEPT'];
$pos = $rows['ACTUALPOSITION'];
$status = $rows['STATUS'];
//get all actual department
$queryForActualDepartment="SELECT 	*
							FROM 	emp_dept";
$resultD=mysqli_query($dbc,$queryForActualDepartment);
while($rows=mysqli_fetch_array($resultD,MYSQLI_ASSOC))
{
	$actualDept[] = $rows['EDEPT'];
	$codeDept[] = $rows['DEPT'];
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

//get all actual status
$queryForActualStatus="		SELECT 	*
							  FROM 	emp_status";
$resultS=mysqli_query($dbc,$queryForActualStatus);
while($rows=mysqli_fetch_array($resultS,MYSQLI_ASSOC))
{
	$actualStatus[] = $rows['ESTATUS'];
	$codeStatus[] = $rows['STATUS'];
}
//Converting dept code to actual dept
$deptName="";
$posName="";
$statusName="";
for($x=0;$x<count($codeDept);$x++)
{
	if($dept == $codeDept[$x])
	{
		$deptName = $actualDept[$x];
	}
}
for($y=0;$y<count($codePos);$y++)
{
	if($pos == $codePos[$y])
	{
		$posName = $actualPos[$y];
	}
}
for($z=0;$z<count($codeStatus);$z++)
{
	if($status == $codeStatus[$z])
	{
		$statusName = $actualStatus[$z];
	}
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

    <title>Employee Information</title>
</head>
<body>

<!-- navbar -->
<div class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="home.php"><img src="asyalogo.jpg" /> </a>
        </div>
        <ul class="nav navbar-nav">
            <li><a href="#employeeInfo">Employee Information</a></li>
            <li><a href="#attendance">Attendance Summary</a></li>
            <li><a href="#leave">Request Summary</a></li>
            <li><a href="#eval">Evaluation Summary</a></li>
        </ul>
        <!-- right side stuffs -->
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
                <a href="recruitment.php" class="list-group-item"><span class="glyphicon glyphicon-eye-open"></span> Recruitment</a>

                <!-- employee -->
                <a href="employees.php" class="list-group-item active"><span class="glyphicon glyphicon-pawn"></span> Employees</a>
				
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
                        <a href="ItineraryAuthorizationReport.php" class="list-group-item">&#x25cf Itenerary Authorization</a>					
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

        <!-- employee information section -->
        <a class="anchor" name="employeeInfo"></a>
        <div class="row filldiv">
            <h2 class="page-title">Employee Information</h2>

            <div class="col-md-2 text-right">
                <h4 class="info-label-text">Last Name:</h4>
                <h4 class="info-label-text">First Name:</h4>
                <h4 class="info-label-text">Middle Name:</h4>
                <h4 class="info-label-text">Department:</h4>
                <h4 class="info-label-text">Position:</h4>
                <h4 class="info-label-text">Date Started:</h4>
                <h4 class="info-label-text">Birthday:</h4>
            </div>
            <div class="col-md-3">
                <h4 class="info-detail-text"><?php echo $lastName?></h4>
                <h4 class="info-detail-text"><?php echo $firstName?></h4>
                <h4 class="info-detail-text"><?php echo $middleName?></h4>
                <h4 class="info-detail-text"><?php echo $deptName?></h4>
                <h4 class="info-detail-text"><?php echo $posName?></h4>
                <h4 class="info-detail-text"><?php echo $startDate?></h4>
                <h4 class="info-detail-text"><?php echo $birthday?></h4>
            </div>
            <div class="col-md-2 text-right">
                <h4 class="info-label-text">Employee No.:</h4>
                <br/><br/><br/><br/><br/>
                <h4 class="info-label-text">Employement Status:</h4>
            </div>
            <div class="col-md-2">
                <h4 class="info-detail-text"><?php echo $employeeNum?></h4>
                <br/><br/><br/><br/><br/>
                <h4 class="info-detail-text two-row-label-h4"><?php echo $statusName?></h4>
            </div>
            <div class="col-md-3">
                <img class="center-block" src="user.jpg" id="user-image">
            </div>
            <div class="col-md-4 employee-info-button">
            <form action="Employee-detailedInformation.php" method="post">
                <button name='empDlink' value=<?php echo $appNum?> class="btn btn-success">More Information</button>
            </form>
            <form action="employees.php" method="post">
                <button  class="btn btn-default">Previous</button>
            </form>
            </div>
        </div>
       
        <!-- attendance summary section -->
        <a class="anchor" name="attendance"></a>
        <h2 class="page-title">Attendance Summary</h2>
        <div class="filldiv">
           

            <div class="row">
                <div class="col-md-12">
				<div class="form-group clearfix">
				 <label class="col-sm-1 control-label">Year</label>
					<div class="col-sm-3">					
					<?php echo $year.$month?>
					</div>
				</div>
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                        <tr>
                            <th>Month</th>
                            <th>Total Absent (Days)</th>
                            <th>Total Halfday (Day)</th>
                            <th>Total Leave (Days)</th>
                            <th>Total Undertime (Days)</th>
                            <th>Total Overtime (Time)</th>
							
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td><a href="Manager-AttendanceEmployee.php">January</a></td>
                            <td>1</td>
                            <td>8</td>
                            <td>2</td>
                            <td>8</td>
                            <td>3</td>
                        </tr>
                        <tr>
                            <td><a href="Manager-AttendanceEmployee.php">February</td>
                            <td>1</td>
                            <td>6</td>
                            <td>7</td>
                            <td>8</td>
                            <td>3</td>
                        </tr>
                        <tr>
                            <td><a href="Manager-AttendanceEmployee.php">March</td>
                            <td>2</td>
                            <td>5</td>
                            <td>8</td>
                            <td>6</td>
                            <td>8</td>
                        </tr>
                        <tr>
                            <td><a href="Manager-AttendanceEmployee.php">April</td>
                            <td>0</td>
                            <td>0</td>
                            <td>8</td>
                            <td>0</td>
                            <td>0</td>
                        </tr>
                        <tr>
                            <td><a href="Manager-AttendanceEmployee.php">May</td>
                            <td>2</td>
                            <td>5</td>
                            <td>0</td>
                            <td>8</td>
                            <td>2</td>
                        </tr>
                        <tr>
                            <td><a href="Manager-AttendanceEmployee.php">June</td>
                            <td>0</td>
                            <td>2</td>
                            <td>0</td>
                            <td>1</td>
                            <td>8</td>
                        </tr>
                        <tr>
                            <td><a href="Manager-AttendanceEmployee.php">July</td>
                            <td>0</td>
                            <td>0</td>
                            <td>8</td>
                            <td>0</td>
                            <td>0</td>
                        </tr>
                        <tr>
                            <td><a href="Manager-AttendanceEmployee.php">August</td>
                            <td>0</td>
                            <td>0</td>
                            <td>8</td>
                            <td>0</td>
                            <td>0</td>
                        </tr>
                        <tr>
                            <td><a href="Manager-AttendanceEmployee.php">September</td>
                            <td>1</td>
                            <td>2</td>
                            <td>0</td>
                            <td>8</td>
                            <td>0</td>
                        </tr>
                        <tr>
                            <td><a href="Manager-AttendanceEmployee.php">October</td>
                            <td>1</td>
                            <td>2</td>
                            <td>5</td>
                            <td>8</td>
                            <td>3</td>
                        </tr>
                        <tr>
                            <td><a href="Manager-AttendanceEmployee.php">November</td>
                            <td>0</td>
                            <td>1</td>
                            <td>1</td>
                            <td>8</td>
                            <td>4</td>
                        </tr>
                        <tr>
                            <td><a href="Manager-AttendanceEmployee.php">December</td>
                            <td>2</td>
                            <td>8</td>
                            <td>4</td>
                            <td>2</td>
                            <td>3</td>
                        </tr>
                        </tbody>
                    </table>					
					 <div class="text-right" style="margin-right: 30px">
                    <a href="#"><span class="glyphicon glyphicon-print"> Print</span></a>
                </div>									
                </div>													               
            </div>
			
        </div>

        <!-- leave summary section -->
        <a class="anchor" name="leave"></a>
        <h2 class="page-title">Request Summary</h2>
        <div class="filldiv">
            <div class="row">
                <div class="col-md-12">
				<div class="form-group clearfix">
				 <label class="col-sm-1 control-label">Year</label>
					<div class="col-sm-3">
						<select class="form-control m-bot15" name="year">
							<option>2017</option>
							<option>2016</option>
							<option>2015</option>
							<option>2014</option>
							<option>2013</option>
						</select>
					</div>
				</div>
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                        <tr>
                            <th>Form Code</th>
                            <th>Date Filed</th>
							<td>Purpose</td>
							<td>Status</td>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td><a href="Summary - Overtime.php">OT-000201</td>
                            <td>02/17/2016</td>
							<td>Needed more time for the project</td>
							<td>Waiting for Approval</td>
                        </tr>
                        <tr>
                            <td><a href="Summary - Absent Reversal.php">AR-000158</td>
                            <td>03/14/2016</td>
							<td>Business meeting outside the company</td>
							<td>Accepted</td>
                        </tr>
                        <tr>
                            <td><a href="Summary - Itenerary Authorization.php">IA-000145</td>
                            <td>03/13/2016</td>
							<td>Time is not enough to finish the project</td>
							<td>Rejected</td>
                        </tr>
                        <tr>
                            <td><a href="Summary - Leave.php">LE-000145</td>
                            <td>03/13/2016</td>
							<td>Time is not enough to finish the project</td>
							<td>Rejected</td>
                        </tr>
                        <tr>
                            <td><a href="Summary - Undertime.php">UT-000145</td>
                            <td>03/13/2016</td>
							<td>Time is not enough to finish the project</td>
							<td>Rejected</td>
                        </tr>
                       
                        </tbody>
                    </table>
                </div>
				<div class="text-right" style="margin-right: 30px">
                    <a href="#"><span class="glyphicon glyphicon-print"> Print</span></a>
                </div>
            </div>

        </div>

        <!-- conduct section -->
        <a class="anchor" name="eval"></a>
        <div class="row filldiv">
            <h2 class="page-title">Evaluation Summary</h2>
	            <form action="Employee-evaluation.php" method="post">
					<button name="empElink" value="1">Evaluate Employee</button>
				</form>
				<br>
				<form action="Report - PerformanceEvaluation.php" method="post">
					<button name="empPElink" value="1">Generate Report</button>
				</form>

            <table class="table table-bordered table-hover table-striped">
                <thead>
                <tr>
					<th>Code</th>
                    <th>Type</th>
                    <th>Date</th>
                    <th>Evaluator</th>
					<th>Comments</th>
                </tr>
                </thead>
                <tbody>
                <tr>
					<td><a href="Summary - Evaluation.php">EVAL-001953</td>
                    <td>Annual</td>
                    <td>03/26/2015</td>
					<td>Ana Laid</td>
                    <td>May be candidate for promotion</td>
                </tr>
				<tr>
					<td><a href="Summary - Evaluation.php">EVAL-001632</td>
                    <td>Annual</td>
                    <td>03/26/2014</td>
                    <td>Ana Laid</td>
					<td>Having trouble focusing on work</td>
                </tr>
				<tr>
					<td><a href="Summary - Evaluation.php">EVAL-000957</td>
                    <td>Annual</td>
                    <td>03/26/2013</td>
                    <td>Ana Laid</td>
					<td>Outstanding performance</td>
                </tr>
				 <tr>
					<td><a href="Summary - Evaluation.php">EVAL-000634</td>
                    <td>6 Months</td>
                    <td>09/26/2012</td>
                    <td>Ieko Molina</td>
					<td>Average</td>
                </tr>
				<tr>
					<td><a href="Summary - Evaluation.php">EVAL-000142</td>
                    <td>3 Months</td>
                    <td>06/26/2012</td>
                    <td>Ieko Molina</td>
					<td>Showing promise</td>
                </tr>
                </tbody>
            </table>
			<div class="text-right" style="margin-right: 30px">
                    <a href="#"><span class="glyphicon glyphicon-print"> Print</span></a>
                </div>
        </div>

    </div>


</div>

</body>

</html>