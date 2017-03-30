<!DOCTYPE html>
<html lang="en">
<?php 
session_start();
require_once('../../mysql_connect.php');
$appNum= $_SESSION['emp_appno'];
$status = 9991;
$currentDate = date('Y-m-d');

// get user info
$queryForInfo="SELECT *
FROM applicants a JOIN employees e ON a.APPNO = e.APPNO
WHERE a.APPNO = '{$appNum}'";
$resultNames=mysqli_query($dbc,$queryForInfo);
$rows=mysqli_fetch_array($resultNames,MYSQLI_ASSOC);
$appFirstName = $rows['FIRSTNAME'];
$appLastName = $rows['LASTNAME'];
$appPosition = $rows['APPPOSITION'];
$employeeNum = $rows['EMPLOYEENUMBER'];

//Position
$queryForActualPosition="SELECT 	*
							FROM 	emp_positions";
$resultP=mysqli_query($dbc,$queryForActualPosition);
while($rows=mysqli_fetch_array($resultP,MYSQLI_ASSOC))
{
	$actualPos[] = $rows['EPOSITION'];
	$codePos[] = $rows['POSITION'];
}

$queryForActualDepartment="SELECT 	*
							FROM 	emp_dept";
$resultD=mysqli_query($dbc,$queryForActualDepartment);
while($rows=mysqli_fetch_array($resultD,MYSQLI_ASSOC))
{
	$actualDept[] = $rows['EDEPT'];
	$codeDept[] = $rows['DEPT'];
}


if (isset($_POST['submit'])){
	$message=NULL;
	
	if (empty($_POST['position'])){
		$position=NULL;
		$message.='<p>You forgot to enter the time reversal!';
	}else
		$position=$_POST['position'];	
	
	if (empty($_POST['department'])){
		$department=NULL;
		$message.='<p>You forgot to enter the time reversal!';
	}else
		$department=$_POST['department'];
	
	if (empty($_POST['dateneeded'])){
		$dateneeded=NULL;
		$message.='<p>You forgot to enter the time reversal!';
	}else
		$dateneeded=$_POST['dateneeded'];
	
	if (empty($_POST['agebracketstart'])){
		$agebracketstart=NULL;
		$message.='<p>You forgot to enter the time reversal!';
	}else
		$agebracketstart=$_POST['agebracketstart'];
	
	if (empty($_POST['agebracketend'])){
		$agebracketend=NULL;
		$message.='<p>You forgot to enter the time reversal!';
	}else
		$agebracketend=$_POST['agebracketend'];
	
	if (empty($_POST['education'])){
		$education=NULL;
		$message.='<p>You forgot to enter the time reversal!';
	}else
		$education=$_POST['education'];
	
	if (empty($_POST['description'])){
		$description=NULL;
		$message.='<p>You forgot to enter the time reversal!';
	}else
		$description=$_POST['description'];
	
	if (empty($_POST['reason'])){
		$reason=NULL;
		$message.='<p>You forgot to enter the time reversal!';
	}else
		$reason=$_POST['reason'];	
		 									 
	if(!isset($message))
		{
		require_once('../../mysql_connect.php');
		$query="insert into manpower (EMPLOYEENUMBER,DATE,REASON,STATUS,EDUCATION,AGESTART,AGEEND,JOBDESCRIPTION,POSITION,DEPARTMENT,DATENEEDED)
	  	 values 	('{$employeeNum}','{$currentDate}','{$reason}','{$status}','{$education}','{$agebracketstart}','{$agebracketend}','{$description}','{$position}','{$department}','{$dateneeded}')";
		$result=mysqli_query($dbc,$query);
		//echo $employeeNum.$currentDate.$reason.$status.$education.$agebracketstart.$agebracketend.$description.$position.$department.$dateneeded;
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

    <title>Manpower Form</title>
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
            <p>Department Manager</p>
        </div>

        <div class="sidebar-nav">

            <div class="list-group root">

				  <!-- home -->
                <a href="home.php" class="list-group-item"><span class="glyphicon glyphicon-home"></span> Home</a>
			
				<!-- employee info -->
                <a href="Employee info.php" class="list-group-item"><span class="glyphicon glyphicon-user"></span> Employee</a>
				
                <!-- reports -->
                <a href="#request-items" class="list-group-item active" data-toggle="collapse" data-parent=".sidebar-nav">
                    <span class="glyphicon glyphicon-list-alt"></span> Request <span class="caret"></span>
                </a>
                <!-- request items -->
                <div class="list-group collapse" id="request-items">

                    <!-- FORMS -->
                        <a href="Form - Absent Reversal.php" class="list-group-item">Absent Reversal</a>
						<a href="Form - Change Record.php" class="list-group-item">Change Record</a>
						<a href="Form - Itenerary Authorization.php" class="list-group-item">Itinerary Authorization</a>
						<a href="Form - Leave.php" class="list-group-item">Leave</a>
                        <a href="Form - Manpower.php" class="list-group-item active">Manpower</a>
                        <a href="Form - Overtime.php" class="list-group-item">Overtime</a>
                        <a href="Form - Resignation.php" class="list-group-item">Resignation</a>
                        <a href="Form - Undertime.php" class="list-group-item">Undertime</a>
                   
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
								<a href="Subordinate - Change Record.php" class="list-group-item">Change Record</a>
								<a href="Subordinate - Itenerary Authorization.php" class="list-group-item">Itinerary Authorization</a>
								<a href="Subordinate - Leave.php" class="list-group-item">Leave</a>
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

        <h2 class="page-title">Manpower Form</h2>

        <div class="row">
                  <div class="col-lg-12">
                      <!--progress bar start-->
                      <section class="panel">
                          <div class="panel-body">
                              <form id="wizard-validation-form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                  <div>                                  
                                      <section>                                        		
										<div class="form-group clearfix">																							
											 <label class="col-sm-1 control-label">Position</label>
												<div class="col-sm-3">
													  <select class="form-control m-bot15" name="position">
														<?php  
															for ($x=0;$actualPos[$x]!=NULL;$x++)
															{
																echo '<option value='.$codePos[$x].'>'.$actualPos[$x].'</option>';
															}
														?>												  
													  </select>	
												</div>
												
											 <label class="col-sm-1 control-label">Department</label>
												<div class="col-sm-3">
													  <select class="form-control m-bot15" name="department">
														<?php  
															for ($x=0;$actualDept[$x]!=NULL;$x++)
															{
																echo '<option value='.$codeDept[$x].'>'.$actualDept[$x].'</option>';
															}
														?>												  
													  </select>	
												</div>																																														 																							
										</div>
										
										<div class="form-group clearfix">
											<label class="col-sm-1 control-label">Date Needed</label>
												<div class="col-sm-3">
													<input type="date" name="dateneeded" class="form-control">
												</div>	
												
											<label class="col-sm-1 control-label">Age Bracket</label>
												<div class="col-sm-2">
													<input type="number" name="agebracketstart" class="form-control">
												</div>
											
												<div class="col-sm-2">
													<input type="number" name="agebracketend" class="form-control">
												</div>																							
										</div>
										
										<div class="form-group clearfix">
											<label class="col-sm-1 control-label">Education</label>
												<div class="col-sm-6">
													  <select class="form-control m-bot15" name="education">
														<option value="Elementary">Elementary</option>
														<option value="Highschool">Highschool</option>
														<option value="College">College</option>
														<option value="Tertiary">Tertiary</option>												  
													  </select>
												</div>
										</div>										

										<div class="form-group clearfix">
											<label class="col-sm-1 control-label">Job Description</label>
												<div class="col-sm-6">
													<input type="text" name="description" class="form-control">
												</div>
										</div>
																				
										<div class="form-group clearfix">
											<label class="col-sm-1 control-label">Reason for Request</label>
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
												<button class="btn btn-success" type="submit" name="submit" onclick="myFunction()">Submit</button>
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
            </div>
        </div>
    </div>
	 <script>
	function myFunction() {
	    var x;
	    if (confirm("Request Sent!") == true) {
	        window.location.href="home.php";
	    } else {
	        x = "You pressed Cancel!";
	    }
	}
	</script> 
</div>

</body>

</html>