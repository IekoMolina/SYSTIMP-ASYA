<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Add Applicant</title>

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
	
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
				<a class="navbar-brand" href="ApplicantScreen.php"><img src="asyalogo.png"/> </a>
            </div>
        </div>
        <!-- /.container-fluid -->
    </nav>

    <header>
    </header>	
	            <div class="row">
                  <div class="col-lg-12">
                      <!--progress bar start-->
                      <section class="panel">
                          <header class="panel-heading">
                              Applicant Information
                          </header>
                          <div class="panel-body">
                              <form id="wizard-validation-form" action="#">
                                  <div>
                                      <h3>Personal Information</h3>
                                      <section>                                        		
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
											<label class="col-sm-2 control-label">Gender</label>
												<div class="col-sm-4">
													<select required name="gender">
														  <option disabled selected value>Select...</option>

														  <?php
														  $arr = array('Male','Female');
														  for($i=0; $i<count($arr); $i++) {
															$element = $arr[$i];
															echo "<option value=\"{$arr[$i]}\">".$arr[$i].'</option>';
															}
														  ?>
													</select>
												</div>												
										</div>
																												
										<div class="form-group clearfix">
											<label class="col-sm-2 control-label">Position Desired</label>
												<div class="col-sm-4">
												   <select required name="positiondesired">
														  <option disabled selected value>Select...</option>

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
												<div class="col-sm-8">
													<input type="text" name="provincialaddress" class="form-control">
												</div>
										</div>
												
										<div class="form-group clearfix">
											<label class="col-sm-2 control-label">Email Address</label>
												<div class="col-sm-4">
													<input type="email" required name="emailaddress" class="form-control">
												</div>
											<label class="col-sm-2 control-label">Citizenship</label>
												<div class="col-sm-4">
													<input type="text" required name="citizenship" class="form-control">
												</div>												
										</div>
									
										<div class="form-group clearfix">
											<label class="col-sm-2 control-label">Mobile No</label>
												<div class="col-sm-4">
													<input type="number" name="mobileno" class="form-control">
												</div>
											<label class="col-sm-2 control-label">Telephone No</label>
												<div class="col-sm-4">
													<input type="number" name="telephoneno" class="form-control">
												</div>												
										</div>

										<div class="form-group clearfix">
											<label class="col-sm-2 control-label">Civil Status</label>
												<div class="col-sm-2">
												   <select required name="civilstatus">
														  <option disabled selected value>Select...</option>

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
														  <option disabled selected value>Select...</option>

														  <?php
														  $arr = array('Yes', 'No');
														  for($i=0; $i<count($arr); $i++) {
															echo "<option value=\"{$arr[$i]}\">".$arr[$i].'</option>';
															}
														  ?>
													</select>
												</div>
											<label class="col-sm-1 control-label">Religion</label>
												<div class="col-sm-3">
													<input type="text" required name="religion" class="form-control">
												</div>												
										</div>

										<div class="form-group clearfix">
											<label class="col-sm-2 control-label">Birthdate</label>
												<div class="col-sm-4">
													<input type="date" required name="birthdate" class="form-control">
												</div>
											<label class="col-sm-2 control-label">Birthplace</label>
												<div class="col-sm-4">
													<input type="text" required name="birthplace" class="form-control">
												</div>												
										</div>
									
                                      </section>
                                      <h3>Spouse Information</h3>
                                      <section>

                                          <div class="form-group clearfix">
                                              <label class="col-lg-2 control-label" for="name"> First name *</label>
                                              <div class="col-lg-10">
                                                  <input id="name" name="name" type="text" class="required form-control">
                                              </div>
                                          </div>
                                          <div class="form-group clearfix">
                                              <label class="col-lg-2 control-label " for="surname"> Last name *</label>
                                              <div class="col-lg-10">
                                                  <input id="surname" name="surname" type="text" class="required form-control">

                                              </div>
                                          </div>

                                          <div class="form-group clearfix">
                                              <label class="col-lg-2 control-label " for="email">Email *</label>
                                              <div class="col-lg-10">
                                                  <input id="email" name="email" type="text" class="required email form-control">
                                              </div>
                                          </div>

                                          <div class="form-group clearfix">
                                              <label class="col-lg-2 control-label " for="address">Address </label>
                                              <div class="col-lg-10">
                                                  <input id="address" name="address" type="text" class="form-control">
                                              </div>
                                          </div>

                                          <div class="form-group clearfix">
                                              <label class="col-lg-12 control-label ">(*) Mandatory</label>
                                          </div>

                                      </section>
									  <h3>Educational Attainment</h3>
									  <section>

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
                                          <div class="form-group clearfix">
                                              <div class="col-lg-12">
                                                  <input id="acceptTerms" name="acceptTerms" type="checkbox" class="required">
                                                  <label for="acceptTerms">I agree with the Terms and Conditions.</label>
                                              </div>
                                          </div>

                                      </section>
                                  </div>
                              </form>
                          </div>
                      </section>
                  </div>
              </div>
              <!-- page end-->
								
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
