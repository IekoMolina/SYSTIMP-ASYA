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
$appNum= $_POST['empElink'];
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
 
 if (empty($_POST['optionsRadios3'])){
  $optionRadios3=0;
  $message="All field must be answered";
 }else
  $optionRadios3=$_POST['optionsRadios3'];
 
 if (empty($_POST['optionsRadios4'])){
  $optionRadios4=0;
  $message="All field must be answered";
 }else
  $optionRadios4=$_POST['optionsRadios4'];
  
 if (empty($_POST['optionsRadios5'])){
  $optionRadios5=0;
  $message="All field must be answered";
  }else
  $optionRadios5=$_POST['optionsRadios5'];
  
 if (empty($_POST['optionsRadios6'])){
  $optionRadios6=0;
  $message="All field must be answered";
 }else
  $optionRadios6=$_POST['optionsRadios6'];
 
 if (empty($_POST['optionsRadios7'])){
  $optionRadios7=0;
  $message="All field must be answered";
 }else
  	$optionRadios7=$_POST['optionsRadios7'];
 
 if (empty($_POST['optionsRadios8'])){
  $optionRadios8=0;
  $message="All field must be answered";
 }else
  $optionRadios8=$_POST['optionsRadios8'];
 
 if (empty($_POST['optionsRadios9'])){
  $optionRadios9=0;
  $message="All field must be answered";
 }else
  $optionRadios9=$_POST['optionsRadios9'];
 
 if (empty($_POST['optionsRadios10'])){
  $optionRadios10=0;
  $message="All field must be answered";
 }else
  $optionRadios10=$_POST['optionsRadios10'];
 
 if (empty($_POST['optionsRadios11'])){
  $optionRadios11=0;
  $message="All field must be answered";
 }else
  $optionRadios11=$_POST['optionsRadios11'];
 
 if (empty($_POST['optionsRadios12'])){
  $optionRadios12=0;
  $message="All field must be answered";
 }else
  $optionRadios12=$_POST['optionsRadios12'];
 
 if (empty($_POST['optionsRadios13'])){
  $optionRadios13=0;
  $message="All field must be answered";
 }else
  $optionRadios13=$_POST['optionsRadios13'];
 
 if (empty($_POST['optionsRadios14'])){
  $optionRadios14=0;
  $message="All field must be answered";
 }else
  $optionRadios14=$_POST['optionsRadios14'];

 if (empty($_POST['optionsRadios15'])){
  $optionRadios15=0;
  $message="All field must be answered";
 }else
  $optionRadios15=$_POST['optionsRadios15'];
  
 if (empty($_POST['optionsRadios16'])){
  $optionRadios16=0;
  $message="All field must be answered";
 }else
  $optionRadios16=$_POST['optionsRadios16'];
 
 if (empty($_POST['optionsRadios17'])){
  $optionRadios17=0;
  $message="All field must be answered";
 }else
  $optionRadios17=$_POST['optionsRadios17'];
 
 if (empty($_POST['optionsRadios18'])){
  $optionRadios18=0;
  $message="All field must be answered";
 }else
  $optionRadios18=$_POST['optionsRadios18'];  

  if (empty($_POST['optionsRadios19'])){
  	$optionRadios19=0;
  	$message="All field must be answered";
  }else
  	$optionRadios19=$_POST['optionsRadios19'];


  if (empty($_POST['optionsRadiosE'])){
  	$optionRadiosE=0;
  	$message="All field must be answered";
  }else
  	$optionRadiosE=$_POST['optionsRadiosE'];
 

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
		
    <title>Performance Evaluation</title>
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
                <a href="employees.php" class="list-group-item  active"><span class="glyphicon glyphicon-pawn"></span> Employees</a>
				
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
                            <label class="col-lg-2">Evaluation Period: </label>
							<div class="col-lg-2">
							<?php echo $currentDate?>			
                             </div>
                            <label class="col-lg-1">Department: </label>
							<div class="col-lg-3">
							<?php echo $currentDate?>			
                             </div>
                          </div>

							<h2 style="margin-left: 10px;"><br>Evaluation</h2>		  
							<p class="indent">(5) Outstanding</p>
                            <p class="indent">(4) Exceeds Expectations</p>
                            <p class="indent">(3) Meets Expectations</p>
                            <p class="indent">(2) Below Expectations</p>
                            <p class="indent">(1) Unsatisfactory</p>
                            <table border="1" class="table table-bordered table-hover table-striped">  
                            <thead>
                            <tr>
                                <th>Evaluation Criteria</th>
                                <th>5</th>
                                <th>4</th>
                                <th>3</th>
                                <th>2</th>
                                <th>1</th>                                
                            </tr>
                            </thead> 
                             <tbody>
                             		<tr>
                             			<td><b>Attendance</b></td>
                             			<td></td>
                             			<td></td>
                             			<td></td>
                             			<td></td>
                             			<td></td>
                             		</tr>                       
									<tr><td><label style="margin-left: 20px;"> 1. Absences</label></td>
										<div class="col-lg-10">
											<td><label class="radio-inline">
												<input type="radio" name="optionsRadios" id="optionsRadios0" value="5"> 
											</label></td>	
											<td><label class="radio-inline">
												<input type="radio" name="optionsRadios" id="optionsRadios1" value="4"> 
											</label></td>
											<td><label class="radio-inline">
												<input type="radio" name="optionsRadios" id="optionsRadios2" value="3"> 
											</label></td>
											<td><label class="radio-inline">
												<input type="radio" name="optionsRadios" id="optionsRadios3" value="2"> 
											</label></td>
											<td><label class="radio-inline">
												<input type="radio" name="optionsRadios" id="optionsRadios4" value="1"> 
											</label></td>
										</div></tr>
									<tr><td><label style="margin-left: 20px;"> <br>2. Punctuality</label></td>
										<div class="col-lg-10">
											<td><label class="radio-inline">
												<input type="radio" name="optionsRadios2" id="optionsRadios0" value="5"> 
											</label></td>										
											<td><label class="radio-inline">
												<input type="radio" name="optionsRadios2" id="optionsRadios1" value="4"> 
											</label></td>
											<td><label class="radio-inline">
												<input type="radio" name="optionsRadios2" id="optionsRadios2" value="3"> 
											</label></td>
											<td><label class="radio-inline">
												<input type="radio" name="optionsRadios2" id="optionsRadios3" value="2"> 
											</label></td>
											<td><label class="radio-inline">
												<input type="radio" name="optionsRadios2" id="optionsRadios4" value="1"> 
											</label></td>
										</div></tr>
									<tr><td><label style="margin-left: 20px;"> <br>3. Under Time</label></td>
										<div class="col-lg-10">
											<td><label class="radio-inline">
												<input type="radio" name="optionsRadios3" id="optionsRadios0" value="5"> 
											</label></td>										
											<td><label class="radio-inline">
												<input type="radio" name="optionsRadios3" id="optionsRadios1" value="4"> 
											</label></td>
											<td><label class="radio-inline">
												<input type="radio" name="optionsRadios3" id="optionsRadios2" value="3"> 
											</label></td>
											<td><label class="radio-inline">
												<input type="radio" name="optionsRadios3" id="optionsRadios3" value="2"> 
											</label></td>
											<td><label class="radio-inline">
												<input type="radio" name="optionsRadios3" id="optionsRadios4" value="1"> 
											</label></td>
										</div></tr>
									<tr><td><label style="margin-left: 20px;"> <br>4. Half-day</label></td>
										<div class="col-lg-10">
											<td><label class="radio-inline">
												<input type="radio" name="optionsRadios3" id="optionsRadios0" value="5"> 
											</label></td>											
											<td><label class="radio-inline">
												<input type="radio" name="optionsRadios4" id="optionsRadios1" value="4"> 
											</label></td>
											<td><label class="radio-inline">
												<input type="radio" name="optionsRadios4" id="optionsRadios2" value="3"> 
											</label></td>
											<td><label class="radio-inline">
												<input type="radio" name="optionsRadios4" id="optionsRadios3" value="2"> 
											</label></td>
											<td><label class="radio-inline">
												<input type="radio" name="optionsRadios4" id="optionsRadios4" value="1"> 
											</label></td>
										</div></tr>
                             		<tr>
                             			<td><b>Conduct and Compliance</b></td>
                             			<td></td>
                             			<td></td>
                             			<td></td>
                             			<td></td>
                             			<td></td>
                             		</tr>										
									<tr><td><label style="margin-left: 20px;"> <br>1. Discussion Notice</label></td>
										<div class="col-lg-10">
											<td><label class="radio-inline">
												<input type="radio" name="optionsRadios5" id="optionsRadios0" value="5"> 
											</label></td>										
											<td><label class="radio-inline">
												<input type="radio" name="optionsRadios5" id="optionsRadios1" value="4"> 
											</label></td>
											<td><label class="radio-inline">
												<input type="radio" name="optionsRadios5" id="optionsRadios2" value="3"> 
											</label></td>
											<td><label class="radio-inline">
												<input type="radio" name="optionsRadios5" id="optionsRadios3" value="2"> 
											</label></td>
											<td><label class="radio-inline">
												<input type="radio" name="optionsRadios5" id="optionsRadios4" value="1"> 
											</label></td>
										</div></tr>
									<tr><td><label style="margin-left: 20px;"> <br>2. First Written Warning</label></td>
										<div class="col-lg-10">
											<td><label class="radio-inline">
												<input type="radio" name="optionsRadios6" id="optionsRadios0" value="5"> 
											</label></td>										
											<td><label class="radio-inline">
												<input type="radio" name="optionsRadios6" id="optionsRadios1" value="4"> 
											</label></td>
											<td><label class="radio-inline">
												<input type="radio" name="optionsRadios6" id="optionsRadios2" value="3"> 
											</label></td>
											<td><label class="radio-inline">
												<input type="radio" name="optionsRadios6" id="optionsRadios3" value="2"> 
											</label></td>
											<td><label class="radio-inline">
												<input type="radio" name="optionsRadios6" id="optionsRadios4" value="1"> 
											</label></td>
										</div></tr>
									<tr><td><label style="margin-left: 20px;"> <br>3. Second Written Warning</label></td>
										<div class="col-lg-10">
											<td><label class="radio-inline">
												<input type="radio" name="optionsRadios7" id="optionsRadios0" value="5"> 
											</label></td>										
											<td><label class="radio-inline">
												<input type="radio" name="optionsRadios7" id="optionsRadios1" value="4"> 
											</label></td>
											<td><label class="radio-inline">
												<input type="radio" name="optionsRadios7" id="optionsRadios2" value="3"> 
											</label></td>
											<td><label class="radio-inline">
												<input type="radio" name="optionsRadios7" id="optionsRadios3" value="2"> 
											</label></td>
											<td><label class="radio-inline">
												<input type="radio" name="optionsRadios7" id="optionsRadios4" value="1"> 
											</label></td>
										</div></tr>
									<tr><td><label style="margin-left: 20px;"> <br>4. Stern Warning or Final Warning</label></td>
										<div class="col-lg-10">
											<td><label class="radio-inline">
												<input type="radio" name="optionsRadios8" id="optionsRadios0" value="5"> 
											</label></td>										
											<td><label class="radio-inline">
												<input type="radio" name="optionsRadios8" id="optionsRadios1" value="4"> 
											</label></td>
											<td><label class="radio-inline">
												<input type="radio" name="optionsRadios8" id="optionsRadios2" value="3"> 
											</label></td>
											<td><label class="radio-inline">
												<input type="radio" name="optionsRadios8" id="optionsRadios3" value="2"> 
											</label></td>
											<td><label class="radio-inline">
												<input type="radio" name="optionsRadios8" id="optionsRadios4" value="1"> 
											</label></td>
										</div></tr>
                             		<tr>
                             			<td><b>Active Participation</b></td>
                             			<td></td>
                             			<td></td>
                             			<td></td>
                             			<td></td>
                             			<td></td>
                             		</tr>										
									<tr><td><label style="margin-left: 20px;"> <br>1. Attendance in Internal/External trainings and seminars</label></td>
										<div class="col-lg-10">
											<td><label class="radio-inline">
												<input type="radio" name="optionsRadios9" id="optionsRadios0" value="5"> 
											</label></td>										
											<td><label class="radio-inline">
												<input type="radio" name="optionsRadios9" id="optionsRadios1" value="4"> 
											</label></td>
											<td><label class="radio-inline">
												<input type="radio" name="optionsRadios9" id="optionsRadios2" value="3"> 
											</label></td>
											<td><label class="radio-inline">
												<input type="radio" name="optionsRadios9" id="optionsRadios3" value="2"> 
											</label></td>
											<td><label class="radio-inline">
												<input type="radio" name="optionsRadios9" id="optionsRadios4" value="1"> 
											</label></td>
										</div></tr>
									<tr><td><label style="margin-left: 20px;"> <br>2. Active participation in Company activities such as Christmas Party, ASYA Cup and Outing</label></td>
										<div class="col-lg-10">
											<td><label class="radio-inline">
												<input type="radio" name="optionsRadios10" id="optionsRadios0" value="5"> 
											</label></td>										
											<td><label class="radio-inline">
												<input type="radio" name="optionsRadios10" id="optionsRadios1" value="4"> 
											</label></td>
											<td><label class="radio-inline">
												<input type="radio" name="optionsRadios10" id="optionsRadios2" value="3"> 
											</label></td>
											<td><label class="radio-inline">
												<input type="radio" name="optionsRadios10" id="optionsRadios3" value="2"> 
											</label></td>
											<td><label class="radio-inline">
												<input type="radio" name="optionsRadios10" id="optionsRadios4" value="1"> 
											</label></td>
										</div></tr>
									<tr>
                             			<td><b>Core Values</b></td>
                             			<td></td>
                             			<td></td>
                             			<td></td>
                             			<td></td>
                             			<td></td>
                             		</tr>										
									<tr><td><label style="margin-left: 20px;"> <br>1. Loyalty</label></td>
										<div class="col-lg-10">
											<td><label class="radio-inline">
												<input type="radio" name="optionsRadios11" id="optionsRadios0" value="5"> 
											</label></td>										
											<td><label class="radio-inline">
												<input type="radio" name="optionsRadios11" id="optionsRadios1" value="4"> 
											</label></td>
											<td><label class="radio-inline">
												<input type="radio" name="optionsRadios11" id="optionsRadios2" value="3"> 
											</label></td>
											<td><label class="radio-inline">
												<input type="radio" name="optionsRadios11" id="optionsRadios3" value="2"> 
											</label></td>
											<td><label class="radio-inline">
												<input type="radio" name="optionsRadios11" id="optionsRadios4" value="1"> 
											</label></td>
										</div></tr>
									<tr><td><label style="margin-left: 20px;"> <br>2. Trustworthiness</label></td>
										<div class="col-lg-10">
											<td><label class="radio-inline">
												<input type="radio" name="optionsRadios12" id="optionsRadios0" value="5"> 
											</label></td>										
											<td><label class="radio-inline">
												<input type="radio" name="optionsRadios12" id="optionsRadios1" value="4"> 
											</label></td>
											<td><label class="radio-inline">
												<input type="radio" name="optionsRadios12" id="optionsRadios2" value="3"> 
											</label></td>
											<td><label class="radio-inline">
												<input type="radio" name="optionsRadios12" id="optionsRadios3" value="2"> 
											</label></td>
											<td><label class="radio-inline">
												<input type="radio" name="optionsRadios12" id="optionsRadios4" value="1"> 
											</label></td>
										</div></tr>
									<tr><td><label style="margin-left: 20px;"> <br>3. Discipline</label></td>
										<div class="col-lg-10">
											<td><label class="radio-inline">
												<input type="radio" name="optionsRadios13" id="optionsRadios0" value="5"> 
											</label></td>										
											<td><label class="radio-inline">
												<input type="radio" name="optionsRadios13" id="optionsRadios1" value="4"> 
											</label></td>
											<td><label class="radio-inline">
												<input type="radio" name="optionsRadios13" id="optionsRadios2" value="3"> 
											</label></td>
											<td><label class="radio-inline">
												<input type="radio" name="optionsRadios13" id="optionsRadios3" value="2"> 
											</label></td>
											<td><label class="radio-inline">
												<input type="radio" name="optionsRadios13" id="optionsRadios4" value="1"> 
											</label></td>
										</div></tr>
									<tr><td><label style="margin-left: 20px;"> <br>4. Passion and Commitment at Work</label></td>
										<div class="col-lg-10">
											<td><label class="radio-inline">
												<input type="radio" name="optionsRadios14" id="optionsRadios0" value="5"> 
											</label></td>										
											<td><label class="radio-inline">
												<input type="radio" name="optionsRadios14" id="optionsRadios1" value="4"> 
											</label></td>
											<td><label class="radio-inline">
												<input type="radio" name="optionsRadios14" id="optionsRadios2" value="3"> 
											</label></td>
											<td><label class="radio-inline">
												<input type="radio" name="optionsRadios14" id="optionsRadios3" value="2"> 
											</label></td>
											<td><label class="radio-inline">
												<input type="radio" name="optionsRadios14" id="optionsRadios4" value="1"> 
											</label></td>
										</div></tr>
									<tr><td><label style="margin-left: 20px;"> <br>5. Respect for Culture</label></td>
										<div class="col-lg-10">
											<td><label class="radio-inline">
												<input type="radio" name="optionsRadios15" id="optionsRadios0" value="5"> 
											</label></td>										
											<td><label class="radio-inline">
												<input type="radio" name="optionsRadios15" id="optionsRadios1" value="4"> 
											</label></td>
											<td><label class="radio-inline">
												<input type="radio" name="optionsRadios15" id="optionsRadios2" value="3"> 
											</label></td>
											<td><label class="radio-inline">
												<input type="radio" name="optionsRadios15" id="optionsRadios3" value="2"> 
											</label></td>
											<td><label class="radio-inline">
												<input type="radio" name="optionsRadios15" id="optionsRadios4" value="1"> 
											</label></td>
										</div></tr>
									<tr><td><label style="margin-left: 20px;"> <br>6. "Yes,We Can!" attitude</label></td>
										<div class="col-lg-10">
											<td><label class="radio-inline">
												<input type="radio" name="optionsRadios16" id="optionsRadios0" value="5"> 
											</label></td>										
											<td><label class="radio-inline">
												<input type="radio" name="optionsRadios16" id="optionsRadios1" value="4"> 
											</label></td>
											<td><label class="radio-inline">
												<input type="radio" name="optionsRadios16" id="optionsRadios2" value="3"> 
											</label></td>
											<td><label class="radio-inline">
												<input type="radio" name="optionsRadios16" id="optionsRadios3" value="2"> 
											</label></td>
											<td><label class="radio-inline">
												<input type="radio" name="optionsRadios16" id="optionsRadios4" value="1"> 
											</label></td>
										</div></tr>
									<tr><td><label style="margin-left: 20px;"> <br>7. Customer Delight</label></td>
										<div class="col-lg-10">
											<td><label class="radio-inline">
												<input type="radio" name="optionsRadios17" id="optionsRadios0" value="5"> 
											</label></td>										
											<td><label class="radio-inline">
												<input type="radio" name="optionsRadios17" id="optionsRadios1" value="4"> 
											</label></td>
											<td><label class="radio-inline">
												<input type="radio" name="optionsRadios17" id="optionsRadios2" value="3"> 
											</label></td>
											<td><label class="radio-inline">
												<input type="radio" name="optionsRadios17" id="optionsRadios3" value="2"> 
											</label></td>
											<td><label class="radio-inline">
												<input type="radio" name="optionsRadios17" id="optionsRadios4" value="1"> 
											</label></td>
										</div></tr>
									<tr><td><label style="margin-left: 20px;"> <br>8. Think like the owner concept</label></td>
										<div class="col-lg-10">
											<td><label class="radio-inline">
												<input type="radio" name="optionsRadios18" id="optionsRadios0" value="5"> 
											</label></td>										
											<td><label class="radio-inline">
												<input type="radio" name="optionsRadios18" id="optionsRadios1" value="4"> 
											</label></td>
											<td><label class="radio-inline">
												<input type="radio" name="optionsRadios18" id="optionsRadios2" value="3"> 
											</label></td>
											<td><label class="radio-inline">
												<input type="radio" name="optionsRadios18" id="optionsRadios3" value="2"> 
											</label></td>
											<td><label class="radio-inline">
												<input type="radio" name="optionsRadios18" id="optionsRadios4" value="1"> 
											</label></td>
										</div></tr>
									<tr><td><label style="margin-left: 20px;"> <br>9. Sustainability and Environment Focus</label></td>
										<div class="col-lg-10">
											<td><label class="radio-inline">
												<input type="radio" name="optionsRadios19" id="optionsRadios0" value="5"> 
											</label></td>										
											<td><label class="radio-inline">
												<input type="radio" name="optionsRadios19" id="optionsRadios1" value="4"> 
											</label></td>
											<td><label class="radio-inline">
												<input type="radio" name="optionsRadios19" id="optionsRadios2" value="3"> 
											</label></td>
											<td><label class="radio-inline">
												<input type="radio" name="optionsRadios19" id="optionsRadios3" value="2"> 
											</label></td>
											<td><label class="radio-inline">
												<input type="radio" name="optionsRadios19" id="optionsRadios4" value="1"> 
											</label></td>
										</div></tr>	
									<tr>
                             			<td><b>Extra Factors</b></td>
                             			<td></td>
                             			<td></td>
                             			<td></td>
                             			<td></td>
                             			<td></td>
                             		</tr>										
									<tr><td><label style="margin-left: 20px;"> <br>1. Zero Absences</label></td>
										<div class="col-lg-10">
											<td></td>
											<td></td>
											<td></td>
											<td></td>
											<td><input id="acceptTerms" name="EF1" type="checkbox" class="required"></td>
										</div></tr>
									<tr><td><label style="margin-left: 20px;"> <br>2. Zero Tardiness</label></td>
										<div class="col-lg-10">
											<td></td>
											<td></td>
											<td></td>
											<td></td>
											<td><input id="acceptTerms" name="EF2" type="checkbox" class="required"></td>
										</div></tr>
									<tr><td><label style="margin-left: 20px;"> <br>3. Zero Under time</label></td>
										<div class="col-lg-10">
											<td></td>
											<td></td>
											<td></td>
											<td></td>
											<td><input id="acceptTerms" name="EF3" type="checkbox" class="required"></td>
										</div></tr>
									<tr><td><label style="margin-left: 20px;"> <br>4. Zero Half-day</label></td>
										<div class="col-lg-10">
											<td></td>
											<td></td>
											<td></td>
											<td></td>
											<td><input id="acceptTerms" name="EF4" type="checkbox" class="required"></td>
										</div></tr>
									<tr><td><label style="margin-left: 20px;"> <br>5. Zero Disciplinary Action</label></td>
										<div class="col-lg-10">
											<td></td>
											<td></td>
											<td></td>
											<td></td>
											<td><input id="acceptTerms" name="EF5" type="checkbox" class="required"></td>
										</div></tr>																														
									</tbody>	
									</table>									
									                                        
	                                    <h2 style="margin-left: 10px;"><br>Remarks</h2>
										<div class="row indent col-lg-8">
										<input required name="remarks" type="text" class="form-control" >
										</div>
									
										<div class="panel-body" style="margin-top:70px;margin-left:7px;">											
											<button name="submit" type="submit" class="btn btn-success" data-toggle="modal" href="#myModalTE">Submit</button>
											<a class="btn btn-danger"  href="EachApplicant.php"> Previous </a> 
										</div>

										<div class="modal fade" id="myModalTE" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
											  <div class="modal-dialog modal-lg">
												  <div class="modal-content">
													  <div class="modal-header" style="background-color:#78CD51;">
														  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
														  <h4 class="modal-title"><?php echo $applicantName?> Evaluation Results</h4>
														   <div class="modal-body">
															<?php 
															echo
															'<table width="100%" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#000000" style="margin-right: 20px;">
																<tr>
																	<td width="6%"><div align="center"><b>Total Score
																	</div></b></td>
																	<td width="6%"><div align="center"><b>Remarks
																	</div></b></td>
																	<td width="6%"><div align="center"><b>Suggested Action
																	</div></b></td>
																</tr>';
															
															echo
															"<tr>
															<td width=\"8%\"><div align=\"center\">{$totalEvaluationScore}
															</div></td>
															<td width=\"8%\"><div align=\"center\">{$remarks}
															</div></td>
															<td width=\"10%\"><div align=\"left\">{$aRemarks}
															</div></td>
															</tr>";
															?>
															</div>
													  </div>
													  <!-- Letter Content All must come to contract DB-->													 
													  <div class="modal-footer">						  
														  <button data-dismiss="modal" class="btn btn-default" type="button" >Close</button>													  								  
													  </div>
												  </div>
											  </div>
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