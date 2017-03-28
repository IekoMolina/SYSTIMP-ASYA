<!DOCTYPE html>
<html lang="en">
<?php
session_start();
$currentEmployeeNum = $_SESSION['emp_number'];
require_once('../mysql_connect.php');
require_once('Classes\PHPExcel.php');
if(isset($_POST['emplink'])){
	$appNum= $_POST['emplink'];
}
if(isset($_POST['submit'])){
	$appNum = $_POST['submit'];
}
//Current year anf month
$time=strtotime(date('Y-m-d'));
$month=date("F",$time);
$year=date("Y",$time);
// Get employee INFO
$query="  SELECT 	A.FIRSTNAME,A.LASTNAME,A.MIDDLENAME,E.EMPLOYEENUMBER,E.DEPT,E.ACTUALPOSITION,E.STATUS,A.BIRTHDATE,EC.STARTCONTRACT
			FROM 	applicants A 
			JOIN 	employees E ON A.APPNO = E.APPNO 
			JOIN 	emp_contract EC ON E.APPNO = EC.APPNO 
	   	   WHERE 	A.APPNO = '{$appNum}'";
$result=mysqli_query($dbc,$query);
$rows=mysqli_fetch_array($result,MYSQLI_ASSOC);
$name = $rows['FIRSTNAME'].' '.$rows['LASTNAME'];
$firstName = $rows['FIRSTNAME'];
$lastName = $rows['LASTNAME'];
$middleName = $rows['MIDDLENAME'];
$employeeNum = $rows['EMPLOYEENUMBER'];
$birthday = $rows['BIRTHDATE'];
$startDate = $rows['STARTCONTRACT'];
// To convert to actual readable info
$dept = $rows['DEPT'];
$pos = $rows['ACTUALPOSITION'];
$status = $rows['STATUS'];
//get all actual department
$queryForActualDepartment="SELECT 	*
							FROM 	emp_dept";
$resultD=mysqli_query($dbc,$queryForActualDepartment);
while($rows=mysqli_fetch_array($resultD,MYSQLI_ASSOC))
{
	$actualDept[] = $rows['EDEPT'];
	$codeDept[] = $rows['DEPT'];
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

//get all actual status
$queryForActualStatus="		SELECT 	*
							  FROM 	emp_status";
$resultS=mysqli_query($dbc,$queryForActualStatus);
while($rows=mysqli_fetch_array($resultS,MYSQLI_ASSOC))
{
	$actualStatus[] = $rows['ESTATUS'];
	$codeStatus[] = $rows['STATUS'];
}
//Converting dept code to actual dept
$deptName="";
$posName="";
$statusName="";
for($x=0;$x<count($codeDept);$x++)
{
	if($dept == $codeDept[$x])
	{
		$deptName = $actualDept[$x];
	}
}
for($y=0;$y<count($codePos);$y++)
{
	if($pos == $codePos[$y])
	{
		$posName = $actualPos[$y];
	}
}
for($z=0;$z<count($codeStatus);$z++)
{
	if($status == $codeStatus[$z])
	{
		$statusName = $actualStatus[$z];
	}
}
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
// FIle reding process
if (isset($_FILES['file'])){
	$file= $_FILES["file"];
	$fileName = $file['name'];
	$fileTmp = $file['tmp_name']; 
	$filetype = $file['type'];
	$error = $file['error'];
	
	$file_ext = explode('.', $fileName);
	$file_ext = strtolower(end($file_ext));
	
	$allowed = array('txt','csv');
	
	if(in_array($file_ext, $allowed))
	{
		if($error == 0)
		{
			$file_destination = '../Uploaded Files/'.$fileName;
			if(move_uploaded_file($fileTmp, $file_destination))
			{									
				$target_file = "../Uploaded Files/".$fileName;
				$reader = PHPExcel_IOFactory::createReaderForFile($target_file);
				$excelObject = $reader->load($target_file);
				$worksheet = $excelObject->getActiveSheet();
				$lastRow = $worksheet->getHighestRow();	

				$temp_emp_no = 0;
				$date = '';
				$time_in = '';
				$time_out = '';
				$lunch_in = '';
				$lunch_out= '';
				$break_in = '';
				$break_out= '';
				for ($row = 7; $row <= 41; $row++){ 

					if(is_numeric($worksheet->getCell('A'.$row)->getValue())){ // if entry is an emp_no, store as int
						$temp_emp_no = (int)$worksheet->getCell('A'.$row)->getValue();
					}
					else { // split date string and concat into SQL format
						if(!empty($worksheet->getCell('A'.$row)->getValue())){
							$array1 = explode(" ", $worksheet->getCell('A'.$row)->getValue());
							$array2 = explode("/", $array1[0]); //company format: M-DD-YYY
							$date = $array2[2]."-".$array2[0]."-".$array2[1]; //SQL format:  YYYY-MM-DD
							
							if(empty($worksheet->getCell('B'.$row)->getValue()) || empty($worksheet->getCell('C'.$row)->getValue())){
								//do nothing if time in or time out is empty; means employee was absent that day
							}
							else{
								// time_in value
								$time_in = ""; 
								$array1 = explode(" ", $worksheet->getCell('B'.$row)->getValue()); 
								$time = explode(":", $array1[0]);
								if($array1[1] == "AM" && $time[0] == 12){
									$time[0] = "0"; // turn to 00 if 12 AM
								}
								if($array1[1] == "PM" && $time[0] != 12){
									$time[0] = (string)((int)$time[0] + 12);
								}
								$time_in = $time[0].":".$time[1].":".$time[2]; 
								
								// time_out value
								$time_out = ""; 
								$array1 = explode(" ", $worksheet->getCell('C'.$row)->getValue()); 
								$time = explode(":", $array1[0]);
								if($array1[1] == "AM" && $time[0] == 12){
									$time[0] = "0"; // turn to 00 if 12 AM
								}
								if($array1[1] == "PM" && $time[0] != 12){
									$time[0] = (string)((int)$time[0] + 12);
								}
								$time_out = $time[0].":".$time[1].":".$time[2]; 
								
								// lunch_out value
								$lunch_out = "";
								$array1 = explode(" ", $worksheet->getCell('D'.$row)->getValue());
								$time = explode(":", $array1[0]);
								if($array1[1] == "AM" && $time[0] == 12){
									$time[0] = "0"; // turn to 00 if 12 AM
								}
								if($array1[1] == "PM" && $time[0] != 12){
									$time[0] = (string)((int)$time[0] + 12);
								}
								$lunch_out = $time[0].":".$time[1].":".$time[2];
								
								// lunch_in value
								$lunch_in = "";
								$array1 = explode(" ", $worksheet->getCell('E'.$row)->getValue());
								$time = explode(":", $array1[0]);
								if($array1[1] == "AM" && $time[0] == 12){
									$time[0] = "0"; // turn to 00 if 12 AM
								}
								if($array1[1] == "PM" && $time[0] != 12){
									$time[0] = (string)((int)$time[0] + 12);
								}
								$lunch_in = $time[0].":".$time[1].":".$time[2];
								
								// break_out value
								$break_out = "";
								$array1 = explode(" ", $worksheet->getCell('F'.$row)->getValue());
								$time = explode(":", $array1[0]);
								if($array1[1] == "AM" && $time[0] == 12){
									$time[0] = "0"; // turn to 00 if 12 AM
								}
								if($array1[1] == "PM" && $time[0] != 12){
									$time[0] = (string)((int)$time[0] + 12);
								}
								$break_out = $time[0].":".$time[1].":".$time[2];
								
								// break_in value
								$break_in = "";
								$array1 = explode(" ", $worksheet->getCell('G'.$row)->getValue());
								$time = explode(":", $array1[0]);
								if($array1[1] == "AM" && $time[0] == 12){
									$time[0] = "0"; // turn to 00 if 12 AM
								}
								if($array1[1] == "PM" && $time[0] != 12){
									$time[0] = (string)((int)$time[0] + 12);
								}
								$break_in = $time[0].":".$time[1].":".$time[2];
							}
						}
					}
						
					$query="Insert into TIMETABLE (TABLEDATE,EMPLOYEENUMBER,MORNINGTIMEIN_REQUEST,AFTERNOONTIMEOUT_REQUEST,LUNCHTIMEOUT_REQUEST,LUNCHTIMEIN_REQUEST,BREAKTIMEOUT_REQUEST,BREAKTIMEIN_REQUEST) 
						    values ('{$date}','{$temp_emp_no}','{$time_in}','{$time_out}','{$lunch_out}','{$lunch_in}','{$break_out}','{$break_in}')";
					$result=mysqli_query($dbc,$query); //insert query into attendance table
				}
			}
		}
	}
}/*End of main Submit conditional*/

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
	<script type="text/javascript">
	function updatePage()
	{
	}
	</script>
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
            <p>HR Manager</p>
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
				<a href="Attendance.php" class="list-group-item active""><span class="glyphicon glyphicon-calendar"></span> Attendance</a>
				
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
        <div class="filldiv">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Attendance</h3>
                            </div>
                            <div class="panel-body">
                              <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
                                		<div class="form-group  col-lg-3">
											<input id="attachment" type="file" name="file" class="file" data-show-preview="false">	
										</div>
										<div class="form-group col-lg-3">										
											<button type="submit" name="submit" class="btn btn-success" value="<?php echo $appNum?>" >Upload</button>
										</div>
							</form>                           	
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
												  <tr>";
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
<script src="//code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
		    $('#example').DataTable();
		} );
	</script>

</div>

</body>

</html>