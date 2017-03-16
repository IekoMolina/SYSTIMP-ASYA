<!DOCTYPE html>
<html lang="en">
<?php 
session_start();
require_once('../mysql_connect.php');
$currentEmployeeNum = 11426977;//Edit asap
echo $currentEmployeeNum;
$query="SELECT 	*
		  FROM 	TIMETABLE		 
		 WHERE 	EMPLOYEENUMBER = '{$currentEmployeeNum}'";
$result=mysqli_query($dbc,$query);
while($rows=mysqli_fetch_array($result,MYSQLI_ASSOC))
{
$dateReversal[] = $rows['TABLEDATE'];
$morningIn[] = $rows['MORNINGTIMEIN_REQUEST'];
$lunchIn[] = $rows['LUNCHTIMEIN_REQUEST'];
$breakIn[] = $rows['BREAKTIMEIN_REQUEST'];
$lunchOut[] = $rows['LUNCHTIMEOUT_REQUEST'];
$breakOut[] = $rows['BREAKTIMEOUT_REQUEST'];
$afternoonOut[] = $rows['AFTERNOONTIMEOUT_REQUEST'];
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

        </ul>

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
 <!-- insert page content here -->
    <div id="page-content-wrapper">
        <!-- attendance summary section -->
        <a class="anchor" name="attendance"></a>
        <h2 class="page-title">Attendance Summary</h2>
		<h3 class="info-label-text">March</h3>
        <div class="filldiv">

            <div class="row">
                <div class="col-md-12">
				
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                        <tr>
                            <th>Date</th>
                            <th>Morning In</th>
                            <th>Lunch Out</th>
                            <th>Lunch In</th>
                            <th>Break Out</th>
                            <th>Break In</th>
                            <th>Afternoon Out</th>
                            <th>Overtime</th>
                            <th>Undertime</th>
                            <th>Letter</th>
                            <th>Remarks</th>
                            <th>Reason</th>
							
                        </tr>
                        </thead>
                        <tbody>
                            <?php 
                            for($i=0;$i<count($dateReversal);$i++)
                            {
                            	echo "<tr>
										<td>$dateReversal[$i]</td>
										<td>$morningIn[$i]</td>
										<td>$lunchOut[$i]</td>
										<td>$lunchIn[$i]</td>
										<td>$breakOut[$i]</td>
										<td>$breakIn[$i]</td>
										<td>$afternoonOut[$i]</td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>										
									  <tr>";
                            }
                            ?>
                        </tbody>
                    </table>
					<div class="col-md-2 employee-info-button">
						<a href="employee-information.php" class="btn btn-default">Back</a>
					</div>
											
					 <div class="text-right" style="margin-right: 30px">
                    <a href="#"><span class="glyphicon glyphicon-print"> Print</span></a>
                </div>
                </div>
            </div>
        </div>
    </div>


</div>

</body>

</html>