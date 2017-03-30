<!DOCTYPE html>
<html lang="en">
<?php 
session_start();
require_once('../../mysql_connect.php');
$appNum= $_SESSION['emp_appno'];
$employeeNum = $_SESSION['emp_number'];
// Time Table
$queryT="SELECT 	*
FROM 	TIMETABLE
WHERE 	EMPLOYEENUMBER = '{$employeeNum}'";
$resultT=mysqli_query($dbc,$queryT);
if(mysqli_num_rows($resultT) > 0)
{
	while($rows=mysqli_fetch_array($resultT,MYSQLI_ASSOC))
	{
		$date[] = $rows['TABLEDATE'];
		$morningIn[] = $rows['MORNINGTIMEIN_REQUEST'];
		$lunchIn[] = $rows['LUNCHTIMEIN_REQUEST'];
		$breakIn[] = $rows['BREAKTIMEIN_REQUEST'];
		$lunchOut[] = $rows['LUNCHTIMEOUT_REQUEST'];
		$breakOut[] = $rows['BREAKTIMEOUT_REQUEST'];
		$afternoonOut[] = $rows['AFTERNOONTIMEOUT_REQUEST'];
	}
}
else
{
	$date = [];
	$morningIn = [];
	$lunchIn = [];
	$breakIn = [];
	$lunchOut = [];
	$breakOut  = [];
	$afternoonOut = [];
}
//All request
$queryForActualRStatus="SELECT 	*
							FROM 	requeststatus";
$resultRS=mysqli_query($dbc,$queryForActualRStatus);
while($rows=mysqli_fetch_array($resultRS,MYSQLI_ASSOC))
{
	$actualRS[] = $rows['STATUS'];
	$codeRS[] = $rows['STATUSID'];
}

//Getting RR
$queryRR=" SELECT 	*
FROM 	APPLICANTS A JOIN 	EMPLOYEES E ON A.APPNO = E.APPNO
JOIN	REVERSALREQUESTS RQ ON E.EMPLOYEENUMBER = RQ.EMPLOYEENUMBER
WHERE 	RQ.EMPLOYEENUMBER = '{$employeeNum}'
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
		$rrStatus[] = $rows['STATUS'];
		$rrReason[] = $rows['REASON'];
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
	$rrStatus = [];
	$rrReason = [];
}
//create array containing actual status
$rrStatusName[] = array();
for ($x=0;$x<count($rrStatus);$x++)
{
	for ($y=0;$y<count($codeRS);$y++)
	{
		if($rrStatus[$x]==$codeRS[$y])
		{
			$rrStatusName[$x] = $actualRS[$y];
		}
	}
}
//Getting IR
$queryIR=" SELECT 	*
FROM 	APPLICANTS A JOIN 	EMPLOYEES E ON A.APPNO = E.APPNO
JOIN	ITINERARYREQUESTS IQ ON E.EMPLOYEENUMBER = IQ.EMPLOYEENUMBER
WHERE 	IQ.EMPLOYEENUMBER = '{$employeeNum}'
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
		$irStatus[] = $rows['STATUS'];
		$irReason[] = $rows['REASON'];
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
	$irStatus = [];
	$irReason = [];
}
$irStatusName[] = array();
for ($x=0;$x<count($irStatus);$x++)
{
	for ($y=0;$y<count($codeRS);$y++)
	{
		if($irStatus[$x]==$codeRS[$y])
		{
			$irStatusName[$x] = $actualRS[$y];
		}
	}
}
//Getting LR
$queryLR=" SELECT 	*
FROM 	APPLICANTS A JOIN 	EMPLOYEES E ON A.APPNO = E.APPNO
JOIN	LEAVEREQUESTS LQ ON E.EMPLOYEENUMBER = LQ.EMPLOYEENUMBER
WHERE 	LQ.EMPLOYEENUMBER = '{$employeeNum}'
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
		$lrStatus[] = $rows['STATUS'];
		$lrReason[] = $rows['REASON'];
	}
}
else
{
	$lrempNum = [];
	$lrFormNum = [];
	$lrnames = [];
	$lrpositions = [];
	$lrdateFiled = [];
	$lrStatus = [];
	$lrReason = [];
}
$lrStatusName[] = array();
for ($x=0;$x<count($lrStatus);$x++)
{
	for ($y=0;$y<count($codeRS);$y++)
	{
		if($lrStatus[$x]==$codeRS[$y])
		{
			$lrStatusName[$x] = $actualRS[$y];
		}
	}
}
//Getting OR
$queryOR=" SELECT 	*
FROM 	APPLICANTS A JOIN 	EMPLOYEES E ON A.APPNO = E.APPNO
JOIN	OVERTIMEREQUESTS OQ ON E.EMPLOYEENUMBER = OQ.EMPLOYEENUMBER
WHERE 	OQ.EMPLOYEENUMBER = '{$employeeNum}'
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
		$orStatus[] = $rows['STATUS'];
		$orReason[] = $rows['REASON'];
	}
}
else
{
	$orempNum = [];
	$orFormNum = [];
	$ornames = [];
	$orpositions = [];
	$ordateFiled = [];
	$orStatus = [];
	$orReason = [];
}
$orStatusName[] = array();
for ($x=0;$x<count($orStatus);$x++)
{
	for ($y=0;$y<count($codeRS);$y++)
	{
		if($orStatus[$x]==$codeRS[$y])
		{
			$orStatusName[$x] = $actualRS[$y];
		}
	}
}
//Getting UR
$queryUR=" SELECT 	*
FROM 	APPLICANTS A JOIN 	EMPLOYEES E ON A.APPNO = E.APPNO
JOIN	UNDERTIMEREQUESTS UQ ON E.EMPLOYEENUMBER = UQ.EMPLOYEENUMBER
WHERE 	UQ.EMPLOYEENUMBER = '{$employeeNum}'
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
		$urStatus[] = $rows['STATUS'];
		$urReason[] = $rows['REASON'];
	}
}
else
{
	$urempNum = [];
	$urFormNum = [];
	$urnames = [];
	$urpositions = [];
	$urdateFiled = [];
	$urStatus = [];
	$urReason = [];
}
$urStatusName[] = array();
for ($x=0;$x<count($urStatus);$x++)
{
	for ($y=0;$y<count($codeRS);$y++)
	{
		if($urStatus[$x]==$codeRS[$y])
		{
			$urStatusName[$x] = $actualRS[$y];
		}
	}
}
$queryPE="SELECT 	*
FROM 	APPLICANTS A JOIN 	EMPLOYEES E ON A.APPNO = E.APPNO
JOIN	EMP_EVALUATION EE ON E.EMPLOYEENUMBER = EE.EMPLOYEENUMBER
WHERE 	EE.EMPLOYEENUMBER = '{$employeeNum}'
AND 	EE.HREMPNO IS NOT NULL
";
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
		$hrEvaluatorPE[] = $rows['HREMPNO'];
		$dmEvaluatorPE[] = $rows['DMEMPNO'];
		$codePE[] = $rows['EVALUATION_NUMBER'];
	}
}
else
{
	$appNumPE = [];
	$namesPE = [];
	$positionsPE = [];
	$departmentsPE = [];
	$dateHiredPE = [];
	$hrEvaluatorPE = [];
	$dmEvaluatorPE = [];
	$codePE = [];
}
//Actual Postion
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
//Actual Department
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

// Actual Evaluator name
$queryForActualName="SELECT 	*
							FROM 	employees e JOIN applicants a ON e.APPNO = a.APPNO";
$resultN=mysqli_query($dbc,$queryForActualName);
while($rows=mysqli_fetch_array($resultN,MYSQLI_ASSOC))
{
	$actualNames[] = $rows['FIRSTNAME'].' '.$rows['LASTNAME'];
	$codeName[] = $rows['EMPLOYEENUMBER'];
}
$actualDMName[] = array();
for ($x=0;$x<count($dmEvaluatorPE);$x++)
{
	for ($y=0;$y<count($codeName);$y++)
	{
		if($dmEvaluatorPE[$x]==$codeName[$y])
		{
			$actualDMName[$x] = $actualNames[$y];
		}
	}
}

$actualHRName[] = array();
for ($x=0;$x<count($hrEvaluatorPE);$x++)
{
	for ($y=0;$y<count($codeName);$y++)
	{
		if($hrEvaluatorPE[$x]==$codeName[$y])
		{
			$actualHRName[$x] = $actualNames[$y];
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
    <link rel="stylesheet" href="css/custom.css">
    <link rel="stylesheet" href="css/custom-theme.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.13/css/dataTables.bootstrap.min.css">
    <title>Employee Information</title>
</head>
<body>

<!-- navbar -->
<div class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="home.html"><img src="asyalogo.jpg" /> </a>
        </div>
        <ul class="nav navbar-nav">
			
            <li><a href="#welcome">Welcome Page</a></li>
            <li><a href="#attendance">Attendance Summary</a></li>
            <li><a href="#leave">Request Summary</a></li>
            <li><a href="#eval">Evaluation Summary</a></li>
        </ul>
        <!-- right side stuffs -->
        <ul class="nav navbar-nav navbar-right">
            <li><a href="#"><span class="glyphicon glyphicon-envelope"></span></a></li>
            <li><a href="#"><span class="glyphicon glyphicon-calendar"></span></a></li>
            <li><a href="../login.php">Logout</a></li>
        </ul>
    </div>
</div>

<div id="wrapper" class="container-fluid">

    <!-- Sidebar -->
    <div id="sidebar-wrapper" class="col-md-2">

        <div id="user-account">
            <h3>Welcome!</h3>
            <img class="img-circle img-responsive center-block" src="user.jpg" id="user-icon">
            <p>Employee</p>
        </div>

        <div class="sidebar-nav">

            <div class="list-group root">

				  <!-- home -->
                <a href="home.php" class="list-group-item active"><span class="glyphicon glyphicon-home"></span> Home</a>
			
				<!-- employee info -->
                <a href="Employee info.php" class="list-group-item"><span class="glyphicon glyphicon-user"></span> Employee</a>
				
                <!-- reports -->
                <a href="#report-items" class="list-group-item" data-toggle="collapse" data-parent=".sidebar-nav">
                    <span class="glyphicon glyphicon-list-alt"></span> Request <span class="caret"></span>
                </a>
                <!-- report items -->
                <div class="list-group collapse" id="report-items">

                    <!-- FORMS -->
                    <a href="#attendance-reports" class="list-group-item" data-toggle="collapse">
                        <a href="Form - Absent Reversal.php" class="list-group-item">Absent Reversal</a>
						<a href="Form - Change Record.php" class="list-group-item">Change Record</a>
						<a href="Form - Itenerary Authorization.php" class="list-group-item">Itinerary Authorization</a>
						<a href="Form - Leave.php" class="list-group-item">Leave</a>
                        <a href="Form - Overtime.php" class="list-group-item">Overtime</a>
                        <a href="Form - Resignation.php" class="list-group-item">Resignation</a>
                        <a href="Form - Undertime.php" class="list-group-item">Undertime</a>
                    </a>
                   
                </div>

                <a href="#" class="list-group-item"><span class="glyphicon glyphicon-info-sign"></span> About</a>
            </div>
        </div>

    </div>


    <!-- insert page content here -->
		
		
		        <!-- home section -->
        <a class="anchor" name="welcome"></a>
        <h2 class="page-title">Welcome</h2>
        <h4>Luis  Secades</h4>
        <div class="filldiv">
            <div class="col-md-2 text-right">
                <h5 class="info-label-text">Leaves Used:</h5>
                <h5 class="info-label-text">Total Leaves:</h5>
				<br>
				
            </div>
            <div class="col-md-3">
                <h5 class="info-detail-text">2</h5>
                <h5 class="info-detail-text">5</h5>
				<br>
            </div>

        </div>
       
		<!-- Attendance -->
        <a class="anchor" name="attendance"></a>	
        <div class="filldiv">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Attendance 
                                <span class="panel-subheader">
                                </span>
                                </h3>
                            </div>
                            <div class="panel-body">                          	
			                    <table id="example" class="table table-bordered table-hover table-striped">
			                        <thead>
				                        <tr>
				                            <th>Date</th>
				                            <th>Morning In</th>
				                            <th>Lunch Out</th>
				                            <th>Lunch In</th>
				                            <th>Break Out</th>
				                            <th>Break In</th>
				                            <th>Afternoon Out</th>
				                            <!-- <th>Overtime</th> -->
				                            <!--<th>Undertime</th>	-->						
				                        </tr>
			                        </thead>
			                        <tbody>
			                            <?php 
			                            for($i=0;$i<count($date);$i++)
			                            {
			                            	echo "<tr>
													<td>$date[$i]</td>
													<td>$morningIn[$i]</td>
													<td>$lunchOut[$i]</td>
													<td>$lunchIn[$i]</td>
													<td>$breakOut[$i]</td>
													<td>$breakIn[$i]</td>
													<td>$afternoonOut[$i]</td>									
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

        <!-- leave summary section -->
        <a class="anchor" name="leave"></a>
        <h2 class="page-title">Request Summary</h2>
        <div class="filldiv">
            <div class="row">
                <div class="col-md-12">
                    <table id="example1" class="table table-bordered table-hover table-striped">
                        <thead>
                        <tr>
                            <th>Form Code</th>
                            <th>Date Filed</th>
							<td>Purpose</td>
							<td>Status</td>
							<td>Request Type</td>
                        </tr>
                        </thead>
                        <tbody>
                        <?php 
	                        for($i=0;$i<count($rrFormNum);$i++)
	                        {
	                        	echo "<tr>
	                        	<td>$rrFormNum[$i]</td>
	                        	<td>$rrdateFiled[$i]</td>
	                        	<td>$rrReason[$i]</td>
	                        	<td>$rrStatusName[$i]</td>
	                        	<td>Reversal Request</td>
	                        	</tr>";
	                        }
	                        for($i=0;$i<count($irFormNum);$i++)
	                        {
	                        	echo "<tr>
	                        	<td>$irFormNum[$i]</td>
	                        	<td>$irdateFiled[$i]</td>
	                        	<td>$irReason[$i]</td>
	                        	<td>$irStatusName[$i]</td>
	                        	<td>Itinerary Authorization Request</td>
	                        	</tr>";
	                        }
	      
	                        for($i=0;$i<count($lrFormNum);$i++)
	                        {
	                        	echo "<tr>
	                        	<td>$lrFormNum[$i]</td>
	                        	<td>$lrdateFiled[$i]</td>
	                        	<td>$lrReason[$i]</td>
	                        	<td>$lrStatusName[$i]</td>
	                        	<td>Leave Request</td>
	                        	</tr>";
	                        }
	                        
	                        for($i=0;$i<count($orFormNum);$i++)
	                        {
	                        	echo "<tr>
	                        	<td>$orFormNum[$i]</td>
	                        	<td>$ordateFiled[$i]</td>
	                        	<td>$orReason[$i]</td>
	                        	<td>$orStatusName[$i]</td>
	                        	<td>Overtime Request</td>
	                        	</tr>";
	                        }
	                        
	                        for($i=0;$i<count($urFormNum);$i++)
	                        {
	                        	echo "<tr>
	                        	<td>$urFormNum[$i]</td>
	                        	<td>$urdateFiled[$i]</td>
	                        	<td>$urReason[$i]</td>
	                        	<td>$urStatusName[$i]</td>
	                        	<td>Undertime Request</td>
	                        	</tr>";
	                        }
                        ?>                                               
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
            <table id="example2" class="table table-bordered table-hover table-striped">
                <thead>
                <tr>
					<th>Evaluation Number</th>
                    <th>Date Hired</th>
                    <th>Department Evaluator</th>
					<th>HR Evaluator</th>
                </tr>
                </thead>
                <tbody>
					<?php 
					for($i=0;$i<count($codePE);$i++)
					{
						echo "<tr>
						<td>$codePE[$i]</td>
						<td>$dateHiredPE[$i]</td>
						<td>$actualDMName[$i]</td>
						<td>$actualHRName[$i]</td>
						</tr>";
					}
					?>
                </tbody>
            </table>
			<div class="text-right" style="margin-right: 30px">
                    <a href="#"><span class="glyphicon glyphicon-print"> Print</span></a>
                </div>
        </div>
    <script type="text/javascript">
		$(document).ready(function() {
		    $('#example').DataTable();
		} );
		$(document).ready(function() {
		    $('#example1').DataTable();
		} );
		$(document).ready(function() {
		    $('#example2').DataTable();
		} );
	</script>		        	
    </div>	
</div>

</body>

</html>