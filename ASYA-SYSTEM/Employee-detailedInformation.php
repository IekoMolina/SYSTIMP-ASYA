<!DOCTYPE html>
<html lang="en">
<?php

session_start();
require_once('../mysql_connect.php');
$appNum= $_POST['applink'];

//Getting Applicants Info
$query="SELECT * FROM applicants WHERE APPNO = '{$appNum}'";
$result=mysqli_query($dbc,$query);
$rows=mysqli_fetch_array($result,MYSQLI_ASSOC);

//Personal Info
$name = $rows['FIRSTNAME'].' '.$rows['LASTNAME'];
$firstName = $rows['FIRSTNAME'];
$lastName = $rows['LASTNAME'];
$middleName = $rows['MIDDLENAME'];
$residenceAddress = $rows['RESIDENCEADDRESS'];
$provincialAddress = $rows['PROVINCIALADDRESS'];
$mobileNum = $rows['MOBILENO'];
$telephoneNum = $rows['TELEPHONENO'];
$citizenship = $rows['CITIZENSHIP'];
$gender = $rows['GENDER'];
$civilStatus = $rows['CIVILSTATUS'];
$email = $rows['EMAIL'];
$religion= $rows['RELIGION'];
$birthDate = $rows['BIRTHDATE'];
$birthPlace = $rows['BIRTHPLACE'];
$spouseName= $rows['SPOUSENAME'];
$spouseOccupation= $rows['SPOUSEOCCUPATION'];
$spouseCompany= $rows['SPOUSECOMPANY'];
$spouseCompanyNum= $rows['SPOUSECOMPANYNO'];

//Education Info
$schoolName1 = $rows['SCHOOLNAME1'];
$schoolAddress1 = $rows['SCHOOLADDRESS1'];
$schoolDegree1 = $rows['SCHOOLDEGREE1'];
$schoolHonorsReceived1 = $rows['SCHOOLHONORSRECIEVED1'];
$schoolStartYear1 = $rows['SCHOOLSTARTYEAR1'];
$schoolEndYear1 = $rows['SCHOOLENDYEAR1'];

$schoolName2 = $rows['SCHOOLNAME2'];
$schoolAddress2 = $rows['SCHOOLADDRESS2'];
$schoolDegree2 = $rows['SCHOOLDEGREE2'];
$schoolHonorsReceived2 = $rows['SCHOOLHONORSRECIEVED2'];
$schoolStartYear2 = $rows['SCHOOLSTARTYEAR2'];
$schoolEndYear2 = $rows['SCHOOLENDYEAR2'];

$schoolName3 = $rows['SCHOOLNAME3'];
$schoolAddress3 = $rows['SCHOOLADDRESS3'];
$schoolDegree3= $rows['SCHOOLDEGREE3'];
$schoolHonorsReceived3 = $rows['SCHOOLHONORSRECIEVED3'];
$schoolStartYear3 = $rows['SCHOOLSTARTYEAR3'];
$schoolEndYear3 = $rows['SCHOOLENDYEAR3'];

$schoolName4 = $rows['SCHOOLNAME4'];
$schoolAddress4 = $rows['SCHOOLADDRESS4'];
$schoolDegree4 = $rows['SCHOOLDEGREE4'];
$schoolHonorsReceived4 = $rows['SCHOOLHONORSRECIEVED4'];
$schoolStartYear4 = $rows['SCHOOLSTARTYEAR4'];
$schoolEndYear4 = $rows['SCHOOLENDYEAR4'];

//Employment Record
$company1 = $rows['PREVIOUSCOMPANY1'];
$companyContactNum1 = $rows['PREVIOUSCOMPANYCONTACTNUMBER1'];
$companyAddress1 = $rows['PREVIOUSCOMPANYADDRESS1'];
$positionHeld1 = $rows['POSITIONHELD1'];
$reasonForLeaving1 = $rows['REASONFORLEAVING1'];
$salary1 = $rows['SALARYRECIEVED1'];
$employmentStartDate1 = $rows['EMPLOYMENTSTARTDATE1'];
$employmentEndDate1 = $rows['EMPLOYMENTENDDATE1'];

$company2 = $rows['PREVIOUSCOMPANY2'];
$companyContactNum2 = $rows['PREVIOUSCOMPANYCONTACTNUMBER2'];
$companyAddress2 = $rows['PREVIOUSCOMPANYADDRESS2'];
$positionHeld2 = $rows['POSITIONHELD2'];
$reasonForLeaving2 = $rows['REASONFORLEAVING2'];
$salary2 = $rows['SALARYRECIEVED2'];
$employmentStartDate2 = $rows['EMPLOYMENTSTARTDATE2'];
$employmentEndDate2 = $rows['EMPLOYMENTENDDATE2'];

//Gov Exam taken
$examTitle1 = $rows['EXAMTITLE1'];
$examDate1 = $rows['EXAMDATE1'];
$examVenue1 = $rows['EXAMVENUE1'];
$examRating1 = $rows['EXAMRATING1'];

$examTitle2 = $rows['EXAMTITLE2'];
$examDate2 = $rows['EXAMDATE2'];
$examVenue2 = $rows['EXAMVENUE2'];
$examRating2 = $rows['EXAMRATING2'];

//Associations
$organization1 = $rows['MEMBERSHIPORGANIZATION1'];
$orgPosition1 = $rows['MEMBERSHIPPOSITION1'];
$orgAddress1 = $rows['MEMBERSHIPADDRESS1']; 
$orgDate1 = $rows['MEMBERSHIPDATE1'];

$organization2 = $rows['MEMBERSHIPORGANIZATION2'];
$orgPosition2 = $rows['MEMBERSHIPPOSITION2'];
$orgAddress2 = $rows['MEMBERSHIPADDRESS2'];
$orgDate2 = $rows['MEMBERSHIPDATE2'];

//Training
$trainingTitle1 = $rows['TRAININGTITLE1'];
$trainingDate1 = $rows['TRAININGDATE1'];
$trainingVenue1 = $rows['TRAININGVENUE1'];
$trainingResourcePerson1 = $rows['TRAININGRESOURCEPERSON1'];

$trainingTitle2 = $rows['TRAININGTITLE2'];
$trainingDate2 = $rows['TRAININGDATE2'];
$trainingVenue2 = $rows['TRAININGVENUE2'];
$trainingResourcePerson2 = $rows['TRAININGRESOURCEPERSON2'];

//Family
$familyName1 = $rows['FAMILYNAME1'];
$familyRelation1 = $rows['FAMILYRELATION1'];
$familyOccupation1 = $rows['FAMILYOCCUPATION1'];
$familyCompany1 = $rows['FAMILYCOMPANY1'];
$familyResidence1 = $rows['FAMILYRESIDENCE1'];
$familyContactNum1 = $rows['FAMILYCONTACTNO1'];

$familyName2 = $rows['FAMILYNAME2'];
$familyRelation2 = $rows['FAMILYRELATION2'];
$familyOccupation2 = $rows['FAMILYOCCUPATION2'];
$familyCompany2 = $rows['FAMILYCOMPANY2'];
$familyResidence2 = $rows['FAMILYRESIDENCE2'];
$familyContactNum2 = $rows['FAMILYCONTACTNO2'];

$familyName3 = $rows['FAMILYNAME3'];
$familyRelation3 = $rows['FAMILYRELATION3'];
$familyOccupation3 = $rows['FAMILYOCCUPATION3'];
$familyCompany3 = $rows['FAMILYCOMPANY3'];
$familyResidence3 = $rows['FAMILYRESIDENCE3'];
$familyContactNum3 = $rows['FAMILYCONTACTNO3'];

//Government
$sssNum = $rows['SSSNO'];
$philhealthNum = $rows['PHILHEALTHNO'];
$tinNum = $rows['TINNO'];
$pagibigNum = $rows['PAGIBIGNO'];
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
		
    <title>Individual Applicant</title>
</head>
<body>

<!-- navbar -->
<div class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="home.html"><img src="asyalogo.jpg" /> </a>
        </div>
		 <!-- right side stuffs -->
        <ul class="nav navbar-nav navbar-right">
            <li><a href="#"><span class="glyphicon glyphicon-envelope"></span></a></li>
            <li><a href="#"><span class="glyphicon glyphicon-calendar"></span></a></li>
            <li><a href="login.php">Logout</a></li>
            
        </ul>
        <ul class="nav navbar-nav">
            <li><a href="#personal">Personal Information</a></li>
            <li><a href="#education">Education Attained</a></li>
            <li><a href="#employment">Employment Record</a></li>
            <li><a href="#governmentexam">Government Exam</a></li>
            <li><a href="#associations">Associations</a></li>
            <li><a href="#training">Special Training</a></li>
            <li><a href="#family">Family </a></li>
            <li><a href="#agency">Government Agencies</a></li>
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
			<div cass="row">
                  <aside class="profile-nav col-lg-12">
                      <section class="panel">
                          <div class="user-heading round">
                              <a href="#">
                                  <img src="img/user.jpg" alt="">
                              </a>
                              <h1><?php echo $name ?></h1>
                              <p><?php echo $email ?></p>
                              <a class="btn btn-default" data-toggle="modal" href="#myModal3">Track Status</a>
                              <a class="btn btn-default" href="recruitment.php">Previous</a>                              
                          </div>						 
                      </section>
                  </aside>
               </div>
                  <aside class="profile-info col-lg-12">
                      <section class="panel">
                          <div class="panel-body bio-graph-info">
							
						 <!-- employee information section -->
					        <a class="anchor" name="personal"></a>
					        <div class="row filldiv">
					            <h2 class="page-title">Personal Information<h2>
					            <div class="col-md-2 text-right">
					                <h5 class="info-label-text">Last Name:</h5>
					                <h5 class="info-label-text">First Name:</h5>
					                <h5 class="info-label-text">Middle Name:</h5>
					                <h5 class="info-label-text">Residence Address:</h5>
					                <h5 class="info-label-text">Provincial Address:</h5>
					                <h5 class="info-label-text">Mobile No.:</h5>
					                <h5 class="info-label-text">Telephone No.:</h5>
									<br>
					                <h5 class="info-label-text text-left">Spouse Info</h5>
					                <h5 class="info-label-text">Name:</h5>
					                <h5 class="info-label-text">Occupation:</h5>
									<br>
					            </div>
					            <div class="col-md-3">
					                <h5 class="info-detail-text"><?php echo $lastName ?></h5>
					                <h5 class="info-detail-text"><?php echo $firstName ?></h5>
					                <h5 class="info-detail-text"><?php echo $middleName ?></h5>
									<h5 class="info-detail-text"><?php echo $residenceAddress?> </h5>	
									<h5 class="info-detail-text"><?php echo $provincialAddress ?></h5>
					                <h5 class="info-detail-text"><?php echo $mobileNum ?></h5>
					                <h5 class="info-detail-text"><?php echo $telephoneNum ?></h5>
									<br>
									<h5 class="info-detail-text"><font color="#FFFFFF">:</font></h5>
					                <h5 class="info-detail-text"><?php echo $spouseName ?></h5>
					                <h5 class="info-detail-text"><?php echo $spouseOccupation ?></h5>
									<br>
					            </div>
								
					            <div class="col-md-3 text-right">
					                <h5 class="info-label-text">Citizenship:</h5>
					                <h5 class="info-label-text">Gender:</h5>
					                <h5 class="info-label-text">Birthdate:</h5>
					                <h5 class="info-label-text">Birth Place:</h5>
					                <h5 class="info-label-text">Civil Status:</h5>
					                <h5 class="info-label-text">Religion:</h5>
					                <h5 class="info-label-text">E-mail Address:</h5>
									<br>
									<h5 class="info-label-text"><font color="#FFFFFF">:</font></h5>
					                <h5 class="info-label-text">Company:</h5>
					                <h5 class="info-label-text">Contact No.:</h5>
									<br>
					            </div>
					            <div class="col-md-2">
					                <h5 class="info-detail-text"><?php echo $citizenship ?></h5>
									<h5 class="info-detail-text"><?php echo $gender ?></h5>
					                <h5 class="info-detail-text"><?php echo $birthDate?></h5>
					                <h5 class="info-detail-text"><?php echo $birthPlace ?></h5>
					                <h5 class="info-detail-text"><?php echo $civilStatus ?></h5>
					                <h5 class="info-detail-text"><?php echo $religion ?></h5>
					                <h5 class="info-detail-text"><?php echo $email ?></h5>
									<br>
									<h5 class="info-detail-text"><font color="#FFFFFF">:</font></h5>
					                <h5 class="info-detail-text"><?php echo $spouseCompany ?></h5>
					                <h5 class="info-detail-text"><?php echo $spouseCompanyNum?></h5>
									<br>
					            </div>
					        </div>
							
							<!-- employee education section -->
					        <a class="anchor" name="education"></a>
					        <div class="row filldiv">
							<br></br><br>
					            <h2 class="page-title">Education Attained<h2>
					            <div class="col-md-2 text-right">
					                <h5 class="info-label-text text-left">Elementary</h5>
					                <h5 class="info-label-text">School Name:</h5>
					                <h5 class="info-label-text">Address:</h5>
					                <h5 class="info-label-text">Degree:</h5>
					                <h5 class="info-label-text text-left">High School</h5>
					                <h5 class="info-label-text">School Name:</h5>
					                <h5 class="info-label-text">Address:</h5>
					                <h5 class="info-label-text">Degree:</h5>
					                <h5 class="info-label-text text-left">College</h5>
					                <h5 class="info-label-text">School Name:</h5>
					                <h5 class="info-label-text">Address:</h5>
					                <h5 class="info-label-text">Degree:</h5>
					                <h5 class="info-label-text text-left">Tertiary</h5>
					                <h5 class="info-label-text">School Name:</h5>
					                <h5 class="info-label-text">Address:</h5>
					                <h5 class="info-label-text">Degree:</h5>
									<br>
					            </div>
					            <div class="col-md-3">
									<h5 class="info-detail-text"><font color="#FFFFFF">:</font></h5>
					                <h5 class="info-detail-text"><?php echo $schoolName1?></h5>
					                <h5 class="info-detail-text"><?php echo $schoolAddress1?></h5>
					                <h5 class="info-detail-text"><?php echo $schoolDegree1?></h5>
									<h5 class="info-detail-text"><font color="#FFFFFF">:</font></h5>
					                <h5 class="info-detail-text"><?php echo $schoolName2?></h5>
					                <h5 class="info-detail-text"><?php echo $schoolAddress2?></h5>
					                <h5 class="info-detail-text"><?php echo $schoolDegree2?></h5>
									<h5 class="info-detail-text"><font color="#FFFFFF">:</font></h5>
					                <h5 class="info-detail-text"><?php echo $schoolName3?></h5>
					                <h5 class="info-detail-text"><?php echo $schoolAddress3?></h5>
					                <h5 class="info-detail-text"><?php echo $schoolDegree3?></h5>
									<h5 class="info-detail-text"><font color="#FFFFFF">:</font></h5>
					                <h5 class="info-detail-text"><?php echo $schoolName4?></h5>
					                <h5 class="info-detail-text"><?php echo $schoolAddress4?></h5>
					                <h5 class="info-detail-text"><?php echo $schoolDegree4?></h5>
					            </div>
								
					            <div class="col-md-2 text-right">
									<h5 class="info-label-text"><font color="#FFFFFF">:</font></h5>
					                <h5 class="info-label-text">Honor Recieved:</h5>
					                <h5 class="info-label-text">Start Date:</h5>
					                <h5 class="info-label-text">End Date:</h5>
									<h5 class="info-detail-text"><font color="#FFFFFF">:</font></h5>
					                <h5 class="info-label-text">Honor Recieved:</h5>
					                <h5 class="info-label-text">Start Date:</h5>
					                <h5 class="info-label-text">End Date:</h5>
									<h5 class="info-label-text"><font color="#FFFFFF">:</font></h5>
					                <h5 class="info-label-text">Honor Recieved:</h5>
					                <h5 class="info-label-text">Start Date:</h5>
					                <h5 class="info-label-text">End Date:</h5>
									<h5 class="info-label-text"><font color="#FFFFFF">:</font></h5>
					                <h5 class="info-label-text">Honor Recieved:</h5>
					                <h5 class="info-label-text">Start Date:</h5>
					                <h5 class="info-label-text">End Date:</h5>
					            </div>
					            <div class="col-md-2">
									<h5 class="info-detail-text"><font color="#FFFFFF">:</font></h5>
					                <h5 class="info-detail-text"><?php echo $schoolHonorsReceived1?></h5>
					                <h5 class="info-detail-text"><?php echo $schoolStartYear1?></h5>
					                <h5 class="info-detail-text"><?php echo $schoolEndYear1?></h5>
									<h5 class="info-detail-text"><font color="#FFFFFF">:</font></h5>
					                <h5 class="info-detail-text"><?php echo $schoolHonorsReceived2?></h5>
					                <h5 class="info-detail-text"><?php echo $schoolStartYear2?></h5>
					                <h5 class="info-detail-text"><?php echo $schoolEndYear2?></h5>
									<h5 class="info-detail-text"><font color="#FFFFFF">:</font></h5>
					                <h5 class="info-detail-text"><?php echo $schoolHonorsReceived3?></h5>
					                <h5 class="info-detail-text"><?php echo $schoolStartYear3?></h5>
					                <h5 class="info-detail-text"><?php echo $schoolEndYear3?></h5>
									<h5 class="info-detail-text"><font color="#FFFFFF">:</font></h5>
					                <h5 class="info-detail-text"><?php echo $schoolHonorsReceived4?></h5>
					                <h5 class="info-detail-text"><?php echo $schoolStartYear4?></h5>
					                <h5 class="info-detail-text"><?php echo $schoolEndYear4?></h5>
					            </div>
								
					        </div>
							
							<!-- employment record section -->
					        <a class="anchor" name="employment"></a>
					        <div class="row filldiv">
							<br></br><br>
					            <h2 class="page-title">Employment Record<h2>
					            <div class="col-md-2 text-right">
					                <h5 class="info-label-text">Company Name:</h5>
					                <h5 class="info-label-text">Contact No:</h5>
					                <h5 class="info-label-text">Address:</h5>
									<br>
					                <h5 class="info-label-text">Company Name:</h5>
					                <h5 class="info-label-text">Contact No:</h5>
					                <h5 class="info-label-text">Address:</h5>
					            </div>
					            <div class="col-md-3">
					                <h5 class="info-detail-text"><?php echo $company1?></h5>
					                <h5 class="info-detail-text"><?php echo $companyContactNum1?></h5>
					                <h5 class="info-detail-text"><?php echo $companyAddress1?></h5>
									<br>
					                <h5 class="info-detail-text"><?php echo $company2?></h5>
					                <h5 class="info-detail-text"><?php echo $companyContactNum2?></h5>
					                <h5 class="info-detail-text"><?php echo $companyAddress2?></h5>
					            </div>
								
					            <div class="col-md-2 text-right">
					                <h5 class="info-label-text">Position Held:</h5>
					                <h5 class="info-label-text">Reason for Leaving:</h5>
					                <h5 class="info-label-text">Salary Recieved:</h5>
									<br>
					                <h5 class="info-label-text">Position Held:</h5>
					                <h5 class="info-label-text">Reason for Leaving:</h5>
					                <h5 class="info-label-text">Salary Recieved:</h5>
					            </div>
					            <div class="col-md-2">
					                <h5 class="info-detail-text"><?php echo $positionHeld1 ?></h5>
					                <h5 class="info-detail-text"><?php echo $reasonForLeaving1 ?></h5>
					                <h5 class="info-detail-text"><?php echo $salary1 ?></h5>
									<br>
					                <h5 class="info-detail-text"><?php echo $positionHeld2 ?></h5>
					                <h5 class="info-detail-text"><?php echo $reasonForLeaving2 ?></h5>
					                <h5 class="info-detail-text"><?php echo $salary2 ?></h5>
					            </div>
							</div>
							
							<!-- Government Exam section -->
					        <a class="anchor" name="governmentexam"></a>
					        <div class="row filldiv">
							<br></br><br>
					            <h2 class="page-title">Government Exam Taken<h2>
					            <div class="col-md-2 text-right">
					                <h5 class="info-label-text">Title of Exam:</h5>
					                <h5 class="info-label-text">Venue:</h5>
									<br>
					                <h5 class="info-label-text">Title of Exam:</h5>
					                <h5 class="info-label-text">Venue:</h5>
					            </div>
					            <div class="col-md-3">
					           		<h5 class="info-detail-text"><?php echo $examTitle1?></h5>
					                <h5 class="info-detail-text"><?php echo $examVenue1?></h5>
									<br>
					                <h5 class="info-detail-text"><?php echo $examTitle2?></h5>
					                <h5 class="info-detail-text"><?php echo $examVenue2?></h5>
					            </div>
								
					            <div class="col-md-2 text-right">
					                <h5 class="info-label-text">Date:</h5>
					                <h5 class="info-label-text">Rating:</h5>
									<br>
					                <h5 class="info-label-text">Date:</h5>
					                <h5 class="info-label-text">Rating:</h5>
					            </div>
					            <div class="col-md-2">
					                <h5 class="info-detail-text"><?php echo $examDate1?></h5>
					                <h5 class="info-detail-text"><?php echo $examRating1?></h5>
									<br>
					                <h5 class="info-detail-text"><?php echo $examDate2?></h5>
					                <h5 class="info-detail-text"><?php echo $examRating2?></h5>
					            </div>
							</div>
							
							<!-- Affiliations section -->
					        <a class="anchor" name="associations"></a>
					        <div class="row filldiv">
							<br></br><br>
					            <h2 class="page-title">Membership/Affiliations and Associations<h2>
					            <div class="col-md-2 text-right">
					                <h5 class="info-label-text">Organization:</h5>
					                <h5 class="info-label-text">Address:</h5>
									<br>
					                <h5 class="info-label-text">Organization:</h5>
					                <h5 class="info-label-text">Address:</h5>
					            </div>
					            <div class="col-md-3">
					                <h5 class="info-detail-text"><?php echo $organization1?></h5>
					                <h5 class="info-detail-text"><?php echo $orgAddress1?></h5>
									<br>
					                <h5 class="info-detail-text"><?php echo $organization2?></h5>
					                <h5 class="info-detail-text"><?php echo $orgAddress2?></h5>
					            </div>
								
					            <div class="col-md-2 text-right">
					                <h5 class="info-label-text">Date of Membership:</h5>
					                <h5 class="info-label-text">Position:</h5>
									<br>
					                <h5 class="info-label-text">Date of Membership:</h5>
					                <h5 class="info-label-text">Position:</h5>
					            </div>
					            <div class="col-md-2">
					                <h5 class="info-detail-text"><?php echo $orgDate1?></h5>
					                <h5 class="info-detail-text"><?php echo $orgPosition1?></h5>
									<br>
					                <h5 class="info-detail-text"><?php echo $orgDate2?></h5>
					                <h5 class="info-detail-text"><?php echo $orgPosition2?></h5>
					            </div>
							</div>
							
							<!-- Special Training section -->
					        <a class="anchor" name="training"></a>
					        <div class="row filldiv">
							<br></br><br>
					            <h2 class="page-title">Special Training<h2>
					            <div class="col-md-2 text-right">
					                <h5 class="info-label-text">Title of Training:</h5>
					                <h5 class="info-label-text">Venue:</h5>
									<br>
					                <h5 class="info-label-text">Title of Training:</h5>
					                <h5 class="info-label-text">Venue:</h5>
					            </div>
					            <div class="col-md-3">
					                <h5 class="info-detail-text"><?php echo $trainingTitle1?></h5>
					                <h5 class="info-detail-text"><?php echo $trainingVenue1?></h5>
									<br>
					                <h5 class="info-detail-text"><?php echo $trainingTitle2?></h5>
					                <h5 class="info-detail-text"><?php echo $trainingVenue2?></h5>
					            </div>
								
					            <div class="col-md-2 text-right">
					                <h5 class="info-label-text">Date:</h5>
					                <h5 class="info-label-text">Resource Person:</h5>
									<br> 
									<h5 class="info-label-text">Date:</h5>
					                <h5 class="info-label-text">Resource Person:</h5>
					            </div>
					            <div class="col-md-2">
					                <h5 class="info-detail-text"><?php echo $trainingDate1?></h5>
					                <h5 class="info-detail-text"><?php echo $trainingResourcePerson1?></h5>
									<br>
					                <h5 class="info-detail-text"><?php echo $trainingDate2?></h5>
					                <h5 class="info-detail-text"><?php echo $trainingResourcePerson2?></h5>
					            </div>
							</div>
							
							<!-- Family Background section -->
					        <a class="anchor" name="family"></a>
					        <div class="row filldiv">
							<br></br><br>
					            <h2 class="page-title">Family Background<h2>
					            <div class="col-md-2 text-right">
					                <h5 class="info-label-text">Name:</h5>
					                <h5 class="info-label-text">Relation:</h5>
					                <h5 class="info-label-text">Occupation:</h5>
									<br>
					                <h5 class="info-label-text">Name:</h5>
					                <h5 class="info-label-text">Relation:</h5>
					                <h5 class="info-label-text">Occupation:</h5>
									<br>
					                <h5 class="info-label-text">Name:</h5>
					                <h5 class="info-label-text">Relation:</h5>
					                <h5 class="info-label-text">Occupation:</h5>
					            </div>
					            <div class="col-md-3">
					                <h5 class="info-detail-text"><?php echo $familyName1?></h5>
					                <h5 class="info-detail-text"><?php echo $familyRelation1?></h5>
					                <h5 class="info-detail-text"><?php echo $familyOccupation1?></h5>
									<br>
					                <h5 class="info-detail-text"><?php echo $familyName2?></h5>
					                <h5 class="info-detail-text"><?php echo $familyRelation2?></h5>
					                <h5 class="info-detail-text"><?php echo $familyOccupation2?></h5>
									<br>
					                <h5 class="info-detail-text"><?php echo $familyName3?></h5>
					                <h5 class="info-detail-text"><?php echo $familyRelation3?></h5>
					                <h5 class="info-detail-text"><?php echo $familyOccupation3?></h5>
					            </div>
								
					            <div class="col-md-2 text-right">
					                <h5 class="info-label-text">Company:</h5>
					                <h5 class="info-label-text">Residence:</h5>
					                <h5 class="info-label-text">Contanct No.:</h5>
									<br> 
					                <h5 class="info-label-text">Company:</h5>
					                <h5 class="info-label-text">Residence:</h5>
					                <h5 class="info-label-text">Contanct No.:</h5>
									<br>
					                <h5 class="info-label-text">Company:</h5>
					                <h5 class="info-label-text">Residence:</h5>
					                <h5 class="info-label-text">Contanct No.:</h5>
					            </div>
					            <div class="col-md-2">
									<h5 class="info-detail-text"><?php echo $familyCompany1?></h5>
					                <h5 class="info-detail-text"><?php echo $familyResidence1?></h5>
					                <h5 class="info-detail-text"><?php echo $familyContactNum1?></h5>
									<br>
									<h5 class="info-detail-text"><?php echo $familyCompany2?></h5>
					                <h5 class="info-detail-text"><?php echo $familyResidence2?></h5>
					                <h5 class="info-detail-text"><?php echo $familyContactNum2?></h5>
									<br>
									<h5 class="info-detail-text"><?php echo $familyCompany3?></h5>
					                <h5 class="info-detail-text"><?php echo $familyResidence3?></h5>
					                <h5 class="info-detail-text"><?php echo $familyContactNum3?></h5>
					            </div>
							</div>
							
							<!-- Special Training section -->
					        <a class="anchor" name="agency"></a>
					        <div class="row filldiv">
							<br></br><br>
					            <h2 class="page-title">Government Agencies<h2>
					            <div class="col-md-2 text-right">
					                <h5 class="info-label-text">SSS:</h5>
									<br>
					                <h5 class="info-label-text">TIN:</h5>
					            </div>
					            <div class="col-md-3">
					                <h5 class="info-detail-text"><?php echo $sssNum?></h5>
									<br>
					                <h5 class="info-detail-text"><?php echo $tinNum?></h5>
					            </div>
								
					            <div class="col-md-2 text-right">
					                <h5 class="info-label-text">Philhealth:</h5>
									<br>
					                <h5 class="info-label-text">Pag-ibig:</h5>
					            </div>
					            <div class="col-md-2">
									<h5 class="info-detail-text"><?php echo $philhealthNum?></h5>
									<br>
					                <h5 class="info-detail-text"><?php echo $pagibigNum?></h5>
					            </div>
							</div>
                          </div>
						  
						  <div class="panel-body">
                              <!-- Modal -->
                              <div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                  <div class="modal-dialog modal-lg">
                                      <div class="modal-content">
                                          <div class="modal-header" style="background-color:#bec3c7;">
                                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                              <h4 class="modal-title">Status</h4>
                                          </div>
                                          <div class="modal-body">

                                            
												  <table class="table">
													  <thead>
													  <tr>
														  <th>Interview</th>
														  <th>Status</th>
														  <th>Remark</th>
														  <th> </th>
													  </tr>
													  </thead>
													  <tbody>
													  <tr>
														  <td><a href="TechnicalEvaluation.php">Interview/Evaluation</a></td>
														  <td>On Process</td>
														  <td>On Process</td>
														  <td>
															<div class="col-md-12">
																<input type="submit" name="submit" value="Notify"/>
															</div>								
														  </td>	
													  </tr>
													  <tr>
														  <td>Final Interview (Optional)</td>
														  <td>Unfinished</td>
														  <td>Optional for higher position</td>
														  <td>
															<div class="col-md-12">
																<input type="submit" name="submit" value="Notify"/>
															</div>								
														  </td>														  
													  </tr>
													  <tr>
														  <td><a href="Contract.php">Create/Send Contract</a></td>
														  <td>On Process</td>
														  <td>On Process</td>
														  <td>
															<div class="col-md-12">
																<input type="submit" name="submit" value="Notify"/>
															</div>								
														  </td>														  
													  </tr>													  
													  </tbody>
												  </table>
                                            


                                          </div>
                                          <div class="modal-footer">	                       
                                              <button data-dismiss="modal" class="btn btn-success" type="button" style="background-color:#bec3c7;border-color:#bec3c7;">Close</button>
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