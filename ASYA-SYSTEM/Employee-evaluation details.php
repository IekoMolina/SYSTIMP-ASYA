<!DOCTYPE html>
<html lang="en">
<?php
session_start();
require_once('../mysql_connect.php');
// Predetermined value depends on login
$evaluation = 0;// 0 kasi ang tech evaluation
$currentEmpNum = $_SESSION['emp_number'];
$currentDate = date('Y-m-d');
$status =1;
if(isset($_POST['empElink'])){
	$appNum = $_POST['empElink'];
}
if(isset($_POST['submit'])){
	$appNum = $_POST['submit'];
}
// Get applicant
$queryForName="SELECT 	* 
				 FROM 	applicants a JOIN employees e ON a.APPNO = e.APPNO
				 					 JOIN emp_evaluation ee ON e.EMPLOYEENUMBER = ee.EMPLOYEENUMBER
				WHERE a.APPNO = '{$appNum}'";
$resultNames=mysqli_query($dbc,$queryForName);
$rows=mysqli_fetch_array($resultNames,MYSQLI_ASSOC);
$name = $rows['FIRSTNAME'].' '.$rows['LASTNAME'];
$empNum =  $rows['EMPLOYEENUMBER'];
$departments =  $rows['DEPT'];
$q1 = $rows['Q1'];
$q2 = $rows['Q2'];
$q3 = $rows['Q3'];
$q4 = $rows['Q4'];
$q5 = $rows['Q5'];
$q6 = $rows['Q6'];
$q7 = $rows['Q7'];
$q8 = $rows['Q8'];
$q9 = $rows['Q9'];
$q10 = $rows['Q10'];
$q11 = $rows['Q11'];
$q12 = $rows['Q12'];
$q13 = $rows['Q13'];
$q14 = $rows['Q14'];
$q15 = $rows['Q15'];
$q16 = $rows['Q6'];
$q17 = $rows['Q17'];
$q18 = $rows['Q18'];
$q19 = $rows['Q19'];
$hrRemarks = $rows['HRREMARKS'];
$hrScore = $rows['HRSCORE'];
$q1D = $rows['Q1D'];
$q2D = $rows['Q2D'];
$q3D = $rows['Q3D'];
$q4D = $rows['Q4D'];
$q5D = $rows['Q5D'];
$q6D = $rows['Q6D'];
$q7D = $rows['Q7D'];
$q8D = $rows['Q8D'];
$q9D = $rows['Q9D'];
$q10D = $rows['Q10D'];
$q11D = $rows['Q11D'];
$q12D = $rows['Q12D'];
$q13D = $rows['Q13D'];
$q14D = $rows['Q14D'];
$q15D = $rows['Q15D'];
$dmRemarks = $rows['DMREMARKS'];
$dmScore =  $rows['DMSCORE'];
$queryForActualDepartment="SELECT 	*
							FROM 	emp_dept";
$resultD=mysqli_query($dbc,$queryForActualDepartment);
while($rows=mysqli_fetch_array($resultD,MYSQLI_ASSOC))
{
	$actualDept[] = $rows['EDEPT'];
	$codeDept[] = $rows['DEPT'];
}
$deptName = '';
for ($x=0;$x<count($codeDept);$x++)
{
	if($departments==$codeDept[$x])
	{
		$deptName = $actualDept[$x];
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
		
    <title>Performance Evaluation</title>
</head>
<body>

<!-- navbar -->
<div class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="home.php"><img src="asyalogo.jpg" /> </a>
        </div>

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
            <p>HR Manager</p>
        </div>

        <div class="sidebar-nav">

            <div class="list-group root">

                <!-- home -->
                <a href="home.php" class="list-group-item"><span class="glyphicon glyphicon-home"></span> Home</a>

                <!-- recruitment -->
                <a href="recruitment.php" class="list-group-item"><span class="glyphicon glyphicon-eye-open"></span> Recruitment</a>

                <!-- employee -->
                <a href="employees.php" class="list-group-item active"><span class="glyphicon glyphicon-pawn"></span> Employees</a>				
               	
               	<!-- calendar -->
				<a href="Attendance.php" class="list-group-item"><span class="glyphicon glyphicon-calendar"></span> Attendance</a>
				
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
                
                <!-- reports -->
                <a href="#report-items1" class="list-group-item" data-toggle="collapse" data-parent=".sidebar-nav">
                    <span class="glyphicon glyphicon-list-alt"></span> Visual Reports <span class="caret"></span>
                </a>
                <!-- report items -->
                <div class="list-group collapse" id="report-items1">
                    <!-- employee reports -->
                        <a href="Report - EmployeeTardiness.php" class="list-group-item"> &#x25cf Employee Tardiness</a>
                        <a href="Report - EmployeeTenureOverall.php" class="list-group-item"> &#x25cf Employee Tenure</a>
                        <a href="Report - ManpowerArchitects.php" class="list-group-item"> &#x25cf Manpower Architects</a>
                        <a href="Report - ManpowerEngineers.php" class="list-group-item"> &#x25cf Manpower Engineers</a>
                        <a href="Report - RecruitmentNewlyHired.php" class="list-group-item">&#x25cf Recruitment Newly Hired</a>					
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
                        <a href="ManpowerRequest.php" class="list-group-item"> &#x25cf Manpower</a>
                        <a href="ResignationRequest.php" class="list-group-item"> &#x25cf Resignation</a>
                        <a href="ChangeRecordRequest.php" class="list-group-item">&#x25cf Change Record</a>	                        				
                </div>				
				
                <a href="#" class="list-group-item"><span class="glyphicon glyphicon-info-sign"></span> About</a>
            </div>
        </div>

    </div>

    <!-- insert page content here -->
    <div id="page-content-wrapper">
		<div class="row">
					  <section class="panel">
                          <div class="panel-body">
						<div class="row">
							<label class="col-lg-1">Applicant: </label>
							<div class="col-lg-3">
                             <?php echo $name?>
                             </div>	
                            <label class="col-lg-1">Date: </label>
							<div class="col-lg-3">
							<?php echo $currentDate?>			
                             </div>
                         </div>	
                         <div class="row"> 
                            <label class="col-lg-1">Department: </label>
							<div class="col-lg-3">
							<?php echo $deptName?>			
                             </div>
                          </div>

							<h2 style="margin-left: 10px;"><br>Evaluation</h2>		  
							<p class="indent">(15) Outstanding</p>
                            <p class="indent">(12) Exceeds Expectations</p>
                            <p class="indent">(9) Meets Expectations</p>
                            <p class="indent">(6) Below Expectations</p>
                            <p class="indent">(3) Unsatisfactory</p><br>
                            <h2 style="margin-left: 10px;"><br>HR Evaluation</h2>
                            <table border="1" class="table table-bordered table-hover table-striped">  
                            <thead>
                            <tr>
                                <th>Evaluation Criteria</th>
                                <th class="col-lg-1">Score</th>
                               
                            </tr>
                            </thead> 
                             <tbody>
                             		<tr>
                             			<td><b>Attendance</b></td>
                             			<td></td>
                             		</tr>                       
									<tr><td><label style="margin-left: 20px;"> 1. Absences</label></td>
										<div class="col-lg-10">
											<td><?php echo $q1?></td>
										</div>
									</tr>
									<tr><td><label style="margin-left: 20px;"> <br>2. Punctuality</label></td>
										<div class="col-lg-10">
											<td><?php echo $q2?></td>
										</div>
									</tr>
									<tr><td><label style="margin-left: 20px;"> <br>3. Under Time</label></td>
										<div class="col-lg-10">
											<td><?php echo $q3?></td>
										</div>
									</tr>
									<tr><td><label style="margin-left: 20px;"> <br>4. Half-day</label></td>
										<div class="col-lg-10">
											<td><?php echo $q4?></td>
										</div>
									</tr>
                             		<tr>
                             			<td><b>Conduct and Compliance</b></td>
                             			<td></td>
                             		</tr>										
									<tr><td><label style="margin-left: 20px;"> <br>1. Discussion Notice</label></td>
										<div class="col-lg-10">
											<td><?php echo $q5?></td>
										</div>
									</tr>
									<tr><td><label style="margin-left: 20px;"> <br>2. First Written Warning</label></td>
										<div class="col-lg-10">
											<td><?php echo $q6?></td>
										</div>
									</tr>
									<tr><td><label style="margin-left: 20px;"> <br>3. Second Written Warning</label></td>
										<div class="col-lg-10">
											<td><?php echo $q7?></td>
										</div>
									</tr>
									<tr><td><label style="margin-left: 20px;"> <br>4. Stern Warning or Final Warning</label></td>
										<div class="col-lg-10">
											<td><?php echo $q8?></td>
										</div></tr>
                             		<tr>
                             			<td><b>Active Participation</b></td>
                             			<td></td>
                             		</tr>										
									<tr><td><label style="margin-left: 20px;"> <br>1. Attendance in Internal/External trainings and seminars</label></td>
										<div class="col-lg-10">
											<td><?php echo $q9?></td>
										</div>
									</tr>
									<tr><td><label style="margin-left: 20px;"> <br>2. Active participation in Company activities such as Christmas Party, ASYA Cup and Outing</label></td>
									<div class="col-lg-10">
											<td><?php echo $q10?></td>
									</div>
									</tr>
									<tr>
                             			<td><b>Core Values</b></td>
                             			<td></td>
                             		</tr>										
									<tr><td><label style="margin-left: 20px;"> <br>1. Loyalty</label></td>
										<div class="col-lg-10">
											<td><?php echo $q11?></td>
										</div>
									</tr>
									<tr><td><label style="margin-left: 20px;"> <br>2. Trustworthiness</label></td>
										<div class="col-lg-10">
											<td><?php echo $q12?></td>
										</div>
									</tr>
									<tr><td><label style="margin-left: 20px;"> <br>3. Discipline</label></td>
										<div class="col-lg-10">
											<td><?php echo $q13?></td>
										</div>
									</tr>
									<tr><td><label style="margin-left: 20px;"> <br>4. Passion and Commitment at Work</label></td>
										<div class="col-lg-10">
											<td><?php echo $q14?></td>
										</div>
									</tr>
									<tr><td><label style="margin-left: 20px;"> <br>5. Respect for Culture</label></td>
										<div class="col-lg-10">
											<td><?php echo $q15?></td>
										</div>
									</tr>
									<tr><td><label style="margin-left: 20px;"> <br>6. "Yes,We Can!" attitude</label></td>
										<div class="col-lg-10">
											<td><?php echo $q16?></td>
										</div>
									</tr>
									<tr><td><label style="margin-left: 20px;"> <br>7. Customer Delight</label></td>
										<div class="col-lg-10">
											<td><?php echo $q17?></td>
										</div>
									</tr>
									<tr><td><label style="margin-left: 20px;"> <br>8. Think like the owner concept</label></td>
										<div class="col-lg-10">
											<td><?php echo $q18?></td>
										</div>
									</tr>
									<tr><td><label style="margin-left: 20px;"> <br>9. Sustainability and Environment Focus</label></td>
										<div class="col-lg-10">
											<td><?php echo $q19?></td>
										</div>
									</tr>
									<tr><td><label style="margin-left: 700px;"> <br>Total Score:</label></td>
										<div class="col-lg-10">
											<td><?php echo $hrScore?></td>
										</div>
									</tr>																														
									</tbody>	
									</table>									
									                                        
	                                    <h4 style="margin-left: 10px;"><br>HR Remarks</h4>
										<div class="row indent col-lg-8">
										<?php echo $hrRemarks?>
										</div>
																			
							<h2 style="margin-left: 10px;"><br>Subordinate Evaluation</h2>
                            <table border="1" class="table table-bordered table-hover table-striped">  
                            <thead>
                             <tr>
                                <th>Evaluation Criteria</th>
                                <th class="col-lg-1">Score</th>
                               
                            </tr>
                            </thead> 
                             <tbody>                  
									<tr><td><label style="margin-left: 20px;">1. INITIATIVE - Actively attempting to influence events to achieve goals; self-starting rather than passive acceptance.</label></td>
										<div class="col-lg-10">
											<td><?php echo $q1D?></td>
										</div>
									</tr>
									<tr><td><label style="margin-left: 20px;"> <br>2. ATTENTION TO DETAILS - Is thorough in accomplishing a task with concern for all the areas involved, no matter how small.</label></td>
										<div class="col-lg-10">
											<td><?php echo $q2D?></td>
										</div>
									</tr>
									<tr><td><label style="margin-left: 20px;"> <br>3. ANALYSIS - Relating and camparing data from different sources, identifying issues and getting relevant information.</label></td>
										<div class="col-lg-10">
											<td><?php echo $q3D?></td>
										</div>
									</tr>
									<tr><td><label style="margin-left: 20px;"> <br>4. TOLERANCE FOR STRESS - Working well under pressure and/or against opposition.</label></td>
										<div class="col-lg-10">
											<td><?php echo $q4D?></td>
										</div>
									</tr>										
									<tr><td><label style="margin-left: 20px;"> <br>5. PERFORMANCE STABILITY/DEPENDABILITY - Consistently meeting the day-to-day demands of the job.</label></td>
										<div class="col-lg-10">
											<td><?php echo $q5D?></td>
										</div>
									</tr>
									<tr><td><label style="margin-left: 20px;"> <br>6. JOB KNOWLEDGE - Measures effectiveness in keeping knowledgeable of methods required in own job and releated functions.</label></td>
										<div class="col-lg-10">
											<td><?php echo $q6D?></td>
										</div>
									</tr>
									<tr>
                             			<td><b>Company Core Values</b></td>
                             			<td></td>
                             		</tr>	
									<tr><td><label style="margin-left: 20px;"> <br>7. LOYALTY</label></td>
										<div class="col-lg-10">
											<td><?php echo $q7D?></td>
										</div>
									</tr>
									<tr><td><label style="margin-left: 20px;"> <br>8. TRUSTWORTHINESS</label></td>
										<div class="col-lg-10">
											<td><?php echo $q8D?></td>
										</div></tr>										
									<tr><td><label style="margin-left: 20px;"> <br>9. DISCIPLINE</label></td>
										<div class="col-lg-10">
											<td><?php echo $q9D?></td>
										</div>
									</tr>
									<tr><td><label style="margin-left: 20px;"> <br>10. PASSION AND COMMITMENT AT WORK</label></td>
									<div class="col-lg-10">
											<td><?php echo $q10D?></td>
									</div>
									</tr>									
									<tr><td><label style="margin-left: 20px;"> <br>11. RESPECT FOR CULTURE</label></td>
										<div class="col-lg-10">
											<td><?php echo $q11D?></td>
										</div>
									</tr>
									<tr><td><label style="margin-left: 20px;"> <br>12. "YES, WE CAN!" ATTITUDE</label></td>
										<div class="col-lg-10">
											<td><?php echo $q12D?></td>
										</div>
									</tr>
									<tr><td><label style="margin-left: 20px;"> <br>13. CUSTOMER DELIGHT</label></td>
										<div class="col-lg-10">
											<td><?php echo $q13D?></td>
										</div>
									</tr>
									<tr><td><label style="margin-left: 20px;"> <br>14. THINK LIKE THE OWNER CONCEPT</label></td>
										<div class="col-lg-10">
											<td><?php echo $q14D?></td>
										</div>
									</tr>
									<tr><td><label style="margin-left: 20px;"> <br>15. SUSTAINABILITY AND ENVIRONMENT FOCUS</label></td>
										<div class="col-lg-10">
											<td><?php echo $q15D?></td>
										</div>
									</tr>
									<tr><td><label style="margin-left: 700px;"> <br>Total Score:</label></td>
										<div class="col-lg-10">
											<td><?php echo $dmScore?></td>
										</div>
									</tr>																														
									</tbody>	
									</table>									
									 	<h4 style="margin-left: 10px;"><br>Subordinate Remarks</h4>
										<div class="row indent col-lg-8">
										<?php echo $dmRemarks?>
										</div>                                       
										<div class="panel-body" style="margin-top:70px;margin-left:7px;">											
										<form action="employee-information.php" method="post">
											<button class="btn btn-default"  name="emplink" value=<?php echo $appNum?>> Previous </button>
										</form> 
										</div>
						  </div>
				  </section>				  				 
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