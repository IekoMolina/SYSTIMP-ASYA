<!DOCTYPE html>
<html lang="en">
<?php 
session_start();
require_once('../mysql_connect.php');

//Getting Applicants That passed the requirements
$queryForHiredApplicants="SELECT 	FIRSTNAME, LASTNAME, APPPOSITION, EMAIL, MOBILENO
							FROM 	APPLICANTS 
						   WHERE 	CONTRACT IS NOT NULL
							 AND 	EVALUATIONNUMBER IS NOT NULL";
$result=mysqli_query($dbc,$queryForHiredApplicants);
while($rows=mysqli_fetch_array($result,MYSQLI_ASSOC))
{
	$names[] = $rows['FIRSTNAME'].' '.$rows['LASTNAME'];
	$positions[] = $rows['APPPOSITION'];
	$emails[] = $rows['EMAIL'];
	$numbers[] = $rows['MOBILENO'];
}

//Get all applicants 
$queryForApplicants="SELECT 	FIRSTNAME, LASTNAME, APPPOSITION, EMAIL, MOBILENO, DATEAPPLIED
							FROM 	APPLICANTS
						   WHERE 	CONTRACT IS NULL
							 OR 	EVALUATIONNUMBER IS NULL";
$result2=mysqli_query($dbc,$queryForApplicants);
while($rows=mysqli_fetch_array($result2,MYSQLI_ASSOC))
{
	$aNames[] = $rows['FIRSTNAME'].' '.$rows['LASTNAME'];
	$aPositions[] = $rows['APPPOSITION'];
	$aEmails[] = $rows['EMAIL'];
	$aNumbers[] = $rows['MOBILENO'];
	$aDates[] = $rows['DATEAPPLIED'];
}
$_SESSION['names'] = $names;
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
                <div class="panel panel-default homepanel">
                    <div class="panel-heading">
                        <h3 class="panel-title">Hired Applicants
                            <span class="panel-subheader">(ready for account creation)</span>
                        </h3>
                    </div>
                    <div class="panel-body">
                        <table class="table table-bordered table-hover table-striped">
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
										<td><a href='ApplicantToEmployee.php'>$names[$i]</a></td>
										<td>$positions[$i]</td>
										<td>$emails[$i]</td>
										<td>$numbers[$i]</td>
									  <tr>";
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="panel-footer text-right">
                        <a href="#"><span class="glyphicon glyphicon-print"> Print</span></a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Applicants -->
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default" id="applicants-panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">Applicants</h3>
                    </div>
    				<form action="EachApplicant.php" method="post">                    
	                    <div class="panel-body">
	                        <table class="table table-bordered table-hover table-striped">
	                            <thead>
	                            <tr>
	                                <th>Date Applied</th>
	                                <th>Name</th>
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
												<td>$aDates[$i]</td>	                            		
												<td><a name='link' value='$aNames[$i]' href='EachApplicant.php'>$aNames[$i]</a></td>
												<td>$aPositions[$i]</td>
												<td>$aEmails[$i]</td>
												<td>$aNumbers[$i]</td>
											  <tr>";
		                            }
		                            ?>		                         
	                            </tbody>
	                        </table>
	                    </div>
                    </form>
                    <div class="panel-footer text-right">
                        <a href="add-applicant.php"><span class="glyphicon glyphicon-plus" style="margin-right: 10px"> Add</span></a>
                        <a href="#"><span class="glyphicon glyphicon-refresh" style="margin-right: 10px"> Update</span></a>
                        <a href="#"><span class="glyphicon glyphicon-print"> Print</span></a>
                    </div>
                </div>
            </div>
        </div>


        <div class="row">

            <!-- vacancies -->
            <div class="col-md-12">
                <div class="panel panel-default" id="vacancies-panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">Vacancies <span class="panel-subheader">per Department</span></h3>
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
                        <a href="#"><span class="glyphicon glyphicon-refresh" style="margin-right: 10px"> Update</span></a>
                        <a href="#"><span class="glyphicon glyphicon-print"> Print</span></a>
                    </div>
                </div>
            </div>

        </div>

        <div class="row" style="margin-bottom: 50px">
            <!-- sources -->
            <div class="col-md-4 col-md-offset-2">
                <div class="panel panel-default" class="donut-panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">Sources <span class="panel-subheader">of Applicants</span></h3>
                    </div>
                    <div class="panel-body">
                        <div id="applicant-sources"></div>
                    </div>
                </div>
            </div>
            <!-- sources -->
            <div class="col-md-4">
                <div class="panel panel-default" class="donut-panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">Status <span class="panel-subheader">of Applicants</span></h3>
                    </div>
                    <div class="panel-body">
                        <div id="applicant-status"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

</body>


<script>
    Morris.Donut({
        element: 'applicant-sources',
        colors: ["#0BA462", "#39B580", "#67C69D", "#95D7BB"],
        data: [
            {label: "Manila Bulletin", value: 0},
            {label: "Jobstreet", value: 4},
            {label: "Referral", value: 1},
            {label: "Others", value: 5}
        ]
    });

    Morris.Donut({
        element: 'applicant-status',
        data: [
            {label: "Pending", value: 0},
            {label: "Initial Interview", value: 1},
            {label: "Second Interview", value: 0},
            {label: "Skills Interview", value: 2},
            {label: "Final Interview", value: 1},
            {label: "Active File", value: 1},
            {label: "Pre-Employment", value: 0},
            {label: "Failed", value: 0}
        ]
    });

</script>

</html>