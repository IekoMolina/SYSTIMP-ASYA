<!DOCTYPE html>
<html lang="en">
<?php 
session_start();
require_once('../mysql_connect.php');
$currentEmployeeNum = $_SESSION['emp_number'];
//Getting Applicants That passed the requirements
$queryForApplicants="	  SELECT 	APPNO,FIRSTNAME, LASTNAME, APPPOSITION, EMAIL, MOBILENO
							FROM 	APPLICANTS
						   WHERE 	CONTRACT IS NOT NULL
							 AND 	EVALUATIONNUMBER IS NOT NULL";
$result=mysqli_query($dbc,$queryForApplicants);
while($rows=mysqli_fetch_array($result,MYSQLI_ASSOC))
{
	$appNum[] = $rows['APPNO'];
	$names[] = $rows['FIRSTNAME'].' '.$rows['LASTNAME'];
	$positions[] = $rows['APPPOSITION'];
	$emails[] = $rows['EMAIL'];
	$numbers[] = $rows['MOBILENO'];
}
//Getting Actual Position from Position code
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
$positionName[] = array();
for ($x=0;$x<count($positions);$x++)
{
	for ($y=0;$y<count($codePos);$y++)
	{
		if($positions[$x]==$codePos[$y])
		{
			$positionName[$x] = $actualPos[$y];
		}
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
    <link rel="stylesheet" href="css/custom-theme.css">
    <link rel="stylesheet" href="css/custom.css">

    <title>Home</title>
</head>
<body>

<!-- navbar -->
<div class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="home.php"><img src="asyalogo.jpg" /> </a>
        </div>
        <!-- right side stuffs -->
        <ul class="nav navbar-nav navbar-right">
            <li><a href="#"><span class="glyphicon glyphicon-envelope"></span></a></li>
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
            <p>HR Manager</p>
        </div>

        <div class="sidebar-nav">

            <div class="list-group root">

                <!-- home -->
                <a href="home.php" class="list-group-item active"><span class="glyphicon glyphicon-home"></span> Home</a>

                <!-- recruitment -->
                <a href="recruitment.php" class="list-group-item"><span class="glyphicon glyphicon-eye-open"></span> Recruitment</a>

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
                        <a href="UndertimeRequest.php" class="list-group-item"> &#x25cf Manpower</a>
                        <a href="ResignationRequest.php" class="list-group-item"> &#x25cf Resignation</a>
                        <a href="ChangeRecordRequest.php" class="list-group-item">&#x25cf Change Record</a>	                        				
                </div>				
				
                <a href="#" class="list-group-item"><span class="glyphicon glyphicon-info-sign"></span> About</a>
            </div>
        </div>

    </div>

    <!-- insert page content here -->
    <div id="page-content-wrapper">

        <div class="row">

            <div class="col-md-8">
                <div class="row">

                    <!-- daily applicants -->
                    <div class="col-md-12">
                        <div class="panel panel-default homepanel">
                            <div class="panel-heading">
                                <h3 class="panel-title">Applicants<span class="panel-subheader">(for account creation)</span>
                                    <span class="panel-subheader pull-right"><a href="recruitment.php">View Complete List</a></span>
                                </h3>
                            </div>
                            <div class="panel-body">
                            	<form action="ApplicantToEmployee.php" method="post">
                                <table class="table table-bordered table-hover table-striped">
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Position Desired</th>
                                        <th>Educational Attainment</th>
                                        <th>Email</th>
                                        <th>Contact</th>
                                    </tr>
                                    </thead>
                                    <tbody>
		                            <?php 
		                            for($i=0;$i<count($names);$i++)
		                            {
		                            	echo "<tr>
												<td><button name='hiredlink' value='$appNum[$i]' style='background-color:white;border:none;color:blue;'>$names[$i]</button></td>	
												<td>$positionName[$i]</td>
												<td></td>	                            														
												<td>$emails[$i]</td>
												<td>$numbers[$i]</td>
											  <tr>";
		                            }
		                            ?>
                                    </tbody>
                                </table>
                                </form> 
                            </div>
                            <div class="panel-footer text-right">
                            </div>
                        </div>
                    </div>

                    <!-- performance evaluation -->
                    <div class="col-md-12">
                        <div class="panel panel-default homepanel">
                            <div class="panel-heading">
                                <h3 class="panel-title">Performance Evaluation
                                    <span class="panel-subheader">(pending)</span></h3>
                            </div>
                            <div class="panel-body">
                                <table class="table table-bordered table-hover table-striped">
                                    <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Name</th>
                                        <th>Department</th>
                                        <th>Position</th>
                                        <th>Type</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>06/25/2016</td>
                                        <td>Yucoco, Johann Paul P.</td>
                                        <td>IT</td>
                                        <td>Network Admin</td>
                                        <td>Annual</td>
                                    </tr>
                                    <tr>
                                        <td>06/25/2016</td>
                                        <td>Ang, Mark Jefferson</td>
                                        <td>Marketing</td>
                                        <td>Product Manager</td>
                                        <td>6th Month</td>
                                    </tr>
                                    <tr>
                                        <td>12/30/2016</td>
                                        <td>Last, First Name M.</td>
                                        <td>Department</td>
                                        <td>Position</td>
                                        <td>Evaluation</td>
                                    </tr>
                                    <tr>
                                        <td>12/30/2016</td>
                                        <td>Last, First Name M.</td>
                                        <td>Department</td>
                                        <td>Position</td>
                                        <td>Evaluation</td>
                                    </tr>
                                    <tr>
                                        <td>12/30/2016</td>
                                        <td>Last, First Name M.</td>
                                        <td>Department</td>
                                        <td>Position</td>
                                        <td>Evaluation</td>
                                    </tr>
                                    <tr>
                                        <td>12/30/2016</td>
                                        <td>Last, First Name M.</td>
                                        <td>Department</td>
                                        <td>Position</td>
                                        <td>Evaluation</td>
                                    </tr>
                                    <tr>
                                        <td>12/30/2016</td>
                                        <td>Last, First Name M.</td>
                                        <td>Department</td>
                                        <td>Position</td>
                                        <td>Evaluation</td>
                                    </tr>
                                    <tr>
                                        <td>12/30/2016</td>
                                        <td>Last, First Name M.</td>
                                        <td>Department</td>
                                        <td>Position</td>
                                        <td>Evaluation</td>
                                    </tr>
                                    <tr>
                                        <td>12/30/2016</td>
                                        <td>Last, First Name M.</td>
                                        <td>Department</td>
                                        <td>Position</td>
                                        <td>Evaluation</td>
                                    </tr>
                                    <tr>
                                        <td>12/30/2016</td>
                                        <td>Last, First Name M.</td>
                                        <td>Department</td>
                                        <td>Position</td>
                                        <td>Evaluation</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="panel-footer text-right">

                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <!-- requests -->
            <div class="col-md-4">
                <div class="panel panel-default" id="home-request-panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">Requests</h3>
                    </div>
                    <div class="panel-body">
                        <table class="table table-bordered table-hover table-striped">
                            <thead>
                            <tr>
                                <th>Date</th>
                                <th>Name</th>
                                <th>Type</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>03/14/2016</td>
                                <td>Secades, Luis F.</td>
                                <td>Leave</td>
                            </tr>
                            <tr>
                                <td>03/30/2016</td>
                                <td>Secades, Luis F.</td>
                                <td>Overtime</td>
                            </tr>
                            <tr>
                                <td>12/30/2016</td>
                                <td>Last, First Name M.</td>
                                <td>Request</td>
                            </tr>
                            <tr>
                                <td>12/30/2016</td>
                                <td>Last, First Name M.</td>
                                <td>Request</td>
                            </tr>
                            <tr>
                                <td>12/30/2016</td>
                                <td>Last, First Name M.</td>
                                <td>Request</td>
                            </tr>
                            <tr>
                                <td>12/30/2016</td>
                                <td>Last, First Name M.</td>
                                <td>Request</td>
                            </tr>
                            <tr>
                                <td>12/30/2016</td>
                                <td>Last, First Name M.</td>
                                <td>Request</td>
                            </tr>
                            <tr>
                                <td>12/30/2016</td>
                                <td>Last, First Name M.</td>
                                <td>Request</td>
                            </tr>
                            <tr>
                                <td>12/30/2016</td>
                                <td>Last, First Name M.</td>
                                <td>Request</td>
                            </tr>
                            <tr>
                                <td>12/30/2016</td>
                                <td>Last, First Name M.</td>
                                <td>Request</td>
                            </tr>

                            </tbody>
                        </table>

                    </div>
                    <div class="panel-footer text-right">

                    </div>
                </div>
            </div>

        </div>
    </div>

</div>

</body>


</html>