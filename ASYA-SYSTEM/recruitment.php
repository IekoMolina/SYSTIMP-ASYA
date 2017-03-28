<!DOCTYPE html>
<html lang="en">
<?php 
session_start();
require_once('../mysql_connect.php');
$currentEmployeeNum = $_SESSION['emp_number'];
//Getting Applicants That passed the requirements
$queryForHiredApplicants="SELECT 	APPNO,FIRSTNAME, LASTNAME, APPPOSITION, EMAIL, MOBILENO
							FROM 	APPLICANTS 
						   WHERE 	APPSTATUS=6004";//For Account Creation
$result=mysqli_query($dbc,$queryForHiredApplicants);
	if(mysqli_num_rows($result) > 0)
	{
		while($rows=mysqli_fetch_array($result,MYSQLI_ASSOC))
		{
			$appNum[] = $rows['APPNO'];
			$names[] = $rows['FIRSTNAME'].' '.$rows['LASTNAME'];
			$positions[] = $rows['APPPOSITION'];
			$emails[] = $rows['EMAIL'];
			$numbers[] = $rows['MOBILENO'];
		}
	}
	else
	{
		$appNum = [];
		$names = [];
		$positions = [];
		$emails = [];
		$numbers= [];
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
						   WHERE 	APPSTATUS = 6001";
$result2=mysqli_query($dbc,$queryForApplicants);
	if(mysqli_num_rows($result2) > 0)
	{
		while($rows=mysqli_fetch_array($result2,MYSQLI_ASSOC))
		{
			$aAppNum[] = $rows['APPNO'];
			$aNames[] = $rows['FIRSTNAME'].' '.$rows['LASTNAME'];
			$aPositions[] = $rows['APPPOSITION'];
			$aEmails[] = $rows['EMAIL'];
			$aNumbers[] = $rows['MOBILENO'];
			$aDates[] = $rows['DATEAPPLIED'];
		}
	}
	else
	{
		$aAppNum = [];
		$aNames = [];
		$aPositions = [];
		$aEmails = [];
		$aNumbers = [];
		$aDates = [];
	}
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

// Get all approved manpower request
$queryForManpower="	  	   SELECT 	*
							FROM 	MANPOWER
						   WHERE 	HRAPPROVERID IS NOT NULL";
$result3=mysqli_query($dbc,$queryForManpower);
if(mysqli_num_rows($result3) > 0)
{
	while($rows=mysqli_fetch_array($result3,MYSQLI_ASSOC))
	{
		$mPosition[] = $rows['POSITION'];
		$mDepartment[] = $rows['DEPARTMENT'];
		$mDate[] = $rows['DATENEEDED'];
		$mAgeBracket[] = $rows['AGESTART'].' - '.$rows['AGEEND'];
		$mDescription[] = $rows['JOBDESCRIPTION'];
	}
}
else
{
	$mPosition = [];
	$mDepartment = [];
	$mDate = [];
	$mAgeBracket = [];
	$mDescription = [];
}

//get all actual position
$queryForActualPositionM="SELECT 	*
							FROM 	emp_positions";
$resultMP=mysqli_query($dbc,$queryForActualPositionM);
while($rows=mysqli_fetch_array($resultMP,MYSQLI_ASSOC))
{
	$actualPosM[] = $rows['EPOSITION'];
	$codePosM[] = $rows['POSITION'];
}
//create array containing actual position
$positionNameM[] = array();
for ($x=0;$x<count($mPosition);$x++)
{
	for ($y=0;$y<count($codePosM);$y++)
	{
		if($mPosition[$x]==$codePosM[$y])
		{
			$positionNameM[$x] = $actualPosM[$y];
		}
	}
}

$queryForActualDepartmentM="SELECT 	*
							FROM 	emp_dept";
$resultMD=mysqli_query($dbc,$queryForActualDepartmentM);
while($rows=mysqli_fetch_array($resultMD,MYSQLI_ASSOC))
{
	$actualDeptM[] = $rows['EDEPT'];
	$codeDeptM[] = $rows['DEPT'];
}
$deptNameM[] = array();
for ($x=0;$x<count($mDepartment);$x++)
{
	for ($y=0;$y<count($codeDeptM);$y++)
	{
		if($mDepartment[$x]==$codeDeptM[$y])
		{
			$deptNameM[$x] = $actualDeptM[$y];
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
                        <table id="example1" class="table table-bordered table-hover table-striped">
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
									  </tr>";
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
	                        <table id="example2" class="table table-bordered table-hover table-striped">	                                
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
											  </tr>";
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
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Manpower Needed <span class="panel-subheader"></span></h3>
                    </div>
                    <div class="panel-body">
                        <table id="example3" class="table table-bordered table-hover table-striped">
                            <thead>
                            <tr>
                                <th>Position</th>
                                <th>Department</th>
                                <th>Age Bracket</th>
                                <th>Date Needed</th>
                                <th>Description</th>
                            </tr>
                            </thead>
                            <tbody>	                        
	                            <?php 
	                            for($i=0;$i<count($positionNameM);$i++)
	                            {
	                            	echo "<tr>
											<td>$positionNameM[$i]</td>		                            	
											<td>$deptNameM[$i]</td>	                            														
											<td>$mAgeBracket[$i]</td>
											<td>$mDate[$i]</td>
											<td>$mDescription[$i]</td>
										  </tr>";
	                            }
	                            ?>		                         
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