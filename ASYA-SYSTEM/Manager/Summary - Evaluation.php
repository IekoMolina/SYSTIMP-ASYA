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

    <title>Evaluation Summary</title>
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
                <a href="#request-items" class="list-group-item" data-toggle="collapse" data-parent=".sidebar-nav">
                    <span class="glyphicon glyphicon-list-alt"></span> Request <span class="caret"></span>
                </a>
                <!-- request items -->
                <div class="list-group collapse" id="request-items">

                    <!-- FORMS -->
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
				
				 <!-- subordinate -->
                <a href="#sub-items" class="list-group-item" data-toggle="collapse" data-parent=".sidebar-nav">
                    <span class="glyphicon glyphicon-list-alt"></span> Subordinates <span class="caret"></span>
                </a>
                <!-- subordinate items -->
                <div class="list-group collapse" id="sub-items">

                    <!-- FORMS -->
					
						<a href="Subordinate - Evaluation.php" class="list-group-item">Evaluation</a>
					
						 <a href="#penreq-items" class="list-group-item" data-toggle="collapse" data-parent=".sidebar-nav">
						<span class="glyphicon glyphicon-list-alt"></span> 	Request <span class="caret"></span>
						
                    </a>
                </div>
				
						<!-- request items -->
						<div class="list-group collapse" id="penreq-items">

							<!-- FORMS -->
								<a href="Subordinate - Absent Reversal.php" class="list-group-item">Absent Reversal</a>
								<a href="Subordinate - Change Record.php" class="list-group-item">Change Record</a>
								<a href="Subordinate - Itenerary Authorization.php" class="list-group-item">Itinerary Authorization</a>
								<a href="Subordinate - Leave.php" class="list-group-item">Leave</a>
								<a href="Subordinate - Overtime.php" class="list-group-item">Overtime</a>
								<a href="Subordinate - Resignation.php" class="list-group-item">Resignation</a>
								<a href="Subordinate - Undertime.php" class="list-group-item">Undertime</a>
							</a>
						   
						</div>
						
				
                <a href="#" class="list-group-item"><span class="glyphicon glyphicon-info-sign"></span> About</a>
            </div>
        </div>

    </div>

    <!-- insert page content here -->
    <div id="page-content-wrapper">

        <h2 class="page-title">Evaluation Details</h2>

        <div class="row">
                  <div class="col-lg-12">
                      <div class="col-md-3 text-right">
								<h3 class="info-label-text">Code:</h3>
								<h3 class="info-label-text">:</h3>
								<h3 class="info-label-text">:</h3>
								<br>
								<h3 class="info-label-text">Initiative:</h3>
								<h3 class="info-label-text">Attention to Details:</h3>
								<h3 class="info-label-text">Analysis:</h3>
								<h3 class="info-label-text">Tolerance for Stress:</h3>
								<h3 class="info-label-text">Performance Stability:</h3>
								<h3 class="info-label-text">Job Knowledge:</h3>
								<h3 class="info-label-text">Loyalty:</h3>
								<h3 class="info-label-text">Trustworthiness:</h3>
								<br>
								<h3 class="info-label-text">Remarks:</h3>
								<br>
								<h3 class="info-label-text">Score:</h3>
							
							<br>
						</div>
						<div class="col-md-3">
							<h3 class="info-detail-text">EVAL-000158</h3>
							<h3 class="info-detail-text">:</h3>
							<h3 class="info-detail-text">:</h3>
							<br>
							<h3 class="info-detail-text">15</h3>
							<h3 class="info-detail-text">12</h3>
							<h3 class="info-detail-text">13</h3>
							<h3 class="info-detail-text">15</h3>
							<h3 class="info-detail-text">15</h3>
							<h3 class="info-detail-text">14</h3>
							<h3 class="info-detail-text">15</h3>
							<h3 class="info-detail-text">15</h3>
							<br>
							<h3 class="info-detail-text">Outstanding work</h3>
							<br>
							<h3 class="info-detail-text">96%</h3>
						</div>
						 <div class="col-md-3 text-right">
								<h3 class="info-label-text">Date Filed:</h3>
								<h3 class="info-label-text">Type:</h3>
								<h3 class="info-label-text">:</h3>
								<br>
								<h3 class="info-label-text">Discipline:</h3>
								<h3 class="info-label-text">Commitment to Work:</h3>
								<h3 class="info-label-text">Respect for Culture:</h3>
								<h3 class="info-label-text">"Yes, We Can!" Attitude:</h3>
								<h3 class="info-label-text">Customer Delight:</h3>
								<h3 class="info-label-text">Think like the Owner:</h3>
								<h3 class="info-label-text">Sustainability Focus:</h3>
								<h3 class="info-label-text">:</h3>
								<br>
								<h3 class="info-label-text">:</h3>
								<br>
								<h3 class="info-label-text">:</h3>
							<div class="col-md-2 employee-info-button">
								<a href="home.php" class="btn btn-default">Back</a>
							</div>
							<br>
						</div>
						<div class="col-md-3">
							<h3 class="info-detail-text">03/21/17</h3>
							<h3 class="info-detail-text">Annual</h3>
							<h3 class="info-detail-text">:</h3>
							<br>
							<h3 class="info-detail-text">15</h3>
							<h3 class="info-detail-text">12</h3>
							<h3 class="info-detail-text">13</h3>
							<h3 class="info-detail-text">15</h3>
							<h3 class="info-detail-text">15</h3>
							<h3 class="info-detail-text">14</h3>
							<h3 class="info-detail-text">15</h3>
							<h3 class="info-detail-text">:</h3>
							<br>
							<h3 class="info-detail-text">:</h3>
							<br>
							<h3 class="info-detail-text">:</h3>
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