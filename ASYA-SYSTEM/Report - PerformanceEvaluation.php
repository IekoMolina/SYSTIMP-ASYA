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
$appNum= $_POST['empPElink'];
// Get All applicant name and put in array
$queryForName="SELECT * FROM applicants WHERE APPNO = '{$appNum}'";
$resultNames=mysqli_query($dbc,$queryForName);
$rows=mysqli_fetch_array($resultNames,MYSQLI_ASSOC);
$name = $rows['FIRSTNAME'].' '.$rows['LASTNAME'];

$flag=0;
if (isset($_POST['submit'])){

$message=NULL;
	
 if (empty($_POST['optionsRadios'])){
 	$optionRadios=0;
 	$message="All field must be answered";
 }else
  $optionRadios=$_POST['optionsRadios'];

 if (empty($_POST['optionsRadios2'])){
  $optionRadios2=0;
  $message="All field must be answered";
 }else
  $optionRadios2=$_POST['optionsRadios2'];
 
 
// score for assessing applicant
$totalEvaluationScore = $optionRadios+$optionRadios2+$optionRadios3+$optionRadios4+$optionRadios5+$optionRadios6+$optionRadios7+$optionRadios8+$optionRadios9+$optionRadios10+$optionRadios11+$optionRadios12+$optionRadios13+$optionRadios14;
  //actual evaluation of manager
  if (empty($_POST['remarks'])){
  	$remarks="";
  	$message="All field must be answered";
  }else
  	$remarks=$_POST['remarks'];


if(!isset($message)){
$queryinsert="insert into app_evaluation (APPNO,TOTALSCORE,EVALUATION,REMARKS,AREMARKS,EVALUATORID,DATE, STATUS) values ('{$appNum}','{$totalEvaluationScore}','{$evaluation}','{$remarks}', '{$aRemarks}','{$currentEmpNum}','{$currentDate}','{$status}')";
$resultinsert= mysqli_query($dbc,$queryinsert);
$message="Technical Evaluation Created: Score= ".$totalEvaluationScore." Actual Verdict: ".$aRemarks." Suggested Verdict: ".$remarks;

//Insert contract number in applicants table USE WHERE STATEMENT
$queryForENInsert="UPDATE 	applicants
					SET	EVALUATIONNUMBER = 0
					WHERE  APPNO = $appNum
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
		
    <title>Technical Evaluation</title>
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
                <a href="recruitment.php" class="list-group-item"><span class="glyphicon glyphicon-eye-open"></span> Recruitment</a>

                <!-- employee -->
                <a href="employees.php" class="list-group-item active"><span class="glyphicon glyphicon-pawn"></span> Employees</a>
				
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
                          <form class="form-horizontal tasi-form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
	                        <h4 align="center">
							ASYA <br>
							Performance Evaluation Report<br>
							<?php echo $currentDate?>					
							</h4>
							<!--  Employee Infor table -->
                            <table border="1" class="table table-bordered table-hover table-striped">  
                            <thead>
                            </thead> 
	                            <tbody>                       
		                        <tr>
	                                <td>Employee Name:</td>
	                                <td></td>
	                                <td>Position:</td>
	                                <td>2</td>                               
	                            </tr>
		                        <tr>
	                                <td>Evaluated By:</td>
	                                <td></td>
	                                <td>Date Hired:</td>
	                                <td>2</td>                               
	                            </tr>
		                        <tr>
	                                <td>Employment Status:</td>
	                                <td></td>
	                                <td>Evaluation Period:</td>
	                                <td>2</td>                               
	                            </tr>	                            	                            
								</tbody>
							</table>
							<br>
                            <table border="1" class="table table-bordered table-hover table-striped">  
                            <thead>
                            	<tr>
                            		<th>Rater</th>
                            		<th>Weight</th>
                            		<th>Weighted Score</th>
                            	</tr>
                            </thead> 
	                            <tbody>                       
		                        <tr>
	                                <td><b>Immediate Superior</b></td>
	                                <td>70%</td>
	                                <td></td>                              
	                            </tr><br>
		                        <tr>
	                                <td><b>HR Manager</b></td>
	                                <td>30%</td>
	                                <td></td>                               
	                            </tr>
		                        <tr class="indent">
	                                <td>Attendance</td>
	                                <td></td>
	                                <td></td>                               
	                            </tr>
		                        <tr class="indent">
	                                <td>Punctuality</td>
	                                <td></td>
	                                <td></td>                               
	                            </tr>
		                        <tr class="indent">
	                                <td>Under Time</td>
	                                <td></td>
	                                <td></td>                               
	                            </tr>
		                        <tr class="indent">
	                                <td>Extra Factors</td>
	                                <td></td>
	                                <td></td>                               
	                            </tr><br>
		                        <tr>
	                                <td></td>
	                                <td><b>Total Weighted Score:</b></td>
	                                <td></td>                               
	                            </tr>
		                        <tr>
	                                <td></td>
	                                <td><b>Descriptive Value:</b></td>
	                                <td></td>                               
	                            </tr>	                            	                            	                            	                            	                            	                            	                            
								</tbody>
							</table>
							<br>
                            <table border="1" class="table table-bordered table-hover table-striped">  
                            <thead>
                            	<tr>
                            		<th> Observation and Comments By:</th>
                            		<th></th>
                            	</tr>
                            </thead> 
	                            <tbody>                       
		                        <tr>
	                                <td>Immediate Superior</td>
	                                <td>Giber Gaber</td>                         
	                            </tr>
		                        <tr>
	                                <td>HR Manager</td>
	                                <td>Jiber Jaber</td>                             
	                            </tr>	                            	                            
								</tbody>
							</table>														
							<br><br>
							<div class="row" align="center">
								A Place Bldg, Coral Way Drive, CBP1, Island A, MOA Complex, Pasay City <br>
								Tel No.:8085888|asya@asyadesign.com.ph|www.asyadesign.com.ph <br>
								<b>---END OF REPORT---</b>
							</div><br>
							<div class="row" style="margin-top:70px;margin-left:7px;">											
								<button name="submit" type="submit" class="btn btn-success" data-toggle="modal" href="#myModalTE">Print</button>
								<a class="btn btn-danger"  href="employees.php"> Previous </a> 
							</div>																															
							  </form>
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