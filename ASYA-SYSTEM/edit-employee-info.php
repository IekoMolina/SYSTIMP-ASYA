<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

    <!--for graphs/charts-->
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>

    <!--custom css-->
    <link rel="stylesheet" href="css/custom.css">
    <link rel="stylesheet" href="css/custom-theme.css">

    <title>Edit Employee Information</title>
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
                <a href="home.php" class="list-group-item active"><span class="glyphicon glyphicon-home"></span> Home</a>

                <!-- recruitment -->
                <a href="recruitment.php" class="list-group-item"><span class="glyphicon glyphicon-eye-open"></span> Recruitment</a>

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
                        <a href="ItineraryAuthorizationReport.php" class="list-group-item">&#x25cf Itenerary Authorization</a>					
                </div>
				
                <a href="#" class="list-group-item"><span class="glyphicon glyphicon-info-sign"></span> About</a>
            </div>
        </div>

    </div>


    <!-- insert page content here -->
    <div id="page-content-wrapper">

        <div class="row filldiv">
            <h2 class="page-title">Edit Employee Information</h2>

            <form class="form-inline" role="form">
                <div class="col-md-2 text-right">
                    <h4 class="info-label-text">Last Name:</h4>
                    <h4 class="info-label-text">First Name:</h4>
                    <h4 class="info-label-text">Middle Name:</h4>
                    <h4 class="info-label-text">Department:</h4>
                    <h4 class="info-label-text">Position:</h4>
                    <h4 class="info-label-text">Date Started:</h4>
                    <h4 class="info-label-text">Date of Contract Received:</h4>
                    <h4 class="info-label-text">End of Contract:</h4>
                    <h4 class="info-label-text two-row-label-h4">Birthday:</h4>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <input type="email" class="form-control input-sm" id="lastName" value="Secades">
                    </div>
                    <br/>
                    <div class="form-group">
                        <input type="email" class="form-control input-sm" id="firstName" value="Luis">
                    </div>
                    <br/>
                    <div class="form-group">
                        <input type="email" class="form-control input-sm" id="midName" value="Flores">
                    </div>
                    <br/>
                    <div class="form-group">
                        <input type="email" class="form-control input-sm" id="dept" value="IT">
                    </div>
                    <br/>
                    <div class="form-group">
                        <input type="email" class="form-control input-sm" id="position" value="Manager">
                    </div>
                    <br/>
                    <div class="form-group">
                        <input type="email" class="form-control input-sm" id="startDate" value="March 26, 2012">
                    </div>
                    <br/>
                    <div class="form-group two-row-label-h4">
                        <input type="email" class="form-control input-sm" id="contractReceived" value="April 22, 2012">
                    </div>
                    <br/>
                    <div class="form-group">
                        <input type="email" class="form-control input-sm" id="endContract" value="March 26, 2018">
                    </div>
                    <br/>
                    <h4 class="info-detail-text two-row-label-h4">November 12, 1985</h4>
                    <br/>
                </div>
                <div class="col-md-2 text-right">
                    <h4 class="info-label-text">Employee No.:</h4>
                    <h4 class="info-label-text">Biometric No.:</h4>
                    <br/><br/><br/><br/><br/>
                    <h4 class="info-label-text">Employement Status:</h4>
                </div>
                <div class="col-md-2">
                    <h4 class="info-detail-text">11020226</h4>
                    <h4 class="info-detail-text">1234</h4>
                    <br/><br/><br/><br/><br/><br/>
                    <div class="form-group">
                        <select class="form-control input-sm" id="employment">
                            <option>Employed</option>
                            <option>Retired</option>
                            <option>Resigned</option>
                            <option>Terminated</option>
                        </select>
                    </div>

                </div>
            </form>

            <div class="col-md-3">
                <img class="center-block" src="user.jpg" id="user-image">
            </div>
            <div class="col-md-7 edit-employee-info-button">
                <a href="employee-information.php" class="btn btn-primary">Save</a>
                <a href="employee-information.php" class="btn btn-primary">Cancel</a>
            </div>

        </div>

    </div>

</div>

</body>

</html>