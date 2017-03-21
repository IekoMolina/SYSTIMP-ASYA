<!DOCTYPE html>
<html lang="en">
<?php 
session_start();
require_once('../mysql_connect.php');
$appNum= $_SESSION['emp_appno'];

//Getting Employees who has pending absent reversal
$queryForEmployees="SELECT 	*
							FROM 	APPLICANTS A JOIN 	EMPLOYEES E ON A.APPNO = E.APPNO
												 JOIN	ITINERARYREQUESTS IQ ON E.EMPLOYEENUMBER = IQ.EMPLOYEENUMBER
						   WHERE 	IQ.HRAPPROVERID IS NULL
							 AND 	IQ.DMAPPROVERID IS NOT NULL";
$result=mysqli_query($dbc,$queryForEmployees);
while($rows=mysqli_fetch_array($result,MYSQLI_ASSOC))
{
	$empNum[]= $rows['EMPLOYEENUMBER'];
	$formNum[] = $rows['FORMNUMBER'];
	$names[] = $rows['FIRSTNAME'].' '.$rows['LASTNAME'];
	$positions[] = $rows['ACTUALPOSITION'];
	$dateFiled[] = $rows['DATE'];
	$dateReversal[] = $rows['TABLEDATE'];	
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

    <!--for graphs/charts-->
    <script src="js/raphael-min.js"></script>
    <link rel="stylesheet" href="css/morris.css">
    <script src="js/morris.min.js"></script>

    <!--custom css-->
    <link rel="stylesheet" href="css/custom.css">
    <link rel="stylesheet" href="css/custom-theme.css">
		
    <title>Itinerary Authorization Request</title>
</head>
<body>

<!-- navbar -->
<div class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="home.php"><img src="asyalogo.jpg" /> </a>
        </div>

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
                <a href="#request-items" class="list-group-item active" data-toggle="collapse" data-parent=".sidebar-nav">
                    <span class="glyphicon glyphicon-list-alt"></span> Requests <span class="caret"></span>
                </a>
                <!-- report items -->
                <div class="list-group collapse" id="request-items">
                    <!-- employee reports -->
                        <a href="LeaveRequest.php" class="list-group-item"> &#x25cf Leave</a>
                        <a href="OvertimeRequest.php" class="list-group-item"> &#x25cf Overtime</a>
                        <a href="UndertimeRequest.php" class="list-group-item"> &#x25cf Undertime</a>
                        <a href="AbsentReversalRequest.php" class="list-group-item"> &#x25cf Absent Reversal</a>
                        <a href="ItineraryAuthorizationRequest.php" class="list-group-item active">&#x25cf Itinerary Authorization</a>					
                </div>				
				
                <a href="#" class="list-group-item"><span class="glyphicon glyphicon-info-sign"></span> About</a>
            </div>
        </div>

    </div>

    <!-- insert page content here -->
    <div id="page-content-wrapper">
      		
		<!-- picker and dropdown 
		<div class="row">
			<div class="col-md-12">
				<form action="" method="post">

					<div class="col-md-4">
						Startdate	:
							<input type="date" name="startdate" value="">				
					</div>
					
					<div class="col-md-4">
						Enddate		: 
							<input type="date" name="enddate" value="">					
					</div>
					<div>
					</div>



					<div><input type="submit" name="submit" value="Submit"/></div>
				</form>
			</div>
		</div>-->
		<!-- picker and dropdown end --> 
		
        <!-- Applicants -->
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default" id="applicants-panel">
                    <div class="panel-heading" align="center">
                        <h3 class="panel-title">
						ASYA <br>
						Itinerary Authorization Request					
						</h3>
                                        </div>
                    <div class="panel-body">
                    <form action="ItineraryAuthorizationRequestDetailed.php" method="post">
                        <table class="table table-bordered table-hover table-striped">
                            <thead>
                            <tr>
                                <th>Form Number</th>
                                <th>Date Filed</th>
                                <th>Name</th>
                                <th>Position</th>
                                <th>Reversal Date</th>															
                            </tr>
                            </thead>
                            <tbody>
                            <?php 
                            for($i=0;$i<count($names);$i++)
                            {
                            	echo "<tr>
										<td><button name='link' value='$formNum[$i]' style='background-color:white;border:none;color:blue;'>$formNum[$i]</button></td>
										<td>$dateFiled[$i]</td>
										<td>$names[$i]</td>
										<td>$positionName[$i]</td>
										<td>$dateReversal[$i]</td>
									  <tr>";
                            }
                            ?>                         
                            </tbody>
                        </table>
                    </form>
                    </div>
                    <div class="panel-footer text-right">
						<div class="row" align="center">
						Generated as of: 2017-02-06 20:13:01 </br>
						<b>---END OF REQUEST---</b>
						</div>
                    </div>
                </div>
            </div>
        </div>
       
    </div>

</div>

</body>

</html>