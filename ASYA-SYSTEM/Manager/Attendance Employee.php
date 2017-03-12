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
        <!-- attendance summary section -->
        <a class="anchor" name="attendance"></a>
        <h2 class="page-title">Attendance Summary</h2>
		<h3 class="info-label-text">January</h3>
        <div class="filldiv">

            <div class="row">
                <div class="col-md-12">
				
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                        <tr>
                            <th>Date</th>
                            <th>Morning In</th>
                            <th>Lunch Out</th>
                            <th>Lunch In</th>
                            <th>Break Out</th>
                            <th>Break In</th>
                            <th>Afternoon Out</th>
                            <th>Overtime</th>
                            <th>Undertime</th>
                            <th>Letter</th>
                            <th>Remarks</th>
                            <th>Reason</th>
							
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>01/01/2017</td>
                            <td>9:00AM</td>
                            <td>12:00PM</td>
                            <td>1:00PM</td>
                            <td>4:00PM</td>
							<td>4:30PM</td>
                            <td>7:00PM</td>
                            <td>7:00PM-10:00PM</td>
							<td> </td>
                            <td> </td>
                            <td> </td>
                            <td>BIG Project</td>
                        </tr>
                        <tr>
                            <td>01/02/2017</td>
                            <td>9:00AM</td>
                            <td>12:00PM</td>
                            <td>1:00PM</td>
                            <td>4:00PM</td>
							<td>4:30PM</td>
                            <td>7:00PM</td>
                            <td>7:00PM-10:00PM</td>
							<td> </td>
                            <td> </td>
                            <td> </td>
                            <td>BIG Project</td>
                            
                        </tr>
                        <tr>
                            <td>01/03/2017</td>
                            <td>9:00AM</td>
                            <td>12:00PM</td>
                            <td>1:00PM</td>
                            <td>4:00PM</td>
							<td>4:30PM</td>
                            <td>7:00PM</td>
                            <td> </td>
							<td>9:00AM - 11:00AM</td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            
                        </tr>
                        <tr>
                            <td>01/04/2017</td>
                            <td>9:00AM</td>
                            <td>12:00PM</td>
                            <td>1:00PM</td>
                            <td>4:00PM</td>
							<td>4:30PM</td>
                            <td>7:00PM</td>
                            <td> </td>
							<td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                        </tr>
                        <tr>
                            <td>01/05/2017</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
							<td></td>
                            <td> </td>
                            <td></td>
                            <td> </td>
							<td>Leave</td>
                            <td> </td>
                            <td> </td>
                        </tr>
                        <tr>
                            <td>01/06/2017</td>
                            <td>9:00AM</td>
                            <td>12:00PM</td>
                            <td>1:00PM</td>
                            <td>4:00PM</td>
							<td>4:30PM</td>
                            <td>7:00PM</td>
                            <td> </td>
							<td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                        </tr>
                        <tr>
                            <td>01/07/2017</td>
                            <td>9:00AM</td>
                            <td>12:00PM</td>
                            <td>1:00PM</td>
                            <td>4:00PM</td>
							<td>4:30PM</td>
                            <td>7:00PM</td>
                            <td> </td>
							<td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                        </tr>
                        <tr>
                            <td>01/08/2017</td>
                            <td>9:00AM</td>
                            <td>12:00PM</td>
                            <td>1:00PM</td>
                            <td>4:00PM</td>
							<td>4:30PM</td>
                            <td>7:00PM</td>
                            <td> </td>
                            <td> </td>
							<td> </td>
                            <td> </td>
                            <td> </td>
                        </tr>
                        <tr>
                           <td>01/09/2017</td>
                            <td>9:00AM</td>
                            <td>12:00PM</td>
                            <td>1:00PM</td>
                            <td>4:00PM</td>
							<td>4:30PM</td>
                            <td>7:00PM</td>
                            <td> </td>
							<td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                        </tr>
                        <tr>
                            <td>01/10/2017</td>
                            <td>9:00AM</td>
                            <td>12:00PM</td>
                            <td>1:00PM</td>
                            <td>4:00PM</td>
							<td>4:30PM</td>
                            <td>7:00PM</td>
                            <td> </td>
							<td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                        </tr>
                        <tr>
                            <td>01/11/2017</td>
                            <td>9:00AM</td>
                            <td>12:00PM</td>
                            <td>1:00PM</td>
                            <td>4:00PM</td>
							<td>4:30PM</td>
                            <td>7:00PM</td>
                            <td> </td>
							<td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                        </tr>
                        <tr>
                            <td>01/12/2017</td>
                            <td>9:00AM</td>
                            <td>12:00PM</td>
                            <td>1:00PM</td>
                            <td>4:00PM</td>
							<td>4:30PM</td>
                            <td>7:00PM</td>
                            <td> </td>
							<td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                        </tr>
						 <tr>
                            <td>01/13/2017</td>
                            <td>9:00AM</td>
                            <td>12:00PM</td>
                            <td>1:00PM</td>
                            <td>4:00PM</td>
							<td>4:30PM</td>
                            <td>7:00PM</td>
                            <td> </td>
							<td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            
                        </tr>
                        <tr>
                            <td>01/14/2017</td>
                            <td>9:00AM</td>
                            <td>12:00PM</td>
                            <td>1:00PM</td>
                            <td>4:00PM</td>
							<td>4:30PM</td>
                            <td>7:00PM</td>
                            <td> </td>
							<td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                        </tr>
                        <tr>
                            <td>01/15/2017</td>
                            <td>9:00AM</td>
                            <td>12:00PM</td>
                            <td>1:00PM</td>
                            <td>4:00PM</td>
							<td>4:30PM</td>
                            <td>7:00PM</td>
                            <td> </td>
							<td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                        </tr>
                        <tr>
                            <td>01/16/2017</td>
                            <td>9:00AM</td>
                            <td>12:00PM</td>
                            <td>1:00PM</td>
                            <td>4:00PM</td>
							<td>4:30PM</td>
                            <td>7:00PM</td>
                            <td> </td>
							<td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                        </tr>
                        <tr>
                            <td>01/17/2017</td>
                            <td>9:00AM</td>
                            <td>12:00PM</td>
                            <td>1:00PM</td>
                            <td>4:00PM</td>
							<td>4:30PM</td>
                            <td>7:00PM</td>
                            <td> </td>
							<td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                        </tr>
                        <tr>
                            <td>01/18/2017</td>
                            <td>9:00AM</td>
                            <td>12:00PM</td>
                            <td>1:00PM</td>
                            <td>4:00PM</td>
							<td>4:30PM</td>
                            <td>7:00PM</td>
                            <td> </td>
							<td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                        </tr>
                        <tr>
                           <td>01/19/2017</td>
                            <td>9:00AM</td>
                            <td>12:00PM</td>
                            <td>1:00PM</td>
                            <td>4:00PM</td>
							<td>4:30PM</td>
                            <td>7:00PM</td>
                            <td> </td>
                            <td> </td>
							<td> </td>
                            <td> </td>
                            <td> </td>
                        </tr>
                        <tr>
                            <td>01/20/2017</td>
                            <td>9:00AM</td>
                            <td>12:00PM</td>
                            <td>1:00PM</td>
                            <td>4:00PM</td>
							<td>4:30PM</td>
                            <td>7:00PM</td>
                            <td> </td>
							<td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                        </tr>
						 <tr>
                            <td>01/21/2017</td>
                            <td>9:00AM</td>
                            <td>12:00PM</td>
                            <td>1:00PM</td>
                            <td>4:00PM</td>
							<td>4:30PM</td>
                            <td>7:00PM</td>
                            <td> </td>
							<td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                        </tr>
                        <tr>
                            <td>01/22/2017</td>
                            <td>9:00AM</td>
                            <td>12:00PM</td>
                            <td>1:00PM</td>
                            <td>4:00PM</td>
							<td>4:30PM</td>
                            <td>7:00PM</td>
                            <td> </td>
							<td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                        </tr>
						 <tr>
                            <td>01/23/2017</td>
                            <td>9:00AM</td>
                            <td>12:00PM</td>
                            <td>1:00PM</td>
                            <td>4:00PM</td>
							<td>4:30PM</td>
                            <td>7:00PM</td>
                            <td> </td>
							<td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            
                        </tr>
                        <tr>
                            <td>01/24/2017</td>
                            <td>9:00AM</td>
                            <td>12:00PM</td>
                            <td>1:00PM</td>
                            <td>4:00PM</td>
							<td>4:30PM</td>
                            <td>7:00PM</td>
                            <td> </td>
							<td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                        </tr>
                        <tr>
                            <td>01/25/2017</td>
                            <td>9:00AM</td>
                            <td>12:00PM</td>
                            <td>1:00PM</td>
                            <td>4:00PM</td>
							<td>4:30PM</td>
                            <td>7:00PM</td>
                            <td> </td>
							<td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                        </tr>
                        <tr>
                            <td>01/26/2017</td>
                            <td>9:00AM</td>
                            <td>12:00PM</td>
                            <td>1:00PM</td>
                            <td>4:00PM</td>
							<td>4:30PM</td>
                            <td>7:00PM</td>
                            <td> </td>
							<td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                        </tr>
                        <tr>
                            <td>01/27/2017</td>
                            <td>9:00AM</td>
                            <td>12:00PM</td>
                            <td>1:00PM</td>
                            <td>4:00PM</td>
							<td>4:30PM</td>
                            <td>7:00PM</td>
                            <td> </td>
							<td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                        </tr>
                        <tr>
                            <td>01/28/2017</td>
                            <td>9:00AM</td>
                            <td>12:00PM</td>
                            <td>1:00PM</td>
                            <td>4:00PM</td>
							<td>4:30PM</td>
                            <td>7:00PM</td>
                            <td> </td>
							<td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                        </tr>
                        <tr>
                           <td>01/29/2017</td>
                            <td>9:00AM</td>
                            <td>12:00PM</td>
                            <td>1:00PM</td>
                            <td>4:00PM</td>
							<td>4:30PM</td>
                            <td>7:00PM</td>
                            <td> </td>
							<td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                        </tr>
                        <tr>
                            <td>01/30/2017</td>
                            <td>9:00AM</td>
                            <td>12:00PM</td>
                            <td>1:00PM</td>
                            <td>4:00PM</td>
							<td>4:30PM</td>
                            <td>7:00PM</td>
                            <td> </td>
							<td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                        </tr>
						 <tr>
                            <td>01/31/2017</td>
                            <td>9:00AM</td>
                            <td>12:00PM</td>
                            <td>1:00PM</td>
                            <td>4:00PM</td>
							<td>4:30PM</td>
                            <td>7:00PM</td>
                            <td> </td>
							<td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                        </tr>
                        </tbody>
                    </table>
					<div class="col-md-2 employee-info-button">
						<a href="home.php" class="btn btn-default">Back</a>
					</div>
											
					 <div class="text-right" style="margin-right: 30px">
                    <a href="#"><span class="glyphicon glyphicon-print"> Print</span></a>
                </div>
                </div>
            </div>
        </div>
    </div>
	

</div>

</body>

</html>