<!DOCTYPE html>
<html lang="en">
<?php
session_start();
require_once('../mysql_connect.php');

//This will be generated based on current user
$currentEmployeeNum = $_SESSION['emp_number'];
if(isset($_POST['empClink'])){
	$appNum= $_POST['empClink'];
}
if(isset($_POST['submit'])){
	$appNum = $_POST['submit'];
}


// Get all applicant desired position
$queryForPosition="SELECT * FROM emp_positions";
$resultPosition=mysqli_query($dbc,$queryForPosition);
while($rows=mysqli_fetch_array($resultPosition,MYSQLI_ASSOC))
{
	$positions[] = $rows['EPOSITION'];
	$codePosition[]=$rows['POSITION'];
}

// Get other applicant info
$queryForAppDetails="SELECT * FROM applicants WHERE APPNO = '{$appNum}'";
$resultNum=mysqli_query($dbc,$queryForAppDetails);
$rows=mysqli_fetch_array($resultNum,MYSQLI_ASSOC);
$appEmail = $rows['EMAIL'];
$fName = $rows['FIRSTNAME'];
$lName = $rows['LASTNAME'];
$appName = $rows['FIRSTNAME'].' '.$rows['LASTNAME'];

// Input validation uppon submit
$flag=0;
$checker=1;

if (isset($_POST['submit'])){
$message=NULL;
	
  if (empty($_POST['selectposition'])){
  	$applicantPosition=0;
  	$message.='<p>Please Choose a Position!';
  }else
  	$applicantPosition=$_POST['selectposition'];
  
  if (empty($_POST['workingdays'])){
  	$workingDays=0;
  	$message.='<p>Walang pumasok wd';
  }else
  	$workingDays=$_POST['workingdays'];
  
  if (empty($_POST['workinghoursstart'])){
	$workinghoursStart=NULL;
	$message.='<p>Please Choose a WHS!';
  }else
  	$workinghoursStart=$_POST['workinghoursstart'];
  	
  if (empty($_POST['workinghoursend'])){
	$workinghoursEnd=NULL;
	$message.='<p>Please Choose a WHE';
  }else
  {
	  if($_POST['workinghoursend']<$workinghoursStart)
	  {	  	
	  	$message.='<p>Working Hours End must be later';	  	
	  }
	  else {
	  	$workinghoursEnd=$_POST['workinghoursend'];
	  }
  }
  
  if (empty($_POST['compensation'])){
  	$applicantCompensation=0;
  	$message.='<p>Please Choose a ac!';
  }else{
  	if (!is_numeric($_POST['compensation'])){
  		$message.='<p>The compensation you entered is not numeric!';
  	}else
  	$applicantCompensation=$_POST['compensation'];
  	}  
  	
  if (empty($_POST['employmentstart'])){
  	$employmentStart=NULL;
  	$message.='<p>Please Choose a ES!';
  }else
  	$employmentStart=$_POST['employmentstart'];
  
  	
  	//Getting actual position	
  	$queryForPostion = "Select * From emp_positions Where POSITION = '{$applicantPosition}'";
  	$result=mysqli_query($dbc,$queryForPostion);
  	$rows2=mysqli_fetch_array($result,MYSQLI_ASSOC);
  	$appActualPos = $rows2['EPOSITION'];
  	
$queryForAppDetails="SELECT * FROM applicants WHERE APPNO = '{$appNum}'";
$resultNum=mysqli_query($dbc,$queryForAppDetails);
$rows=mysqli_fetch_array($resultNum,MYSQLI_ASSOC);
$appEmail = $rows['EMAIL'];
$applicantName = $rows['FIRSTNAME'];
$appLastName = $rows['LASTNAME'];
$appName = $rows['FIRSTNAME'].' '.$rows['LASTNAME'];

	$employeeNum = $currentEmployeeNum;
	$currentDate = date('Y-m-d');
	$status=0;
	$leaves =5;	
	$letter =
	/*Letter Content All must come to contract DB*/
	"<p>
			DATE: <b><i>" .$currentDate. "</i></b><br>
			NAME: <b> <i>".$applicantName.' '.$appLastName."</i></b><br>
			EMAIL: <b> <i>".$appEmail."</i></b></p><br>

		  <p> Dear MS/MR: <b><i>".$appLastName."</i></b></p>
		  <p>	It is my pleasure to extend the following offer of employment to you on behalf of ASYA Design Partner. This offer is contingent upon your passing our screening process.</p>
		  <p><b>Job Summary:</b> As a/an <b><i>".$appActualPos."</i></b>.<br>
		  Details of your job description will be provided to you with a copy of your Employment Contract on the first day of your work. Other related functions or responsibilities, may likewise be given/assigned to you as the business requirement dictates.</p>
		  <p><b>Work Hours:</b> You are required to report for work <b><i>".$workingDays."</i></b> days per week from <b><i>". $workinghoursStart."</i></b> to <b><i>".$workinghoursEnd."</i></b></p>
		  <p><b>Compensation:</b> Your basic salary is <b><i>".$applicantCompensation."</i></b> gross per month payable semi-monthly.</p>
		  <p><b>Benefits:</b> You shall be entitled to all benefits mandated by existing Laws.</p>
		  <p><b>Employment Status:</b> Your employment as ASYA <b><i>".$appActualPos."</i></b> employee shall be from <b><i>".$employmentStart."</i></b></p>
		  <p><b>Severance of Employment:</b>Your employment can be terminated because of due case, disability, or when both parties agreed. Unless granted or allowed by Management, resignation takes effect after 30 days notice.</p>
		  <p><b>Confidentiality Agreement:</b> You shall not communicate or disclose to any third party or use for personal benefit any information, observations, technologies, data written materials, trade secrets, methodologies, records and documents or other information concerning the business or transactions of the Company and its customers and affiliates.
				Should there be a need to share confidential information to any third party, either visually or orally, you will have to seek for permision and approval stating the purpose and justification of such disclosure. At any time upon request of whatsoever purpose, you shall fully surrender to the Company all confidential information in your custody.</p>
		  <p><b>Restrictions:</b> You shall not take up employment in other design companies or companies of the same nature of business as ASYA within 12 months from the severance of your employment with the Company.</p>
		  <p><b>Medical Examination Requirements:</b> This job offer is being made subject to your passing the medical and physical examination requirements.</p>
		  <p>Should you find our offer acceptable, kindly affix your signature in the Conforme portion below and send the original signed copy to the Human Resource Department of ASYA Design Partner at the address indicated within two (2) working days from receipt of this notice.</p>
		  <p>Should you have questions please do not hesitate to contact the undersigned at email address <b><i>Comapany@gmail.com</i></b> or at telephone number <b><i>8888-8888</b></i></p>
		  <p> Sincerely yours, <br> <b> HR Manager </b>  </p>
		  <p> Conforme, <br> <b> ________________ </b>  </p>";
	if (isset($_POST['send']))
	{
		$checker =1;
		echo "Message Sent!";
	}
if(!isset($message)){
$queryinsert="insert into emp_contract (EMPLOYEENUMBER,POSITION,WORKINGDAYS,COMPENSATION,STARTCONTRACT,TIMESTART,TIMEEND,DATE,STATUS,LEAVES,APPNO) 
								values ('{$employeeNum}','{$applicantPosition}','{$workingDays}','{$applicantCompensation}','{$employmentStart}','{$workinghoursStart}','{$workinghoursEnd}','{$currentDate}','{$status}', '{$leaves}','{$appNum}')";
$resultinsert= mysqli_query($dbc,$queryinsert);
$flag=1;
// Get info from contract
$queryForContract="SELECT * FROM emp_contract WHERE APPNO = '{$appNum}'";
$resultContract=mysqli_query($dbc,$queryForContract);
$rows=mysqli_fetch_array($resultContract,MYSQLI_ASSOC);
$appConNum = $rows['CONTRACTNUMBER'];

//Insert contract number in applicants table USE WHERE STATEMENT
$queryForConInsert="UPDATE 	applicants
					   SET	CONTRACT = '{$appConNum}'
					 WHERE  APPNO = '{$appNum}'
					";
$resultContractInsert=mysqli_query($dbc,$queryForConInsert);
$message = "Conract created and Sent to ".$appEmail;
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

    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen"/>
    <link rel="stylesheet" href="css/owl.carousel.css" type="text/css">
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />

    <link rel="stylesheet" type="text/css" href="assets/bootstrap-fileupload/bootstrap-fileupload.css" />
    <link rel="stylesheet" type="text/css" href="assets/bootstrap-wysihtml5/bootstrap-wysihtml5.css" />
    <link rel="stylesheet" type="text/css" href="assets/bootstrap-datepicker/css/datepicker.css" />
    <link rel="stylesheet" type="text/css" href="assets/bootstrap-timepicker/compiled/timepicker.css" />
    <link rel="stylesheet" type="text/css" href="assets/bootstrap-colorpicker/css/colorpicker.css" />
    <link rel="stylesheet" type="text/css" href="assets/bootstrap-daterangepicker/daterangepicker-bs3.css" />
    <link rel="stylesheet" type="text/css" href="assets/bootstrap-datetimepicker/css/datetimepicker.css" />
    <link rel="stylesheet" type="text/css" href="assets/jquery-multi-select/css/multi-select.css" />
    <!--custom css-->
    <link rel="stylesheet" href="css/custom.css">
    <link rel="stylesheet" href="css/custom-theme.css">
    <script> $('.datepicker').datepicker(); </script>
    
    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet"/>

    <title>Contract</title>
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
	    			<section class="panel">		
	    					<div class="panel-heading">    			
									<h1 class="panel-title"><b>Create Contract</b>
									<span class="panel-subheader pull-right"><?php echo date("m/d/Y")  ?>						
									</span>
									</h1>
							</div>
							<div class="panel-body">
									<div class="form">
										<form class="cmxform form-horizontal tasi-form" id="commentForm" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
											  <div class="form-group ">
												  <label for="cname" class="control-label col-lg-2"><b>Name:</b></label>
												  <div class="col-lg-4">
													<?php echo $appName ?>											  									
												  </div>
												  <label for="cname" class="control-label col-lg-2"><b>Position:</b></label>
												  <div class="col-lg-4">
													  <select class="form-control m-bot15" name="selectposition">
														<?php  
															for ($x=0;$positions[$x]!=NULL;$x++)
															{
																echo '<option value='.$codePosition[$x].'>'.$positions[$x].'</option>';
															}
														?>												  
													  </select>	
													  									
												  </div>									  										  
											  </div>
											  <div class="form-group">
												  <label class="control-label col-lg-2"><b>Working Days:</b></label>
		                                          <div class="col-lg-4">
		                                              <div id="spinner1">
		                                                  <div class="input-group input-small">
		                                                      <input required  name="workingdays" type="number" class="spinner-input form-control" maxlength="3">
		                                                      <div class="spinner-buttons input-group-btn btn-group-vertical">
		                                                          <button type="button" class="btn spinner-up btn-xs btn-default">
		                                                              <i class="fa fa-angle-up"></i>
		                                                          </button>
		                                                          <button type="button" class="btn spinner-down btn-xs btn-default">
		                                                              <i class="fa fa-angle-down"></i>
		                                                          </button>
		                                                      </div>
		                                                  </div>
		                                              </div>
		                                             <span class="help-block">
		                                               (days per week)
		                                             </span>
		                                          </div>
												  <label class="control-label col-lg-2"><b>Working Hours:</b></label>
												  <div class="col-lg-2">
													  <div class="input-group bootstrap-timepicker">
														  <input required name="workinghoursstart" type="text" class="form-control timepicker-24">
															<span class="input-group-btn">
															<button class="btn btn-default" type="button"><i class="fa fa-clock-o"></i></button>
															</span>
													  </div>
		                                             <span class="help-block">
		                                               (time range)
		                                             </span>											  
												  </div>										  
												  <div class="col-lg-2">										  
													  <div class="input-group bootstrap-timepicker">
														  <input required name="workinghoursend" type="text" class="form-control timepicker-24">
															<span class="input-group-btn">
															<button class="btn btn-default" type="button"><i class="fa fa-clock-o"></i></button>
															</span>
													  </div>
												  </div>										  
											  </div>
											  <div class="form-group">
												  <label class="control-label col-lg-2" for="inputSuccess"><b>Compensation:</b></label>
												  <div class="col-lg-4">
													  <input required name="compensation" type="number" class="form-control" >
		                                             <span class="help-block">
		                                               (salary in php)
		                                             </span>											  
												  </div>										  
											  </div>
											  <div class="form-group">
												  <label class="control-label col-lg-2"><b>Employment Start Date:</b></label>
												  <div class="col-lg-4">
													  <div class="input-group input-large">
														  <input required name="employmentstart" type="text" class="form-control dpd1"   data-date-format="yyyy-mm-dd">
													  </div>
													   <span class="help-block" align="center">(select date)</span>
												  </div>
											  </div>									  
											<div class="panel-footer text-right">
											<button class="btn btn-success" data-toggle="modal" href="<?php if($flag==1)echo "#myModal"; else echo "#";?>" type="submit" name="submit" value="<?php echo $appNum?>" >Create/Send</button>
											<a class="btn btn-danger"  href="EachApplicant.php"> Previous </a> 
											</div>
											<!-- Actual Contract Content -->															
											  <div class="modal fade " id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
													  <div class="modal-dialog modal-lg">
														  <div class="modal-content">
															  <div class="modal-header" style="background-color:#78CD51;">
																  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
																  <h4 class="modal-title">Employee Contract</h4>
															  </div>													  
															  <!-- REQUIRED THINGS FOR SENDING EMAIL-->
															  <?php 
															  echo $letter;
															  if($checker==1)
															  {												  													  
																require_once ('..\PHPMailer\PHPMailerAutoload.php');
																
																$mailer = new PHPMailer();
																
																$mailer->SMTPDebug = 9001;   
															
																$mailer->SMTPOptions =['ssl' => ['verify_peer' => false,
																								'verify_peer_name' => false,
																								'allow_self_signed' => true]
																					 ];
																$mailer->isSMTP();
		
																$mailer->Username = 'iekomolina@gmail.com'; 
																$mailer->Password = 'demoniko'; //Secure password
																$mailer->SMTPSecure = 'tls';
																$mailer->Port = 587; 
																$mailer->Host = 'tls://smtp.gmail.com';
																$mailer->SMTPAuth = true;
															
																$mailer->setFrom('iekomolina@gmail.com', 'ASYA DESIGN');// DEFAULT EMAIL BECAUSE COMPANY EMAIL														
																$mailer->addAddress($appEmail); // ADD EMPLOYEE EMAIL HERE
															
															
																$mailer->Subject = '[CLASSIFIED] Employee Contract';												
															
															
		
																$mailer->isHTML(true); 
																$mailer->Body = $letter;
																try{
																	if($mailer->send()){
																		echo "<p>Account has been successfully created!</p>";
																	}else{
																		echo "<p>An internal error ocurred! (mail) </p>";
																	}
																}catch(phpmailerException $e){
																	$message .= "<p>Error: Can't proceed account creation due to slow internet connection.</p>";
																}
															  }
															  else
															  {
															  	echo "First, you must create contract";
															  }
																?>												  
														  </div>
													  </div>
											  </div>									
										</form>
									</div>					  
							</div>
						</section>
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
	  
	     <!-- js placed at the end of the document so the pages load faster -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="js/jquery.scrollTo.min.js"></script>
    <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="js/respond.min.js" ></script>
  
    <!--this page plugins-->

  <script type="text/javascript" src="assets/fuelux/js/spinner.min.js"></script>
  <script type="text/javascript" src="assets/bootstrap-fileupload/bootstrap-fileupload.js"></script>
  <script type="text/javascript" src="assets/bootstrap-wysihtml5/wysihtml5-0.3.0.js"></script>
  <script type="text/javascript" src="assets/bootstrap-wysihtml5/bootstrap-wysihtml5.js"></script>
  <script type="text/javascript" src="assets/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
  <script type="text/javascript" src="assets/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js"></script>
  <script type="text/javascript" src="assets/bootstrap-daterangepicker/moment.min.js"></script>
  <script type="text/javascript" src="assets/bootstrap-daterangepicker/daterangepicker.js"></script>
  <script type="text/javascript" src="assets/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
  <script type="text/javascript" src="assets/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>
  <script type="text/javascript" src="assets/jquery-multi-select/js/jquery.multi-select.js"></script>
  <script type="text/javascript" src="assets/jquery-multi-select/js/jquery.quicksearch.js"></script>


  <!--summernote-->
  <script src="assets/summernote/dist/summernote.min.js"></script>

  <!--right slidebar-->
  <script src="js/slidebars.min.js"></script>

  <!--common script for all pages-->
    <script src="js/common-scripts.js"></script>
    <!--this page  script only-->
    <script src="js/advanced-form-components.js"></script>

  <script>

      jQuery(document).ready(function(){

          $('.summernote').summernote({
              height: 200,                 // set editor height

              minHeight: null,             // set minimum height of editor
              maxHeight: null,             // set maximum height of editor

              focus: true                 // set focus to editable area after initializing summernote
          });
      });

  </script>
</body>

</html>