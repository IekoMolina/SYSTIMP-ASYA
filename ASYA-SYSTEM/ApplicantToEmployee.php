<!DOCTYPE html>
<html lang="en">
<?php
	session_start();
	
		require_once('../mysql_connect.php');
	
	$flag=0;
	$message = null;
	
	
	//get applicant name and put to array for dropdown
	/*
		$queryForName = "SELECT * FROM applicants";
		$resultsNames=mysqli_query($dbc,$queryForName);
		while($rows=mysqli_fetch_array($resultsNames,MYSQLI_ASSOC)){
			$names[] = $rows['APPNO'].' - '.$rows['FIRSTNAME'].' '.$rows['LASTNAME'];
		}
		//print_r($names);
		*/
		
		$query = "SELECT APPNO, FIRSTNAME, LASTNAME FROM APPLICANTS WHERE CONTRACT IS NOT NULL
																	  AND EVALUATIONNUMBER IS NOT NULL";
		$result = mysqli_query($dbc,$query);
		while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
			$names[] = $row['APPNO'].' - '.$row['FIRSTNAME'].' '.$row['LASTNAME'];
		}
		
	
	if(isset($_POST['submit'])){
	
	
		$department = $_POST['department'];
		$status = 2001;
		$selectapplicant = $_POST['selectapplicant'];
		$actualposition = $_POST['actualposition'];
		
		
	
		//echo 'hello';
		
	$message=NULL;
		if(!empty($_POST['username'])){
				$username=$_POST['username'];	
		}
		else{
				$username=NULL;
		}
		/*
		if(empty($_POST['password']) || ){
				$password=$_POST['password'];	
		}
		else{
				$password=NULL;
		}
		*/
		
		if (empty($_POST['password1'])){
				$password1=FALSE;
				
			}else
				$password1=$_POST['password1'];
			if (empty($_POST['password'])){
				$password=FALSE;
				
			}else if($_POST['password'] != $_POST['password1']){
				$password=FALSE;
				$message.='<font color="red"><b>ERROR:</b></font> Passwords do not match</b><br>';
			}else
				$password=$_POST['password'];
		


		
		//convert department to number
		
			if($department == "HR"){
					$department = "1001";
				}
			else if($department == "IT"){
					$department = "1002";
				}
			
			if($actualposition == "Audit Assistant"){
					$actualposition = "1111";
				}
			else if($actualposition == "Design Manager"){
					$actualposition = "2222";
				}
			else if($actualposition == "CADD Architect"){
					$actualposition = "3333";
				}
		
			
		
		if (!isset($message) && $password != FALSE){
		
		$query = " insert into employees (USERNAME, PASSWORD, STATUS, APPNO, DEPT, ACTUALPOSITION) 
		VALUES('{$username}','{$password}','{$status}','{$selectapplicant}','{$department}','{$actualposition}')";
		
		$result = mysqli_query($dbc,$query);
		// echo $query;
		 
		 $message.='</font>Employee Added</b><br>';
		 
		$flag=1;
		
		//$message ;
		}

	}
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="img/favicon.php">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Latest compiled JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!--for graphs/charts-->
    <script src="js/raphael-min.js"></script>
    <link rel="stylesheet" href="css/morris.css">
    <script src="js/morris.min.js"></script>

    <!--custom css-->
    <link rel="stylesheet" href="css/custom.css">
    <link rel="stylesheet" href="css/custom-theme.css">
    <script> $('.datepicker').datepicker(); </script>
    
        <!-- Custom styles for this template -->

    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet"/>
		
    <title>Applican To Employee</title>
</head>
<body>

<!-- navbar -->
<div class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="home.php"><img src="asyalogo.jpg" /> </a>
        </div>
        <!-- right side stuffs -->
        <ul class="nav navbar-nav navbar-right">
            <li><a href="#"><span class="glyphicon glyphicon-envelope"></span></a></li>
            <li><a href="#"><span class="glyphicon glyphicon-calendar"></span></a></li>
            <li><a href="login.php">Logout</a></li>
        </ul>
    </div>
</div>

<div id="wrapper" class="container-fluid">

    <!-- Sidebar -->
    <div id="sidebar-wrapper" class="col-md-2">

        <div id="user-account">
            <h3>Welcome!</h3>
            <img class="img-circle img-responsive center-block" src="user.jpg" id="user-icon">
            <p>Username Here</p>
        </div>

        <div class="sidebar-nav">

            <div class="list-group root">

                <!-- home -->
                <a href="home.php" class="list-group-item"><span class="glyphicon glyphicon-home"></span> Home</a>

                <!-- recruitment -->
                <a href="recruitment.php" class="list-group-item active"><span class="glyphicon glyphicon-eye-open"></span> Recruitment</a>

                <!-- employee -->
                <a href="employees.php" class="list-group-item"><span class="glyphicon glyphicon-pawn"></span> Employees</a>
				
				<!-- calendar -->
				<a href="Calendar.php" class="list-group-item"><span class="glyphicon glyphicon-calendar"></span> Calendar</a>

                <!-- reports -->
                <a href="#report-items" class="list-group-item" data-toggle="collapse" data-parent=".sidebar-nav">
                    <span class="glyphicon glyphicon-list-alt"></span> Reports <span class="caret"></span>
                </a>
                <!-- report items -->
                <div class="list-group collapse" id="report-items">
                    <!-- employee reports -->
                        <a href="LeaveReport.php" class="list-group-item"> &#x25cf Leave</a>
                        <a href="OvertimeReport.php" class="list-group-item"> &#x25cf Overtime</a>
                        <a href="UndertimeReport.php" class="list-group-item"> &#x25cf Undertime</a>
                        <a href="AbsentReversalReport.php" class="list-group-item"> &#x25cf Absent Reversal</a>
                        <a href="ItineraryAuthorizationReport.php" class="list-group-item">&#x25cf Itinerary Authorization</a>					
                </div>
				
                <!-- requests -->
                <a href="#request-items" class="list-group-item" data-toggle="collapse" data-parent=".sidebar-nav">
                    <span class="glyphicon glyphicon-list-alt"></span> Requests <span class="caret"></span>
                </a>
                <!-- report items -->
                <div class="list-group collapse" id="request-items">
                    <!-- employee reports -->
                        <a href="LeaveRequest.php" class="list-group-item"> &#x25cf Leave</a>
                        <a href="OvertimeRequest.php" class="list-group-item"> &#x25cf Overtime</a>
                        <a href="UndertimeRequest.php" class="list-group-item"> &#x25cf Undertime</a>
                        <a href="AbsentReversalRequest.php" class="list-group-item"> &#x25cf Absent Reversal</a>
                        <a href="ItineraryAuthorizationRequest.php" class="list-group-item">&#x25cf Itinerary Authorization</a>					
                </div>				
				
                <a href="#" class="list-group-item"><span class="glyphicon glyphicon-info-sign"></span> About</a>
            </div>
        </div>

    </div>

    <!-- insert page content here -->
    <div id="page-content-wrapper">
      		
		<div class="row">
                  <aside class="profile-nav col-lg-3">
                      <section class="panel">
                          <div class="user-heading round">
                              <a href="#">
                                  <img src="img/user.jpg" alt="">
                              </a>
                              <h1>Saturnina Hidalgo</h1>
                              <p>saturnina.hidalgo@yahoo.com</p>
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
                                      <p><span>First Name </span>: Saturnina</p>
                                  </div>
                                  <div class="bio-row">
                                      <p><span>Last Name </span>: Hidalgo</p>
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
                              <a class="btn btn-default" data-toggle="modal" href="#myModal3">Create Account</a>
                              <a class="btn btn-default" href="recruitment.php">Previous</a>
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
														  <p><span>First Name </span>: Saturnina</p>
													  </div>
													  <div class="bio-row">
														  <p><span>Position Desired </span>: IT</p>
													  </div>
													  <div class="bio-row">
														  <p><span>Last Name </span>: Hidalgo</p>
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
														  <p><span>Email </span>: saturnina.hidalgo@yahoo.com</p>
													  </div>
													  <div class="bio-row">
														  <p><span>Birthplace</span>: Manila</p>
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
                                              <h4 class="modal-title">Create Employee Account</h4>
                                          </div>
                                          <div class="modal-body">
										        <div class="panel-body">
										          <!-- page start-->
													<form class="form-horizontal tasi-form" method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
														<div class="bio-row">														
										                    <div class="form-group">
										                        <label class="col-sm-3 col-sm-3 control-label">Username</label>
										                            <div class="col-sm-8">
										                                <input type="text" required name="username" class="form-control">
										                            </div>
										                    </div>														
														</div>
																												
														<div class="bio-row">
														<div class="form-horizontal tasi-form" method="get">
										                    <div class="form-group">
										                        <label class="col-sm-3 col-sm-3 control-label">Password</label>
										                            <div class="col-sm-8">
										                                <input type="text" required name="password" class="form-control">
										                            </div>
										                    </div>
														</div>
														</div>
																																											
														<div class="bio-row">
														<div class="form-horizontal tasi-form" method="get">
										                    <div class="form-group">
										                        <label class="col-sm-3 col-sm-3 control-label">Select Applicant</label>
										                            <div class="col-lg-5">
										                                <select class="form-control m-bot15" name="selectapplicant">
										
																			  <?php
																				for($x=0;$names[$x]!=NULL;$x++){
																						echo '<option value='.$names[$x].'>'.$names[$x].'</option>';
																						//echo"<option value='$names[$x].'>$names[$x]</option>";
																				}
																			  ?>
																		</select>
										                            </div>
										                    </div>
														</div>
														</div>
														
														<div class="bio-row">
														<div class="form-horizontal tasi-form" method="get">
										                    <div class="form-group">
										                        <label class="col-sm-3 col-sm-3 control-label">Confirm Password</label>
										                            <div class="col-sm-8">
										                                <input type="text" required name="password1" class="form-control">
										                            </div>
										                    </div>
														</div>
														</div>
														
										
														<div class="bio-row">
														<div class="form-horizontal tasi-form" method="get">
										                    <div class="form-group">
										                        <label class="col-sm-3 col-sm-3 control-label">Department</label>
										                            <div class="col-sm-8">
										                                <select required name="department">
																			  <option disabled selected value>Select...</option>
										
																			  <?php
																			  $arr = array('HR','IT');
																			  for($i=0; $i<count($arr); $i++) {
																				$element = $arr[$i];
																				echo "<option value=\"{$arr[$i]}\">".$arr[$i].'</option>';
																				}
																			  ?>
																		</select>
										                            </div>
										                    </div>
														</div>
														</div>
														
														<div class="bio-row">
														<div class="form-horizontal tasi-form" method="get">
										                    <div class="form-group">
										                        <label class="col-sm-3 col-sm-3 control-label">Position</label>
										                            <div class="col-sm-8">
										                                <select required name="actualposition">
																			  <option disabled selected value>Select...</option>
										
																			  <?php
																			  $arr = array('Audit Assistant','Design Manager','CADD Architect');
																			  for($i=0; $i<count($arr); $i++) {
																				$element = $arr[$i];
																				echo "<option value=\"{$arr[$i]}\">".$arr[$i].'</option>';
																				}
																			  ?>
																		</select>
										                            </div>
										                    </div>
														</div>
														</div>
														
														
														<br></br>																												
															<?php echo $message; ?>															
													</form>
														<br></br>
												</div>                                          		
                                          </div>
                                          <div class="modal-footer">	                       
                                              <button data-dismiss="modal" class="btn btn-success" type="button" style="background-color:#bec3c7;border-color:#bec3c7;">Done</button>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              <!-- modal -->
                          </div>
						  
                      </section>
				  </aside>
			</div>		
       
    </div>

</div>
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

</html>