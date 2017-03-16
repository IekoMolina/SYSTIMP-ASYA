<!DOCTYPE html>
<html lang="en">
<?php 
session_start();
require_once('../mysql_connect.php');
$currentEmployeeNum = $_SESSION['emp_number'];
//Getting Applicants That passed the requirements
$queryForHiredApplicants="SELECT 	APPNO,FIRSTNAME, LASTNAME, APPPOSITION, EMAIL, MOBILENO
							FROM 	APPLICANTS 
						   WHERE 	CONTRACT IS NOT NULL
							 AND 	EVALUATIONNUMBER IS NOT NULL";
$result=mysqli_query($dbc,$queryForHiredApplicants);
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
//Get all applicants 
$queryForApplicants="	  SELECT 	APPNO,FIRSTNAME, LASTNAME, APPPOSITION, EMAIL, MOBILENO, DATEAPPLIED
							FROM 	APPLICANTS
						   WHERE 	CONTRACT IS NULL
							 OR 	EVALUATIONNUMBER IS NULL";
$result2=mysqli_query($dbc,$queryForApplicants);
while($rows=mysqli_fetch_array($result2,MYSQLI_ASSOC))
{
	$aAppNum[] = $rows['APPNO'];
	$aNames[] = $rows['FIRSTNAME'].' '.$rows['LASTNAME'];
	$aPositions[] = $rows['APPPOSITION'];
	$aEmails[] = $rows['EMAIL'];
	$aNumbers[] = $rows['MOBILENO'];
	$aDates[] = $rows['DATEAPPLIED'];
}
$_SESSION['names'] = $names;
$apositionName[] = array();
for ($x=0;$x<count($aPositions);$x++)
{
	for ($y=0;$y<count($codePos);$y++)
	{
		if($aPositions[$x]==$codePos[$y])
		{
			$apositionName[$x] = $actualPos[$y];
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

    <!--for graphs/charts-->
    <script src="js/raphael-min.js"></script>
    <link rel="stylesheet" href="css/morris.css">
    <script src="js/morris.min.js"></script>

    <!--custom css-->
    <link rel="stylesheet" href="css/custom.css">
    <link rel="stylesheet" href="css/custom-theme.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.13/css/dataTables.bootstrap.min.css">
    <title>Recruitment</title>
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

        <h3 class="page-title">Recruitment</h3>

        <!-- Applicants for the day -->
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default" >
                    <div class="panel-heading">
                        <h3 class="panel-title">Hired Applicants
                            <span class="panel-subheader">(ready for account creation)</span>
                        </h3>
                    </div>
                    <div class="panel-body">
                    <form action="ApplicantToEmployee.php" method="post">
                        <table  class="table table-bordered table-hover table-striped">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Position Desired</th>
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
        </div>

        <!-- Applicants -->
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Applicants</h3>
                    </div>
    				            
	                    <div class="panel-body">
	                    <form action="EachApplicant.php" method="post">
	                        <table id="example1" class="table table-bordered table-hover table-striped">	                                
	                            <thead>
	                            <tr>
	                                <th>Name</th>	                            
	                                <th>Date Applied</th>
	                                <th>Position Desired</th>
	                                <th>Email</th>
	                                <th>Contact</th>
	                            </tr>
	                            </thead>
	                            
	                            <tbody>	                        
		                            <?php 
		                            for($i=0;$i<count($aNames);$i++)
		                            {
		                            	echo "<tr>
												<td><button name='applink' value='$aAppNum[$i]' style='background-color:white;border:none;color:blue;'>$aNames[$i]</button></td>		                            	
												<td>$aDates[$i]</td>	                            														
												<td>$apositionName[$i]</td>
												<td>$aEmails[$i]</td>
												<td>$aNumbers[$i]</td>
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
        </div>


        <div class="row" style="margin-bottom: 50px">
            <!-- vacancies -->
            <div class="col-md-12">
                <div class="panel panel-default" id="vacancies-panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">Vacancies <span class="panel-subheader"></span></h3>
                    </div>
                    <div class="panel-body">
                        <table class="table table-bordered table-hover table-striped">
                            <thead>
                            <tr>
                                <th>Department</th>
                                <th>Head</th>
                                <th>Position</th>
                                <th>Description</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>Accounting</td>
                                <td>Yu, Tita Coline</td>
                                <td>Accounting Assistant</td>
                                <td>Prepares monthly, quearterly, semi-annual, yearly reports</td>
                            </tr>
                            <tr>
                                <td>Accounting</td>
                                <td>Yu, Tita Coline</td>
                                <td>Audit Assistant</td>
                                <td>Provides assistance & support in ensuring meeting the requirements of the office.</td>
                            </tr>
                            <tr>
                                <td>Engineering</td>
                                <td>Adams, Ken</td>
                                <td>Mechanical Engineer</td>
                                <td>Provide efficient solutions to the development of processes and products</td>
                            </tr>
                            <tr>
                                <td>Engineering</td>
                                <td>Adams, Ken</td>
                                <td>Civil Engineer</td>
                                <td>Plan, design and oversee construction and maintenance of building structures and facilities.</td>
                            </tr>
                            <tr>
                                <td>IT</td>
                                <td>Marie, Mutien</td>
                                <td>Network Admin</td>
                                <td>Responsible for designing, organizing, modifying, installing, and supporting a company's computer systems.</td>
                            </tr>
                            <tr>
                                <td>IT</td>
                                <td>Marie, Mutien</td>
                                <td>Database Admin</td>
                                <td>Responsible for the performance, integrity and security of a database.</td>
                            </tr>
                            <tr>
                                <td>QAsya</td>
                                <td>Yu, Andrew Cerwin</td>
                                <td>CADD Architect</td>
                                <td>Performs encoding of Auto Cadd drawings for plans, designs and revisions using standard format.</td>
                            </tr>
                            <tr>
                                <td>QAsya</td>
                                <td>Yu, Andrew Cerwin</td>
                                <td>Model Maker</td>
                                <td>Creates scale model of proposed construction project</td>
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
	<script src="//code.jquery.com/jquery-1.12.4.js"></script>
	<script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
		    $('#example1').DataTable();
		    $('#example2').DataTable();
		    $('#example3').DataTable();
		} );
	</script>
</body>
</html>