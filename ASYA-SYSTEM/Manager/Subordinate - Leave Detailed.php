<!DOCTYPE html>
<html lang="en">
<?php 
session_start();
require_once('../../mysql_connect.php');
$currentEmployeeNum = $_SESSION['emp_number'];
if(isset($_POST['link'])){
	$formNum = $_POST['link'];
}
if(isset($_POST['submit'])){
	$formNum = $_POST['submit'];
}
$currentDate = date('Y-m-d');
//Getting Employees who has pending absent reversal
$queryForEmployees="SELECT 	*
							FROM 	APPLICANTS A JOIN 	EMPLOYEES E ON A.APPNO = E.APPNO
												 JOIN	LEAVEREQUESTS LQ ON E.EMPLOYEENUMBER = LQ.EMPLOYEENUMBER
						   WHERE 	LQ.FORMNUMBER = '{$formNum}'";
$result=mysqli_query($dbc,$queryForEmployees);
$rows=mysqli_fetch_array($result,MYSQLI_ASSOC);
$names = $rows['FIRSTNAME'].' '.$rows['LASTNAME'];
$position = $rows['ACTUALPOSITION'];
$dateFiled = $rows['DATE'];
$reason = $rows['REASON'];
$startDate = $rows['LEAVEFROM'];
$endDate = $rows['LEAVETO'];
$availableLeaves = $rows['LEAVESREMAINING'];
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

	if (empty($_POST['remarks'])){
		$remarks=NULL;
		$message.='<p>You forgot to enter the time reversal!';
	}else
		$remarks=$_POST['remarks'];
		 									 
if(!isset($message)){
require_once('../../mysql_connect.php');
$query="UPDATE 	leaverequests
		   SET	DMREMARKS = '{$remarks}', DMAPPROVERID = '{$currentEmployeeNum}', DMAPPROVEDDATE = '{$currentDate}'
		 WHERE	FORMNUMBER = '{$formNum}' ";
$result=mysqli_query($dbc,$query);
echo "<div class='alert alert-success'>
  		<strong>Success!</strong> Request Updated!
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

    <!--custom css-->
    <link rel="stylesheet" href="css/custom.css">
    <link rel="stylesheet" href="css/custom-theme.css">

    <title>Subordinate Leave</title>
</head>
<body>

<!-- navbar -->
<div class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="home.html"><img src="asyalogo.jpg" /> </a>
        </div>
 
        <ul class="nav navbar-nav navbar-right">
            <li><a href="#"><span class="glyphicon glyphicon-envelope"></span></a></li>
            <li><a href="#"><span class="glyphicon glyphicon-calendar"></span></a></li>
            <li><a href="login.html">Logout</a></li>
        </ul>
    </div>
</div>

<div id="wrapper" class="container-fluid">

    <!-- Sidebar -->
    <div id="sidebar-wrapper" class="col-md-2">

        <div id="user-account">
            <h3>Welcome!</h3>
            <img class="img-circle img-responsive center-block" src="user.jpg" id="user-icon">
            <p>Luis Secades</p>
        </div>

       <div class="sidebar-nav">

            <div class="list-group root">

				  <!-- home -->
                <a href="home.php" class="list-group-item"><span class="glyphicon glyphicon-home"></span> Home</a>
			
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
                </div>
				
				 <!-- subordinate -->
                <a href="#sub-items" class="list-group-item active" data-toggle="collapse" data-parent=".sidebar-nav">
                    <span class="glyphicon glyphicon-list-alt"></span> Subordinates <span class="caret"></span>
                </a>
                <!-- subordinate items -->
                <div class="list-group collapse" id="sub-items">

                    <!-- FORMS -->
					
						<a href="Subordinate - Evaluation.php" class="list-group-item">Evaluation</a>
					
						 <a href="#penreq-items" class="list-group-item active" data-toggle="collapse" data-parent=".sidebar-nav">
						<span class="glyphicon glyphicon-list-alt"></span> 	Request <span class="caret"></span>
						
                    </a>
                </div>
				
						<!-- request items -->
						<div class="list-group collapse" id="penreq-items">

							<!-- FORMS -->
								<a href="Subordinate - Absent Reversal.php" class="list-group-item">Absent Reversal</a>
								<a href="Subordinate - Change Record.php" class="list-group-item">Change Record</a>
								<a href="Subordinate - Itenerary Authorization.php" class="list-group-item">Itinerary Authorization</a>
								<a href="Subordinate - Leave.php" class="list-group-item active">Leave</a>
								<a href="Subordinate - Overtime.php" class="list-group-item">Overtime</a>
								<a href="Subordinate - Resignation.php" class="list-group-item">Resignation</a>
								<a href="Subordinate - Undertime.php" class="list-group-item">Undertime</a>
							</a>
						   
						</div>
						
				
                <a href="#" class="list-group-item"><span class="glyphicon glyphicon-info-sign"></span> About</a>
            </div>
        </div>

    </div>

    <!-- insert page content here -->
    <div id="page-content-wrapper">
        <h2 class="page-title">Detailed Leave</h2>
         <div class="row">
                  <div class="col-lg-12">
                      <!--progress bar start-->
                      <section class="panel">
                          <div class="panel-body">
                              <form id="wizard-validation-form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                  <div>                                    
                                      <section>                                        		
										<div class="form-group clearfix">	
											<label class="col-sm-1 control-label">Name</label>
											<div class="col-sm-2">
											<?php echo $names?>
											</div>																																
											<label class="col-sm-1 control-label">Position</label>
											<div class="col-sm-2">
											<?php echo $positionName?>
											</div>
											<label class="col-sm-1 control-label">Date Filed</label>
											<div class="col-sm-2">
											<?php echo $dateFiled?>
											</div>											
										</div>
										<br>	
										<div class="form-group clearfix">	
											<label class="col-sm-1 control-label">Start Date</label>
											<div class="col-sm-2">
											<?php echo $startDate?>
											</div>																																
											<label class="col-sm-1 control-label">End Date</label>
											<div class="col-sm-2">
											<?php echo $endDate?>
											</div>
											<label class="col-sm-1 control-label">Available Leaves</label>
											<div class="col-sm-2">
											<?php echo $availableLeaves?>
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
											<label class="col-sm-1 control-label">Department Head Remarks</label>
												<div class="col-sm-6">
													<input type="text" name="remarks" class="form-control">
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

            <div class="text-right" style="margin-right: 30px">
            </div>
        </div>

</div>

</body>

</html>