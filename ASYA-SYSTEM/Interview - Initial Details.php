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
$status =1;

// Get All applicant name and put in array
$queryForName="SELECT * FROM applicants WHERE APPNO = '{$appNum}'";
$resultNames=mysqli_query($dbc,$queryForName);
$rows=mysqli_fetch_array($resultNames,MYSQLI_ASSOC);
$name = $rows['FIRSTNAME'].' '.$rows['LASTNAME'];

$flag=0;
if (isset($_POST['submit'])){

$message=NULL;
	
  if (empty($_POST['remarks'])){
  	$remarks="";
  	$message="All field must be answered";
  }else
  	$remarks=$_POST['remarks'];


if(!isset($message)){
$query="	  UPDATE 	app_evaluation 		
				 SET	TOTALSCORE = '{$totalEvaluationScore}', REMARKS = '{$remarks}', AREMARKS = '{$aRemarks}', EVALUATORID = '{$currentEmpNum}', DATE = '{$currentDate}', STATUS =  '{$status}'
			   WHERE	APPNO = '{$appNum}'
			";
$resultinsert= mysqli_query($dbc,$query);
$message="Technical Evaluation Created: Score= ".$totalEvaluationScore." Actual Verdict: ".$aRemarks." Suggested Verdict: ".$remarks;
echo $appNum.$totalEvaluationScore.$remarks.$aRemarks.$currentEmpNum.$currentDate.$status;
//Insert contract number in applicants table USE WHERE STATEMENT
$queryForENInsert="UPDATE 	applicants
					SET	EVALUATIONNUMBER = 0
					WHERE  APPNO = '{$appNum}'
					";
$resultENInsert=mysqli_query($dbc,$queryForENInsert);
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
					  <section class="panel">					  
                          <div class="panel-body">
                          <h2 style="margin-left: 10px;"><br>Interview Details</h2>
                          <form class="form-horizontal tasi-form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
							<label class="col-lg-1">Applicant: </label>
							<div class="col-lg-3">
                             <?php echo $name?>
                             </div>	
                            <label class="col-lg-1">Date: </label>
							<div class="col-lg-3">
							<?php echo $currentDate?>			
                             </div>
									  
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
									<td><label style="margin-left: 20px;">Test Versidct</label></td>
									</tr>
									<tr><td><label style="margin-left: 20px;"> <br>2. Verbal Communication Skills</label></td>
										<div class="col-lg-10">
											<td><label class="radio-inline">
												<input type="radio" name="optionsRadios2" id="optionsRadios1" value="4"> 
											</label></td>
										</div></tr>
									<tr><td><label style="margin-left: 20px;"> <br>3. Listening Ability and Nonverbal Communication</label></td>
										<div class="col-lg-10">
											<td><label class="radio-inline">
												<input type="radio" name="optionsRadios3" id="optionsRadios1" value="4"> 
											</label></td>
										</div></tr>
									<tr><td><label style="margin-left: 20px;"> <br>4. Clarity of Career Interests and Goals</label></td>
										<div class="col-lg-10">
											<td><label class="radio-inline">
												<input type="radio" name="optionsRadios4" id="optionsRadios1" value="4"> 
											</label></td>
										</div></tr>
									<tr><td><label style="margin-left: 20px;"> <br>5. Ability to Link Prior Work Experience to Position</label></td>
										<div class="col-lg-10">
											<td><label class="radio-inline">
												<input type="radio" name="optionsRadios5" id="optionsRadios1" value="4"> 
											</label></td>
										</div></tr>
									<tr><td><label style="margin-left: 20px;"> <br>6. Knowledge of Industry</label></td>
										<div class="col-lg-10">
											<td><label class="radio-inline">
												<input type="radio" name="optionsRadios6" id="optionsRadios1" value="4"> 
											</label></td>
										</div></tr>
									<tr><td><label style="margin-left: 20px;"> <br>7. Interest in and Enthusiasm toward Opportunity</label></td>
										<div class="col-lg-10">
											<td><label class="radio-inline">
												<input type="radio" name="optionsRadios7" id="optionsRadios1" value="4"> 
											</label></td>
										</div></tr>
									<tr><td><label style="margin-left: 20px;"> <br>8. Demonstrates Knowledge of Company and Position</label></td>
										<div class="col-lg-10">
											<td><label class="radio-inline">
												<input type="radio" name="optionsRadios8" id="optionsRadios1" value="4"> 
											</label></td>
										</div></tr>
									<tr><td><label style="margin-left: 20px;"> <br>9. Response of Applicant During Interview</label></td>
										<div class="col-lg-10">
											<td><label class="radio-inline">
												<input type="radio" name="optionsRadios9" id="optionsRadios1" value="4"> 
											</label></td>
										</div></tr>
									<tr><td><label style="margin-left: 20px;"> <br>10. Meeting the  minimum requirements of the job</label></td>
										<div class="col-lg-10">
											<td><label class="radio-inline">
												<input type="radio" name="optionsRadios10" id="optionsRadios1" value="4"> 
											</label></td>
										</div></tr>
									<tr><td><label style="margin-left: 20px;"> <br>11. Previous Work Experience</label></td>
										<div class="col-lg-10">
											<td><label class="radio-inline">
												<input type="radio" name="optionsRadios11" id="optionsRadios1" value="4"> 
											</label></td>
										</div></tr>
									<tr><td><label style="margin-left: 20px;"> <br>12. Gaps in Reported Work Experience</label></td>
										<div class="col-lg-10">
											<td><label class="radio-inline">
												<input type="radio" name="optionsRadios12" id="optionsRadios1" value="4"> 
											</label></td>
										</div></tr>
									<tr><td><label style="margin-left: 20px;"> <br>13. Knowledge about the Job</label></td>
										<div class="col-lg-10">
											<td><label class="radio-inline">
												<input type="radio" name="optionsRadios13" id="optionsRadios1" value="4"> 
											</label></td>
										</div></tr>
									<tr><td><label style="margin-left: 20px;"> <br>14. Skills (Administrative or Technical)</label></td>
										<div class="col-lg-10">
											<td><label class="radio-inline">
												<input type="radio" name="optionsRadios14" id="optionsRadios1" value="4"> 
											</label></td>
										</div></tr>
									</tbody>	
									</table>									
                                        
	                                    <h2 style="margin-left: 10px;"><br>Remarks</h2>	                                    
										<div class="row indent col-lg-8">
										Remarks here
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