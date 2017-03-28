<!DOCTYPE html>
<html lang="en">
<?php 
session_start();
require_once('../mysql_connect.php');
$currentEmployeeNum = $_SESSION['emp_number'];
//Getting Applicants That passed the requirements
$queryForApplicants="	  SELECT 	APPNO,FIRSTNAME, LASTNAME, APPPOSITION, EMAIL, MOBILENO
							FROM 	APPLICANTS
						   WHERE 	APPSTATUS = 6004";
$result=mysqli_query($dbc,$queryForApplicants);
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

// Getting pending Request
//Getting RR
$queryRR=" SELECT 	*
			 FROM 	APPLICANTS A JOIN 	EMPLOYEES E ON A.APPNO = E.APPNO
								 JOIN	REVERSALREQUESTS RQ ON E.EMPLOYEENUMBER = RQ.EMPLOYEENUMBER
			WHERE 	RQ.HRAPPROVERID IS NULL
			  AND	RQ.DMAPPROVERID IS NOT NULL
		 ";
$resultRR=mysqli_query($dbc,$queryRR);
if(mysqli_num_rows($resultRR) > 0)
{
	while($rows=mysqli_fetch_array($resultRR,MYSQLI_ASSOC))
	{
		$rrempNum[]= $rows['EMPLOYEENUMBER'];
		$rrFormNum[] = $rows['FORMNUMBER'];
		$rrnames[] = $rows['FIRSTNAME'].' '.$rows['LASTNAME'];
		$rrpositions[] = $rows['ACTUALPOSITION'];
		$rrdateFiled[] = $rows['DATE'];
		$rrdateReversal[] = $rows['TABLEDATE'];
	}
}
else 
{
	$rrempNum = [];
	$rrFormNum = [];
	$rrnames = [];
	$rrpositions = [];
	$rrdateFiled = [];
	$rrdateReversal = [];
}

//Getting IR
$queryIR=" SELECT 	*
			 FROM 	APPLICANTS A JOIN 	EMPLOYEES E ON A.APPNO = E.APPNO
								 JOIN	ITINERARYREQUESTS IQ ON E.EMPLOYEENUMBER = IQ.EMPLOYEENUMBER
			WHERE 	IQ.HRAPPROVERID IS NULL
			  AND	IQ.DMAPPROVERID IS NOT NULL
		 ";
$resultIR=mysqli_query($dbc,$queryIR);
if(mysqli_num_rows($resultIR) > 0)
{
	while($rows=mysqli_fetch_array($resultIR,MYSQLI_ASSOC))
	{
		$irempNum[]= $rows['EMPLOYEENUMBER'];
		$irFormNum[] = $rows['FORMNUMBER'];
		$irnames[] = $rows['FIRSTNAME'].' '.$rows['LASTNAME'];
		$irrpositions[] = $rows['ACTUALPOSITION'];
		$irdateFiled[] = $rows['DATE'];
		$irdateReversal[] = $rows['TABLEDATE'];
	}
}
else 
{
	$irempNum = [];
	$irFormNum = [];
	$irnames = [];
	$irrpositions = [];
	$irdateFiled = [];
	$irdateReversal = [];
}
//Getting LR
$queryLR=" SELECT 	*
			 FROM 	APPLICANTS A JOIN 	EMPLOYEES E ON A.APPNO = E.APPNO
								 JOIN	LEAVEREQUESTS LQ ON E.EMPLOYEENUMBER = LQ.EMPLOYEENUMBER
			WHERE 	LQ.HRAPPROVERID IS NULL
			  AND	LQ.DMAPPROVERID IS NOT NULL
		 ";
$resultLR=mysqli_query($dbc,$queryLR);
if(mysqli_num_rows($resultLR) > 0)
{
	while($rows=mysqli_fetch_array($resultLR,MYSQLI_ASSOC))
	{
		$lrempNum[]= $rows['EMPLOYEENUMBER'];
		$lrFormNum[] = $rows['FORMNUMBER'];
		$lrnames[] = $rows['FIRSTNAME'].' '.$rows['LASTNAME'];
		$lrpositions[] = $rows['ACTUALPOSITION'];
		$lrdateFiled[] = $rows['DATE'];
	}
}
else 
{
	$lrempNum = [];
	$lrFormNum = [];
	$lrnames = [];
	$lrpositions = [];
	$lrdateFiled = [];
}
//Getting OR
$queryOR=" SELECT 	*
			 FROM 	APPLICANTS A JOIN 	EMPLOYEES E ON A.APPNO = E.APPNO
								 JOIN	OVERTIMEREQUESTS OQ ON E.EMPLOYEENUMBER = OQ.EMPLOYEENUMBER
			WHERE 	OQ.HRAPPROVERID IS NULL
			  AND	OQ.DMAPPROVERID IS NOT NULL
		 ";
$resultOR=mysqli_query($dbc,$queryOR);
if(mysqli_num_rows($resultOR) > 0)
{
	while($rows=mysqli_fetch_array($resultOR,MYSQLI_ASSOC))
	{
		$orempNum[]= $rows['EMPLOYEENUMBER'];
		$orFormNum[] = $rows['FORMNUMBER'];
		$ornames[] = $rows['FIRSTNAME'].' '.$rows['LASTNAME'];
		$orpositions[] = $rows['ACTUALPOSITION'];
		$ordateFiled[] = $rows['DATE'];
	}
}
else 
{
	$orempNum = [];
	$orFormNum = [];
	$ornames = [];
	$orpositions = [];
	$ordateFiled = [];
}
//Getting UR
$queryUR=" SELECT 	*
			 FROM 	APPLICANTS A JOIN 	EMPLOYEES E ON A.APPNO = E.APPNO
								 JOIN	UNDERTIMEREQUESTS UQ ON E.EMPLOYEENUMBER = UQ.EMPLOYEENUMBER
			WHERE 	UQ.HRAPPROVERID IS NULL
			  AND	UQ.DMAPPROVERID IS NOT NULL
		 ";
$resultUR=mysqli_query($dbc,$queryUR);
if(mysqli_num_rows($resultUR) > 0)
{
	while($rows=mysqli_fetch_array($resultUR,MYSQLI_ASSOC))
	{
		$urempNum[]= $rows['EMPLOYEENUMBER'];
		$urFormNum[] = $rows['FORMNUMBER'];
		$urnames[] = $rows['FIRSTNAME'].' '.$rows['LASTNAME'];
		$urpositions[] = $rows['ACTUALPOSITION'];
		$urdateFiled[] = $rows['DATE'];
	}
}
else
{
	$urempNum = [];
	$urFormNum = [];
	$urnames = [];
	$urpositions = [];
	$urdateFiled = [];
}

$queryPE="	  SELECT 	A.APPNO,A.FIRSTNAME, A.LASTNAME,E.DEPT, E.ACTUALPOSITION, A.APPROVEDDATE
							FROM 	APPLICANTS A JOIN 	EMPLOYEES E
												   ON	A.APPNO = E.APPNO
						   WHERE 	E.HREVALUATORTHREE IS NULL
							 AND	E.DMEVALUATORTHREE IS NOT NULL";
$resultPE=mysqli_query($dbc,$queryPE);
if(mysqli_num_rows($resultPE) > 0)
{
	while($rows=mysqli_fetch_array($resultPE,MYSQLI_ASSOC))
	{
		$appNumPE[] = $rows['APPNO'];
		$namesPE[] = $rows['FIRSTNAME'].' '.$rows['LASTNAME'];
		$positionsPE[] = $rows['ACTUALPOSITION'];
		$departmentsPE[] = $rows['DEPT'];
		$dateHiredPE[] = $rows['APPROVEDDATE'];
	
	}
}
else 
{
		$appNumPE = [];
		$namesPE = [];
		$positionsPE = [];
		$departmentsPE = [];
		$dateHiredPE = [];
}

$queryForActualPosition="SELECT 	*
							FROM 	emp_positions";
$resultP=mysqli_query($dbc,$queryForActualPosition);
while($rows=mysqli_fetch_array($resultP,MYSQLI_ASSOC))
{
	$actualPos[] = $rows['EPOSITION'];
	$codePos[] = $rows['POSITION'];
}
//create array containing actual position
$positionNamePE[] = array();
for ($x=0;$x<count($positionsPE);$x++)
{
	for ($y=0;$y<count($codePos);$y++)
	{
		if($positionsPE[$x]==$codePos[$y])
		{
			$positionNamePE[$x] = $actualPos[$y];
		}
	}
}

$queryForActualDepartment="SELECT 	*
							FROM 	emp_dept";
$resultD=mysqli_query($dbc,$queryForActualDepartment);
while($rows=mysqli_fetch_array($resultD,MYSQLI_ASSOC))
{
	$actualDept[] = $rows['EDEPT'];
	$codeDept[] = $rows['DEPT'];
}
$deptNamePE[] = array();
for ($x=0;$x<count($departmentsPE);$x++)
{
	for ($y=0;$y<count($codeDept);$y++)
	{
		if($departmentsPE[$x]==$codeDept[$y])
		{
			$deptNamePE[$x] = $actualDept[$y];
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
            <li class="dropdown">
           	 <a href="#" class="dropdown-toggle" data-toggle="dropdown">
           	 	<span class="label label-pill label-danger count" style="border-radius:10px;"></span><span class="glyphicon glyphicon-envelope"></span></a>
				 <ul class="dropdown-menu"></ul>            
            </li>
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
                                        <th>Name</th>
                                        <th>Department</th>
                                        <th>Position</th>
                                        <th>Date Hired</th>
                                    </tr>
                                    </thead>
					                <tbody>
					                <form action="Employee-evaluation.php" method="post">
		  		                        <?php 
			                            for($i=0;$i<count($namesPE);$i++)
			                            {
			                            	echo "<tr>
													<td><button name='empElink' value='$appNumPE[$i]' style='background-color:white;border:none;color:blue;'>$namesPE[$i]</button></td>		                            	
													<td>$positionNamePE[$i]</td>	                            														
													<td>$deptNamePE[$i]</td>
													<td>$dateHiredPE[$i]</td>
												  <tr>";
			                            }
			                            ?>
			                           </form>	                      
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
                        <h3 class="panel-title">Requests
                        <span class="panel-subheader">(pending)</span></h3>
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
			                    <?php 
			                   echo "<form action='AbsentReversalRequestDetailed.php' method='post'>";
	                            for($i=0;$i<count($rrFormNum);$i++)
	                            {
	                            	echo "<tr>
	                            	<td>$rrdateFiled[$i]</td>
									<td><button name='link' value='$rrFormNum[$i]' style='background-color:white;border:none;color:blue;'>$rrnames[$i]</button></td>
									<td>Reversal Request</td>
									<tr>";
	                            }
	                            echo "</form>";
	                            echo "<form action='ItineraryAuthorizationRequestDetailed.php' method='post'>";
	                            for($i=0;$i<count($irFormNum);$i++)
	                            {
	                            	echo "<tr>
	                            	<td>$irdateFiled[$i]</td>
									<td><button name='link' value='$irFormNum[$i]' style='background-color:white;border:none;color:blue;'>$irnames[$i]</button></td>
									<td>Itinerary Request</td>
	                            	<tr>";
	                            }
	                            echo "</form>";
	                            echo "<form action='LeaveRequestDetailed.php' method='post'>";
	                            for($i=0;$i<count($lrFormNum);$i++)
	                            {
	                            	echo "<tr>
	                            	<td>$lrdateFiled[$i]</td>
									<td><button name='link' value='$lrFormNum[$i]' style='background-color:white;border:none;color:blue;'>$lrnames[$i]</button></td>
									<td>Leave Request</td>
	                            	<tr>";
	                            }
	                            echo "</form>";
	                            echo "<form action='OvertimeRequestDetailed.php' method='post'>";
	                            for($i=0;$i<count($orFormNum);$i++)
	                            {
	                            	echo "<tr>
	                            	<td>$ordateFiled[$i]</td>
									<td><button name='link' value='$orFormNum[$i]' style='background-color:white;border:none;color:blue;'>$ornames[$i]</button></td>
									<td>Overtime Request</td>
	                            	<tr>";
	                            }
	                            echo "</form>";
	                            echo "<form action='UndertimeRequestDetailed.php' method='post'>";
	                            for($i=0;$i<count($urFormNum);$i++)
	                            {
	                            	echo "<tr>
	                           	    <td>$urdateFiled[$i]</td>
									<td><button name='link' value='$urFormNum[$i]' style='background-color:white;border:none;color:blue;'>$urnames[$i]</button></td>
									<td>Undertime Request</td>
	                            	<tr>";
	                            }
	                            echo "</form>";
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

</body>


</html>