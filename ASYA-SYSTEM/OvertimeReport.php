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

    <!--for graphs/charts-->
    <script src="js/raphael-min.js"></script>
    <link rel="stylesheet" href="css/morris.css">
    <script src="js/morris.min.js"></script>

    <!--custom css-->
    <link rel="stylesheet" href="css/custom.css">
    <link rel="stylesheet" href="css/custom-theme.css">
		
    <title>Overtime Report</title>
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
                <a href="recruitment.php" class="list-group-item"><span class="glyphicon glyphicon-eye-open"></span> Recruitment</a>

                <!-- employee -->
                <a href="employees.php" class="list-group-item"><span class="glyphicon glyphicon-pawn"></span> Employees</a>
				
				<!-- calendar -->
				<a href="Calendar.php" class="list-group-item"><span class="glyphicon glyphicon-calendar"></span> Calendar</a>

                <!-- reports -->
                <a href="#report-items" class="list-group-item active" data-toggle="collapse" data-parent=".sidebar-nav">
                    <span class="glyphicon glyphicon-list-alt"></span> Reports <span class="caret"></span>
                </a>
                <!-- report items -->
                <div class="list-group collapse" id="report-items">
                    <!-- employee reports -->
                        <a href="LeaveReport.php" class="list-group-item"> &#x25cf Leave</a>
                        <a href="OvertimeReport.php" class="list-group-item active"> &#x25cf Overtime</a>
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
      		
		<!-- picker and dropdown -->
		<div class="row">
			<div class="col-md-12">
				<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
					<div class="col-md-5">
						Status: 
						<select class = "form-control" name="status">
							<option value=9991 selected>On Process</option>
							<option value=9992>Accepted</option>
							<option value=9993>Rejected</option>
						</select>
					</div>

					<div class="col-md-3">
						Startdate	:
							<input type="date" name="startdate" value="">				
					</div>
					
					<div class="col-md-3">
						Enddate		: 
							<input type="date" name="enddate" value="">					
					</div>
					<div>
					</div>



					<div><input type="submit" name="submit" value="Submit"/></div>
				</form>
			</div>
		</div>
		<!-- picker and dropdown end --> 
		
        <!-- Applicants -->
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default" id="applicants-panel">
                    <div class="panel-heading" align="center">
                        <h3 class="panel-title">
						ASYA <br>
						Overtime Report						
						</h3>
                    </div>
                    <div class="panel-body">
                        <table class="table table-bordered table-hover table-striped">
                            <thead>
                            <tr>
                                <th>Form Number</th>
                                <th>Date Filed</th>
                                <th>Name</th>
                                <th>Department</th>
                                <th>Position</th>
                                <th>Time Start</th>
                                <th>Time End</th>
                                <th>Total Time</th>
                                <th>Reason</th>
								<th>Approved By</th>
                                <th>Approved Date</th>																
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>111111</td>
                                <td>2017-02-07</td>
                                <td>Protacio, Rizal</td>
                                <td>Audit</td>
                                <td>Design Manager</td>
                                <td>08:00:00</td>
                                <td>12:00:00</td>
                                <td>04:00:00</td>
                                <td>Health Issues</td>
                                <td>Luna, Antonio</td>
                                <td>2017-03-22</td>							
                            </tr>
                            <tr>
                                <td>111112</td>
                                <td>2017-02-07</td>
                                <td>Paciano, Rizal</td>
                                <td>Audit</td>
                                <td>HR Manager</td>
                                <td>10:00:00</td>
                                <td>18:00:00</td>
                                <td>08:00:00</td>
                                <td>Health Issues</td>
                                <td>Luna, Antonio</td>
                                <td>2017-03-22</td>	
                            </tr>                         
                            </tbody>
                        </table>
                    </div>
                    <div class="panel-footer text-right">
						<div class="row" align="center">
						Generated as of: 2017-02-06 20:13:01 </br>
						<b>---END OF REPORT---</b>
						</div>
                    </div>
                </div>
            </div>
        </div>
       
    </div>

</div>

</body>

</html>