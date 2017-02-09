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

    <title>Absent Reversal Form</title>
</head>
<body>

<!-- navbar -->
<div class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="Home - Employee.php"><img src="asyalogo.jpg" /> </a>
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
                <a href="Home - Employee.php" class="list-group-item"><span class="glyphicon glyphicon-home"></span> Home</a>
			
                <!-- reports -->
                <a href="#report-items" class="list-group-item active" data-toggle="collapse" data-parent=".sidebar-nav">
                    <span class="glyphicon glyphicon-list-alt"></span> Request <span class="caret"></span>
                </a>
                <!-- report items -->
                <div class="list-group collapse" id="report-items">

                    <!-- FORMS -->
                   <a href="#attendance-reports" class="list-group-item" data-toggle="collapse">
                        <a href="Form - Absent Reversal.php" class="list-group-item active">Absent Reversal</a>
						<a href="Form - Itenerary Authorization.php" class="list-group-item">Itenerary Authorization</a>
						<a href="Form - Leave.php" class="list-group-item">Leave</a>
                        <a href="Form - Overtime.php" class="list-group-item">Overtime</a>
                    </a>
                   
                </div>

                <a href="#" class="list-group-item"><span class="glyphicon glyphicon-info-sign"></span> About</a>
            </div>
        </div>

    </div>

    <!-- insert page content here -->
    <div id="page-content-wrapper">

        <h2 class="page-title">Absent Reversal Form</h2>

         <div class="row">
                  <div class="col-lg-12">
                      <!--progress bar start-->
                      <section class="panel">
                          <div class="panel-body">
                              <form id="wizard-validation-form" action="#">
                                  <div>
                                    
                                      <section>                                        		
										<div class="form-group clearfix">
											
												
											 <label class="col-sm-1 control-label">Date</label>
												<div class="col-sm-2">
													<input type="date" required name="lastname" class="form-control">
												</div>
										</div>
																																			
										<div class="form-group clearfix">
											<label class="col-sm-1 control-label">Morning In</label>
												<div class="col-sm-2">
													<input type="time" required name="firstname" class="form-control">
												</div>
												
											 <label class="col-sm-1 control-label">Lunch Out</label>
												<div class="col-sm-2">
													<input type="time" required name="lastname" class="form-control">
												</div>
												
											<label class="col-sm-1 control-label">Lunch In</label>
												<div class="col-sm-2">
													<input type="time" required name="lastname" class="form-control">
												</div>
										</div>
										
										<div class="form-group clearfix">
											<label class="col-sm-1 control-label">Break Out</label>
												<div class="col-sm-2">
													<input type="time" required name="firstname" class="form-control">
												</div>
												
											 <label class="col-sm-1 control-label">Break In</label>
												<div class="col-sm-2">
													<input type="time" required name="lastname" class="form-control">
												</div>
												
											<label class="col-sm-1 control-label">Afternoon Out</label>
												<div class="col-sm-2">
													<input type="time" required name="lastname" class="form-control">
												</div>
										</div>
										
										<div class="form-group clearfix">
											<label class="col-sm-1 control-label">Reason</label>
												<div class="col-sm-6">
													<input type="text" required name="firstname" class="form-control">
												</div>
												
										</div>
																												
                                    
                                          <div class="form-group clearfix">
                                              <div class="col-lg-12">
                                                  <input id="acceptTerms" name="acceptTerms" type="checkbox" class="required">
                                                  <label for="acceptTerms">I hereby certify that the information privided is correct. Any falsification of information in this regard may form ground for disciplinary action.</label>
                                              </div>
                                          </div>

										  
										 <div class="col-md-2 employee-info-button">
												<a href="Home - Employee.php" class="btn btn-default">Confirm</a>
											</div>
											
											<div class="col-md-2 employee-info-button">
												<a href="Home - Employee.php" class="btn btn-default">Cancel</a>
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