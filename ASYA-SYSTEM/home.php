<!DOCTYPE html>
<html lang="en">
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

            <div class="col-md-8">
                <div class="row">

                    <!-- daily applicants -->
                    <div class="col-md-12">
                        <div class="panel panel-default homepanel">
                            <div class="panel-heading">
                                <h3 class="panel-title">Applicants
                                    <span class="panel-subheader">(for the day)</span>
                                    <span class="panel-subheader pull-right"><a href="recruitment.php">View Complete List</a></span>
                                </h3>
                            </div>
                            <div class="panel-body">
                                <table class="table table-bordered table-hover table-striped">
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Position Desired</th>
                                        <th>Educational Attainment</th>
                                        <th>Application Source</th>
                                        <th>Contact</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td><a href="IndividualApplicant.php"> Onate, Kim A. </a></td>
                                        <td>CADD Architect</td>
                                        <td>College Graduate</td>
                                        <td>Jobstreet</td>
                                        <td>09165519743</td>
                                    </tr>
                                    <tr>
                                        <td>Ranario, Daniel U.</td>
                                        <td>Network Admin</td>
                                        <td>College Graduate</td>
                                        <td>Jobstreet</td>
                                        <td>09276420652</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="panel-footer text-right">
                                <a href="#"><span class="glyphicon glyphicon-print"> Print</span></a>
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