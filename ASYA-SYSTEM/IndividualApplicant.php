<!DOCTYPE html>
<html lang="en">
  
<!-- Mirrored from thevectorlab.net/flatlab/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 22 Aug 2016 23:46:09 GMT -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mosaddek">
    <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <link rel="shortcut icon" href="img/favicon.php">

    <title>ASYA</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen"/>
    <link rel="stylesheet" href="css/owl.carousel.css" type="text/css">

    <!--right slidebar-->
    <link href="css/slidebars.css" rel="stylesheet">

    <!-- Custom styles for this template -->

    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />



    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
	
	<link rel="stylesheet" href="index.css" type="text/css">
  </head>

  <body>
  
  
  

  <section id="container" >
      <!--header start-->
      <header class="header dark-bg">
          <div class="sidebar-toggle-box">
              <i class="fa fa-bars"></i>
          </div>
          <!--logo start-->
          <a href="index.php" class="logo" >ASYA<span></span></a>
          <!--logo end-->
          <div class="top-nav ">
              <ul class="nav pull-right top-menu">
                  <!-- user login dropdown start-->
                  <li class="dropdown">
                      <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                          <span class="username">Jhon Doue</span>
                          <b class="caret"></b>
                      </a>
                      <ul class="dropdown-menu">
                          <li><a href="login.php"> Log Out</a></li>
                      </ul>
                  </li>
                  <!-- user login dropdown end -->
              </ul>
          </div>
      </header>
      <!--header end-->
	  
      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
                  <li>
                      <a href="index.php">
                          <span>HOME</span>
                      </a>
                  </li>
					<!-- Reports -->
                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <span>View Reports</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="LeaveReport.php">Leave</a></li>
                          <li><a  href="OTReport.php">Overtime</a></li>
                          <li><a  href="UTReport.php">Under Time</a></li>
                          <li><a  href="ARReport.php">Absent Reversal</a></li>
                          <li><a  href="IAReport.php">Itinerary Authorization</a></li>
						  <li><a  href="EmployeeReport.php">Employee Report</a></li>
                      </ul>
                  </li>
				  <!-- Requests -->
                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <span>View Requests</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="ApproveLeaveRequest.php">Leave</a></li>
                          <li><a  href="ApproveOTRequest.php">Overtime</a></li>
                          <li><a  href="ApproveUTRequest.php">Under Time</a></li>
                          <li><a  href="ApproveARRequest.php">Absent Reversal</a></li>
                          <li><a  href="ApproveIARequest.php">Itinerary Authorization</a></li>
                      </ul>
                  </li>
				    <!-- Performance Evaluation -->
				  <li>
                      <a  class="active" href="Applicants.php" >
                          <span>Applicants</span>
                      </a>
                  </li>
				  <li>
                      <a href="Employees.php" >
                          <span>Employee</span>
                      </a>
                  </li>
				  <li>
                      <a href="EmployeeCalendar.php" >
                          <span>Calendar</span>
                      </a>
                  </li>
				  <li>
                      <a href="Contract.php" >
                          <span>Create Contract</span>
                      </a>
                  </li>
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->
  </section>
  
  <section id="main-content">
          <section class="wrapper">
		  
			<div class="row">
                  <aside class="profile-nav col-lg-3">
                      <section class="panel">
                          <div class="user-heading round">
                              <a href="#">
                                  <img src="img/user.jpg" alt="">
                              </a>
                              <h1>Kim Onate</h1>
                              <p>kim.onate@yahoo.com</p>
                          </div>
						  
						  <!--
                          <!-- <ul class="nav nav-pills nav-stacked">
                              <li class="active"><a href="profile.php"> <i class="fa fa-user"></i> Profile</a></li>
                              <li><a href="profile-activity.php"> <i class="fa fa-calendar"></i> Recent Activity <span class="label label-danger pull-right r-activity">9</span></a></li>
                              <li><a href="profile-edit.php"> <i class="fa fa-edit"></i> Edit profile</a></li>
                          </ul> -->

                      </section>
                  </aside>
                  <aside class="profile-info col-lg-9">
                      <section class="panel">
                          <div class="panel-body bio-graph-info">
                              <h2>Information</h2>
							  <br>
                              <div class="row">
                                  <div class="bio-row">
                                      <p><span>First Name </span>: Kim</p>
                                  </div>
                                  <div class="bio-row">
                                      <p><span>Last Name </span>: Onate</p>
                                  </div>
                                  <div class="bio-row">
                                      <p><span>Department </span>: IT</p>
                                  </div>
								  <div class="bio-row">
                                      <p><span>Position </span>: Employee</p>
                                  </div>
                                  <div class="bio-row">
                                      <p><span>Birthday</span>: 13 July 1983</p>
                                  </div>	
                                  <div class="bio-row">
                                      <p><span>Email </span>: kim.onate@yahoo.com</p>
                                  </div>
                                  <div class="bio-row">
                                      <p><span>Mobile </span>: +639051110157</p>
                                  </div>
                              </div>
                          </div>
						  
						  <div class="panel-body">
                              <a class="btn btn-success" data-toggle="modal" href="#myModal">
                                  Accept
                              </a>
                              <a class="btn btn-danger" data-toggle="modal" href="#myModal2">
                                  Reject
                              </a>
                              <a class="btn btn-default" data-toggle="modal" href="#myModal3">
                                  Track Status
                              </a>
                              <!-- Modal -->
                              <div class="modal fade " id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                  <div class="modal-dialog modal-lg">
                                      <div class="modal-content">
                                          <div class="modal-header" style="background-color:#78CD51;">
                                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                              <h4 class="modal-title">Accept Applicant</h4>
                                          </div>
                                          <div class="modal-body">
												<h2>Information about the Applicant</h2>
												  <br>
												  <div class="row">
													  <div class="bio-row">
														  <p><span>First Name </span>: Kim</p>
													  </div>
													  <div class="bio-row">
														  <p><span>Position Desired </span>: IT</p>
													  </div>
													  <div class="bio-row">
														  <p><span>Last Name </span>: Onate</p>
													  </div>
													  <div class="bio-row">
														  <p><span>Expected Salary </span>: Employee</p>
													  </div>
													  <div class="bio-row">
														  <p><span>Middle Name </span>: Aguila</p>
													  </div>
													  <div class="bio-row">
														  <p><span>Birthday</span>: 13 July 1983</p>
													  </div>
													  <div class="bio-row">
														  <p><span>Email </span>: kim.onate@yahoo.com</p>
													  </div>
													  <div class="bio-row">
														  <p><span>Birthplace</span>: Manil</p>
													  </div>
													  <div class="bio-row">
														  <p><span>Mobile No </span>: +639051110157</p>
													  </div>
													  <div class="bio-row">
														  <p><span>Tel No </span>: +639051110157</p>
													  </div>
													  <div class="bio-row">
														  <p><span>Address </span>: Taft Ave., Manila</p>
													  </div>
												  </div>
                                          </div>
                                          <div class="modal-footer">
                                              <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
                                              <button class="btn btn-success" type="button" style="background-color:#78CD51;border-color:#78CD51;">Ok</button>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              <!-- modal -->
                              <!-- Modal -->
                              <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                  <div class="modal-dialog modal-lg">
                                      <div class="modal-content">
                                          <div class="modal-header" style="background-color:red;">
                                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                              <h4 class="modal-title">Reject Applicant</h4>
                                          </div>
                                          <div class="modal-body">

                                              Body goes here...

                                          </div>
                                          <div class="modal-footer">
                                              <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
                                              <button class="btn btn-success" type="button" style="background-color:red;border-color:red;">Ok</button>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              <!-- modal -->
                              <!-- Modal -->
                              <div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                  <div class="modal-dialog modal-lg">
                                      <div class="modal-content">
                                          <div class="modal-header" style="background-color:#bec3c7;">
                                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                              <h4 class="modal-title">Interview Status</h4>
                                          </div>
                                          <div class="modal-body">

                                            
												  <table class="table">
													  <thead>
													  <tr>
														  <th>Interview</th>
														  <th>Status</th>
														  <th>Remark</th>
													  </tr>
													  </thead>
													  <tbody>
													  <tr>
														  <td>1st Interview</td>
														  <td>Finished</td>
														  <td>Can Answer well, Can really answer well. </td>
													  </tr>
													  <tr>
														  <td><a href="TechnicalEvaluation.php">Technical Evaluation</td>
														  <td>On Process</td>
														  <td>On Process</td>
													  </tr>
													  <tr>
														  <td>Final Interview</td>
														  <td>On Process</td>
														  <td>On Process</td>
													  </tr>
													  </tbody>
												  </table>
                                            


                                          </div>
                                          <div class="modal-footer">	
                                              <button data-dismiss="modal" class="btn btn-success" type="button" style="background-color:#bec3c7;border-color:#bec3c7;">Ok</button>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              <!-- modal -->

                          </div>
						  
                      </section>
				  </aside>
			</div>
			
		  </section>
  </section>
  

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

  </body>

<!-- Mirrored from thevectorlab.net/flatlab/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 22 Aug 2016 23:47:16 GMT -->
</html>
