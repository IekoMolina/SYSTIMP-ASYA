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

    <title>Employee Information</title>
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
        <ul class="nav navbar-nav">
            <li><a href="#personal">Personal Information</a></li>
            <li><a href="#education">Education Attained</a></li>
            <li><a href="#employment">Employment Record</a></li>
            <li><a href="#governmentexam">Government Exam</a></li>
            <li><a href="#associations">Associations</a></li>
            <li><a href="#training">Special Training</a></li>
            <li><a href="#family">Family Background</a></li>
            <li><a href="#agency">Government Requirement</a></li>
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
                <a href="home.php" class="list-group-item"><span class="glyphicon glyphicon-home"></span> Home</a>
				
				  <!-- employee info -->
                <a href="Employee info.php" class="list-group-item active"><span class="glyphicon glyphicon-user"></span> Employee</a>
			
                <!-- reports -->
                <a href="#report-items" class="list-group-item" data-toggle="collapse" data-parent=".sidebar-nav">
                    <span class="glyphicon glyphicon-list-alt"></span> Request <span class="caret"></span>
                </a>
                <!-- report items -->
                <div class="list-group collapse" id="report-items">

                    <!-- FORMS -->
                    <a href="#attendance-reports" class="list-group-item" data-toggle="collapse">
                        <a href="Form - Absent Reversal.php" class="list-group-item">Absent Reversal</a>
						<a href="Form - Itenerary Authorization.php" class="list-group-item">Itinerary Authorization</a>
						<a href="Form - Leave.php" class="list-group-item">Leave</a>
                        <a href="Form - Overtime.php" class="list-group-item">Overtime</a>
                        <a href="Form - Undertime.php" class="list-group-item">Undertime</a>
                    </a>
                   
                </div>

                <a href="#" class="list-group-item"><span class="glyphicon glyphicon-info-sign"></span> About</a>
            </div>
        </div>

    </div>


    <!-- insert page content here -->
		        <!-- employee information section -->
        <a class="anchor" name="personal"></a>
        <div class="row filldiv">
		<br></br><br>
            <h2 class="page-title">Personal Information<h2>
            <div class="col-md-2 text-right">
                <h5 class="info-label-text">Last Name:</h5>
                <h5 class="info-label-text">First Name:</h5>
                <h5 class="info-label-text">Middle Name:</h5>
                <h5 class="info-label-text">Residence Address:</h5>
				<h5 class="info-detail-text">:</h5>
                <h5 class="info-label-text">Provincial Address:</h5>
				<h5 class="info-detail-text">:</h5>
                <h5 class="info-label-text">Mobile No.:</h5>
                <h5 class="info-label-text">Telephone No.:</h5>
				<br>
                <h5 class="info-label-text text-left">Spouse Info</h5>
                <h5 class="info-label-text">Name:</h5>
                <h5 class="info-label-text">Occupation:</h5>
				<br>
            </div>
            <div class="col-md-3">
                <h5 class="info-detail-text">Secades</h5>
                <h5 class="info-detail-text">Luis</h5>
                <h5 class="info-detail-text">Flores</h5>
				<h5 class="info-detail-text">123 Barangay Hall </h5>
				<h5 class="info-detail-text">Quezon City</h5>
                <h5 class="info-detail-text">123 Barangay Hall</h5>
				<h5 class="info-detail-text">Cagayan de Oro</h5>
                <h5 class="info-detail-text">8010217</h5>
                <h5 class="info-detail-text">09741356287</h5>
				<br>
				<h5 class="info-detail-text">:</h5>
                <h5 class="info-detail-text">Josefa Mercado</h5>
                <h5 class="info-detail-text">Superstar</h5>
				<br>
            </div>
			
            <div class="col-md-2 text-right">
                <h5 class="info-label-text">Citizenship:</h5>
                <h5 class="info-label-text">Gender:</h5>
                <h5 class="info-label-text">Birthdate:</h5>
                <h5 class="info-label-text">Birth Place:</h5>
                <h5 class="info-label-text">Civil Status:</h5>
                <h5 class="info-label-text">Religion:</h5>
                <h5 class="info-label-text">E-mail Address:</h5>
				<br>
				<h5 class="info-label-text">:</h5>
				<h5 class="info-label-text">:</h5>
				<h5 class="info-label-text">:</h5>
                <h5 class="info-label-text">Company:</h5>
                <h5 class="info-label-text">Contact No.:</h5>
				<br>
            </div>
            <div class="col-md-2">
                <h5 class="info-detail-text">Filipino</h5>
				<h5 class="info-detail-text">Male</h5>
                <h5 class="info-detail-text">November 12, 1985</h5>
                <h5 class="info-detail-text">Makati</h5>
                <h5 class="info-detail-text">Single</h5>
                <h5 class="info-detail-text">Catholic</h5>
                <h5 class="info-detail-text">luis@yahoo.com</h5>
				<br>
				<h5 class="info-detail-text">:</h5>
				<h5 class="info-detail-text">:</h5>
				<h5 class="info-detail-text">:</h5>
                <h5 class="info-detail-text">Inc. Co.</h5>
                <h5 class="info-detail-text">09874562145</h5>
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
				<h5 class="info-detail-text">:</h5>
                <h5 class="info-detail-text">DLSU</h5>
                <h5 class="info-detail-text">Manila</h5>
                <h5 class="info-detail-text">BS-IT</h5>
				<h5 class="info-detail-text">:</h5>
                <h5 class="info-detail-text">DLSU</h5>
                <h5 class="info-detail-text">Manila</h5>
                <h5 class="info-detail-text">BS-IT</h5>
				<h5 class="info-detail-text">:</h5>
                <h5 class="info-detail-text">DLSU</h5>
                <h5 class="info-detail-text">Manila</h5>
                <h5 class="info-detail-text">BS-IT</h5>
				<h5 class="info-detail-text">:</h5>
                <h5 class="info-detail-text">DLSU</h5>
                <h5 class="info-detail-text">Manila</h5>
                <h5 class="info-detail-text">BS-IT</h5>
            </div>
			
            <div class="col-md-2 text-right">
				<h5 class="info-label-text">:</h5>
                <h5 class="info-label-text">Honor Recieved:</h5>
                <h5 class="info-label-text">Start Date:</h5>
                <h5 class="info-label-text">End Date:</h5>
				<h5 class="info-detail-text">:</h5>
                <h5 class="info-label-text">Honor Recieved:</h5>
                <h5 class="info-label-text">Start Date:</h5>
                <h5 class="info-label-text">End Date:</h5>
				<h5 class="info-label-text">:</h5>
                <h5 class="info-label-text">Honor Recieved:</h5>
                <h5 class="info-label-text">Start Date:</h5>
                <h5 class="info-label-text">End Date:</h5>
				<h5 class="info-label-text">:</h5>
                <h5 class="info-label-text">Honor Recieved:</h5>
                <h5 class="info-label-text">Start Date:</h5>
                <h5 class="info-label-text">End Date:</h5>
            </div>
            <div class="col-md-2">
				<h5 class="info-detail-text">:</h5>
                <h5 class="info-detail-text">Cum Laude</h5>
                <h5 class="info-detail-text">01/02/14</h5>
                <h5 class="info-detail-text">01/02/17</h5>
				<h5 class="info-detail-text">:</h5>
                <h5 class="info-detail-text">Cum Laude</h5>
                <h5 class="info-detail-text">01/02/14</h5>
                <h5 class="info-detail-text">01/02/17</h5>
				<h5 class="info-detail-text">:</h5>
                <h5 class="info-detail-text">Cum Laude</h5>
                <h5 class="info-detail-text">01/02/14</h5>
                <h5 class="info-detail-text">01/02/17</h5>
				<h5 class="info-detail-text">:</h5>
                <h5 class="info-detail-text">Cum Laude</h5>
                <h5 class="info-detail-text">01/02/14</h5>
                <h5 class="info-detail-text">01/02/17</h5>
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
				<br>
                <h5 class="info-label-text">Company Name:</h5>
                <h5 class="info-label-text">Contact No:</h5>
                <h5 class="info-label-text">Address:</h5>
				<br>
                <h5 class="info-label-text">Company Name:</h5>
                <h5 class="info-label-text">Contact No:</h5>
                <h5 class="info-label-text">Address:</h5>
            </div>
            <div class="col-md-3">
                <h5 class="info-detail-text">HP</h5>
                <h5 class="info-detail-text">23456789</h5>
                <h5 class="info-detail-text">Makati City</h5>
				<br>
                <h5 class="info-detail-text">Dell</h5>
                <h5 class="info-detail-text">23456789</h5>
                <h5 class="info-detail-text">Makati City</h5>
				<br>
                <h5 class="info-detail-text">Lenovo</h5>
                <h5 class="info-detail-text">23456789</h5>
                <h5 class="info-detail-text">Makati City</h5>
				<br>
                <h5 class="info-detail-text">Samsung</h5>
                <h5 class="info-detail-text">23456789</h5>
                <h5 class="info-detail-text">Makati City</h5>
            </div>
			
            <div class="col-md-2 text-right">
                <h5 class="info-label-text">Position Held:</h5>
                <h5 class="info-label-text">Reason for Leaving:</h5>
                <h5 class="info-label-text">Salary Recieved:</h5>
				<br>
                <h5 class="info-label-text">Position Held:</h5>
                <h5 class="info-label-text">Reason for Leaving:</h5>
                <h5 class="info-label-text">Salary Recieved:</h5>
				<br>
                <h5 class="info-label-text">Position Held:</h5>
                <h5 class="info-label-text">Reason for Leaving:</h5>
                <h5 class="info-label-text">Salary Recieved:</h5>
				<br>
                <h5 class="info-label-text">Position Held:</h5>
                <h5 class="info-label-text">Reason for Leaving:</h5>
                <h5 class="info-label-text">Salary Recieved:</h5>
            </div>
            <div class="col-md-2">
                <h5 class="info-detail-text">Manager</h5>
                <h5 class="info-detail-text">Low Salary</h5>
                <h5 class="info-detail-text">20000</h5>
				<br>
                <h5 class="info-detail-text">Manager</h5>
                <h5 class="info-detail-text">Low Salary</h5>
                <h5 class="info-detail-text">20000</h5>
				<br>
                <h5 class="info-detail-text">Manager</h5>
                <h5 class="info-detail-text">Low Salary</h5>
                <h5 class="info-detail-text">20000</h5>
				<br>
                <h5 class="info-detail-text">Manager</h5>
                <h5 class="info-detail-text">Low Salary</h5>
                <h5 class="info-detail-text">20000</h5>
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
				<br>
                <h5 class="info-label-text">Title of Exam:</h5>
                <h5 class="info-label-text">Venue:</h5>
				<br>
                <h5 class="info-label-text">Title of Exam:</h5>
                <h5 class="info-label-text">Venue:</h5>
            </div>
            <div class="col-md-3">
                <h5 class="info-detail-text">HP</h5>
                <h5 class="info-detail-text">23456789</h5>
				<br>
                <h5 class="info-detail-text">Dell</h5>
                <h5 class="info-detail-text">23456789</h5>
				<br>
                <h5 class="info-detail-text">Lenovo</h5>
                <h5 class="info-detail-text">23456789</h5>
				<br>
                <h5 class="info-detail-text">Samsung</h5>
                <h5 class="info-detail-text">23456789</h5>
            </div>
			
            <div class="col-md-2 text-right">
                <h5 class="info-label-text">Date:</h5>
                <h5 class="info-label-text">Rating:</h5>
				<br>
                <h5 class="info-label-text">Date:</h5>
                <h5 class="info-label-text">Rating:</h5>
				<br>
                <h5 class="info-label-text">Date:</h5>
                <h5 class="info-label-text">Rating:</h5>
				<br>
                <h5 class="info-label-text">Date:</h5>
                <h5 class="info-label-text">Rating:</h5>
            </div>
            <div class="col-md-2">
                <h5 class="info-detail-text">HP Tower</h5>
                <h5 class="info-detail-text">98/100</h5>
				<br>
                <h5 class="info-detail-text">Dell Tower</h5>
                <h5 class="info-detail-text">Good</h5>
				<br>
                <h5 class="info-detail-text">DLSU</h5>
                <h5 class="info-detail-text">Excellent</h5>
				<br>
                <h5 class="info-detail-text">UST</h5>
                <h5 class="info-detail-text">60/100</h5>
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
				<br>
                <h5 class="info-label-text">Organization:</h5>
                <h5 class="info-label-text">Address:</h5>
				<br>
                <h5 class="info-label-text">Organization:</h5>
                <h5 class="info-label-text">Address:</h5>
            </div>
            <div class="col-md-3">
                <h5 class="info-detail-text">HP</h5>
                <h5 class="info-detail-text">Secretary</h5>
				<br>
                <h5 class="info-detail-text">Dell</h5>
                <h5 class="info-detail-text">President</h5>
				<br>
                <h5 class="info-detail-text">Lenovo</h5>
                <h5 class="info-detail-text">Slave</h5>
				<br>
                <h5 class="info-detail-text">Samsung</h5>
                <h5 class="info-detail-text">Butler</h5>
            </div>
			
            <div class="col-md-2 text-right">
                <h5 class="info-label-text">Date of Membership:</h5>
                <h5 class="info-label-text">Position:</h5>
				<br>
                <h5 class="info-label-text">Date of Membership:</h5>
                <h5 class="info-label-text">Position:</h5>
				<br>
                <h5 class="info-label-text">Date of Membership:</h5>
                <h5 class="info-label-text">Position:</h5>
				<br>
                <h5 class="info-label-text">Date of Membership:</h5>
                <h5 class="info-label-text">Position:</h5>
            </div>
            <div class="col-md-2">
                <h5 class="info-detail-text">01/01/17</h5>
                <h5 class="info-detail-text">HP Tower</h5>
				<br>
                <h5 class="info-detail-text">01/01/17</h5>
                <h5 class="info-detail-text">Dell Tower</h5>
				<br>
                <h5 class="info-detail-text">01/01/17</h5>
                <h5 class="info-detail-text">DLSU</h5>
				<br>
                <h5 class="info-detail-text">01/01/17</h5>
                <h5 class="info-detail-text">UST</h5>
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
				<br>
                <h5 class="info-label-text">Title of Training:</h5>
                <h5 class="info-label-text">Venue:</h5>
				<br>
                <h5 class="info-label-text">Title of Training:</h5>
                <h5 class="info-label-text">Venue:</h5>
            </div>
            <div class="col-md-3">
                <h5 class="info-detail-text">HP</h5>
                <h5 class="info-detail-text">Secretary</h5>
				<br>
                <h5 class="info-detail-text">Dell</h5>
                <h5 class="info-detail-text">President</h5>
				<br>
                <h5 class="info-detail-text">Lenovo</h5>
                <h5 class="info-detail-text">Slave</h5>
				<br>
                <h5 class="info-detail-text">Samsung</h5>
                <h5 class="info-detail-text">Butler</h5>
            </div>
			
            <div class="col-md-2 text-right">
                <h5 class="info-label-text">Date:</h5>
                <h5 class="info-label-text">Resource Person:</h5>
				<br> 
				<h5 class="info-label-text">Date:</h5>
                <h5 class="info-label-text">Resource Person:</h5>
				<br>
                 <h5 class="info-label-text">Date:</h5>
                <h5 class="info-label-text">Resource Person:</h5>
				<br>
                <h5 class="info-label-text">Date:</h5>
                <h5 class="info-label-text">Resource Person:</h5>
            </div>
            <div class="col-md-2">
				<h5 class="info-detail-text">01/01/17</h5>
                <h5 class="info-detail-text">HP Tower</h5>
				<br>
                <h5 class="info-detail-text">01/01/17</h5>
                <h5 class="info-detail-text">Dell Tower</h5>
				<br>
                <h5 class="info-detail-text">01/01/17</h5>
                <h5 class="info-detail-text">DLSU</h5>
				<br>
                <h5 class="info-detail-text">01/01/17</h5>
                <h5 class="info-detail-text">UST</h5>
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
				<br>
                <h5 class="info-label-text">Name:</h5>
                <h5 class="info-label-text">Relation:</h5>
                <h5 class="info-label-text">Occupation:</h5>
            </div>
            <div class="col-md-3">
                <h5 class="info-detail-text">HP</h5>
                <h5 class="info-detail-text">Secretary</h5>
                <h5 class="info-detail-text">Secretary</h5>
				<br>
                <h5 class="info-detail-text">Dell</h5>
                <h5 class="info-detail-text">Secretary</h5>
                <h5 class="info-detail-text">President</h5>
				<br>
                <h5 class="info-detail-text">Lenovo</h5>
                <h5 class="info-detail-text">Secretary</h5>
                <h5 class="info-detail-text">Slave</h5>
				<br>
                <h5 class="info-detail-text">Samsung</h5>
                <h5 class="info-detail-text">Secretary</h5>
                <h5 class="info-detail-text">Butler</h5>
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
				<br>
                <h5 class="info-label-text">Company:</h5>
                <h5 class="info-label-text">Residence:</h5>
                <h5 class="info-label-text">Contanct No.:</h5>
            </div>
            <div class="col-md-2">
				<h5 class="info-detail-text">01/01/17</h5>
                <h5 class="info-detail-text">HP Tower</h5>
                <h5 class="info-detail-text">HP Tower</h5>
				<br>
                <h5 class="info-detail-text">01/01/17</h5>
                <h5 class="info-detail-text">Dell Tower</h5>
                <h5 class="info-detail-text">HP Tower</h5>
				<br>
                <h5 class="info-detail-text">01/01/17</h5>
                <h5 class="info-detail-text">DLSU</h5>
                <h5 class="info-detail-text">HP Tower</h5>
				<br>
                <h5 class="info-detail-text">01/01/17</h5>
                <h5 class="info-detail-text">UST</h5>
                <h5 class="info-detail-text">HP Tower</h5>
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
                <h5 class="info-detail-text">753737</h5>
				<br>
                <h5 class="info-detail-text">78576</h5>
            </div>
			
            <div class="col-md-2 text-right">
                <h5 class="info-label-text">Philhealth:</h5>
				<br>
                <h5 class="info-label-text">Pag-ibig:</h5>
            </div>
            <div class="col-md-2">
				<h5 class="info-detail-text">01/01/17</h5>
				<br>
                <h5 class="info-detail-text">HP Tower</h5>
            </div>
		</div>

	

</div>

</body>

</html>