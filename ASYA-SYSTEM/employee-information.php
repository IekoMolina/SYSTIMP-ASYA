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
				for ($row = 7; $row <= 39; $row++){ 

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
        <ul class="nav navbar-nav">
            <li><a href="#employeeInfo">Employee Information</a></li>
            <li><a href="#attendance">Attendance Summary</a></li>
            <li><a href="#leave">Request Summary</a></li>
            <li><a href="#eval">Evaluation Summary</a></li>
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
    <div id="page-content-wrapper">

        <!-- employee information section -->
        <a class="anchor" name="employeeInfo"></a>
        <div class="row filldiv">
            <h2 class="page-title">Employee Information</h2>

            <div class="col-md-2 text-right">
                <h4 class="info-label-text">Last Name:</h4>
                <h4 class="info-label-text">First Name:</h4>
                <h4 class="info-label-text">Middle Name:</h4>
                <h4 class="info-label-text">Department:</h4>
                <h4 class="info-label-text">Position:</h4>
                <h4 class="info-label-text">Date Started:</h4>
                <h4 class="info-label-text">Birthday:</h4>
            </div>
            <div class="col-md-3">
                <h4 class="info-detail-text"><?php echo $lastName?></h4>
                <h4 class="info-detail-text"><?php echo $firstName?></h4>
                <h4 class="info-detail-text"><?php echo $middleName?></h4>
                <h4 class="info-detail-text"><?php echo $deptName?></h4>
                <h4 class="info-detail-text"><?php echo $posName?></h4>
                <h4 class="info-detail-text"><?php echo $startDate?></h4>
                <h4 class="info-detail-text"><?php echo $birthday?></h4>
            </div>
            <div class="col-md-2 text-right">
                <h4 class="info-label-text">Employee No.:</h4>
                <br/><br/><br/><br/><br/>
                <h4 class="info-label-text">Employement Status:</h4>
            </div>
            <div class="col-md-2">
                <h4 class="info-detail-text"><?php echo $employeeNum?></h4>
                <br/><br/><br/><br/><br/>
                <h4 class="info-detail-text two-row-label-h4"><?php echo $statusName?></h4>
            </div>
            <div class="col-md-3">
                <img class="center-block" src="user.jpg" id="user-image">
            </div>
            <div class="col-md-4 employee-info-button">
            <form action="Employee-detailedInformation.php" method="post">
                <button name='empDlink' value=<?php echo $appNum?> class="btn btn-success">More Information</button>
            </form>
            <form action="employees.php" method="post">
               <!--  <button  class="btn btn-default">Previous</button> -->
            </form>
            </div>
        </div>
       
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
			                            <th>Overtime</th>
			                            <th>Undertime</th>							
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
													<td>$employeeNum</td>
													<td></td>									
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

        <!-- leave summary section -->
        <a class="anchor" name="leave"></a>
        <h2 class="page-title">Request Summary</h2>
        <div class="filldiv">
            <div class="row">
                <div class="col-md-12">
				<div class="form-group clearfix">
				 <label class="col-sm-1 control-label">Year</label>
					<div class="col-sm-3">
						<select class="form-control m-bot15" name="year">
							<option>2017</option>
							<option>2016</option>
							<option>2015</option>
							<option>2014</option>
							<option>2013</option>
						</select>
					</div>
				</div>
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                        <tr>
                            <th>Form Code</th>
                            <th>Date Filed</th>
							<td>Purpose</td>
							<td>Status</td>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td><a href="Summary - Overtime.php">OT-000201</td>
                            <td>02/17/2016</td>
							<td>Needed more time for the project</td>
							<td>Waiting for Approval</td>
                        </tr>
                        <tr>
                            <td><a href="Summary - Absent Reversal.php">AR-000158</td>
                            <td>03/14/2016</td>
							<td>Business meeting outside the company</td>
							<td>Accepted</td>
                        </tr>
                        <tr>
                            <td><a href="Summary - Itenerary Authorization.php">IA-000145</td>
                            <td>03/13/2016</td>
							<td>Time is not enough to finish the project</td>
							<td>Rejected</td>
                        </tr>
                        <tr>
                            <td><a href="Summary - Leave.php">LE-000145</td>
                            <td>03/13/2016</td>
							<td>Time is not enough to finish the project</td>
							<td>Rejected</td>
                        </tr>
                        <tr>
                            <td><a href="Summary - Undertime.php">UT-000145</td>
                            <td>03/13/2016</td>
							<td>Time is not enough to finish the project</td>
							<td>Rejected</td>
                        </tr>
                       
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
            <table class="table table-bordered table-hover table-striped">
                <thead>
                <tr>
					<th>Code</th>
                    <th>Type</th>
                    <th>Date</th>
                    <th>Evaluator</th>
					<th>Comments</th>
                </tr>
                </thead>
                <tbody>
                <tr>
					<td><a href="Summary - Evaluation.php">EVAL-001953</td>
                    <td>Annual</td>
                    <td>03/26/2015</td>
					<td>Ana Laid</td>
                    <td>May be candidate for promotion</td>
                </tr>
				<tr>
					<td><a href="Summary - Evaluation.php">EVAL-001632</td>
                    <td>Annual</td>
                    <td>03/26/2014</td>
                    <td>Ana Laid</td>
					<td>Having trouble focusing on work</td>
                </tr>
				<tr>
					<td><a href="Summary - Evaluation.php">EVAL-000957</td>
                    <td>Annual</td>
                    <td>03/26/2013</td>
                    <td>Ana Laid</td>
					<td>Outstanding performance</td>
                </tr>
				 <tr>
					<td><a href="Summary - Evaluation.php">EVAL-000634</td>
                    <td>6 Months</td>
                    <td>09/26/2012</td>
                    <td>Ieko Molina</td>
					<td>Average</td>
                </tr>
				<tr>
					<td><a href="Summary - Evaluation.php">EVAL-000142</td>
                    <td>3 Months</td>
                    <td>06/26/2012</td>
                    <td>Ieko Molina</td>
					<td>Showing promise</td>
                </tr>
                </tbody>
            </table>
			<div class="text-left" style="margin-right: 30px">
				<div class="col-md-2">
					<form action="Employee-evaluation.php" method="post">
						<button name="empElink" class="btn btn-success" value="<?php echo $appNum?>" style="float: left">Evaluate Employee </button>
					</form>
				</div>
				<div class="col-md-2">
					<form action="Report - PerformanceEvaluation.php" method="post" >
						<button name="empPElink" class="btn btn-success" value="<?php echo $appNum?>" style="float: left">Generate Report</button>
					</form>
                </div>
             </div>
        </div>

    </div>


</div>

</body>

</html>