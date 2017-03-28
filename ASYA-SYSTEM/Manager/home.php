<!DOCTYPE html>
<html lang="en">
<?php 
session_start();
require_once('../../mysql_connect.php');
$currentEmployeeNum = $_SESSION['emp_number'];
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
											  <tr>";
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
									<tr>";
	                            }
	                            echo "</form>";
	                            echo "<form action='Subordinate - Itenerary Authorization Detailed.php' method='post'>";
	                            for($i=0;$i<count($irFormNum);$i++)
	                            {
	                            	echo "<tr>
	                            	<td>$irdateFiled[$i]</td>
									<td><button name='link' value='$irFormNum[$i]' style='background-color:white;border:none;color:blue;'>$irnames[$i]</button></td>
									<td>Itinerary Request</td>
	                            	<tr>";
	                            }
	                            echo "</form>";
	                            echo "<form action='Subordinate - Leave Detailed.php' method='post'>";
	                            for($i=0;$i<count($lrFormNum);$i++)
	                            {
	                            	echo "<tr>
	                            	<td>$lrdateFiled[$i]</td>
									<td><button name='link' value='$lrFormNum[$i]' style='background-color:white;border:none;color:blue;'>$lrnames[$i]</button></td>
									<td>Leave Request</td>
	                            	<tr>";
	                            }
	                            echo "</form>";
	                            echo "<form action='Subordinate - Overtime Detailed.php' method='post'>";
	                            for($i=0;$i<count($orFormNum);$i++)
	                            {
	                            	echo "<tr>
	                            	<td>$ordateFiled[$i]</td>
									<td><button name='link' value='$orFormNum[$i]' style='background-color:white;border:none;color:blue;'>$ornames[$i]</button></td>
									<td>Overtime Request</td>
	                            	<tr>";
	                            }
	                            echo "</form>";
	                            echo "<form action='Subordinate - Undertime Detailed.php' method='post'>";
	                            for($i=0;$i<count($urFormNum);$i++)
	                            {
	                            	echo "<tr>
	                           	    <td>$urdateFiled[$i]</td>
									<td><button name='link' value='$urFormNum[$i]' style='background-color:white;border:none;color:blue;'>$urnames[$i]</button></td>
									<td>Undertime Request</td>
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

        </div><!-- table end -->
        
        <!-- attendance summary section -->
        <a class="anchor" name="attendance"></a>
        <h2 class="page-title">Attendance Summary</h2>
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
                            <th>Month</th>
                            <th>Total Absent (Days)</th>
                            <th>Total Halfday (Day)</th>
                            <th>Total Leave (Days)</th>
                            <th>Total Undertime (Days)</th>
                            <th>Total Overtime (Time)</th>
							
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td><a href="Attendance Employee.php">January</a></td>
                            <td>1</td>
                            <td>8</td>
                            <td>2</td>
                            <td>8</td>
                            <td>3</td>
                        </tr>
                        <tr>
                            <td><a href="Attendance Employee.php">February</td>
                            <td>1</td>
                            <td>6</td>
                            <td>7</td>
                            <td>8</td>
                            <td>3</td>
                        </tr>
                        <tr>
                            <td><a href="Attendance Employee.php">March</td>
                            <td>2</td>
                            <td>5</td>
                            <td>8</td>
                            <td>6</td>
                            <td>8</td>
                        </tr>
                        <tr>
                            <td><a href="Attendance Employee.php">April</td>
                            <td>0</td>
                            <td>0</td>
                            <td>8</td>
                            <td>0</td>
                            <td>0</td>
                        </tr>
                        <tr>
                            <td><a href="Attendance Employee.php">May</td>
                            <td>2</td>
                            <td>5</td>
                            <td>0</td>
                            <td>8</td>
                            <td>2</td>
                        </tr>
                        <tr>
                            <td><a href="Attendance Employee.php">June</td>
                            <td>0</td>
                            <td>2</td>
                            <td>0</td>
                            <td>1</td>
                            <td>8</td>
                        </tr>
                        <tr>
                            <td><a href="Attendance Employee.php">July</td>
                            <td>0</td>
                            <td>0</td>
                            <td>8</td>
                            <td>0</td>
                            <td>0</td>
                        </tr>
                        <tr>
                            <td><a href="Attendance Employee.php">August</td>
                            <td>0</td>
                            <td>0</td>
                            <td>8</td>
                            <td>0</td>
                            <td>0</td>
                        </tr>
                        <tr>
                            <td><a href="Attendance Employee.php">September</td>
                            <td>1</td>
                            <td>2</td>
                            <td>0</td>
                            <td>8</td>
                            <td>0</td>
                        </tr>
                        <tr>
                            <td><a href="Attendance Employee.php">October</td>
                            <td>1</td>
                            <td>2</td>
                            <td>5</td>
                            <td>8</td>
                            <td>3</td>
                        </tr>
                        <tr>
                            <td><a href="Attendance Employee.php">November</td>
                            <td>0</td>
                            <td>1</td>
                            <td>1</td>
                            <td>8</td>
                            <td>4</td>
                        </tr>
                        <tr>
                            <td><a href="Attendance Employee.php">December</td>
                            <td>2</td>
                            <td>8</td>
                            <td>4</td>
                            <td>2</td>
                            <td>3</td>
                        </tr>
                        </tbody>
                    </table>
					
					 <div class="text-right" style="margin-right: 30px">
                    <a href="#"><span class="glyphicon glyphicon-print"> Print</span></a>
                </div>
				
					
                </div>
				
				<div class="col-md-6">
				
					
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
                        <tr>
                            <td><a href="Summary - Change Record.php">CR-000145</td>
                            <td>03/13/2016</td>
							<td>Typo on some info</td>
							<td>Rejected</td>
                        </tr>
						 <tr>
                            <td><a href="Summary - Resignation.php">RN-000145</td>
                            <td>03/13/2016</td>
							<td>Not contented with the job</td>
							<td>Rejected</td>
                        </tr>
						 <tr>
                            <td><a href="Summary - Manpower.php">MP-000145</td>
                            <td>03/13/2016</td>
							<td>Need more people for the project</td>
							<td>Accepted</td>
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
					<th>Comments</th>
                </tr>
                </thead>
                <tbody>
                <tr>
					<td><a href="Summary - Evaluation.php">EVAL-001953</td>
                    <td>Annual</td>
                    <td>03/26/2015</td>
                    <td>May be candidate for promotion</td>
                </tr>
				<tr>
					<td><a href="Summary - Evaluation.php">EVAL-001632</td>
                    <td>Annual</td>
                    <td>03/26/2014</td>
					<td>Having trouble focusing on work</td>
                </tr>
				<tr>
					<td><a href="Summary - Evaluation.php">EVAL-000957</td>
                    <td>Annual</td>
                    <td>03/26/2013</td>
					<td>Outstanding performance</td>
                </tr>
				 <tr>
					<td><a href="Summary - Evaluation.php">EVAL-000634</td>
                    <td>6 Months</td>
                    <td>09/26/2012</td>
					<td>Average</td>
                </tr>
				<tr>
					<td><a href="Summary - Evaluation.php">EVAL-000142</td>
                    <td>3 Months</td>
                    <td>06/26/2012</td>
					<td>Showing promise</td>
                </tr>
                </tbody>
            </table>
			<div class="text-right" style="margin-right: 30px">
                    <a href="#"><span class="glyphicon glyphicon-print"> Print</span></a>
                </div>
        </div>
		
    </div>
    
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