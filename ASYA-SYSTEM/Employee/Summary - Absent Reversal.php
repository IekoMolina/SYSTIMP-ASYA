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
    <link rel="stylesheet" href="css/custom-theme.css">
    <link rel="stylesheet" href="css/custom.css">

    <title>Absent Reversal Form</title>
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
                <a href="#report-items" class="list-group-item" data-toggle="collapse" data-parent=".sidebar-nav">
                    <span class="glyphicon glyphicon-list-alt"></span> Request <span class="caret"></span>
                </a>
                <!-- report items -->
                <div class="list-group collapse" id="report-items">

                    <!-- FORMS -->
                    <a href="#attendance-reports" class="list-group-item" data-toggle="collapse">
                        <a href="Form - Absent Reversal.php" class="list-group-item">Absent Reversal</a>
						<a href="Form - Change Record.php" class="list-group-item">Change Record</a>
						<a href="Form - Itenerary Authorization.php" class="list-group-item">Itinerary Authorization</a>
						<a href="Form - Leave.php" class="list-group-item">Leave</a>
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

        <h2 class="page-title">Absent Reversal Details</h2>

        <div class="row">
                  <div class="col-lg-12">
                      <div class="col-md-2 text-right">
                <h3 class="info-label-text">Code:</h3>
                <h3 class="info-label-text">Request Date:</h3>
                <h3 class="info-label-text">Date Applicable:</h3>
                <h3 class="info-label-text">Morning In:</h3>
                <h3 class="info-label-text">Lunch Out:</h3>
                <h3 class="info-label-text">Lunch In:</h3>
                <h3 class="info-label-text">Break Out.:</h3>
                <h3 class="info-label-text">Break In:</h3>
                <h3 class="info-label-text">Afternoon Out.:</h3>
                <h3 class="info-label-text">Reason:</h3>
				
				<div class="col-md-2 employee-info-button">
					<a href="home.php" class="btn btn-default">Back</a>
				</div>
				<br>
            </div>
            <div class="col-md-3">
                <h3 class="info-detail-text">AR-000158</h3>
                <h3 class="info-detail-text">23/02/2017</h3>
                <h3 class="info-detail-text">23/02/2017</h3>
                <h3 class="info-detail-text">9:00AM</h3>
                <h3 class="info-detail-text">12:00PM</h3>
                <h3 class="info-detail-text">1:00AM</h3>
                <h3 class="info-detail-text">4:00PM</h3>
                <h3 class="info-detail-text">4:30AM</h3>
                <h3 class="info-detail-text">7:00PM</h3>
                <h3 class="info-detail-text">Busy with project</h3>
				<br>
            </div>
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