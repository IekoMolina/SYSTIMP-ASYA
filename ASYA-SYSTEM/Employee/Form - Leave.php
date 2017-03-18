<!DOCTYPE html>
<html lang="en">
<?php 
session_start();
require_once('../../mysql_connect.php');
$appNum= $_SESSION['emp_appno'];
$status = 9991;
$currentDate = date('Y-m-d');

// get user info
$queryForInfo="	  SELECT 	*
					FROM 	applicants a JOIN employees e ON a.APPNO = e.APPNO
					WHERE 	a.APPNO = '{$appNum}'";
$resultNames=mysqli_query($dbc,$queryForInfo);
$rows=mysqli_fetch_array($resultNames,MYSQLI_ASSOC);
$appFirstName = $rows['FIRSTNAME'];
$appLastName = $rows['LASTNAME'];
$appPosition = $rows['APPPOSITION'];
$employeeNum = $rows['EMPLOYEENUMBER'];
$leavesRemaining = $rows['LEAVESREMAINING'];
//Position
$queryForActualPosition="SELECT 	*
							FROM 	emp_positions";
$resultP=mysqli_query($dbc,$queryForActualPosition);
while($rows=mysqli_fetch_array($resultP,MYSQLI_ASSOC))
{
	$actualPos[] = $rows['EPOSITION'];
	$codePos[] = $rows['POSITION'];
}
//Position
$queryForActualLeave="	  SELECT 	*
							FROM 	typeofleave";
$resultL=mysqli_query($dbc,$queryForActualLeave);
while($rows=mysqli_fetch_array($resultL,MYSQLI_ASSOC))
{
	$actualL[] = $rows['TYPEOFLEAVE'];
	$codeL[] = $rows['TYPEID'];
}

if (isset($_POST['submit'])){
	$message=NULL;
		
	if (empty($_POST['leavetype'])){
		$leavetype=NULL;
		$message.='<p>You forgot to enter the time reversal!';
	}else
		$leavetype=$_POST['leavetype'];
	
	if (empty($_POST['startDate'])){
		$startDate=NULL;
		$message.='<p>You forgot to enter the time reversal!';
	}else
		$startDate=$_POST['startDate'];
	
	if (empty($_POST['endDate'])){
		$endDate=NULL;
		$message.='<p>You forgot to enter the time reversal!';
	}else
		$endDate=$_POST['endDate'];
	
	if (empty($_POST['reason'])){
		$reason=NULL;
		$message.='<p>You forgot to enter the time reversal!';
	}else
		$reason=$_POST['reason'];	
		 									 
	if(!isset($message))
		{
		require_once('../../mysql_connect.php');
		$query="insert into leaverequests (EMPLOYEENUMBER,DATE,REASON,STATUS,LEAVETYPE,LEAVEFROM,LEAVETO)
	  	 values 	('{$employeeNum}','{$currentDate}','{$reason}','{$status}','{$leavetype}','{$startDate}','{$endDate}')";
		$result=mysqli_query($dbc,$query);
		echo "<div class='alert alert-success'>
  		<strong>Success!</strong> Request Sent!
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
    <link rel="stylesheet" href="css/custom-theme.css">
    <link rel="stylesheet" href="css/custom.css">

    <title>Leave Form</title>
</head>
<body>

<!-- navbar -->
<div class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="home.html"><img src="asyalogo.jpg" /> </a>
        </div>
        <!-- right side stuffs -->
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
                <a href="#report-items" class="list-group-item active" data-toggle="collapse" data-parent=".sidebar-nav">
                    <span class="glyphicon glyphicon-list-alt"></span> Request <span class="caret"></span>
                </a>
                <!-- report items -->
                <div class="list-group collapse" id="report-items">

                    <!-- FORMS -->
                    <a href="#attendance-reports" class="list-group-item" data-toggle="collapse">
                        <a href="Form - Absent Reversal.php" class="list-group-item">Absent Reversal</a>
						<a href="Form - Change Record.php" class="list-group-item">Change Record</a>
						<a href="Form - Itenerary Authorization.php" class="list-group-item ">Itinerary Authorization</a>
						<a href="Form - Leave.php" class="list-group-item active">Leave</a>
                        <a href="Form - Overtime.php" class="list-group-item">Overtime</a>
                        <a href="Form - Resignation.php" class="list-group-item">Resignation</a>
                        <a href="Form - Undertime.php" class="list-group-item">Undertime</a>
                    </a>
                   
                </div>

                <a href="#" class="list-group-item"><span class="glyphicon glyphicon-info-sign"></span>About</a>
            </div>
        </div>

    </div>

    <!-- insert page content here -->
    <div id="page-content-wrapper">

        <h2 class="page-title">Leave Form</h2>

         <div class="row">
                  <div class="col-lg-12">
                      <!--progress bar start-->
                      <section class="panel">
                          <div class="panel-body">
                              <form id="wizard-validation-form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                  <div>
                                    
                                      <section>                                        		
										<div class="form-group clearfix">
											 <label class="col-sm-1 control-label">Leave Type</label>
												<div class="col-sm-3">
													<select class="form-control m-bot15" name="leavetype">
														<?php  
															for ($x=0;$actualL[$x]!=NULL;$x++)
															{
																echo '<option value='.$codeL[$x].'>'.$actualL[$x].'</option>';
															}
														?>	
														 </select>
												</div>
												
											 <label class="col-sm-1 control-label">Available Leaves</label>
												<div class="col-sm-2">
													<?php echo $leavesRemaining?>
												</div>
										</div>
																																			
										<div class="form-group clearfix">
											<label class="col-sm-1 control-label">Start Date</label>
												<div class="col-sm-3">
													<input type="date" required name="startDate" class="form-control">
												</div>
												
											 <label class="col-sm-1 control-label">End Date</label>
												<div class="col-sm-3">
													<input type="date" required name="endDate" class="form-control">
												</div>
										</div>
										
										
										
										<div class="form-group clearfix">
											<label class="col-sm-1 control-label">Reason</label>
												<div class="col-sm-6">
													<input type="text" required name="reason" class="form-control">
												</div>
												
										</div>
																												
                                    
                                          <div class="form-group clearfix">
                                              <div class="col-lg-12">
                                                  <input id="acceptTerms" name="acceptTerms" type="checkbox" class="required">
                                                  <label for="acceptTerms">I hereby certify that the information provided is correct. Any falsification of information in this regard may form ground for disciplinary action.</label>
                                              </div>
                                          </div>

										  
										 <div class="col-md-2 employee-info-button">
												<button class="btn btn-success" type="submit" name="submit">Submit</button>
											</div>
											
											<div class="col-md-2 employee-info-button">
												<a href="home.php" class="btn btn-default">Cancel</a>
											</div>
                                      </section>
                                  </div>
                              </form>
                          </div>
                      </section>
                  </div>
              </div>

            <div class="text-right" style="margin-right: 30px">
                <a href="#"><span class="glyphicon glyphicon-print"> Print</span></a>
            </div>
        </div>
    </div>

</div>

</body>

</html>