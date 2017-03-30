<!DOCTYPE html>
<html lang="en">
<?php 
session_start();
require_once('../../mysql_connect.php');
$currentEmployeeNum = $_SESSION['emp_number'];
$employeeNum = $_SESSION['emp_number'];
//Getting Applicants That need further eval
$queryForApplicants="	  SELECT 	*
							FROM 	APPLICANTS A JOIN APP_EVALUATION AE ON A.APPNO = AE.APPNO
						   WHERE 	AE.AREMARKS = 'For further evaluation'";
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
		$sched2[] = $rows['DATESCHED2'];
	}
}
else
{
	$appNum = [];
	$names = [];
	$positions = [];
	$emails = [];
	$numbers= [];
	$sched2 = [];
}
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
//Getting RR
$queryRR=" SELECT 	*
			 FROM 	APPLICANTS A JOIN 	EMPLOYEES E ON A.APPNO = E.APPNO
								 JOIN	REVERSALREQUESTS RQ ON E.EMPLOYEENUMBER = RQ.EMPLOYEENUMBER
			WHERE 	RQ.DMAPPROVERID IS NULL
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
			WHERE 	IQ.DMAPPROVERID IS NULL
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
			WHERE 	LQ.DMAPPROVERID IS NULL
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
			WHERE 	OQ.DMAPPROVERID IS NULL
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
			WHERE 	UQ.DMAPPROVERID IS NULL
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

// PE
$queryPE="	  SELECT 	A.APPNO,A.FIRSTNAME, A.LASTNAME,E.DEPT, E.ACTUALPOSITION, A.APPROVEDDATE
							FROM 	APPLICANTS A JOIN 	EMPLOYEES E
												   ON	A.APPNO = E.APPNO
						   WHERE  E.DMEVALUATORTHREE IS NULL";
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

// Time Table
$queryT="SELECT 	*
FROM 	TIMETABLE
WHERE 	EMPLOYEENUMBER = '{$currentEmployeeNum}'";
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

// All Request details for the current employee
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
$queryRRE=" SELECT 	*
FROM 	APPLICANTS A JOIN 	EMPLOYEES E ON A.APPNO = E.APPNO
JOIN	REVERSALREQUESTS RQ ON E.EMPLOYEENUMBER = RQ.EMPLOYEENUMBER
WHERE 	RQ.EMPLOYEENUMBER = '{$employeeNum}'
";
$resultRRE=mysqli_query($dbc,$queryRRE);
if(mysqli_num_rows($resultRRE) > 0)
{
	while($rows=mysqli_fetch_array($resultRRE,MYSQLI_ASSOC))
	{
		$rrempNumE[]= $rows['EMPLOYEENUMBER'];
		$rrFormNumE[] = $rows['FORMNUMBER'];
		$rrnamesE[] = $rows['FIRSTNAME'].' '.$rows['LASTNAME'];
		$rrpositionsE[] = $rows['ACTUALPOSITION'];
		$rrdateFiledE[] = $rows['DATE'];
		$rrdateReversalE[] = $rows['TABLEDATE'];
		$rrStatusE[] = $rows['STATUS'];
		$rrReasonE[] = $rows['REASON'];
	}
}
else
{
	$rrempNumE = [];
	$rrFormNumE = [];
	$rrnamesE = [];
	$rrpositionsE = [];
	$rrdateFiledE = [];
	$rrdateReversalE = [];
	$rrStatusE = [];
	$rrReasonE = [];
}
//create array containing actual status
$rrStatusName[] = array();
for ($x=0;$x<count($rrStatusE);$x++)
{
	for ($y=0;$y<count($codeRS);$y++)
	{
		if($rrStatusE[$x]==$codeRS[$y])
		{
			$rrStatusName[$x] = $actualRS[$y];
		}
	}
}
//Getting IR
$queryIRE=" SELECT 	*
FROM 	APPLICANTS A JOIN 	EMPLOYEES E ON A.APPNO = E.APPNO
JOIN	ITINERARYREQUESTS IQ ON E.EMPLOYEENUMBER = IQ.EMPLOYEENUMBER
WHERE 	IQ.EMPLOYEENUMBER = '{$employeeNum}'
";
$resultIRE=mysqli_query($dbc,$queryIRE);
if(mysqli_num_rows($resultIRE) > 0)
{
	while($rows=mysqli_fetch_array($resultIRE,MYSQLI_ASSOC))
	{
		$irempNumE[]= $rows['EMPLOYEENUMBER'];
		$irFormNumE[] = $rows['FORMNUMBER'];
		$irnamesE[] = $rows['FIRSTNAME'].' '.$rows['LASTNAME'];
		$irrpositionsE[] = $rows['ACTUALPOSITION'];
		$irdateFiledE[] = $rows['DATE'];
		$irdateReversalE[] = $rows['TABLEDATE'];
		$irStatusE[] = $rows['STATUS'];
		$irReasonE[] = $rows['REASON'];
	}
}
else
{
	$irempNumE = [];
	$irFormNumE = [];
	$irnamesE = [];
	$irrpositionsE = [];
	$irdateFiledE = [];
	$irdateReversalE = [];
	$irStatusE = [];
	$irReasonE = [];
}
$irStatusName[] = array();
for ($x=0;$x<count($irStatusE);$x++)
{
	for ($y=0;$y<count($codeRS);$y++)
	{
		if($irStatusE[$x]==$codeRS[$y])
		{
			$irStatusName[$x] = $actualRS[$y];
		}
	}
}
//Getting LR
$queryLRE=" SELECT 	*
FROM 	APPLICANTS A JOIN 	EMPLOYEES E ON A.APPNO = E.APPNO
JOIN	LEAVEREQUESTS LQ ON E.EMPLOYEENUMBER = LQ.EMPLOYEENUMBER
WHERE 	LQ.EMPLOYEENUMBER = '{$employeeNum}'
";
$resultLRE=mysqli_query($dbc,$queryLRE);
if(mysqli_num_rows($resultLRE) > 0)
{
	while($rows=mysqli_fetch_array($resultLRE,MYSQLI_ASSOC))
	{
		$lrempNumE[]= $rows['EMPLOYEENUMBER'];
		$lrFormNumE[] = $rows['FORMNUMBER'];
		$lrnamesE[] = $rows['FIRSTNAME'].' '.$rows['LASTNAME'];
		$lrpositionsE[] = $rows['ACTUALPOSITION'];
		$lrdateFiledE[] = $rows['DATE'];
		$lrStatusE[] = $rows['STATUS'];
		$lrReasonE[] = $rows['REASON'];
	}
}
else
{
	$lrempNumE = [];
	$lrFormNumE = [];
	$lrnamesE = [];
	$lrpositionsE = [];
	$lrdateFiledE = [];
	$lrStatusE = [];
	$lrReasonE = [];
}
$lrStatusName[] = array();
for ($x=0;$x<count($lrStatusE);$x++)
{
	for ($y=0;$y<count($codeRS);$y++)
	{
		if($lrStatusE[$x]==$codeRS[$y])
		{
			$lrStatusName[$x] = $actualRS[$y];
		}
	}
}
//Getting OR
$queryORE=" SELECT 	*
FROM 	APPLICANTS A JOIN 	EMPLOYEES E ON A.APPNO = E.APPNO
JOIN	OVERTIMEREQUESTS OQ ON E.EMPLOYEENUMBER = OQ.EMPLOYEENUMBER
WHERE 	OQ.EMPLOYEENUMBER = '{$employeeNum}'
";
$resultORE=mysqli_query($dbc,$queryORE);
if(mysqli_num_rows($resultORE) > 0)
{
	while($rows=mysqli_fetch_array($resultORE,MYSQLI_ASSOC))
	{
		$orempNumE[]= $rows['EMPLOYEENUMBER'];
		$orFormNumE[] = $rows['FORMNUMBER'];
		$ornamesE[] = $rows['FIRSTNAME'].' '.$rows['LASTNAME'];
		$orpositionsE[] = $rows['ACTUALPOSITION'];
		$ordateFiledE[] = $rows['DATE'];
		$orStatusE[] = $rows['STATUS'];
		$orReasonE[] = $rows['REASON'];
	}
}
else
{
	$orempNumE = [];
	$orFormNumE = [];
	$ornamesE = [];
	$orpositionsE = [];
	$ordateFiledE = [];
	$orStatusE = [];
	$orReasonE = [];
}
$orStatusName[] = array();
for ($x=0;$x<count($orStatusE);$x++)
{
	for ($y=0;$y<count($codeRS);$y++)
	{
		if($orStatusE[$x]==$codeRS[$y])
		{
			$orStatusName[$x] = $actualRS[$y];
		}
	}
}
//Getting UR
$queryURE=" SELECT 	*
FROM 	APPLICANTS A JOIN 	EMPLOYEES E ON A.APPNO = E.APPNO
JOIN	UNDERTIMEREQUESTS UQ ON E.EMPLOYEENUMBER = UQ.EMPLOYEENUMBER
WHERE 	UQ.EMPLOYEENUMBER = '{$employeeNum}'
";
$resultURE=mysqli_query($dbc,$queryURE);
if(mysqli_num_rows($resultURE) > 0)
{
	while($rows=mysqli_fetch_array($resultURE,MYSQLI_ASSOC))
	{
		$urempNumE[]= $rows['EMPLOYEENUMBER'];
		$urFormNumE[] = $rows['FORMNUMBER'];
		$urnamesE[] = $rows['FIRSTNAME'].' '.$rows['LASTNAME'];
		$urpositionsE[] = $rows['ACTUALPOSITION'];
		$urdateFiledE[] = $rows['DATE'];
		$urStatusE[] = $rows['STATUS'];
		$urReasonE[] = $rows['REASON'];
	}
}
else
{
	$urempNumE = [];
	$urFormNumE = [];
	$urnamesE = [];
	$urpositionsE = [];
	$urdateFiledE = [];
	$urStatusE = [];
	$urReasonE = [];
}
$urStatusName[] = array();
for ($x=0;$x<count($urStatusE);$x++)
{
	for ($y=0;$y<count($codeRS);$y++)
	{
		if($urStatusE[$x]==$codeRS[$y])
		{
			$urStatusName[$x] = $actualRS[$y];
		}
	}
}

// Performance Evaluation summary of applicant
$queryPEE="SELECT 	*
FROM 	APPLICANTS A JOIN 	EMPLOYEES E ON A.APPNO = E.APPNO
JOIN	EMP_EVALUATION EE ON E.EMPLOYEENUMBER = EE.EMPLOYEENUMBER
WHERE 	EE.EMPLOYEENUMBER = '{$employeeNum}'
AND 	EE.HREMPNO IS NOT NULL
";
$resultPEE=mysqli_query($dbc,$queryPEE);
if(mysqli_num_rows($resultPEE) > 0)
{
	while($rows=mysqli_fetch_array($resultPEE,MYSQLI_ASSOC))
	{
		$appNumPEE[] = $rows['APPNO'];
		$namesPEE[] = $rows['FIRSTNAME'].' '.$rows['LASTNAME'];
		$positionsPEE[] = $rows['ACTUALPOSITION'];
		$departmentsPEE[] = $rows['DEPT'];
		$dateHiredPEE[] = $rows['APPROVEDDATE'];
		$hrEvaluatorPEE[] = $rows['HREMPNO'];
		$dmEvaluatorPEE[] = $rows['DMEMPNO'];
		$codePEE[] = $rows['EVALUATION_NUMBER'];
	}
}
else
{
	$appNumPEE = [];
	$namesPEE = [];
	$positionsPEE = [];
	$departmentsPEE = [];
	$dateHiredPEE = [];
	$hrEvaluatorPEE = [];
	$dmEvaluatorPEE = [];
	$codePEE = [];
}
//Actual Postion
//create array containing actual position
$positionNamePEE[] = array();
for ($x=0;$x<count($positionsPEE);$x++)
{
	for ($y=0;$y<count($codePos);$y++)
	{
		if($positionsPEE[$x]==$codePos[$y])
		{
			$positionNamePEE[$x] = $actualPos[$y];
		}
	}
}
//Actual Department
$deptNamePEE[] = array();
for ($x=0;$x<count($departmentsPEE);$x++)
{
	for ($y=0;$y<count($codeDept);$y++)
	{
		if($departmentsPEE[$x]==$codeDept[$y])
		{
			$deptNamePEE[$x] = $actualDept[$y];
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
for ($x=0;$x<count($hrEvaluatorPEE);$x++)
{
	for ($y=0;$y<count($codeName);$y++)
	{
		if($hrEvaluatorPEE[$x]==$codeName[$y])
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

    <title>Home</title>
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
            <li id="but" class="dropdown">
           	 <a href="#" class="dropdown-toggle" data-toggle="dropdown">
           	 	<span id="red" class="label label-pill label-danger count" style="border-radius:10px;"></span>
           	 	<span class="glyphicon glyphicon-envelope"></span>
           	 	
           	 	</a>
				 <ul id="canvas" class="dropdown-menu">
				 	<li style="background-color:#ccffcc;"></li>
				 </ul>            
            </li>
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
            <p>Department Manager</p>
        </div>

        <div class="sidebar-nav">

            <div class="list-group root">

				  <!-- home -->
                <a href="home.php" class="list-group-item active"><span class="glyphicon glyphicon-home"></span> Home</a>
			
				<!-- employee info -->
                <a href="Employee info.php" class="list-group-item"><span class="glyphicon glyphicon-user"></span> Employee</a>
				
                <!-- reports -->
                <a href="#request-items" class="list-group-item" data-toggle="collapse" data-parent=".sidebar-nav">
                    <span class="glyphicon glyphicon-list-alt"></span> Request <span class="caret"></span>
                </a>
                <!-- request items -->
                <div class="list-group collapse" id="request-items">

                    <!-- FORMS -->
                        <a href="Form - Absent Reversal.php" class="list-group-item">Absent Reversal</a>
						<a href="Form - Change Record.php" class="list-group-item">Change Record</a>
						<a href="Form - Itenerary Authorization.php" class="list-group-item">Itinerary Authorization</a>
						<a href="Form - Leave.php" class="list-group-item">Leave</a>
                        <a href="Form - Manpower.php" class="list-group-item">Manpower</a>
                        <a href="Form - Overtime.php" class="list-group-item">Overtime</a>
                        <a href="Form - Resignation.php" class="list-group-item">Resignation</a>
                        <a href="Form - Undertime.php" class="list-group-item">Undertime</a>
                    </a>
                   
                </div>
				
				 <!-- subordinate -->
                <a href="#sub-items" class="list-group-item" data-toggle="collapse" data-parent=".sidebar-nav">
                    <span class="glyphicon glyphicon-list-alt"></span> Subordinates <span class="caret"></span>
                </a>
                <!-- subordinate items -->
                <div class="list-group collapse" id="sub-items">

                    <!-- FORMS -->
					
						<a href="Subordinate - Evaluation.php" class="list-group-item">Evaluation</a>
					
						 <a href="#penreq-items" class="list-group-item" data-toggle="collapse" data-parent=".sidebar-nav">
						<span class="glyphicon glyphicon-list-alt"></span> 	Request <span class="caret"></span>
						
                    </a>
                </div>
				
						<!-- request items -->
						<div class="list-group collapse" id="penreq-items">

							<!-- FORMS -->
								<a href="Subordinate - Absent Reversal.php" class="list-group-item">Absent Reversal</a>
								<a href="Subordinate - Itenerary Authorization.php" class="list-group-item">Itinerary Authorization</a>
								<a href="Subordinate - Leave.php" class="list-group-item">Leave</a>
								<a href="Subordinate - Overtime.php" class="list-group-item">Overtime</a>	
								<a href="Subordinate - Undertime.php" class="list-group-item">Undertime</a>
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
        <div class="row">

            <div class="col-md-8">
                <div class="row">

                    <!-- daily applicants -->
                    <div class="col-md-12">
                        <div class="panel panel-default homepanel">
                            <div class="panel-heading">
                                <h3 class="panel-title">Applicants<span class="panel-subheader">(for technical evaluation)</span>
                                </h3>
                            </div>
                            <div class="panel-body">                           	
                                <table class="table table-bordered table-hover table-striped">
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Position Desired</th>
                                        <th>Contact</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
		                            <?php 		                            
		                            for($i=0;$i<count($names);$i++)
		                            {
		                            	if($sched2[$i] == NULL)
		                            	{
		                            		echo "<tr>
		                            		<td>$names[$i]</td>
		                            		<td>$positionName[$i]</td>
		                            		<td>$numbers[$i]</td>
		                            		<form action='Interview - Second Scheduling.php' method='post'>
		                            			<td><button class='btn btn-success' name='emplink' value='$appNum[$i]'>Schedule Appointment</button></td>
		                            		</form>
		                            		</tr>";
		                            	}
		                            	else 
		                            	{
		                            		echo "<tr>		                            		
		                            		<td>$names[$i]</td>		                            		
		                            		<td>$positionName[$i]</td>
		                            		<td>$numbers[$i]</td>
		                            		<form action='Interview - Second.php' method='post'>
		                            		<td><button class='btn btn-success' name='emplink' value='$appNum[$i]' >Interview</button></td>
		                            		</form>
		                            		</tr>";
		                            	}

		                            }
		                            ?>
                                    </tbody>
                                </table>
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
					                <form action="SubordinateEvaluation.php" method="post">
		  		                        <?php 
			                            for($i=0;$i<count($namesPE);$i++)
			                            {
			                            	echo "<tr>
													<td><button name='emplink' value='$appNumPE[$i]' style='background-color:white;border:none;color:blue;'>$namesPE[$i]</button></td>		                            	
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
			                    echo "<form action='Subordinate - Absent Reversal Detailed.php' method='post'>";
	                            for($i=0;$i<count($rrFormNum);$i++)
	                            {
	                            	echo "<tr>
	                            	<td>$rrdateFiled[$i]</td>
									<td><button name='link' value='$rrFormNum[$i]' style='background-color:white;border:none;color:blue;'>$rrnames[$i]</button></td>
									<td>Reversal Request</td>
									</tr>";
	                            }
	                            echo "</form>";
	                            echo "<form action='Subordinate - Itenerary Authorization Detailed.php' method='post'>";
	                            for($i=0;$i<count($irFormNum);$i++)
	                            {
	                            	echo "<tr>
	                            	<td>$irdateFiled[$i]</td>
									<td><button name='link' value='$irFormNum[$i]' style='background-color:white;border:none;color:blue;'>$irnames[$i]</button></td>
									<td>Itinerary Request</td>
	                            	</tr>";
	                            }
	                            echo "</form>";
	                            echo "<form action='Subordinate - Leave Detailed.php' method='post'>";
	                            for($i=0;$i<count($lrFormNum);$i++)
	                            {
	                            	echo "<tr>
	                            	<td>$lrdateFiled[$i]</td>
									<td><button name='link' value='$lrFormNum[$i]' style='background-color:white;border:none;color:blue;'>$lrnames[$i]</button></td>
									<td>Leave Request</td>
	                            	</tr>";
	                            }
	                            echo "</form>";
	                            echo "<form action='Subordinate - Overtime Detailed.php' method='post'>";
	                            for($i=0;$i<count($orFormNum);$i++)
	                            {
	                            	echo "<tr>
	                            	<td>$ordateFiled[$i]</td>
									<td><button name='link' value='$orFormNum[$i]' style='background-color:white;border:none;color:blue;'>$ornames[$i]</button></td>
									<td>Overtime Request</td>
	                            	</tr>";
	                            }
	                            echo "</form>";
	                            echo "<form action='Subordinate - Undertime Detailed.php' method='post'>";
	                            for($i=0;$i<count($urFormNum);$i++)
	                            {
	                            	echo "<tr>
	                           	    <td>$urdateFiled[$i]</td>
									<td><button name='link' value='$urFormNum[$i]' style='background-color:white;border:none;color:blue;'>$urnames[$i]</button></td>
									<td>Undertime Request</td>
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

        </div><!-- table end -->
        
        <!-- attendance summary section -->
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
	                        for($i=0;$i<count($rrFormNumE);$i++)
	                        {
	                        	echo "<tr>
	                        	<td>$rrFormNumE[$i]</td>
	                        	<td>$rrdateFiledE[$i]</td>
	                        	<td>$rrReasonE[$i]</td>
	                        	<td>$rrStatusName[$i]</td>
	                        	<td>Reversal Request</td>
	                        	</tr>";
	                        }
	                        for($i=0;$i<count($irFormNumE);$i++)
	                        {
	                        	echo "<tr>
	                        	<td>$irFormNumE[$i]</td>
	                        	<td>$irdateFiledE[$i]</td>
	                        	<td>$irReasonE[$i]</td>
	                        	<td>$irStatusName[$i]</td>
	                        	<td>Itinerary Authorization Request</td>
	                        	</tr>";
	                        }
	      
	                        for($i=0;$i<count($lrFormNumE);$i++)
	                        {
	                        	echo "<tr>
	                        	<td>$lrFormNumE[$i]</td>
	                        	<td>$lrdateFiledE[$i]</td>
	                        	<td>$lrReasonE[$i]</td>
	                        	<td>$lrStatusName[$i]</td>
	                        	<td>Leave Request</td>
	                        	</tr>";
	                        }
	                        
	                        for($i=0;$i<count($orFormNumE);$i++)
	                        {
	                        	echo "<tr>
	                        	<td>$orFormNumE[$i]</td>
	                        	<td>$ordateFiledE[$i]</td>
	                        	<td>$orReasonE[$i]</td>
	                        	<td>$orStatusName[$i]</td>
	                        	<td>Overtime Request</td>
	                        	</tr>";
	                        }
	                        
	                        for($i=0;$i<count($urFormNumE);$i++)
	                        {
	                        	echo "<tr>
	                        	<td>$urFormNumE[$i]</td>
	                        	<td>$urdateFiledE[$i]</td>
	                        	<td>$urReasonE[$i]</td>
	                        	<td>$urStatusName[$i]</td>
	                        	<td>Undertime Request</td>
	                        	</tr>";
	                        }
                        ?>                                               
                        </tbody>
                    </table>
                    </div>
		</div>
		</div>
        <!-- conduct section -->
        <a class="anchor" name="eval"></a>
        <div class="row filldiv">
            <h2 class="page-title">Evaluation Summary</h2>

            <table class="table table-bordered table-hover table-striped">
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
					for($i=0;$i<count($codePEE);$i++)
					{
						echo "<tr>
						<td>$codePEE[$i]</td>
						<td>$dateHiredPEE[$i]</td>
						<td>$actualDMName[$i]</td>
						<td>$actualHRName[$i]</td>
						</tr>";
					}
					?>
                </tbody>
            </table>
			<div class="text-right" style="margin-right: 30px">
                </div>
        </div>
		
    </div>
    <script type="text/javascript">
		$(document).ready(function() {
		    $('#example1').DataTable();
		} );
	</script>
<!-- Notification Query -->
	<script>
		var interval = 5000;
		get();
		

		
		function get() {
			$.ajax({
				type: 'POST',
				url: 'http://localhost/SYSTIMP-ASYA/ASYA-SYSTEM/Manager/notification.php',					
				success: function (data) {
					$('#red').empty();		
						console.log(data);				
						if(data.length != 0){
							$('#red').append(data.length);

							//prepend ng new notification (sa taas)
							for (i = 0; i < data.length; i++){
								$('#canvas').prepend('<li style="background-color:#ccffcc;"><b>'+data[i].FIRSTNAME+' '+data[i].LASTNAME+' requested for absent reversal'+'</b></li>');
							}
						}
				}
			});
		}
						
		$('#but').on('click',function(){			
			$.ajax({
				type: 'POST',
				url: 'http://localhost/SYSTIMP-ASYA/ASYA-SYSTEM/Manager/notification1.php',					
				success: function (data) {
					$('#red').empty();
				}
			});
		});
		setInterval(get, interval);
		
	</script>   
</body>

</html>