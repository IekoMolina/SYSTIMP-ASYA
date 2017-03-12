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
    <div id="page-content-wrapper">

        <h2 class="page-title">Manpower Form</h2>

        <div class="row">
                  <div class="col-lg-12">
                      <!--progress bar start-->
                      <section class="panel">
                          <div class="panel-body">
                              <form id="wizard-validation-form" action="#">
                                  <div>
                                    
                                      <section>                                        		
										<div class="form-group clearfix">
											
												
											 <label class="col-sm-1 control-label">Job Title</label>
												<div class="col-sm-3">
													<input type="text" name="jobtitle" class="form-control">
												</div>
												
											<label class="col-sm-1 control-label">Age Bracket</label>
												<div class="col-sm-1">
													<input type="text" name="agebracketstart" class="form-control">
												</div>
											
												<div class="col-sm-1">
													<input type="text" name="agebracketend" class="form-control">
												</div>
												
												 <label class="col-sm-1 control-label">Gender</label>
												<div class="col-sm-2">
													<select class="form-control m-bot15" name="selectname">
																				<option>Choose One</option>
																				<option>Male</option>
																				<option>Female</option>
														 </select>
												</div>
											 
												
											
										</div>
										
										<div class="form-group clearfix">
											<label class="col-sm-1 control-label">Date Needed</label>
												<div class="col-sm-3">
													<input type="date" name="civilstatus" class="form-control">
												</div>
												
											<label class="col-sm-1 control-label">Civil Status</label>
												<div class="col-sm-2">
													<input type="text" name="civilstatus" class="form-control">
												</div>
										</div>
										
										<div class="form-group clearfix">
											<label class="col-sm-1 control-label">Education</label>
												<div class="col-sm-6">
													<input type="text" name="requirements" class="form-control">
												</div>
										</div>
										
										<div class="form-group clearfix">
											<label class="col-sm-1 control-label">Experience</label>
												<div class="col-sm-6">
													<input type="text" name="experience" class="form-control">
												</div>
										</div>
										
										<div class="form-group clearfix">
											<label class="col-sm-1 control-label">Others</label>
												<div class="col-sm-6">
													<input type="text" required name="others" class="form-control">
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
												<a href="home.php" class="btn btn-default">Submit</a>
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