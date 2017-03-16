<!DOCTYPE html>
<html lang="en">
<?php 
session_start();
require_once('../mysql_connect.php');
$currentEmployeeNum = $_SESSION['emp_number'];
if(isset($_POST['link'])){
	$formNum = $_POST['link'];
}
if(isset($_POST['submit'])){
	$formNum = $_POST['submit'];
}
$currentDate = date('Y-m-d');
$inactiveStatus = 9002;
//Getting Employees who has pending absent reversal
$queryForEmployees="SELECT 	*
							FROM 	APPLICANTS A JOIN 	EMPLOYEES E ON A.APPNO = E.APPNO
												 JOIN	RESIGNATION R ON E.EMPLOYEENUMBER = R.EMPLOYEENUMBER
						   WHERE 	R.FORMNUMBER = '{$formNum}'";
$result=mysqli_query($dbc,$queryForEmployees);
$rows=mysqli_fetch_array($result,MYSQLI_ASSOC);
$names = $rows['FIRSTNAME'].' '.$rows['LASTNAME'];
$dateFiled = $rows['DATE'];
$dateReversal = $rows['TABLEDATE'];
$reason = $rows['REASON'];
$empNum = $rows['EMPLOYEENUMBER'];
$position = $rows['ACTUALPOSITION'];

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
$positionName = "";
for ($x=0;$x<count($actualPos);$x++)
{
	if($position==$codePos[$x])
	{
		$positionName = $actualPos[$x];
	}
}

if (isset($_POST['submit'])){
	$message=NULL;

	if (empty($_POST['HRremarks'])){
		$remarks=NULL;
		$message.='<p>You forgot to enter the time reversal!';
	}else
		$remarks=$_POST['HRremarks'];
		 									 
if(!isset($message)){
require_once('../mysql_connect.php');
$query="UPDATE 	resignation
		   SET	HRREMARKS = '{$remarks}', HRAPPROVERID = '{$currentEmployeeNum}', HRAPPROVEDDATE = '{$currentDate}'
		 WHERE	FORMNUMBER = '{$formNum}' ";
$result=mysqli_query($dbc,$query);

$query1="UPDATE 	employees
			SET		STATUS = '{$inactiveStatus}'
		  WHERE		EMPLOYEENUMBER = '{$empNum}'";
$result1=mysqli_query($dbc,$query1);
echo "<div class='alert alert-success'>
  		<strong>Success!</strong> Timetable Updated!
	</div>";
									}
}

if (isset($message)){
	echo '<font color="red">'.$message. '</font>';
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
		
    <title>Resignation Request</title>
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
                        <a href="AbsentReversalRequest.php" class="list-group-item active"> &#x25cf Absent Reversal</a>
                        <a href="ItineraryAuthorizationRequest.php" class="list-group-item">&#x25cf Itinerary Authorization</a>					
                </div>				
				
                <a href="#" class="list-group-item"><span class="glyphicon glyphicon-info-sign"></span> About</a>
            </div>
        </div>

    </div>

    <!-- insert page content here -->
    <div id="page-content-wrapper">
        <h2 class="page-title">Detailed Resignation</h2>
         <div class="row">
                  <div class="col-lg-12">
                      <!--progress bar start-->
                      <section class="panel">
                          <div class="panel-body">
                              <form id="wizard-validation-form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                  <div>                                    
                                      <section>     
                                      <h4></h4>                                   		
										<div class="form-group clearfix">	
											<label class="col-sm-1 control-label">Name</label>
											<div class="col-sm-2">
											<?php echo $names?>
											</div>																																
											<label class="col-sm-1 control-label">Position</label>
											<div class="col-sm-2">
											<?php echo $positionName?>
											</div>
										</div>
										<br>
										<div class="form-group clearfix">	
											<label class="col-sm-1 control-label">Date Filed</label>
											<div class="col-sm-2">
											<?php echo $dateFiled?>
											</div>																																
										</div>																																			
										<br>
										<div class="form-group clearfix">
											<label class="col-sm-1 control-label">Reason</label>
												<div class="col-sm-6">
												<?php echo $reason?>
												</div>											
										</div>
																														
										<div class="form-group clearfix">
											<label class="col-sm-1 control-label">HR Manager Remarks</label>
												<div class="col-sm-6">
													<input type="text" name="HRremarks" class="form-control">
												</div>											
										</div>
																																						  
										 	<div class="col-md-2">
												<button class="btn btn-success" type="submit" name="submit" value="<?php echo $formNum?>">Approve</button>
											</div>
										

											<div class="col-md-2">
												<button class="btn btn-danger"  name="reject" >Reject</button>
											</div>
                                      </section>
                                  </div>
                              </form>
                          </div>
                      </section>
                  </div>
              </div>     
    </div>

</div>

</body>

</html>