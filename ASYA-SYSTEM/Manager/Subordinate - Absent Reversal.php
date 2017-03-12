<!DOCTYPE html>
<html lang="en">
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

    <title>Subordinate Absent  Reversal</title>
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
								<a href="Subordinate - Absent Reversal.php" class="list-group-item active">Absent Reversal</a>
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
      		
		<!-- picker and dropdown -->
		<div class="row">
			<div class="col-md-12">
				<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
					<div class="col-md-4">
						Startdate	:
						<input required name="employmentstart" type="text" class="form-control dpd1"   data-date-format="yyyy-mm-dd">				
					</div>
					
					<div class="col-md-4">
						Enddate		: 
						<input required name="employmentstart" type="text" class="form-control dpd1"   data-date-format="yyyy-mm-dd">					
					</div>
					<div>
					</div>



					<div><input type="submit" name="submit" value="Submit"/></div>
				</form>
			</div>
		</div>
		<!-- picker and dropdown end --> 
		
        <!-- Applicants -->
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default" id="applicants-panel">
                    <div class="panel-heading" align="center">
                        <h3 class="panel-title">
						ASYA <br>
						Absent Reversal Request					
						</h3>
                                        </div>
                    <div class="panel-body">
                        <table class="table table-bordered table-hover table-striped">
                            <thead>
                            <tr>
                                <th>Form Number</th>
                                <th>Date Filed</th>
                                <th>Name</th>
                                <th>Department</th>
                                <th>Position</th>
                                <th>Reversal Date</th>
                                <th>Time In</th>
                                <th>Time Out</th>
                                <th>Reversal Time In</th>
                                <th>Reason</th>
								<th></th>																
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>111111</td>
                                <td>2017-02-07</td>
                                <td>Protacio, Rizal</td>
                                <td>Audit</td>
                                <td>Design Manager</td>
                                <td>2017-02-10</td>
                                <td>08:00:00</td>
                                <td>10:00:00</td>								
								<td>08:00:00</td>
                                <td>Health Issues</td>
								<td>
									<div class="col-md-12">
										<input type="submit" name="submit" value="Accept"/>
										<input type="submit" name="submit" value="Reject"/>
									</div>								
								</td>							
                            </tr>
                            <tr>
                                <td>111112</td>
                                <td>2017-02-07</td>
                                <td>Paciano, Rizal</td>
                                <td>Audit</td>
                                <td>HR Manager</td>
                                <td>2017-02-10</td>
                                <td>08:00:00</td>
                                <td>10:00:00</td>								
								<td>08:00:00</td>
                                <td>Health Issues</td>
								<td>
									<div class="col-md-12">
										<input type="submit" name="submit" value="Accept"/>
										<input type="submit" name="submit" value="Reject"/>
									</div>								
								</td>	
                            </tr>                         
                            </tbody>
                        </table>
                    </div>
                    <div class="panel-footer text-right">
						<div class="row" align="center">
						Generated as of: 2017-02-06 20:13:01 </br>
						<b>---END OF REQUEST---</b>
						</div>
                    </div>
                </div>
            </div>
        </div>
       
    </div>

</div>

</body>

</html>