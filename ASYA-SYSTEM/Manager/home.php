<!DOCTYPE html>
<html lang="en">
<?php 
session_start();
require_once('../../mysql_connect.php');
$appNum= $_SESSION['emp_appno'];
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
		
		
		    <!-- home section -->
        <a class="anchor" name="welcome"></a>
        <h2 class="page-title">Welcome</h2>
        <h4>Luis  Secades</h4>
        <div class="filldiv">
            <div class="col-md-2 text-right">
                <h5 class="info-label-text">Leaves Used:</h5>
                <h5 class="info-label-text">Total Leaves:</h5>
				<br>
                <h5 class="info-label-text"><a href="www.gmail.com">E-mail</h5>
				<br>
				
            </div>
            <div class="col-md-3">
                <h5 class="info-detail-text">2</h5>
                <h5 class="info-detail-text">5</h5>
				<br>
            </div>

        </div>
       

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
            </table>
			<div class="text-right" style="margin-right: 30px">
                    <a href="#"><span class="glyphicon glyphicon-print"> Print</span></a>
                </div>
        </div>
		
    </div>
	

</div>

</body>

</html>