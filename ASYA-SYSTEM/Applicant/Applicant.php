<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Latest compiled JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!--custom css-->
    <link rel="stylesheet" href="css/custom.css">
    <link rel="stylesheet" href="css/custom-theme.css">
    <title>Applicant</title>
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
            <li><a href="login.html">Logout</a></li>
        </ul>
    </div>
</div>


    <!-- insert page content here -->
    <div id="page-content-wrapper">

         <div class="row">
                  <div class="col-lg-12">
                      <!--progress bar start-->
<section id="main-content">
      <section class="wrapper">
        <div class="panel-body">
          <!-- page start-->
          <section class="panel">
            <header class="panel-heading">
              <h2>Add Applicant Data</h2>
            </header>
			<div class="row" style="margin-left:20px;margin-top:20px;">
				<form class="form-horizontal tasi-form" method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
				<div class="bio-row">
									
				
                    <div class="form-group">
                        <label class="col-sm-3 col-sm-3 control-label">First Name</label>
                            <div class="col-sm-8">
                                <input type="text" required name="firstname" class="form-control">
                            </div>
                    </div>
				
				</div>
				
				
				<div class="bio-row">
				<div class="form-horizontal tasi-form" method="get">
                    <div class="form-group">
                        <label class="col-sm-3 col-sm-3 control-label">Last Name</label>
                            <div class="col-sm-8">
                                <input type="text" required name="lastname" class="form-control">
                            </div>
                    </div>
				</div>
				</div>
				
				
				<div class="bio-row">
				<div class="form-horizontal tasi-form" method="get">
                    <div class="form-group">
                        <label class="col-sm-3 col-sm-3 control-label">Middle Name</label>
                            <div class="col-sm-8">
                                <input type="text" required name="middlename" class="form-control">
                            </div>
                    </div>
				</div>
				</div>
				
				
				
				
				
				<div class="bio-row">
				<div class="form-horizontal tasi-form" method="get">
                    <div class="form-group">
                        <label class="col-sm-3 col-sm-3 control-label">Position Desired</label>
                            <div class="col-sm-8">
                               <select required name="positiondesired">
									  <option disabled selected value>Select...</option>

									  <?php
									  $arr = array('Audit Assistant', 'Design Manager','CADD Architect');
									  for($i=0; $i<count($arr); $i++) {
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
                        <label class="col-sm-3 col-sm-3 control-label">Expected Salary</label>
                            <div class="col-sm-8">
                                <input type="number" required name="expectedsalary" class="form-control">
                            </div>
                    </div>
				</div>
				</div>
				
				<div class="bio-row">
				<div class="form-horizontal tasi-form" method="get">
                    <div class="form-group">
                        <label class="col-sm-3 col-sm-3 control-label">Residence Address</label>
                            <div class="col-sm-8">
                                <input type="text" required name="residenceaddress" class="form-control">
                            </div>
                    </div>
				</div>
				</div>
				
				<div class="bio-row">
				<div class="form-horizontal tasi-form" method="get">
                    <div class="form-group">
                        <label class="col-sm-3 col-sm-3 control-label">Provincial Address</label>
                            <div class="col-sm-8">
                                <input type="text" name="provincialaddress" class="form-control">
                            </div>
                    </div>
				</div>
				</div>
			
				
				<div class="bio-row">
				<div class="form-horizontal tasi-form" method="get">
                    <div class="form-group">
                        <label class="col-sm-3 col-sm-3 control-label">Email Address</label>
                            <div class="col-sm-8">
                                <input type="email" required name="emailaddress" class="form-control">
                            </div>
                    </div>
				</div>
				</div>
				
				<div class="bio-row">
				<div class="form-horizontal tasi-form" method="get">
                    <div class="form-group">
                        <label class="col-sm-3 col-sm-3 control-label">Mobile No</label>
                            <div class="col-sm-8">
                                <input type="number" name="mobileno" class="form-control">
                            </div>
                    </div>
				</div>
				</div>
				
				<div class="bio-row">
				<div class="form-horizontal tasi-form" method="get">
                    <div class="form-group">
                        <label class="col-sm-3 col-sm-3 control-label">Citizenship</label>
                            <div class="col-sm-8">
                                <input type="text" required name="citizenship" class="form-control">
                            </div>
                    </div>
				</div>
				</div>
				
				<div class="bio-row">
				<div class="form-horizontal tasi-form" method="get">
                    <div class="form-group">
                        <label class="col-sm-3 col-sm-3 control-label">Telephone No</label>
                            <div class="col-sm-8">
                                <input type="number" name="telephoneno" class="form-control">
                            </div>
                    </div>
				</div>
				</div>


				<div class="bio-row">
				<div class="form-horizontal tasi-form" method="get">
                    <div class="form-group">
                        <label class="col-sm-3 col-sm-3 control-label">Gender</label>
                            <div class="col-sm-8">
                                <select required name="gender">
									  <option disabled selected value>Select...</option>

									  <?php
									  $arr = array('Male','Female');
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
                        <label class="col-sm-3 col-sm-3 control-label">Civil Status</label>
                            <div class="col-sm-8">
                               <select required name="civilstatus">
									  <option disabled selected value>Select...</option>

									  <?php
									  $arr = array('Single','Married', 'Divorced');
									  for($i=0; $i<count($arr); $i++) {
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
                        <label class="col-sm-3 col-sm-3 control-label">Religion</label>
                            <div class="col-sm-8">
                                <input type="text" required name="religion" class="form-control">
                            </div>
                    </div>
				</div>
				</div>
				
					<div class="bio-row">
				<div class="form-horizontal tasi-form" method="get">
                    <div class="form-group">
                        <label class="col-sm-3 col-sm-3 control-label">Birthdate</label>
                            <div class="col-sm-8">
                                <input type="date" required name="birthdate" class="form-control">
                            </div>
                    </div>
				</div>
				</div>
				
				<div class="bio-row">
				<div class="form-horizontal tasi-form" method="get">
                    <div class="form-group">
                        <label class="col-sm-3 col-sm-3 control-label">Licensed</label>
                            <div class="col-sm-8">
                                <select required name="licensed">
									  <option disabled selected value>Select...</option>

									  <?php
									  $arr = array('Yes', 'No');
									  for($i=0; $i<count($arr); $i++) {
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
                        <label class="col-sm-3 col-sm-3 control-label">Birthplace</label>
                            <div class="col-sm-8">
                                <input type="text" required name="birthplace" class="form-control">
                            </div>
                    </div>
				</div>
				</div>
				
				
				<h3>Spouse Information</h3>
				
				<div class="bio-row">
				<div class="form-horizontal tasi-form" method="get">
                    <div class="form-group">
                        <label class="col-sm-3 col-sm-3 control-label">Name</label>
                            <div class="col-sm-8">
                                <input type="text" name="spousename" class="form-control">
                            </div>
                    </div>
				</div>
				</div>
				
				<div class="bio-row">
				<div class="form-horizontal tasi-form" method="get">
                    <div class="form-group">
                        <label class="col-sm-3 col-sm-3 control-label">Occupation</label>
                            <div class="col-sm-8">
                                <input type="text" name="spouseoccupation" class="form-control">
                            </div>
                    </div>
				</div>
				</div>
				
				<div class="bio-row">
				<div class="form-horizontal tasi-form" method="get">
                    <div class="form-group">
                        <label class="col-sm-3 col-sm-3 control-label">Company</label>
                            <div class="col-sm-8">
                                <input type="text" name="spousecompany" class="form-control">
                            </div>
                    </div>
				</div>
				</div>
				
				<div class="bio-row">
				<div class="form-horizontal tasi-form" method="get">
                    <div class="form-group">
                        <label class="col-sm-3 col-sm-3 control-label">Company No.</label>
                            <div class="col-sm-8">
                                <input type="number" name="spousecompanyno" class="form-control">
                            </div>
                    </div>
				</div>
				</div>
				
				
				<h3>Educational Attainment</h3>
				
				<h4>Elementary</h4>
				
				<div class="bio-row">
				<div class="form-horizontal tasi-form" method="get">
                    <div class="form-group">
                        <label class="col-sm-3 col-sm-3 control-label">School Name</label>
                            <div class="col-sm-8">
                                <input type="text" required name="schoolname1" class="form-control">
                            </div>
                    </div>
				</div>
				</div>
				
				<div class="bio-row">
				<div class="form-horizontal tasi-form" method="get">
                    <div class="form-group">
                        <label class="col-sm-3 col-sm-3 control-label">Address</label>
                            <div class="col-sm-8">
                                <input type="text" required name="schooladdress1" class="form-control">
                            </div>
                    </div>
				</div>
				</div>
				
				<div class="bio-row">
				<div class="form-horizontal tasi-form" method="get">
                    <div class="form-group">
                        <label class="col-sm-3 col-sm-3 control-label">Degree</label>
                            <div class="col-sm-8">
                                <input type="text" name="schooldegree1" class="form-control">
                            </div>
                    </div>
				</div>
				</div>
				
				<div class="bio-row">
				<div class="form-horizontal tasi-form" method="get">
                    <div class="form-group">
                        <label class="col-sm-3 col-sm-3 control-label">Honors Recieved</label>
                            <div class="col-sm-8">
                                <input type="text" name="schoolhonorsrecieved1" class="form-control">
                            </div>
                    </div>
				</div>
				</div>
				
				<div class="bio-row">
				<div class="form-horizontal tasi-form" method="get">
                    <div class="form-group">
                        <label class="col-sm-3 col-sm-3 control-label">Start Year</label>
                            <div class="col-sm-8">
                                <input type="number" required name="schoolstartyear1" class="form-control">
                            </div>
                    </div>
				</div>
				</div> 
				
				<div class="bio-row">
				<div class="form-horizontal tasi-form" method="get">
                    <div class="form-group">
                        <label class="col-sm-3 col-sm-3 control-label">End Year</label>
                            <div class="col-sm-8">
                                <input type="number" required name="schoolendyear1" class="form-control">
                            </div>
                    </div>
				</div>
				</div>
				
				<h4>Secondary</h4>
				
				<div class="bio-row">
				<div class="form-horizontal tasi-form" method="get">
                    <div class="form-group">
                        <label class="col-sm-3 col-sm-3 control-label">School Name</label>
                            <div class="col-sm-8">
                                <input type="text" required name="schoolname2" class="form-control">
                            </div>
                    </div>
				</div>
				</div>
				
				<div class="bio-row">
				<div class="form-horizontal tasi-form" method="get">
                    <div class="form-group">
                        <label class="col-sm-3 col-sm-3 control-label">Address</label>
                            <div class="col-sm-8">
                                <input type="text" required name="schooladdress2" class="form-control">
                            </div>
                    </div>
				</div>
				</div>
				
				<div class="bio-row">
				<div class="form-horizontal tasi-form" method="get">
                    <div class="form-group">
                        <label class="col-sm-3 col-sm-3 control-label">Degree</label>
                            <div class="col-sm-8">
                                <input type="text" name="schooldegree2" class="form-control">
                            </div>
                    </div>
				</div>
				</div>
				
				<div class="bio-row">
				<div class="form-horizontal tasi-form" method="get">
                    <div class="form-group">
                        <label class="col-sm-3 col-sm-3 control-label">Honors Recieved</label>
                            <div class="col-sm-8">
                                <input type="text" name="schoolhonorsrecieved2" class="form-control">
                            </div>
                    </div>
				</div>
				</div>
				
				<div class="bio-row">
				<div class="form-horizontal tasi-form" method="get">
                    <div class="form-group">
                        <label class="col-sm-3 col-sm-3 control-label">Start Year</label>
                            <div class="col-sm-8">
                                <input type="number" required name="schoolstartyear2" class="form-control">
                            </div>
                    </div>
				</div>
				</div> 
				
				<div class="bio-row">
				<div class="form-horizontal tasi-form" method="get">
                    <div class="form-group">
                        <label class="col-sm-3 col-sm-3 control-label">End Year</label>
                            <div class="col-sm-8">
                                <input type="number" required name="schoolendyear2" class="form-control">
                            </div>
                    </div>
				</div>
				</div>
				
				<h4>Tertiary/College</h4>
				
				<div class="bio-row">
				<div class="form-horizontal tasi-form" method="get">
                    <div class="form-group">
                        <label class="col-sm-3 col-sm-3 control-label">School Name</label>
                            <div class="col-sm-8">
                                <input type="text" required name="schoolname3" class="form-control">
                            </div>
                    </div>
				</div>
				</div>
				
				<div class="bio-row">
				<div class="form-horizontal tasi-form" method="get">
                    <div class="form-group">
                        <label class="col-sm-3 col-sm-3 control-label">Address</label>
                            <div class="col-sm-8">
                                <input type="text" required name="schooladdress3" class="form-control">
                            </div>
                    </div>
				</div>
				</div>
				
				<div class="bio-row">
				<div class="form-horizontal tasi-form" method="get">
                    <div class="form-group">
                        <label class="col-sm-3 col-sm-3 control-label">Degree</label>
                            <div class="col-sm-8">
                                <input type="text" name="schooldegree3" class="form-control">
                            </div>
                    </div>
				</div>
				</div>
				
				<div class="bio-row">
				<div class="form-horizontal tasi-form" method="get">
                    <div class="form-group">
                        <label class="col-sm-3 col-sm-3 control-label">Honors Recieved</label>
                            <div class="col-sm-8">
                                <input type="text" name="schoolhonorsrecieved3" class="form-control">
                            </div>
                    </div>
				</div>
				</div>
				
				<div class="bio-row">
				<div class="form-horizontal tasi-form" method="get">
                    <div class="form-group">
                        <label class="col-sm-3 col-sm-3 control-label">Start Year</label>
                            <div class="col-sm-8">
                                <input type="number" required name="schoolstartyear3" class="form-control">
                            </div>
                    </div>
				</div>
				</div> 
				
				<div class="bio-row">
				<div class="form-horizontal tasi-form" method="get">
                    <div class="form-group">
                        <label class="col-sm-3 col-sm-3 control-label">End Year</label>
                            <div class="col-sm-8">
                                <input type="number" required name="schoolendyear3" class="form-control">
                            </div>
                    </div>
				</div>
				</div>
				
				<h4>Post Graduate</h4>
				
				<div class="bio-row">
				<div class="form-horizontal tasi-form" method="get">
                    <div class="form-group">
                        <label class="col-sm-3 col-sm-3 control-label">School Name</label>
                            <div class="col-sm-8">
                                <input type="text" name="schoolname4" class="form-control">
                            </div>
                    </div>
				</div>
				</div>
				
				<div class="bio-row">
				<div class="form-horizontal tasi-form" method="get">
                    <div class="form-group">
                        <label class="col-sm-3 col-sm-3 control-label">Address</label>
                            <div class="col-sm-8">
                                <input type="text" name="schooladdress4" class="form-control">
                            </div>
                    </div>
				</div>
				</div>
				
				<div class="bio-row">
				<div class="form-horizontal tasi-form" method="get">
                    <div class="form-group">
                        <label class="col-sm-3 col-sm-3 control-label">Degree</label>
                            <div class="col-sm-8">
                                <input type="text" name="schooldegree4" class="form-control">
                            </div>
                    </div>
				</div>
				</div>
				
				<div class="bio-row">
				<div class="form-horizontal tasi-form" method="get">
                    <div class="form-group">
                        <label class="col-sm-3 col-sm-3 control-label">Honors Recieved</label>
                            <div class="col-sm-8">
                                <input type="text" name="schoolhonorsrecieved4" class="form-control">
                            </div>
                    </div>
				</div>
				</div>
				
				<div class="bio-row">
				<div class="form-horizontal tasi-form" method="get">
                    <div class="form-group">
                        <label class="col-sm-3 col-sm-3 control-label">Start Year</label>
                            <div class="col-sm-8">
                                <input type="number" name="schoolstartyear4" class="form-control">
                            </div>
                    </div>
				</div>
				</div> 
				
				<div class="bio-row">
				<div class="form-horizontal tasi-form" method="get">
                    <div class="form-group">
                        <label class="col-sm-3 col-sm-3 control-label">End Year</label>
                            <div class="col-sm-8">
                                <input type="number" name="schoolendyear4" class="form-control">
                            </div>
                    </div>
				</div>
				</div>
				
				
				 <h3>Employment Record</h3>
				
				<div class="bio-row">
				<div class="form-horizontal tasi-form" method="get">
                    <div class="form-group">
                        <label class="col-sm-3 col-sm-3 control-label">1. Company Name</label>
                            <div class="col-sm-8">
                                <input type="text" name="previouscompany1" class="form-control">
                            </div>
                    </div>
				</div>
				</div>
				
				<div class="bio-row">
				<div class="form-horizontal tasi-form" method="get">
                    <div class="form-group">
                        <label class="col-sm-3 col-sm-3 control-label">Contact Number</label>
                            <div class="col-sm-8">
                                <input type="number" name="previouscompanycontactnumber1" class="form-control">
                            </div>
                    </div>
				</div>
				</div>
				
				<div class="bio-row">
				<div class="form-horizontal tasi-form" method="get">
                    <div class="form-group">
                        <label class="col-sm-3 col-sm-3 control-label">Address</label>
                            <div class="col-sm-8">
                                <input type="text" name="previouscompanyaddress1" class="form-control">
                            </div>
                    </div>
				</div>
				</div>  
				
					
				 <div class="bio-row">
				<div class="form-horizontal tasi-form" method="get">
                    <div class="form-group">
                        <label class="col-sm-3 col-sm-3 control-label">Position Held</label>
                            <div class="col-sm-8">
                                <input type="text" name="positionheld1" class="form-control">
                            </div>
                    </div>
				</div>
				</div>
				
				 <div class="bio-row">
				<div class="form-horizontal tasi-form" method="get">
                    <div class="form-group">
                        <label class="col-sm-3 col-sm-3 control-label">Reason for Leaving</label>
                            <div class="col-sm-8">
                                <input type="text" name="reasonforleaving1" class="form-control">
                            </div>
                    </div>
				</div>
				</div>
				
				
				<div class="bio-row">
				<div class="form-horizontal tasi-form" method="get">
                    <div class="form-group">
                        <label class="col-sm-3 col-sm-3 control-label">Salary Recieved</label>
                            <div class="col-sm-8">
                                <input type="number" name="salaryrecieved1" class="form-control">
                            </div>
                    </div>
				</div>
				</div> 
				 
				
				<div class="bio-row">
				<div class="form-horizontal tasi-form" method="get">
                    <div class="form-group">
                        <label class="col-sm-3 col-sm-3 control-label">Start Date</label>
                            <div class="col-sm-8">
                                <input type="date" name="employmentstartdate1" class="form-control">
                            </div>
                    </div>
				</div>
				</div> 
				
				<div class="bio-row">
				<div class="form-horizontal tasi-form" method="get">
                    <div class="form-group">
                        <label class="col-sm-3 col-sm-3 control-label">End Date</label>
                            <div class="col-sm-8">
                                <input type="date" name="employmentenddate1" class="form-control">
                            </div>
                    </div>
				</div>
				</div> 
				
				<div class="bio-row">
				<div class="form-horizontal tasi-form" method="get">
                    <div class="form-group">
                        <label class="col-sm-3 col-sm-3 control-label">2. Company Name</label>
                            <div class="col-sm-8">
                                <input type="text" name="previouscompany2" class="form-control">
                            </div>
                    </div>
				</div>
				</div>
				
				<div class="bio-row">
				<div class="form-horizontal tasi-form" method="get">
                    <div class="form-group">
                        <label class="col-sm-3 col-sm-3 control-label">Contact Number</label>
                            <div class="col-sm-8">
                                <input type="number" name="previouscompanycontactnumber2" class="form-control">
                            </div>
                    </div>
				</div>
				</div>
				
				<div class="bio-row">
				<div class="form-horizontal tasi-form" method="get">
                    <div class="form-group">
                        <label class="col-sm-3 col-sm-3 control-label">Address</label>
                            <div class="col-sm-8">
                                <input type="text" name="previouscompanyaddress2" class="form-control">
                            </div>
                    </div>
				</div>
				</div> 
				 
				 <div class="bio-row">
				<div class="form-horizontal tasi-form" method="get">
                    <div class="form-group">
                        <label class="col-sm-3 col-sm-3 control-label">Position Held</label>
                            <div class="col-sm-8">
                                <input type="text" name="positionheld2" class="form-control">
                            </div>
                    </div>
				</div>
				</div>
				
				 <div class="bio-row">
				<div class="form-horizontal tasi-form" method="get">
                    <div class="form-group">
                        <label class="col-sm-3 col-sm-3 control-label">Reason for Leaving</label>
                            <div class="col-sm-8">
                                <input type="text" name="reasonforleaving2" class="form-control">
                            </div>
                    </div>
				</div>
				</div>
				
				<div class="bio-row">
				<div class="form-horizontal tasi-form" method="get">
                    <div class="form-group">
                        <label class="col-sm-3 col-sm-3 control-label">Salary Recieved</label>
                            <div class="col-sm-8">
                                <input type="number" name="salaryrecieved2" class="form-control">
                            </div>
                    </div>
				</div>
				</div> 
				
				<div class="bio-row">
				<div class="form-horizontal tasi-form" method="get">
                    <div class="form-group">
                        <label class="col-sm-3 col-sm-3 control-label">Start Date</label>
                            <div class="col-sm-8">
                                <input type="date" name="employmentstartdate2" class="form-control">
                            </div>
                    </div>
				</div>
				</div> 
				
				<div class="bio-row">
				<div class="form-horizontal tasi-form" method="get">
                    <div class="form-group">
                        <label class="col-sm-3 col-sm-3 control-label">End Date</label>
                            <div class="col-sm-8">
                                <input type="date" name="employmentenddate2" class="form-control">
                            </div>
                    </div>
				</div>
				</div> 
				
				<h3>Government Exam Taken</h3>
				
				<div class="bio-row">
				<div class="form-horizontal tasi-form" method="get">
                    <div class="form-group">
                        <label class="col-sm-3 col-sm-3 control-label">1. Title of Exam</label>
                            <div class="col-sm-8">
                                <input type="text" name="examtitle1" class="form-control">
                            </div>
                    </div>
				</div>
				</div>
				
				<div class="bio-row">
				<div class="form-horizontal tasi-form" method="get">
                    <div class="form-group">
                        <label class="col-sm-3 col-sm-3 control-label">Date</label>
                            <div class="col-sm-8">
                                <input type="date" name="examdate1" class="form-control">
                            </div>
                    </div>
				</div>
				</div>
				
				<div class="bio-row">
				<div class="form-horizontal tasi-form" method="get">
                    <div class="form-group">
                        <label class="col-sm-3 col-sm-3 control-label">Venue</label>
                            <div class="col-sm-8">
                                <input type="text" name="examvenue1" class="form-control">
                            </div>
                    </div>
				</div>
				</div>
				
				<div class="bio-row">
				<div class="form-horizontal tasi-form" method="get">
                    <div class="form-group">
                        <label class="col-sm-3 col-sm-3 control-label">Rating</label>
                            <div class="col-sm-8">
                                <input type="text" name="examrating1" class="form-control">
                            </div>
                    </div>
				</div>
				</div>
				
				<div class="bio-row">
				<div class="form-horizontal tasi-form" method="get">
                    <div class="form-group">
                        <label class="col-sm-3 col-sm-3 control-label">2. Title of Exam</label>
                            <div class="col-sm-8">
                                <input type="text" name="examtitle2" class="form-control">
                            </div>
                    </div>
				</div>
				</div>
				
				<div class="bio-row">
				<div class="form-horizontal tasi-form" method="get">
                    <div class="form-group">
                        <label class="col-sm-3 col-sm-3 control-label">Date</label>
                            <div class="col-sm-8">
                                <input type="date" name="examdate2" class="form-control">
                            </div>
                    </div>
				</div>
				</div>
				
				<div class="bio-row">
				<div class="form-horizontal tasi-form" method="get">
                    <div class="form-group">
                        <label class="col-sm-3 col-sm-3 control-label">Venue</label>
                            <div class="col-sm-8">
                                <input type="text" name="examvenue2" class="form-control">
                            </div>
                    </div>
				</div>
				</div>
				
				<div class="bio-row">
				<div class="form-horizontal tasi-form" method="get">
                    <div class="form-group">
                        <label class="col-sm-3 col-sm-3 control-label">Rating</label>
                            <div class="col-sm-8">
                                <input type="text" name="examrating2" class="form-control">
                            </div>
                    </div>
				</div>
				</div>
				
				<h3>Memberships/Affiliations and Associations</h3>
				
				<div class="bio-row">
				<div class="form-horizontal tasi-form" method="get">
                    <div class="form-group">
                        <label class="col-sm-3 col-sm-3 control-label">1. Organization</label>
                            <div class="col-sm-8">
                                <input type="text" name="membershiporganization1" class="form-control">
                            </div>
                    </div>
				</div>
				</div>
				
				<div class="bio-row">
				<div class="form-horizontal tasi-form" method="get">
                    <div class="form-group">
                        <label class="col-sm-3 col-sm-3 control-label">Position</label>
                            <div class="col-sm-8">
                                <input type="text" name="membershipposition1" class="form-control">
                            </div>
                    </div>
				</div>
				</div>
				
				<div class="bio-row">
				<div class="form-horizontal tasi-form" method="get">
                    <div class="form-group">
                        <label class="col-sm-3 col-sm-3 control-label">Address</label>
                            <div class="col-sm-8">
                                <input type="text" name="membershipaddress1" class="form-control">
                            </div>
                    </div>
				</div>
				</div>
				
				<div class="bio-row">
				<div class="form-horizontal tasi-form" method="get">
                    <div class="form-group">
                        <label class="col-sm-3 col-sm-3 control-label">Date of Membership</label>
                            <div class="col-sm-8">
                                <input type="date" name="membershipdate1" class="form-control">
                            </div>
                    </div>
				</div>
				</div>
				
				<div class="bio-row">
				<div class="form-horizontal tasi-form" method="get">
                    <div class="form-group">
                        <label class="col-sm-3 col-sm-3 control-label">2. Organization</label>
                            <div class="col-sm-8">
                                <input type="text"  name="membershiporganization2" class="form-control">
                            </div>
                    </div>
				</div>
				</div>
				
				<div class="bio-row">
				<div class="form-horizontal tasi-form" method="get">
                    <div class="form-group">
                        <label class="col-sm-3 col-sm-3 control-label">Position</label>
                            <div class="col-sm-8">
                                <input type="text" name="membershipposition2" class="form-control">
                            </div>
                    </div>
				</div>
				</div>
				
				<div class="bio-row">
				<div class="form-horizontal tasi-form" method="get">
                    <div class="form-group">
                        <label class="col-sm-3 col-sm-3 control-label">Address</label>
                            <div class="col-sm-8">
                                <input type="text" name="membershipaddress2" class="form-control">
                            </div>
                    </div>
				</div>
				</div>
				
				<div class="bio-row">
				<div class="form-horizontal tasi-form" method="get">
                    <div class="form-group">
                        <label class="col-sm-3 col-sm-3 control-label">Date of Membership</label>
                            <div class="col-sm-8">
                                <input type="date" name="membershipdate2" class="form-control">
                            </div>
                    </div>
				</div>
				</div>
				
				
				<h3>Special Training/Seminars Attended</h3>
				
				 <div class="bio-row">
				<div class="form-horizontal tasi-form" method="get">
                    <div class="form-group">
                        <label class="col-sm-3 col-sm-3 control-label">1. Title of Training</label>
                            <div class="col-sm-8">
                                <input type="text" name="trainingtitle1" class="form-control">
                            </div>
                    </div>
				</div>
				</div>
				
				 <div class="bio-row">
				<div class="form-horizontal tasi-form" method="get">
                    <div class="form-group">
                        <label class="col-sm-3 col-sm-3 control-label">Date</label>
                            <div class="col-sm-8">
                                <input type="date" name="trainingdate1" class="form-control">
                            </div>
                    </div>
				</div>
				</div>
				
				 <div class="bio-row">
				<div class="form-horizontal tasi-form" method="get">
                    <div class="form-group">
                        <label class="col-sm-3 col-sm-3 control-label">Venue</label>
                            <div class="col-sm-8">
                                <input type="text" name="trainingvenue1" class="form-control">
                            </div>
                    </div>
				</div>
				</div>
				
				 <div class="bio-row">
				<div class="form-horizontal tasi-form" method="get">
                    <div class="form-group">
                        <label class="col-sm-3 col-sm-3 control-label">Resource Person</label>
                            <div class="col-sm-8">
                                <input type="text" name="trainingresourceperson1" class="form-control">
                            </div>
                    </div>
				</div>
				</div>
				
				<div class="bio-row">
				<div class="form-horizontal tasi-form" method="get">
                    <div class="form-group">
                        <label class="col-sm-3 col-sm-3 control-label">2. Title of Training</label>
                            <div class="col-sm-8">
                                <input type="text" name="trainingtitle2" class="form-control">
                            </div>
                    </div>
				</div>
				</div>
				
				 <div class="bio-row">
				<div class="form-horizontal tasi-form" method="get">
                    <div class="form-group">
                        <label class="col-sm-3 col-sm-3 control-label">Date</label>
                            <div class="col-sm-8">
                                <input type="date" name="trainingdate2" class="form-control">
                            </div>
                    </div>
				</div>
				</div>
				
				 <div class="bio-row">
				<div class="form-horizontal tasi-form" method="get">
                    <div class="form-group">
                        <label class="col-sm-3 col-sm-3 control-label">Venue</label>
                            <div class="col-sm-8">
                                <input type="text" name="trainingvenue2" class="form-control">
                            </div>
                    </div>
				</div>
				</div>
				
				 <div class="bio-row">
				<div class="form-horizontal tasi-form" method="get">
                    <div class="form-group">
                        <label class="col-sm-3 col-sm-3 control-label">Resource Person</label>
                            <div class="col-sm-8">
                                <input type="text" name="trainingresourceperson2" class="form-control">
                            </div>
                    </div>
				</div>
				</div>
				
				<h3>Family Background</h3>
				
				<div class="bio-row">
				<div class="form-horizontal tasi-form" method="get">
                    <div class="form-group">
                        <label class="col-sm-3 col-sm-3 control-label">1. Name</label>
                            <div class="col-sm-8">
                                <input type="text" name="familyname1" class="form-control">
                            </div>
                    </div>
				</div>
				</div>
				
				<div class="bio-row">
				<div class="form-horizontal tasi-form" method="get">
                    <div class="form-group">
                        <label class="col-sm-3 col-sm-3 control-label">Relation</label>
                            <div class="col-sm-8">
                                <input type="text" name="familyrelation1" class="form-control">
                            </div>
                    </div>
				</div>
				</div>
				
				<div class="bio-row">
				<div class="form-horizontal tasi-form" method="get">
                    <div class="form-group">
                        <label class="col-sm-3 col-sm-3 control-label">Occupation</label>
                            <div class="col-sm-8">
                                <input type="text" name="familyoccupation1" class="form-control">
                            </div>
                    </div>
				</div>
				</div>
				
				<div class="bio-row">
				<div class="form-horizontal tasi-form" method="get">
                    <div class="form-group">
                        <label class="col-sm-3 col-sm-3 control-label">Company</label>
                            <div class="col-sm-8">
                                <input type="text" name="familycompany1" class="form-control">
                            </div>
                    </div>
				</div>
				</div>
				
				<div class="bio-row">
				<div class="form-horizontal tasi-form" method="get">
                    <div class="form-group">
                        <label class="col-sm-3 col-sm-3 control-label">Residence</label>
                            <div class="col-sm-8">
                                <input type="text" name="familyresidence1" class="form-control">
                            </div>
                    </div>
				</div>
				</div>
				
				<div class="bio-row">
				<div class="form-horizontal tasi-form" method="get">
                    <div class="form-group">
                        <label class="col-sm-3 col-sm-3 control-label">Contact No.</label>
                            <div class="col-sm-8">
                                <input type="number" name="familycontactno1" class="form-control">
                            </div>
                    </div>
				</div>
				</div>
				
				<div class="bio-row">
				<div class="form-horizontal tasi-form" method="get">
                    <div class="form-group">
                        <label class="col-sm-3 col-sm-3 control-label">2. Name</label>
                            <div class="col-sm-8">
                                <input type="text" name="familyname2" class="form-control">
                            </div>
                    </div>
				</div>
				</div>
				
				<div class="bio-row">
				<div class="form-horizontal tasi-form" method="get">
                    <div class="form-group">
                        <label class="col-sm-3 col-sm-3 control-label">Relation</label>
                            <div class="col-sm-8">
                                <input type="text" name="familyrelation2" class="form-control">
                            </div>
                    </div>
				</div>
				</div>
				
				<div class="bio-row">
				<div class="form-horizontal tasi-form" method="get">
                    <div class="form-group">
                        <label class="col-sm-3 col-sm-3 control-label">Occupation</label>
                            <div class="col-sm-8">
                                <input type="text" name="familyoccupation2" class="form-control">
                            </div>
                    </div>
				</div>
				</div>
				
				<div class="bio-row">
				<div class="form-horizontal tasi-form" method="get">
                    <div class="form-group">
                        <label class="col-sm-3 col-sm-3 control-label">Company</label>
                            <div class="col-sm-8">
                                <input type="text" name="familycompany2" class="form-control">
                            </div>
                    </div>
				</div>
				</div>
				
				<div class="bio-row">
				<div class="form-horizontal tasi-form" method="get">
                    <div class="form-group">
                        <label class="col-sm-3 col-sm-3 control-label">Residence</label>
                            <div class="col-sm-8">
                                <input type="text" name="familyresidence2" class="form-control">
                            </div>
                    </div>
				</div>
				</div>
				
				<div class="bio-row">
				<div class="form-horizontal tasi-form" method="get">
                    <div class="form-group">
                        <label class="col-sm-3 col-sm-3 control-label">Contact No.</label>
                            <div class="col-sm-8">
                                <input type="number" name="familycontactno2" class="form-control">
                            </div>
                    </div>
				</div>
				</div>
				
				<div class="bio-row">
				<div class="form-horizontal tasi-form" method="get">
                    <div class="form-group">
                        <label class="col-sm-3 col-sm-3 control-label">3. Name</label>
                            <div class="col-sm-8">
                                <input type="text" name="familyname3" class="form-control">
                            </div>
                    </div>
				</div>
				</div>
				
				<div class="bio-row">
				<div class="form-horizontal tasi-form" method="get">
                    <div class="form-group">
                        <label class="col-sm-3 col-sm-3 control-label">Relation</label>
                            <div class="col-sm-8">
                                <input type="text" name="familyrelation3" class="form-control">
                            </div>
                    </div>
				</div>
				</div>
				
				<div class="bio-row">
				<div class="form-horizontal tasi-form" method="get">
                    <div class="form-group">
                        <label class="col-sm-3 col-sm-3 control-label">Occupation</label>
                            <div class="col-sm-8">
                                <input type="text" name="familyoccupation3" class="form-control">
                            </div>
                    </div>
				</div>
				</div>
				
				<div class="bio-row">
				<div class="form-horizontal tasi-form" method="get">
                    <div class="form-group">
                        <label class="col-sm-3 col-sm-3 control-label">Company</label>
                            <div class="col-sm-8">
                                <input type="text" name="familycompany3" class="form-control">
                            </div>
                    </div>
				</div>
				</div>
				
				<div class="bio-row">
				<div class="form-horizontal tasi-form" method="get">
                    <div class="form-group">
                        <label class="col-sm-3 col-sm-3 control-label">Residence</label>
                            <div class="col-sm-8">
                                <input type="text" name="familyresidence3" class="form-control">
                            </div>
                    </div>
				</div>
				</div>
				
				<div class="bio-row">
				<div class="form-horizontal tasi-form" method="get">
                    <div class="form-group">
                        <label class="col-sm-3 col-sm-3 control-label">Contact No.</label>
                            <div class="col-sm-8">
                                <input type="number" name="familycontactno3" class="form-control">
                            </div>
                    </div>
				</div>
				</div>
				
				
				<h3>Other Information</h3>
				
				<div class="bio-row">
				<div class="form-horizontal tasi-form" method="get">
                    <div class="form-group">
                        <label class="col-sm-3 col-sm-3 control-label">SSS No.</label>
                            <div class="col-sm-8">
                                <input type="number" name="sssno" class="form-control">
                            </div>
                    </div>
				</div>
				</div>
				
				<div class="bio-row">
				<div class="form-horizontal tasi-form" method="get">
                    <div class="form-group">
                        <label class="col-sm-3 col-sm-3 control-label">Philhealth No.</label>
                            <div class="col-sm-8">
                                <input type="number" name="philhealthno" class="form-control">
                            </div>
                    </div>
				</div>
				</div>
				
				<div class="bio-row">
				<div class="form-horizontal tasi-form" method="get">
                    <div class="form-group">
                        <label class="col-sm-3 col-sm-3 control-label">TIN No.</label>
                            <div class="col-sm-8">
                                <input type="number" name="tinno" class="form-control">
                            </div>
                    </div>
				</div>
				</div>
				
				<div class="bio-row">
				<div class="form-horizontal tasi-form" method="get">
                    <div class="form-group">
                        <label class="col-sm-3 col-sm-3 control-label">Pag-Ibig No.</label>
                            <div class="col-sm-8">
                                <input type="number" name="pagibigno" class="form-control">
                            </div>
                    </div>
				</div>
				</div>
				
				<h3>Background Check Authorization</h3>
				
				<h4>Employment References</h4>
				
				<div class="bio-row">
				<div class="form-horizontal tasi-form" method="get">
                    <div class="form-group">
                        <label class="col-sm-3 col-sm-3 control-label">1. Name</label>
                            <div class="col-sm-8">
                                <input type="text" required name="referencename1" class="form-control">
                            </div>
                    </div>
				</div>
				</div>
				
				<div class="bio-row">
				<div class="form-horizontal tasi-form" method="get">
                    <div class="form-group">
                        <label class="col-sm-3 col-sm-3 control-label">Position</label>
                            <div class="col-sm-8">
                                <input type="text" required name="referenceposition1" class="form-control">
                            </div>
                    </div>
				</div>
				</div>
				
				<div class="bio-row">
				<div class="form-horizontal tasi-form" method="get">
                    <div class="form-group">
                        <label class="col-sm-3 col-sm-3 control-label">Company</label>
                            <div class="col-sm-8">
                                <input type="text" required name="referencecompany1" class="form-control">
                            </div>
                    </div>
				</div>
				</div>
				
				<div class="bio-row">
				<div class="form-horizontal tasi-form" method="get">
                    <div class="form-group">
                        <label class="col-sm-3 col-sm-3 control-label">Contact No.</label>
                            <div class="col-sm-8">
                                <input type="number" required name="referencecontactno1" class="form-control">
                            </div>
                    </div>
				</div>
				</div>
				
				<div class="bio-row">
				<div class="form-horizontal tasi-form" method="get">
                    <div class="form-group">
                        <label class="col-sm-3 col-sm-3 control-label">2. Name</label>
                            <div class="col-sm-8">
                                <input type="text" required name="referencename2" class="form-control">
                            </div>
                    </div>
				</div>
				</div>
				
				<div class="bio-row">
				<div class="form-horizontal tasi-form" method="get">
                    <div class="form-group">
                        <label class="col-sm-3 col-sm-3 control-label">Position</label>
                            <div class="col-sm-8">
                                <input type="text" required name="referenceposition2" class="form-control">
                            </div>
                    </div>
				</div>
				</div>
				
				<div class="bio-row">
				<div class="form-horizontal tasi-form" method="get">
                    <div class="form-group">
                        <label class="col-sm-3 col-sm-3 control-label">Company</label>
                            <div class="col-sm-8">
                                <input type="text" required name="referencecompany2" class="form-control">
                            </div>
                    </div>
				</div>
				</div>
				
				<div class="bio-row">
				<div class="form-horizontal tasi-form" method="get">
                    <div class="form-group">
                        <label class="col-sm-3 col-sm-3 control-label">Contact No.</label>
                            <div class="col-sm-8">
                                <input type="number" required name="referencecontactno2" class="form-control">
                            </div>
                    </div>
				</div>
				</div>
				
				<div class="bio-row">
				<div class="form-horizontal tasi-form" method="get">
                    <div class="form-group">
                        <label class="col-sm-3 col-sm-3 control-label">3. Name</label>
                            <div class="col-sm-8">
                                <input type="text" required name="referencename3" class="form-control">
                            </div>
                    </div>
				</div>
				</div>
				
				<div class="bio-row">
				<div class="form-horizontal tasi-form" method="get">
                    <div class="form-group">
                        <label class="col-sm-3 col-sm-3 control-label">Position</label>
                            <div class="col-sm-8">
                                <input type="text" required name="referenceposition3" class="form-control">
                            </div>
                    </div>
				</div>
				</div>
				
				<div class="bio-row">
				<div class="form-horizontal tasi-form" method="get">
                    <div class="form-group">
                        <label class="col-sm-3 col-sm-3 control-label">Company</label>
                            <div class="col-sm-8">
                                <input type="text" required name="referencecompany3" class="form-control">
                            </div>
                    </div>
				</div>
				</div>
				
				<div class="bio-row">
				<div class="form-horizontal tasi-form" method="get">
                    <div class="form-group">
                        <label class="col-sm-3 col-sm-3 control-label">Contact No.</label>
                            <div class="col-sm-8">
                                <input type="number" required name="referencecontactno3" class="form-control">
                            </div>
                    </div>
				</div>
				</div>
				
				<h4>Character References</h4>
				
				<div class="bio-row">
				<div class="form-horizontal tasi-form" method="get">
                    <div class="form-group">
                        <label class="col-sm-3 col-sm-3 control-label">1. Name</label>
                            <div class="col-sm-8">
                                <input type="text" required name="charactername1" class="form-control">
                            </div>
                    </div>
				</div>
				</div>
				
				<div class="bio-row">
				<div class="form-horizontal tasi-form" method="get">
                    <div class="form-group">
                        <label class="col-sm-3 col-sm-3 control-label">Relation</label>
                            <div class="col-sm-8">
                                <input type="text" required name="characterrelation1" class="form-control">
                            </div>
                    </div>
				</div>
				</div>
				
				<div class="bio-row">
				<div class="form-horizontal tasi-form" method="get">
                    <div class="form-group">
                        <label class="col-sm-3 col-sm-3 control-label">Company</label>
                            <div class="col-sm-8">
                                <input type="text" required name="charactercompany1" class="form-control">
                            </div>
                    </div>
				</div>
				</div>
				
				<div class="bio-row">
				<div class="form-horizontal tasi-form" method="get">
                    <div class="form-group">
                        <label class="col-sm-3 col-sm-3 control-label">Contact No.</label>
                            <div class="col-sm-8">
                                <input type="number" required name="charactercontactno1" class="form-control">
                            </div>
                    </div>
				</div>
				</div>
				
				<div class="bio-row">
				<div class="form-horizontal tasi-form" method="get">
                    <div class="form-group">
                        <label class="col-sm-3 col-sm-3 control-label">2. Name</label>
                            <div class="col-sm-8">
                                <input type="text" required name="charactername2" class="form-control">
                            </div>
                    </div>
				</div>
				</div>
				
				<div class="bio-row">
				<div class="form-horizontal tasi-form" method="get">
                    <div class="form-group">
                        <label class="col-sm-3 col-sm-3 control-label">Relation</label>
                            <div class="col-sm-8">
                                <input type="text" required name="characterrelation2" class="form-control">
                            </div>
                    </div>
				</div>
				</div>
				
				<div class="bio-row">
				<div class="form-horizontal tasi-form" method="get">
                    <div class="form-group">
                        <label class="col-sm-3 col-sm-3 control-label">Company</label>
                            <div class="col-sm-8">
                                <input type="text" required name="charactercompany2" class="form-control">
                            </div>
                    </div>
				</div>
				</div>
				
				<div class="bio-row">
				<div class="form-horizontal tasi-form" method="get">
                    <div class="form-group">
                        <label class="col-sm-3 col-sm-3 control-label">Contact No.</label>
                            <div class="col-sm-8">
                                <input type="number" required name="charactercontactno2" class="form-control">
                            </div>
                    </div>
				</div>
				</div>
				
				<div class="bio-row">
				<div class="form-horizontal tasi-form" method="get">
                    <div class="form-group">
                        <label class="col-sm-3 col-sm-3 control-label">3. Name</label>
                            <div class="col-sm-8">
                                <input type="text" required name="charactername3" class="form-control">
                            </div>
                    </div>
				</div>
				</div>
				
				<div class="bio-row">
				<div class="form-horizontal tasi-form" method="get">
                    <div class="form-group">
                        <label class="col-sm-3 col-sm-3 control-label">Relation</label>
                            <div class="col-sm-8">
                                <input type="text" required name="characterrelation3" class="form-control">
                            </div>
                    </div>
				</div>
				</div>
				
				<div class="bio-row">
				<div class="form-horizontal tasi-form" method="get">
                    <div class="form-group">
                        <label class="col-sm-3 col-sm-3 control-label">Company</label>
                            <div class="col-sm-8">
                                <input type="text" required name="charactercompany3" class="form-control">
                            </div>
                    </div>
				</div>
				</div>
				
				<div class="bio-row">
				<div class="form-horizontal tasi-form" method="get">
                    <div class="form-group">
                        <label class="col-sm-3 col-sm-3 control-label">Contact No.</label>
                            <div class="col-sm-8">
                                <input type="number" required name="charactercontactno3" class="form-control">
                            </div>
                    </div>
				</div>
				</div>
				
				<br></br>
			
					<input type="submit" name="submit" value="submit" />
					
					<?php echo $message; ?>
					
			</form>
				<br></br>
		  </section>
		</div>
	  </section>
  </section>
                  </div>
              </div>

            <div class="text-right" style="margin-right: 30px">
                <a href="#"><span class="glyphicon glyphicon-print"> Print</span></a>
            </div>
        </div>
    </div>

</div>

</body>

</html>