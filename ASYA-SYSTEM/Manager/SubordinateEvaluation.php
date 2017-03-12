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
$appNum= $_POST['emplink'];
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
 
  if (empty($_POST['optionsRadiosE'])){
  	$optionRadiosE=0;
  	$message="All field must be answered";
  }else
  	$optionRadiosE=$_POST['optionsRadiosE'];
 
  //actual evaluation of manager
  $aRemarks = null;
  if ($optionRadiosE== 1)
  {
  	$aRemarks = "Not Qualified for the Position";
  }
  else if ($optionRadiosE== 2)
  {
  	$aRemarks = "For further eveluation";
  }
  else 
  {
  	$aRemarks = "For Hiring";
  }
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
            <a class="navbar-brand" href="home.html"><img src="asyalogo.jpg" /> </a>
        </div>
        </ul>
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
                <a href="home.php" class="list-group-item active"><span class="glyphicon glyphicon-home"></span> Home</a>
			
				<!-- employee info -->
                <a href="Employee info.php" class="list-group-item"><span class="glyphicon glyphicon-user"></span> Employee</a>
				
                <!-- reports -->
                <a href="#request-items" class="list-group-item" data-toggle="collapse" data-parent=".sidebar-nav">
                    <span class="glyphicon glyphicon-list-alt"></span> Request <span class="caret"></span>
                </a>
                <!-- request items -->
                <div class="list-group collapse" id="request-items">

                    <!-- FORMS -->
                    <a href="#attendance-reports" class="list-group-item" data-toggle="collapse">
                        <a href="Form - Absent Reversal.php" class="list-group-item">Absent Reversal</a>
						<a href="Form - Change Record.php" class="list-group-item">Change Record</a>
						<a href="Form - Itenerary Authorization.php" class="list-group-item">Itinerary Authorization</a>
						<a href="Form - Leave.php" class="list-group-item">Leave</a>
                        <a href="Form - Manpower.php" class="list-group-item">Manpower</a>
                        <a href="Form - Overtime.php" class="list-group-item">Overtime</a>
                        <a href="Form - Resignation.php" class="list-group-item">Resignation</a>
                        <a href="Form - Undertime.php" class="list-group-item">Undertime</a>
                    </a>
                   
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
							<?php echo $currentDate?>			
                             </div>

							<h2 style="margin-left: 10px;"><br>Evaluation</h2>		  
							<!--  <p class="indent">(5) Outstanding Performance is consistently superior</p>-->
                            <p class="indent">(15) Performance is consistently superior</p>
                            <p class="indent">(12) Exceeds Expectations Performance is routinely above job requirements</p>
                            <p class="indent">(9) Meets Expectations Performance is regularly competent and dependable</p>
                            <p class="indent">(6) Below Expectations Performance fails to meet job requirements on a frequent basis</p>
                            <p class="indent">(3) Unsatisfactory Performance is consistently unacceptable</p>
                            <table border="1" class="table table-bordered table-hover table-striped">  
                            <thead>
                            <tr>
                                <th>Category</th>
                                <th>15</th>
                                <th>12</th>
                                <th>9</th>
                                <th>6</th>
                                <th>3</th>                                
                            </tr>
                            </thead> 
                             <tbody>                       
									<tr><td><label style="margin-left: 20px;"><br> 1. INITIATIVE - Actively attempting to influence events to achieve goals; self-starting rather than passive acceptance.</label></td>
										<div class="col-lg-10">
											<td><select class="form-control m-bot15" name="optionsRadio1">
																				<option></option>
																				<option>3</option>
																				<option>2</option>
																				<option>1</option>
														 </select></td>
											<td><select class="form-control m-bot15" name="optionsRadio1">
																				<option></option>
																				<option>3</option>
																				<option>2</option>
																				<option>1</option>
														 </select></td>
											<td><select class="form-control m-bot15" name="optionsRadio1">
																				<option></option>
																				<option>3</option>
																				<option>2</option>
																				<option>1</option>
														 </select></td>
											<td><select class="form-control m-bot15" name="optionsRadio1">
																				<option></option>
																				<option>3</option>
																				<option>2</option>
																				<option>1</option>
														 </select></td>
											<td><select class="form-control m-bot15" name="optionsRadio1">
																				<option></option>
																				<option>3</option>
																				<option>2</option>
																				<option>1</option>
														 </select></td>
										</div></tr>
									<tr><td><label style="margin-left: 20px;"> <br>2. ATTENTION TO DETAILS - Is thorough in accomplishing a  task with concern for all the areas involved, no matter how small.</label></td>
										<div class="col-lg-10">
											<td><select class="form-control m-bot15" name="optionsRadio2">
																				<option></option>
																				<option>3</option>
																				<option>2</option>
																				<option>1</option>
														 </select></td>
											<td><select class="form-control m-bot15" name="optionsRadio2">
																				<option></option>
																				<option>3</option>
																				<option>2</option>
																				<option>1</option>
														 </select></td>
											<td><select class="form-control m-bot15" name="optionsRadio2">
																				<option></option>
																				<option>3</option>
																				<option>2</option>
																				<option>1</option>
														 </select></td>
											<td><select class="form-control m-bot15" name="optionsRadio2">
																				<option></option>
																				<option>3</option>
																				<option>2</option>
																				<option>1</option>
														 </select></td>
											<td><select class="form-control m-bot15" name="optionsRadio2">
																				<option></option>
																				<option>3</option>
																				<option>2</option>
																				<option>1</option>
														 </select></td>
										</div></tr>
									<tr><td><label style="margin-left: 20px;"> <br>3. ANALYSIS - Relating and camparing data from different sources, identifying issues and getting relevant information.</label></td>
										<div class="col-lg-10">
											<td><select class="form-control m-bot15" name="optionsRadio3">
																				<option></option>
																				<option>3</option>
																				<option>2</option>
																				<option>1</option>
														 </select></td>
											<td><select class="form-control m-bot15" name="optionsRadio3">
																				<option></option>
																				<option>3</option>
																				<option>2</option>
																				<option>1</option>
														 </select></td>
											<td><select class="form-control m-bot15" name="optionsRadio3">
																				<option></option>
																				<option>3</option>
																				<option>2</option>
																				<option>1</option>
														 </select></td>
											<td><select class="form-control m-bot15" name="optionsRadio3">
																				<option></option>
																				<option>3</option>
																				<option>2</option>
																				<option>1</option>
														 </select></td>
											<td><select class="form-control m-bot15" name="optionsRadio3">
																				<option></option>
																				<option>3</option>
																				<option>2</option>
																				<option>1</option>
														 </select></td>
										</div></tr>
									<tr><td><label style="margin-left: 20px;"> <br>4. TOLERANCE FOR STRESS - Working well under pressure and/or against opposition.</label></td>
										<div class="col-lg-10">
											<td><select class="form-control m-bot15" name="optionsRadio4">
																				<option></option>
																				<option>3</option>
																				<option>2</option>
																				<option>1</option>
														 </select></td>
											<td><select class="form-control m-bot15" name="optionsRadio4">
																				<option></option>
																				<option>3</option>
																				<option>2</option>
																				<option>1</option>
														 </select></td>
											<td><select class="form-control m-bot15" name="optionsRadio4">
																				<option></option>
																				<option>3</option>
																				<option>2</option>
																				<option>1</option>
														 </select></td>
											<td><select class="form-control m-bot15" name="optionsRadio4">
																				<option></option>
																				<option>3</option>
																				<option>2</option>
																				<option>1</option>
														 </select></td>
											<td><select class="form-control m-bot15" name="optionsRadio4">
																				<option></option>
																				<option>3</option>
																				<option>2</option>
																				<option>1</option>
														 </select></td>
										</div></tr>
									<tr><td><label style="margin-left: 20px;"> <br>5. PERFORMANCE STABILITY/DEPENDABILITY - Consistently meeting the day-to-day demands of the job.</label></td>
										<div class="col-lg-10">
											<td><select class="form-control m-bot15" name="optionsRadio5">
																				<option></option>
																				<option>3</option>
																				<option>2</option>
																				<option>1</option>
														 </select></td>
											<td><select class="form-control m-bot15" name="optionsRadio5">
																				<option></option>
																				<option>3</option>
																				<option>2</option>
																				<option>1</option>
														 </select></td>
											<td><select class="form-control m-bot15" name="optionsRadio5">
																				<option></option>
																				<option>3</option>
																				<option>2</option>
																				<option>1</option>
														 </select></td>
											<td><select class="form-control m-bot15" name="optionsRadio5">
																				<option></option>
																				<option>3</option>
																				<option>2</option>
																				<option>1</option>
														 </select></td>
											<td><select class="form-control m-bot15" name="optionsRadio5">
																				<option></option>
																				<option>3</option>
																				<option>2</option>
																				<option>1</option>
														 </select></td>
										</div></tr>
									<tr><td><label style="margin-left: 20px;"> <br>6. JOB KNOWLEDGE - Measures effectiveness in keeping knowledgeable of methods required in own job and releated functions.</label></td>
										<div class="col-lg-10">
											<td><select class="form-control m-bot15" name="optionsRadio6">
																				<option></option>
																				<option>3</option>
																				<option>2</option>
																				<option>1</option>
														 </select></td>
											<td><select class="form-control m-bot15" name="optionsRadio6">
																				<option></option>
																				<option>3</option>
																				<option>2</option>
																				<option>1</option>
														 </select></td>
											<td><select class="form-control m-bot15" name="optionsRadio6">
																				<option></option>
																				<option>3</option>
																				<option>2</option>
																				<option>1</option>
														 </select></td>
											<td><select class="form-control m-bot15" name="optionsRadio6">
																				<option></option>
																				<option>3</option>
																				<option>2</option>
																				<option>1</option>
														 </select></td>
											<td><select class="form-control m-bot15" name="optionsRadio6">
																				<option></option>
																				<option>3</option>
																				<option>2</option>
																				<option>1</option>
														 </select></td>
										</div></tr>
										
										<th>Company Core Values</th>
										<th> </th>
										<th> </th>
										<th> </th>
										<th> </th>
										<th> </th>    
									<tr><td><label style="margin-left: 20px;"> <br>7. LOYALTY</label></td>
										<div class="col-lg-10">
											<td><select class="form-control m-bot15" name="optionsRadio7">
																				<option></option>
																				<option>3</option>
																				<option>2</option>
																				<option>1</option>
														 </select></td>
											<td><select class="form-control m-bot15" name="optionsRadio7">
																				<option></option>
																				<option>3</option>
																				<option>2</option>
																				<option>1</option>
														 </select></td>
											<td><select class="form-control m-bot15" name="optionsRadio7">
																				<option></option>
																				<option>3</option>
																				<option>2</option>
																				<option>1</option>
														 </select></td>
											<td><select class="form-control m-bot15" name="optionsRadio7">
																				<option></option>
																				<option>3</option>
																				<option>2</option>
																				<option>1</option>
														 </select></td>
											<td><select class="form-control m-bot15" name="optionsRadio7">
																				<option></option>
																				<option>3</option>
																				<option>2</option>
																				<option>1</option>
														 </select></td>
										</div></tr>
									<tr><td><label style="margin-left: 20px;"> <br>8. TRUSTWORTHINESS</label></td>
										<div class="col-lg-10">
											<td><select class="form-control m-bot15" name="optionsRadio8">
																				<option></option>
																				<option>3</option>
																				<option>2</option>
																				<option>1</option>
														 </select></td>
											<td><select class="form-control m-bot15" name="optionsRadio8">
																				<option></option>
																				<option>3</option>
																				<option>2</option>
																				<option>1</option>
														 </select></td>
											<td><select class="form-control m-bot15" name="optionsRadio8">
																				<option></option>
																				<option>3</option>
																				<option>2</option>
																				<option>1</option>
														 </select></td>
											<td><select class="form-control m-bot15" name="optionsRadio8">
																				<option></option>
																				<option>3</option>
																				<option>2</option>
																				<option>1</option>
														 </select></td>
											<td><select class="form-control m-bot15" name="optionsRadio8">
																				<option></option>
																				<option>3</option>
																				<option>2</option>
																				<option>1</option>
														 </select></td>
										</div></tr>
									<tr><td><label style="margin-left: 20px;"> <br>9. DISCIPLINE</label></td>
										<div class="col-lg-10">
											<td><select class="form-control m-bot15" name="optionsRadio9">
																				<option></option>
																				<option>3</option>
																				<option>2</option>
																				<option>1</option>
														 </select></td>
											<td><select class="form-control m-bot15" name="optionsRadio9">
																				<option></option>
																				<option>3</option>
																				<option>2</option>
																				<option>1</option>
														 </select></td>
											<td><select class="form-control m-bot15" name="optionsRadio9">
																				<option></option>
																				<option>3</option>
																				<option>2</option>
																				<option>1</option>
														 </select></td>
											<td><select class="form-control m-bot15" name="optionsRadio9">
																				<option></option>
																				<option>3</option>
																				<option>2</option>
																				<option>1</option>
														 </select></td>
											<td><select class="form-control m-bot15" name="optionsRadio9">
																				<option></option>
																				<option>3</option>
																				<option>2</option>
																				<option>1</option>
														 </select></td>
										</div></tr>
									<tr><td><label style="margin-left: 20px;"> <br>10. PASSION AND COMMITMENT AT WORK</label></td>
										<div class="col-lg-10">
											<td><select class="form-control m-bot15" name="optionsRadio10">
																				<option></option>
																				<option>3</option>
																				<option>2</option>
																				<option>1</option>
														 </select></td>
											<td><select class="form-control m-bot15" name="optionsRadio10">
																				<option></option>
																				<option>3</option>
																				<option>2</option>
																				<option>1</option>
														 </select></td>
											<td><select class="form-control m-bot15" name="optionsRadio10">
																				<option></option>
																				<option>3</option>
																				<option>2</option>
																				<option>1</option>
														 </select></td>
											<td><select class="form-control m-bot15" name="optionsRadio10">
																				<option></option>
																				<option>3</option>
																				<option>2</option>
																				<option>1</option>
														 </select></td>
											<td><select class="form-control m-bot15" name="optionsRadio10">
																				<option></option>
																				<option>3</option>
																				<option>2</option>
																				<option>1</option>
														 </select></td>
										</div></tr>
									<tr><td><label style="margin-left: 20px;"> <br>11. RESPECT FOR CULTURE</label></td>
										<div class="col-lg-10">
											<td><select class="form-control m-bot15" name="optionsRadio11">
																				<option></option>
																				<option>3</option>
																				<option>2</option>
																				<option>1</option>
														 </select></td>
											<td><select class="form-control m-bot15" name="optionsRadio11">
																				<option></option>
																				<option>3</option>
																				<option>2</option>
																				<option>1</option>
														 </select></td>
											<td><select class="form-control m-bot15" name="optionsRadio11">
																				<option></option>
																				<option>3</option>
																				<option>2</option>
																				<option>1</option>
														 </select></td>
											<td><select class="form-control m-bot15" name="optionsRadio11">
																				<option></option>
																				<option>3</option>
																				<option>2</option>
																				<option>1</option>
														 </select></td>
											<td><select class="form-control m-bot15" name="optionsRadio11">
																				<option></option>
																				<option>3</option>
																				<option>2</option>
																				<option>1</option>
														 </select></td>
										</div></tr>
									<tr><td><label style="margin-left: 20px;"> <br>12. "YES, WE CAN!" ATTITUDE</label></td>
										<div class="col-lg-10">
											<td><select class="form-control m-bot15" name="optionsRadio12">
																				<option></option>
																				<option>3</option>
																				<option>2</option>
																				<option>1</option>
														 </select></td>
											<td><select class="form-control m-bot15" name="optionsRadio12">
																				<option></option>
																				<option>3</option>
																				<option>2</option>
																				<option>1</option>
														 </select></td>
											<td><select class="form-control m-bot15" name="optionsRadio12">
																				<option></option>
																				<option>3</option>
																				<option>2</option>
																				<option>1</option>
														 </select></td>
											<td><select class="form-control m-bot15" name="optionsRadio12">
																				<option></option>
																				<option>3</option>
																				<option>2</option>
																				<option>1</option>
														 </select></td>
											<td><select class="form-control m-bot15" name="optionsRadio12">
																				<option></option>
																				<option>3</option>
																				<option>2</option>
																				<option>1</option>
														 </select></td>
										</div></tr>
									<tr><td><label style="margin-left: 20px;"> <br>13. CUSTOMER DELIGHT</label></td>
										<div class="col-lg-10">
											<td><select class="form-control m-bot15" name="optionsRadio13">
																				<option></option>
																				<option>3</option>
																				<option>2</option>
																				<option>1</option>
														 </select></td>
											<td><select class="form-control m-bot15" name="optionsRadio13">
																				<option></option>
																				<option>3</option>
																				<option>2</option>
																				<option>1</option>
														 </select></td>
											<td><select class="form-control m-bot15" name="optionsRadio13">
																				<option></option>
																				<option>3</option>
																				<option>2</option>
																				<option>1</option>
														 </select></td>
											<td><select class="form-control m-bot15" name="optionsRadio13">
																				<option></option>
																				<option>3</option>
																				<option>2</option>
																				<option>1</option>
														 </select></td>
											<td><select class="form-control m-bot15" name="optionsRadio13">
																				<option></option>
																				<option>3</option>
																				<option>2</option>
																				<option>1</option>
														 </select></td>
										</div></tr>
									<tr><td><label style="margin-left: 20px;"> <br>14. THINK LIKE THE OWNER CONCEPT</label></td>
										<div class="col-lg-10">
											<td><select class="form-control m-bot15" name="optionsRadio14">
																				<option></option>
																				<option>3</option>
																				<option>2</option>
																				<option>1</option>
														 </select></td>
											<td><select class="form-control m-bot15" name="optionsRadio14">
																				<option></option>
																				<option>3</option>
																				<option>2</option>
																				<option>1</option>
														 </select></td>
											<td><select class="form-control m-bot15" name="optionsRadio14">
																				<option></option>
																				<option>3</option>
																				<option>2</option>
																				<option>1</option>
														 </select></td>
											<td><select class="form-control m-bot15" name="optionsRadio14">
																				<option></option>
																				<option>3</option>
																				<option>2</option>
																				<option>1</option>
														 </select></td>
											<td><select class="form-control m-bot15" name="optionsRadio14">
																				<option></option>
																				<option>3</option>
																				<option>2</option>
																				<option>1</option>
														 </select></td>
										</div></tr>
									
									<tr><td><label style="margin-left: 20px;"> <br>15. SUSTAINABILITY AND ENVIRONMENT FOCUS</label></td>
										<div class="col-lg-10">
											<td><select class="form-control m-bot15" name="optionsRadio15">
																				<option></option>
																				<option>3</option>
																				<option>2</option>
																				<option>1</option>
														 </select></td>
											<td><select class="form-control m-bot15" name="optionsRadio15">
																				<option></option>
																				<option>3</option>
																				<option>2</option>
																				<option>1</option>
														 </select></td>
											<td><select class="form-control m-bot15" name="optionsRadio15">
																				<option></option>
																				<option>3</option>
																				<option>2</option>
																				<option>1</option>
														 </select></td>
											<td><select class="form-control m-bot15" name="optionsRadio15">
																				<option></option>
																				<option>3</option>
																				<option>2</option>
																				<option>1</option>
														 </select></td>
											<td><select class="form-control m-bot15" name="optionsRadio15">
																				<option></option>
																				<option>3</option>
																				<option>2</option>
																				<option>1</option>
														 </select></td>
										</div></tr>
									</tbody>	
									</table>		
	                                    <h2 style="margin-left: 10px;"><br>Remarks</h2>
										<div class="row indent col-lg-8">
										<input required name="remarks" type="text" class="form-control" >
										</div>
									
										<div class="panel-body" style="margin-top:70px;margin-left:7px;">											
											<button name="submit" type="submit" class="btn btn-success" data-toggle="modal" href="#myModalTE">Submit</button>
											<a class="btn btn-danger"  href="home.php"> Back </a> 
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