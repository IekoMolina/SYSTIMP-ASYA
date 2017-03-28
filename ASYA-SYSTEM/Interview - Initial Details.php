<!DOCTYPE html>
<html lang="en">
<?php
session_start();
require_once('../mysql_connect.php');
// Predetermined value depends on login
if(isset($_POST['emplink'])){
	$appNum= $_POST['emplink'];
}
if(isset($_POST['submit'])){
	$appNum = $_POST['submit'];
}

$currentEmpNum = $_SESSION['emp_number'];
$currentDate = date('Y-m-d');


// Get All applicant name and put in array
$query="SELECT * 
		  FROM applicants a JOIN app_evaluation ae ON a.APPNO = ae.APPNO 
		 WHERE ae.APPNO = '{$appNum}'";
$result=mysqli_query($dbc,$query);
$rows=mysqli_fetch_array($result,MYSQLI_ASSOC);
$name = $rows['FIRSTNAME'].' '.$rows['LASTNAME'];
$dateEvaluated = $rows['DATE'];
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
$remarks = $rows['REMARKS'];
$q1v = '';
if($q1 == 4)
{
	$q1v = 'Exceeds Expectation';
}
else if($q1 == 3)
{
	$q1v = 'Meets Expectation';
}
else if($q1 == 2)
{
	$q1v = 'Below Expectation';
}
else 
{
	$q1v = 'Unsatisfactory Performance';
}
	
$q2v = '';
if($q2 == 4)
{
	$q2v = 'Exceeds Expectation';
}
else if($q2 == 3)
{
	$q2v = 'Meets Expectation';
}
else if($q2 == 2)
{
	$q2v = 'Below Expectation';
}
else
{
	$q2v = 'Unsatisfactory Performance';
}	

$q3v = '';
if($q3 == 4)
{
	$q3v = 'Exceeds Expectation';
}
else if($q3 == 3)
{
	$q3v = 'Meets Expectation';
}
else if($q3 == 2)
{
	$q3v = 'Below Expectation';
}
else
{
	$q3v = 'Unsatisfactory Performance';
}

$q4v = '';
if($q4 == 4)
{
	$q4v = 'Exceeds Expectation';
}
else if($q4 == 3)
{
	$q4v = 'Meets Expectation';
}
else if($q4 == 2)
{
	$q4v = 'Below Expectation';
}
else
{
	$q4v = 'Unsatisfactory Performance';
}

$q5v = '';
if($q5 == 4)
{
	$q5v = 'Exceeds Expectation';
}
else if($q5 == 3)
{
	$q5v = 'Meets Expectation';
}
else if($q5 == 2)
{
	$q5v = 'Below Expectation';
}
else
{
	$q5v = 'Unsatisfactory Performance';
}

$q6v = '';
if($q6 == 4)
{
	$q6v = 'Exceeds Expectation';
}
else if($q6 == 3)
{
	$q6v = 'Meets Expectation';
}
else if($q6 == 2)
{
	$q6v = 'Below Expectation';
}
else
{
	$q6v = 'Unsatisfactory Performance';
}

$q7v = '';
if($q7 == 4)
{
	$q7v = 'Exceeds Expectation';
}
else if($q7 == 3)
{
	$q7v = 'Meets Expectation';
}
else if($q7 == 2)
{
	$q7v = 'Below Expectation';
}
else
{
	$q7v = 'Unsatisfactory Performance';
}

$q8v = '';
if($q8 == 4)
{
	$q8v = 'Exceeds Expectation';
}
else if($q8 == 3)
{
	$q8v = 'Meets Expectation';
}
else if($q8 == 2)
{
	$q8v = 'Below Expectation';
}
else
{
	$q8v = 'Unsatisfactory Performance';
}

$q9v = '';
if($q9 == 4)
{
	$q9v = 'Exceeds Expectation';
}
else if($q9 == 3)
{
	$q9v = 'Meets Expectation';
}
else if($q9 == 2)
{
	$q9v = 'Below Expectation';
}
else
{
	$q9v = 'Unsatisfactory Performance';
}

$q10v = '';
if($q10 == 4)
{
	$q10v = 'Exceeds Expectation';
}
else if($q10 == 3)
{
	$q10v = 'Meets Expectation';
}
else if($q10 == 2)
{
	$q10v = 'Below Expectation';
}
else
{
	$q10v = 'Unsatisfactory Performance';
}

$q11v = '';
if($q11 == 4)
{
	$q11v = 'Exceeds Expectation';
}
else if($q11 == 3)
{
	$q11v = 'Meets Expectation';
}
else if($q11 == 2)
{
	$q11v = 'Below Expectation';
}
else
{
	$q11v = 'Unsatisfactory Performance';
}

$q12v = '';
if($q12 == 4)
{
	$q12v = 'Exceeds Expectation';
}
else if($q12 == 3)
{
	$q12v = 'Meets Expectation';
}
else if($q12 == 2)
{
	$q12v = 'Below Expectation';
}
else
{
	$q12v = 'Unsatisfactory Performance';
}

$q13v = '';
if($q13 == 4)
{
	$q13v = 'Exceeds Expectation';
}
else if($q13 == 3)
{
	$q13v = 'Meets Expectation';
}
else if($q13 == 2)
{
	$q13v = 'Below Expectation';
}
else
{
	$q13v = 'Unsatisfactory Performance';
}

$q14v = '';
if($q14 == 4)
{
	$q14v = 'Exceeds Expectation';
}
else if($q14 == 3)
{
	$q14v = 'Meets Expectation';
}
else if($q14 == 2)
{
	$q14v = 'Below Expectation';
}
else
{
	$q14v = 'Unsatisfactory Performance';
}
if (isset($_POST['submit'])){

$message=NULL;
	
  if (empty($_POST['remarks'])){
  	$remarks="";
  	$message="All field must be answered";
  }else
  	$remarks=$_POST['remarks'];


if(!isset($message)){
$message="Technical Evaluation Created: Score= ".$totalEvaluationScore." Actual Verdict: ".$aRemarks." Suggested Verdict: ".$remarks;
echo $appNum.$totalEvaluationScore.$remarks.$aRemarks.$currentEmpNum.$currentDate.$status;
//Insert contract number in applicants table USE WHERE STATEMENT
}
 

}/*End of main Submit conditional*/

if (isset($message)){
 echo '<font color="red">'.$message. '</font>';
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
		
    <title>Initial Interview Details</title>
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
                <a href="recruitment.php" class="list-group-item active"><span class="glyphicon glyphicon-eye-open"></span> Recruitment</a>

                <!-- employee -->
                <a href="employees.php" class="list-group-item"><span class="glyphicon glyphicon-pawn"></span> Employees</a>				
               	
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
                          
                          <form class="form-horizontal tasi-form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
							<label class="col-lg-1">Applicant: </label>
							<div class="col-lg-3">
                             <?php echo $name?>
                             </div>	
                            <label class="col-lg-1">Date: </label>
							<div class="col-lg-3">
							<?php echo $dateEvaluated?>			
                             </div>	  
                             <h2 style="margin-left: 10px;"><br>Interview Details</h2>
							<!--  <p class="indent">(5) Outstanding Performance is consistently superior</p>-->
                            <p class="indent">(4) Exceeds Expectations Performance is routinely above job requirements</p>
                            <p class="indent">(3) Meets Expectations Performance is regularly competent and dependable</p>
                            <p class="indent">(2) Below Expectations Performance fails to meet job requirements on a frequent basis</p>
                            <p class="indent">(1) Unsatisfactory Performance is consistently unacceptable</p>		  
                            <table border="1" class="table table-bordered table-hover table-striped">  
                            <thead>
                            <tr>
                                <th></th>
                                <th>Verdict</th>                                
                            </tr>
                            </thead> 
                             <tbody>                       
									<tr>
									<td><label style="margin-left: 20px;"> 1. Poise and Self Confidence</label></td>
									<td><label style="margin-left: 20px;"><?php echo $q1v?></label></td>
									</tr>
									<tr><td><label style="margin-left: 20px;"> <br>2. Verbal Communication Skills</label></td>
										<td><label style="margin-left: 20px;"><?php echo $q2v?></label></td></tr>
									<tr><td><label style="margin-left: 20px;"> <br>3. Listening Ability and Nonverbal Communication</label></td>
										<td><label style="margin-left: 20px;"><?php echo $q3v?></label></td></tr>
									<tr><td><label style="margin-left: 20px;"> <br>4. Clarity of Career Interests and Goals</label></td>
										<td><label style="margin-left: 20px;"><?php echo $q4v?></label></td></tr>
									<tr><td><label style="margin-left: 20px;"> <br>5. Ability to Link Prior Work Experience to Position</label></td>
										<td><label style="margin-left: 20px;"><?php echo $q5v?></label></td></tr>
									<tr><td><label style="margin-left: 20px;"> <br>6. Knowledge of Industry</label></td>
										<td><label style="margin-left: 20px;"><?php echo $q6v?></label></td></tr>
									<tr><td><label style="margin-left: 20px;"> <br>7. Interest in and Enthusiasm toward Opportunity</label></td>
										<td><label style="margin-left: 20px;"><?php echo $q7v?></label></td></tr>
									<tr><td><label style="margin-left: 20px;"> <br>8. Demonstrates Knowledge of Company and Position</label></td>
										<td><label style="margin-left: 20px;"><?php echo $q8v?></label></td></tr>
									<tr><td><label style="margin-left: 20px;"> <br>9. Response of Applicant During Interview</label></td>
										<td><label style="margin-left: 20px;"><?php echo $q9v?></label></td></tr>
									<tr><td><label style="margin-left: 20px;"> <br>10. Meeting the  minimum requirements of the job</label></td>
										<td><label style="margin-left: 20px;"><?php echo $q10v?></label></td></tr>
									<tr><td><label style="margin-left: 20px;"> <br>11. Previous Work Experience</label></td>
										<td><label style="margin-left: 20px;"><?php echo $q11v?></label></td></tr>
									<tr><td><label style="margin-left: 20px;"> <br>12. Gaps in Reported Work Experience</label></td>
										<td><label style="margin-left: 20px;"><?php echo $q12v?></label></td></tr>
									<tr><td><label style="margin-left: 20px;"> <br>13. Knowledge about the Job</label></td>
										<td><label style="margin-left: 20px;"><?php echo $q13v?></label></td></tr>
									<tr><td><label style="margin-left: 20px;"> <br>14. Skills (Administrative or Technical)</label></td>
										<td><label style="margin-left: 20px;"><?php echo $q14v?></label></td></tr>
									</tbody>	
									</table>									
                                        
	                                    <h2 style="margin-left: 10px;"><br>Remarks</h2>	                                    
										<div class="row indent col-lg-8">
										<?php echo $remarks?>
										</div>
									
										<div class="panel-body" style="margin-top:70px;margin-left:7px;">											
											<a class="btn btn-default"  href="recruitment.php"> Previous </a> 
										</div>
							  </form>
						  </div>
				  </section>				  				 
			</div>   		       
    </div>
 <script>
	function myFunction() {
	    var x;
	    if (confirm("Interview Success!") == true) {
	        window.location.href="home.php";
	    } else {
	        x = "You pressed Cancel!";
	    }
	}
</script>
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