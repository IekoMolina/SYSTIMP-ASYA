<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Applicant Screen</title>

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
     <!--right slidebar-->
     <link href="css/slidebars.css" rel="stylesheet">

      <!--Form Wizard-->
      <link rel="stylesheet" type="text/css" href="css/jquery.steps.css" />
    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>

    <!-- Plugin CSS -->
    <link href="vendor/magnific-popup/magnific-popup.css" rel="stylesheet">

    <!-- Theme CSS -->
    <link href="css/creative.min.css" rel="stylesheet">

	
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body id="page-top">

    <nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                </button>
		<a class="navbar-brand" href="ApplicantScreen.php"><img src="asyalogo.png" /> </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <header>
        <div class="header-content">
            <div class="header-content-inner">
                <a href="ApplicantData.php" class="btn btn-primary btn-xl page-scroll"	>Add Applicant</a>
				<br><br>
				<a href="#TrackStatus" class="btn btn-primary btn-xl page-scroll" data-toggle="modal">Track Status</a>
            </div>
        </div>
    </header>

  <div class="modal fade" id="AddApplicant" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  <div class="modal-dialog modal-lg">
		  <div class="modal-content">
			  <div class="modal-header" style="background-color:#ff4500;">
				  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				  <h4 class="modal-title"><font color="white">Applicant Information</font></h4>
			  </div>
			  <div class="modal-body">		  
						  <form role="form" id="wizard-validation-form" action="#">
							  <div>
								  <h3 class="col-sm-2">Personnal Information</h3>
									 <section>	<!-- 1st page start-->															
									<div class="form-group clearfix">
										<label class="col-sm-2 control-label">First Name</label>
											<div class="col-sm-4">
												<input type="text" required name="firstname" class="form-control">
											</div>
											
										 <label class="col-sm-2 control-label">Last Name</label>
											<div class="col-sm-4">
												<input type="text" required name="lastname" class="form-control">
											</div>
									</div>
																																		
									<div class="form-group clearfix">
										<label class="col-sm-2 control-label">Middle Name</label>
											<div class="col-sm-4">
												<input type="text" required name="middlename" class="form-control">
											</div>							
									</div>
																											
									<div class="form-group">
										<label class="col-sm-2 control-label">Position Desired</label>
											<div class="col-sm-4">
											   <select required name="positiondesired">
													  <option value="">Select Position</option>
														<option value="auditassistant">Audit Assistant</option>
														<option value="designmanager">Design Manager</option>
														<option value="caddarchitect">CADD Architect</option>
													  <?php
													  $arr = array('Audit Assistant', 'Design Manager','CADD Architect');
													  for($i=0; $i<count($arr); $i++) {
														echo "<option value=\"{$arr[$i]}\">".$arr[$i].'</option>';
														}
													  ?>

												</select>
											</div>	
										<label class="col-sm-2 control-label">Expected Salary</label>
											<div class="col-sm-4">
												<input type="number" required name="expectedsalary" class="form-control">
											</div>							
									</div>
							

									<div class="form-group clearfix">
										<label class="col-sm-2 control-label">Residence Address</label>
											<div class="col-sm-8">
												<input type="text" required name="residenceaddress" class="form-control">
											</div>
									</div>
								
									<div class="form-group clearfix">
										<label class="col-sm-2 control-label">Provincial Address</label>
											<div class="col-sm-4">
												<input type="text" name="provincialaddress" class="form-control">
											</div>
									</div>
											
									<div class="form-group clearfix">
										<label class="col-sm-2 control-label">Email Address</label>
											<div class="col-sm-4">
												<input type="email" required name="emailaddress" class="form-control">
											</div>
									</div>
								
									<div class="form-group clearfix">
										<label class="col-sm-2 control-label">Mobile No</label>
											<div class="col-sm-4">
												<input type="number" name="mobileno" class="form-control">
											</div>
									</div>
								
									<div class="form-group clearfix">
										<label class="col-sm-2 control-label">Citizenship</label>
											<div class="col-sm-4">
												<input type="text" required name="citizenship" class="form-control">
											</div>
									</div>
							
									<div class="form-group clearfix">
										<label class="col-sm-2 control-label">Telephone No</label>
											<div class="col-sm-4">
												<input type="number" name="telephoneno" class="form-control">
											</div>
									</div>

									<div class="form-group clearfix">
										<label class="col-sm-2 control-label">Gender</label>
											<div class="col-sm-2">
												<select required name="gender">
													  <option disabled selected value>Select Gender</option>
													  <option disabled selected value>Male</option>
													  <option disabled selected value>Female</option>
												</select>
											</div>
										<label class="col-sm-2 control-label">Civil Status</label>
											<div class="col-sm-2">
											   <select required name="civilstatus">
														<option value="">Select Civil Status</option>
														<option value="single">Single</option>
														<option value="married">Married</option>
														<option value="divorced">Divorced</option>
													  <?php
													  $arr = array('Single','Married', 'Divorced');
													  for($i=0; $i<count($arr); $i++) {
														echo "<option value=\"{$arr[$i]}\">".$arr[$i].'</option>';
														}
													  ?>
												</select>
											</div>
										<label class="col-sm-2 control-label">Licensed</label>
											<div class="col-sm-2">
												<select required name="licensed">
													  <option value="">Select</option>
														<option value = "yes">Yes</option>
														<option value = "no">No</option>
													  <?php
													  $arr = array('Yes', 'No');
													  for($i=0; $i<count($arr); $i++) {
														echo "<option value=\"{$arr[$i]}\">".$arr[$i].'</option>';
														}
													  ?>
												</select>
											</div>							
									</div>
											
									<div class="form-group clearfix">
										<label class="col-sm-2 control-label">Religion</label>
											<div class="col-sm-4">
												<input type="text" required name="religion" class="form-control">
											</div>
									</div>

									<div class="form-group clearfix">
										<label class="col-sm-2 control-label">Birthdate</label>
											<div class="col-sm-4">
												<input type="date" required name="birthdate" class="form-control">
											</div>
									</div>
								
									<div class="form-group clearfix">

									</div>
												
									<div class="form-group clearfix">
										<label class="col-sm-2 control-label">Birthplace</label>
											<div class="col-sm-4">
												<input type="text" required name="birthplace" class="form-control">
											</div>
									</div>
			
									 </section><!-- 1st page end -->
			
									 <h3>Spouse Information</h3><!-- 2nd page start-->
									 <section>
									 <div class="bio-row">
										<div class="form-horizontal tasi-form" method="get">
											<div class="form-group">
												<label class="col-sm-3 col-sm-3 control-label">Name</label>
													<div class="col-sm-8">
														<input type="text" name="spousename" class="form-control">
													</div>
											</div>
										</div>
										</div>
										
										<div class="bio-row">
										<div class="form-horizontal tasi-form" method="get">
											<div class="form-group">
												<label class="col-sm-3 col-sm-3 control-label">Occupation</label>
													<div class="col-sm-8">
														<input type="text" name="spouseoccupation" class="form-control">
													</div>
											</div>
										</div>
										</div>
										
										<div class="bio-row">
										<div class="form-horizontal tasi-form" method="get">
											<div class="form-group">
												<label class="col-sm-3 col-sm-3 control-label">Company</label>
													<div class="col-sm-8">
														<input type="text" name="spousecompany" class="form-control">
													</div>
											</div>
										</div>
										</div>
										
										<div class="bio-row">
										<div class="form-horizontal tasi-form" method="get">
											<div class="form-group">
												<label class="col-sm-3 col-sm-3 control-label">Company No.</label>
													<div class="col-sm-8">
														<input type="number" name="spousecompanyno" class="form-control">
													</div>
											</div>
										</div>
										</div>

									 </section><!-- 2nd page end -->
		 
									 <h3>Educational Attainment</h3>
									  <section>
										<h4>Elementary</h4>
				
										<div class="bio-row">
										<div class="form-horizontal tasi-form" method="get">
											<div class="form-group">
												<label class="col-sm-3 col-sm-3 control-label">School Name</label>
													<div class="col-sm-8">
														<input type="text" required name="schoolname1" class="form-control">
													</div>
											</div>
										</div>
										</div>
										
										<div class="bio-row">
										<div class="form-horizontal tasi-form" method="get">
											<div class="form-group">
												<label class="col-sm-3 col-sm-3 control-label">Address</label>
													<div class="col-sm-8">
														<input type="text" required name="schooladdress1" class="form-control">
													</div>
											</div>
										</div>
										</div>
										
										<div class="bio-row">
										<div class="form-horizontal tasi-form" method="get">
											<div class="form-group">
												<label class="col-sm-3 col-sm-3 control-label">Degree</label>
													<div class="col-sm-8">
														<input type="text" name="schooldegree1" class="form-control">
													</div>
											</div>
										</div>
										</div>
										
										<div class="bio-row">
										<div class="form-horizontal tasi-form" method="get">
											<div class="form-group">
												<label class="col-sm-3 col-sm-3 control-label">Honors Recieved</label>
													<div class="col-sm-8">
														<input type="text" name="schoolhonorsrecieved1" class="form-control">
													</div>
											</div>
										</div>
										</div>
										
										<div class="bio-row">
										<div class="form-horizontal tasi-form" method="get">
											<div class="form-group">
												<label class="col-sm-3 col-sm-3 control-label">Start Year</label>
													<div class="col-sm-8">
														<input type="number" required name="schoolstartyear1" class="form-control">
													</div>
											</div>
										</div>
										</div> 
										
										<div class="bio-row">
										<div class="form-horizontal tasi-form" method="get">
											<div class="form-group">
												<label class="col-sm-3 col-sm-3 control-label">End Year</label>
													<div class="col-sm-8">
														<input type="number" required name="schoolendyear1" class="form-control">
													</div>
											</div>
										</div>
										</div>
										
										<h4>Secondary</h4>
										
										<div class="bio-row">
										<div class="form-horizontal tasi-form" method="get">
											<div class="form-group">
												<label class="col-sm-3 col-sm-3 control-label">School Name</label>
													<div class="col-sm-8">
														<input type="text" required name="schoolname2" class="form-control">
													</div>
											</div>
										</div>
										</div>
										
										<div class="bio-row">
										<div class="form-horizontal tasi-form" method="get">
											<div class="form-group">
												<label class="col-sm-3 col-sm-3 control-label">Address</label>
													<div class="col-sm-8">
														<input type="text" required name="schooladdress2" class="form-control">
													</div>
											</div>
										</div>
										</div>
										
										<div class="bio-row">
										<div class="form-horizontal tasi-form" method="get">
											<div class="form-group">
												<label class="col-sm-3 col-sm-3 control-label">Degree</label>
													<div class="col-sm-8">
														<input type="text" name="schooldegree2" class="form-control">
													</div>
											</div>
										</div>
										</div>
										
										<div class="bio-row">
										<div class="form-horizontal tasi-form" method="get">
											<div class="form-group">
												<label class="col-sm-3 col-sm-3 control-label">Honors Recieved</label>
													<div class="col-sm-8">
														<input type="text" name="schoolhonorsrecieved2" class="form-control">
													</div>
											</div>
										</div>
										</div>
										
										<div class="bio-row">
										<div class="form-horizontal tasi-form" method="get">
											<div class="form-group">
												<label class="col-sm-3 col-sm-3 control-label">Start Year</label>
													<div class="col-sm-8">
														<input type="number" required name="schoolstartyear2" class="form-control">
													</div>
											</div>
										</div>
										</div> 
										
										<div class="bio-row">
										<div class="form-horizontal tasi-form" method="get">
											<div class="form-group">
												<label class="col-sm-3 col-sm-3 control-label">End Year</label>
													<div class="col-sm-8">
														<input type="number" required name="schoolendyear2" class="form-control">
													</div>
											</div>
										</div>
										</div>
										
										<h4>Tertiary/College</h4>
										
										<div class="bio-row">
										<div class="form-horizontal tasi-form" method="get">
											<div class="form-group">
												<label class="col-sm-3 col-sm-3 control-label">School Name</label>
													<div class="col-sm-8">
														<input type="text" required name="schoolname3" class="form-control">
													</div>
											</div>
										</div>
										</div>
										
										<div class="bio-row">
										<div class="form-horizontal tasi-form" method="get">
											<div class="form-group">
												<label class="col-sm-3 col-sm-3 control-label">Address</label>
													<div class="col-sm-8">
														<input type="text" required name="schooladdress3" class="form-control">
													</div>
											</div>
										</div>
										</div>
										
										<div class="bio-row">
										<div class="form-horizontal tasi-form" method="get">
											<div class="form-group">
												<label class="col-sm-3 col-sm-3 control-label">Degree</label>
													<div class="col-sm-8">
														<input type="text" name="schooldegree3" class="form-control">
													</div>
											</div>
										</div>
										</div>
										
										<div class="bio-row">
										<div class="form-horizontal tasi-form" method="get">
											<div class="form-group">
												<label class="col-sm-3 col-sm-3 control-label">Honors Recieved</label>
													<div class="col-sm-8">
														<input type="text" name="schoolhonorsrecieved3" class="form-control">
													</div>
											</div>
										</div>
										</div>
										
										<div class="bio-row">
										<div class="form-horizontal tasi-form" method="get">
											<div class="form-group">
												<label class="col-sm-3 col-sm-3 control-label">Start Year</label>
													<div class="col-sm-8">
														<input type="number" required name="schoolstartyear3" class="form-control">
													</div>
											</div>
										</div>
										</div> 
										
										<div class="bio-row">
										<div class="form-horizontal tasi-form" method="get">
											<div class="form-group">
												<label class="col-sm-3 col-sm-3 control-label">End Year</label>
													<div class="col-sm-8">
														<input type="number" required name="schoolendyear3" class="form-control">
													</div>
											</div>
										</div>
										</div>
										
										<h4>Post Graduate</h4>
										
										<div class="bio-row">
										<div class="form-horizontal tasi-form" method="get">
											<div class="form-group">
												<label class="col-sm-3 col-sm-3 control-label">School Name</label>
													<div class="col-sm-8">
														<input type="text" name="schoolname4" class="form-control">
													</div>
											</div>
										</div>
										</div>
										
										<div class="bio-row">
										<div class="form-horizontal tasi-form" method="get">
											<div class="form-group">
												<label class="col-sm-3 col-sm-3 control-label">Address</label>
													<div class="col-sm-8">
														<input type="text" name="schooladdress4" class="form-control">
													</div>
											</div>
										</div>
										</div>
										
										<div class="bio-row">
										<div class="form-horizontal tasi-form" method="get">
											<div class="form-group">
												<label class="col-sm-3 col-sm-3 control-label">Degree</label>
													<div class="col-sm-8">
														<input type="text" name="schooldegree4" class="form-control">
													</div>
											</div>
										</div>
										</div>
										
										<div class="bio-row">
										<div class="form-horizontal tasi-form" method="get">
											<div class="form-group">
												<label class="col-sm-3 col-sm-3 control-label">Honors Recieved</label>
													<div class="col-sm-8">
														<input type="text" name="schoolhonorsrecieved4" class="form-control">
													</div>
											</div>
										</div>
										</div>
										
										<div class="bio-row">
										<div class="form-horizontal tasi-form" method="get">
											<div class="form-group">
												<label class="col-sm-3 col-sm-3 control-label">Start Year</label>
													<div class="col-sm-8">
														<input type="number" name="schoolstartyear4" class="form-control">
													</div>
											</div>
										</div>
										</div> 
										
										<div class="bio-row">
										<div class="form-horizontal tasi-form" method="get">
											<div class="form-group">
												<label class="col-sm-3 col-sm-3 control-label">End Year</label>
													<div class="col-sm-8">
														<input type="number" name="schoolendyear4" class="form-control">
													</div>
											</div>
										</div>
										</div>
									  </section>
									 <h3>Employment Record</h3>
									  <section>

									  </section>
									 <h3>Government Exam Taken</h3>
									  <section>

									  </section>
									 <h3>Membership/Affilaitions and Associations</h3>
									  <section>

									  </section>
									 <h3>Special Training/Seminars Attended</h3>
									  <section>

									  </section>
									 <h3>Family Background</h3>
									  <section>

									  </section>
									 <h3>Other Information</h3>
									  <section>

									  </section>									  
									  <h3>Background Check Authorization</h3>
									  <section>
										  <div class="form-group clearfix clearfix">
											  <div class="col-lg-12">
												  <input id="acceptTerms" name="acceptTerms" type="checkbox" class="required">
												  <label for="acceptTerms">I agree with the Terms and Conditions.</label>
											  </div>
										  </div>
									  </section>
								</div>
							</form>								
				</div>
			  </div>
		  </div>
	 </div>
    <div class="modal fade" id="TrackStatus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  <div class="modal-dialog modal-lg">
		  <div class="modal-content">
			  <div class="modal-header" style="background-color:#ff4500;">
				  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				  <h4 class="modal-title"><font color="white">Track Status</font></h4>
			  </div>
			  <div class="modal-body">			
				<div class="row" style="margin-left:20px;margin-top:20px;">
					<form class="form-horizontal tasi-form" method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
					
					
					<div class="bio-row">
					<div class="form-horizontal tasi-form" method="get">
						<div class="form-group clearfix">
							<label class="col-sm-2 control-label">Applicant Number</label>
								<div class="col-lg-5">
									<input type="text" required name="charactercontactno3" class="form-control">
								</div>
						</div>
					</div>
					</div>
					
					
					<p><span>Initial Interview </span>:<?php echo $status1  ?></p>
					<p><span>Technical Interview </span>:<?php echo $status2  ?></p>
					<p><span>Contract </span>:<?php echo $status3  ?></p>
					
					
					
					<br></br>
				
						<input type="submit" name="submit" value="submit" />
				</form>
				</div>
					<br></br>
			  </div>
			  <div class="modal-footer">
				  <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
				  <button class="btn btn-success" type="button">Track</button>
			  </div>
		  </div>
	  </div>
  </div>
	
    <!-- jQuery -->
    <script src="vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script src="vendor/scrollreveal/scrollreveal.min.js"></script>
    <script src="vendor/magnific-popup/jquery.magnific-popup.min.js"></script>

    <!-- Theme JavaScript -->
    <script src="js/creative.min.js"></script>
	
	    <!-- js placed at the end of the document so the pages load faster -->
    <script src="js/jquery.js"></script>
    <script src="js/jquery-ui-1.9.2.custom.min.js"></script>
    <script src="js/jquery-migrate-1.2.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="js/jquery.scrollTo.min.js"></script>
    <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
    <script type="text/javascript" src="assets/data-tables/jquery.dataTables.js"></script>
    <script type="text/javascript" src="assets/data-tables/DT_bootstrap.js"></script>
    <script src="js/respond.min.js" ></script>

  <!--right slidebar-->
  <script src="js/slidebars.min.js"></script>

    <!--common script for all pages-->
    <script src="js/common-scripts.js"></script>

      <!--script for this page only-->
      <script src="js/editable-table.js"></script>

      <!-- END JAVASCRIPTS -->
      <script>
          jQuery(document).ready(function() {
              EditableTable.init();
          });
      </script>
	  
	<!-- js placed at the end of the document so the pages load faster -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="js/jquery.scrollTo.min.js"></script>
    <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="js/respond.min.js" ></script>

  <!--right slidebar-->
  <script src="js/slidebars.min.js"></script>


  <!--Form Validation-->
  <script src="js/bootstrap-validator.min.js" type="text/javascript"></script>

  <!--Form Wizard-->
  <script src="js/jquery.steps.min.js" type="text/javascript"></script>
  <script src="js/jquery.validate.min.js" type="text/javascript"></script>


  <!--common script for all pages-->
    <script src="js/common-scripts.js"></script>

    <!--script for this page-->
    <script src="js/jquery.stepy.js"></script>


  <script>

      //step wizard

      $(function() {
          $('#default').stepy({
              backLabel: 'Previous',
              block: true,
              nextLabel: 'Next',
              titleClick: true,
              titleTarget: '.stepy-tab'
          });
      });
  </script>

  <script type="text/javascript">
      $(document).ready(function () {
          var form = $("#wizard-validation-form");
          form.validate({
              errorPlacement: function errorPlacement(error, element) {
                  element.after(error);
              }
          });
          form.children("div").steps({
              headerTag: "h3",
              bodyTag: "section",
              transitionEffect: "slideLeft",
              onStepChanging: function (event, currentIndex, newIndex) {
                  form.validate().settings.ignore = ":disabled,:hidden";
                  return form.valid();
              },
              onFinishing: function (event, currentIndex) {
                  form.validate().settings.ignore = ":disabled";
                  return form.valid();
              },
              onFinished: function (event, currentIndex) {
                  alert("Submitted!");
              }
          });


      });
  </script>  

</body>

</html>
