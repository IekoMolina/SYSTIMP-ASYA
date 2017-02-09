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
            <a class="navbar-brand" href="home.php"><img src="asyalogo.jpg" /> </a>
        </div>
        <ul class="nav navbar-nav">
            <li><a href="#employeeInfo">Employee Information</a></li>
            <li><a href="#req">Requests</a></li>
            <li><a href="#attendance">Attendance Summary</a></li>
            <li><a href="#leave">Leave History</a></li>
            <li><a href="#conduct">Conduct</a></li>
            <li><a href="#eval">Evaluation</a></li>
        </ul>
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

        <!-- employee information section -->
        <a class="anchor" name="employeeInfo"></a>
        <div class="row filldiv">
            <h2 class="page-title">Employee Information</h2>

            <div class="col-md-2 text-right">
                <h4 class="info-label-text">Last Name:</h4>
                <h4 class="info-label-text">First Name:</h4>
                <h4 class="info-label-text">Middle Name:</h4>
                <h4 class="info-label-text">Department:</h4>
                <h4 class="info-label-text">Position:</h4>
                <h4 class="info-label-text">Date Started:</h4>
                <h4 class="info-label-text">Date of Contract Received:</h4>
                <h4 class="info-label-text">End of Contract:</h4>
                <h4 class="info-label-text">Birthday:</h4>
            </div>
            <div class="col-md-3">
                <h4 class="info-detail-text">Secades</h4>
                <h4 class="info-detail-text">Luis</h4>
                <h4 class="info-detail-text">Flores</h4>
                <h4 class="info-detail-text">IT</h4>
                <h4 class="info-detail-text">Manager</h4>
                <h4 class="info-detail-text">March 26, 2012</h4>
                <h4 class="info-detail-text two-row-label-h4">April 22, 2012</h4>
                <h4 class="info-detail-text">March 26, 2018</h4>
                <h4 class="info-detail-text">November 12, 1985</h4>
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
                <br/><br/><br/><br/><br/>
                <h4 class="info-detail-text two-row-label-h4">Employed</h4>
            </div>
            <div class="col-md-3">
                <img class="center-block" src="user.jpg" id="user-image">
            </div>
            <div class="col-md-4 employee-info-button">
                <a href="edit-employee-info.php" class="btn btn-default">Edit Information</a>
            </div>
        </div>

        <!-- request section -->
        <a class="anchor" name="req"></a>
        <div class="row filldiv">
            <h2 class="page-title">Requests</h2>

            <!-- leave request form -->
            <div class="col-md-6">
                <div class="panel panel-default request-form">
                    <div class="panel-heading">
                        <h3 class="panel-title">Leave
                            <span class="panel-subheader pull-right"><a href="#leave">Leave Summary</a></span>
                        </h3>
                    </div>
                    <div class="panel-body">
                        <div class="col-md-2 text-right">
                            <h5 class="info-label-text">Name:</h5>
                            <h5 class="info-label-text">Leave Type:</h5>
                            <h5 class="info-label-text">From:</h5>
                            <h5 class="info-label-text">To:</h5>
                            <h5 class="info-label-text">Reason:</h5>
                        </div>
                        <div class="col-md-4">
                            <h5 class="info-detail-text">Luis Secades</h5>
                            <h5 class="info-detail-text two-row-label-h5">Sick Leave</h5>
                            <h5 class="info-detail-text">03/14/2016</h5>
                            <h5 class="info-detail-text">03/16/2016</h5>
                            <h5 class="info-detail-text">Confined in the hospital because of Dengue</h5>
                        </div>
                        <div class="col-md-3 text-right">
                            <h5 class="info-label-text">Department:</h5>
                            <h5 class="info-label-text">Position:</h5>
                            <br/>
                            <h5 class="info-label-text">Leaves Left:</h5>
                        </div>
                        <div class="col-md-2">
                            <h5 class="info-detail-text">IT</h5>
                            <h5 class="info-detail-text">Manager</h5>
                            <br/>
                            <h5 class="info-detail-text">4</h5>
                        </div>
                        <div class="col-md-12">
                            <br/><hr/>
                            <h5 class="info-label-text text-left">Approved Leaves: 3</h5>
                        </div>
                    </div>
                    <div class="panel-footer text-center">
                        <a href="#" class="btn btn-primary">Approve</a>
                        <a href="#" class="btn btn-primary">Disapprove</a>
                    </div>
                </div>
            </div>

            <!-- overtime request form-->
            <div class="col-md-6">
                <div class="panel panel-default request-form">
                    <div class="panel-heading">
                        <h3 class="panel-title">Overtime</h3>
                    </div>
                    <div class="panel-body">
                        <div class="col-md-2 text-right">
                            <h5 class="info-label-text">Name:</h5>
                            <h5 class="info-label-text">Date:</h5>
                            <h5 class="info-label-text">Start:</h5>
                            <h5 class="info-label-text">End:</h5>
                            <h5 class="info-label-text">Purpose:</h5>
                        </div>
                        <div class="col-md-4">
                            <h5 class="info-detail-text">Luis Secades</h5>
                            <h5 class="info-detail-text">03/30/2016</h5>
                            <h5 class="info-detail-text">19:00</h5>
                            <h5 class="info-detail-text">22:00</h5>
                            <h5 class="info-detail-text">Meet project deadline</h5>
                        </div>
                        <div class="col-md-3 text-right">
                            <h5 class="info-label-text">Department:</h5>
                            <h5 class="info-label-text">Position:</h5>
                            <br/>
                            <h5 class="info-label-text">Total Hours:</h5>
                        </div>
                        <div class="col-md-2">
                            <h5 class="info-detail-text">IT</h5>
                            <h5 class="info-detail-text">Manager</h5>
                            <br/>
                            <h5 class="info-detail-text">3</h5>
                        </div>
                    </div>
                    <div class="panel-footer text-center">
                        <a href="#" class="btn btn-primary">Approve</a>
                        <a href="#" class="btn btn-primary">Disapprove</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- attendance summary section -->
        <a class="anchor" name="attendance"></a>
        <h2 class="page-title">Attendance summary</h2>
        <div class="filldiv">
            <div class="row">
                <div class="col-md-2 text-right">
                    <h4 class="info-label-text">Employee Name:</h4>
                    <h4 class="info-label-text">Department:</h4>
                </div>
                <div class="col-md-2">
                    <h4 class="info-detail-text">Secades, Luis F.</h4>
                    <h4 class="info-detail-text">IT</h4>
                </div>
                <div class="col-md-2 text-right">
                    <h4 class="info-label-text two-row-label-h4">Position:</h4>
                </div>
                <div class="col-md-2">
                    <h4 class="info-detail-text two-row-label-h4">Manager</h4>
                </div>
                <div class="col-md-2 text-right">
                    <h4 class="info-label-text two-row-label-h4">Date Hired:</h4>
                </div>
                <div class="col-md-2">
                    <h4 class="info-detail-text two-row-label-h4">March 26,2012</h4>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                        <tr>
                            <th>Month</th>
                            <th>Total Leaves Used</th>
                            <th>Total Unpaid Leaves</th>
                            <th>Total No. of Undertime</th>
                            <th>Total No. of Halfday</th>
                            <th>Total No. of Holiday</th>
                            <th>Total No. of Suspension</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>January</td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                        </tr>
                        <tr>
                            <td>February</td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                        </tr>
                        <tr>
                            <td>March</td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                        </tr>
                        <tr>
                            <td>April</td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                        </tr>
                        <tr>
                            <td>May</td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                        </tr>
                        <tr>
                            <td>June</td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                        </tr>
                        <tr>
                            <td>July</td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                        </tr>
                        <tr>
                            <td>August</td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                        </tr>
                        <tr>
                            <td>September</td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                        </tr>
                        <tr>
                            <td>October</td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                        </tr>
                        <tr>
                            <td>November</td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                        </tr>
                        <tr>
                            <td>December</td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                        </tr>
                        </tbody>
                    </table>
                </div>

                <div class="text-right" style="margin-right: 30px">
                    <a href="#"><span class="glyphicon glyphicon-print"> Print</span></a>
                </div>
            </div>
        </div>

        <!-- leave summary section -->
        <a class="anchor" name="leave"></a>
        <h2 class="page-title">Leave summary</h2>
        <div class="filldiv">
            <div class="row">
                <div class="col-md-2 text-right">
                    <h4 class="info-label-text">Employee Name:</h4>
                    <h4 class="info-label-text">Department:</h4>
                </div>
                <div class="col-md-2">
                    <h4 class="info-detail-text">Secades, Luis F.</h4>
                    <h4 class="info-detail-text">IT</h4>
                </div>
                <div class="col-md-2 text-right">
                    <h4 class="info-label-text two-row-label-h4">Position:</h4>
                </div>
                <div class="col-md-2">
                    <h4 class="info-detail-text two-row-label-h4">Manager</h4>
                </div>
                <div class="col-md-2 text-right">
                    <h4 class="info-label-text two-row-label-h4">Date Hired:</h4>
                </div>
                <div class="col-md-2">
                    <h4 class="info-detail-text two-row-label-h4">March 26, 2012</h4>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                        <tr>
                            <th>Form</th>
                            <th>Type</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>QMS-HRD-F-020</td>
                            <td>Vacation</td>
                            <td>02/15/2016</td>
                            <td>02/17/2016</td>
                        </tr>
                        <tr>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                        </tr>
                        <tr>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                        </tr>
                        <tr>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>

        <!-- conduct section -->
        <a class="anchor" name="conduct"></a>
        <div class="row filldiv">
            <h2 class="page-title">Conduct</h2>

            <table class="table table-bordered table-hover table-striped">
                <thead>
                <tr>
                    <th>Violation</th>
                    <th>Compliant</th>
                    <th>Department</th>
                    <th>Position</th>
                    <th>Date </th>
                    <th>Reason</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                </tr>
                <tr>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                </tr>
                <tr>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                </tr>
                <tr>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                </tr>
                <tr>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                </tr>
                </tbody>
            </table>
        </div>


        <!-- performance evaluation section -->
        <a class="anchor" name="eval"></a>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default" id="evaluation-form">
                    <div class="panel-heading">
                        <h3 class="panel-title text-center">Employee Evaluation <br/>
                            <span class="panel-subheader">Annual</span></h3>
                    </div>

                    <div class="panel-body">
                        <div id="evaluatioan-intro">
                            <h4><strong>Performance Rating</strong></h4>
                            <p class="text-justify">
                                The following ratings must be used to ensure commonality of language and consistency on overall ratings: (There should be supporting comments to justify ratings of â€œOutstandingâ€�, â€œBelow Expectations, and â€œUnsatisfactoryâ€�)
                            </p>

                            <p class="indent">(5) Outstanding Performance is consistently superior</p>
                            <p class="indent">(4) Exceeds Expectations Performance is routinely above job requirements</p>
                            <p class="indent">(3) Meets Expectations Performance is regularly competent and dependable</p>
                            <p class="indent">(2) Below Expectations Performance fails to meet job requirements on a frequent basis</p>
                            <p class="indent">(1) Unsatisfactory Performance is consistently unacceptable</p>
                        </div>

                        <div id="evaluation-content">
                            <h4><strong>How Satisfied are you with:</strong></h4>
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th class="col-md-10">Criteria</th>
                                    <th class="col-md-3">1
                                        <span class="eval-rate-space">2</span>
                                        <span class="eval-rate-space">3</span>
                                        <span class="eval-rate-space">4</span>
                                        <span class="eval-rate-space">5</span>
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>Key Point #1</td>
                                    <td>
                                        <form role="form" class="eval-radio-btn">
                                            <label class="radio-inline">
                                                <input type="radio" name="key-point-1">
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="key-point-1">
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="key-point-1">
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="key-point-1">
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="key-point-1">
                                            </label>
                                        </form>
                                    </td>
                                </tr><tr>
                                    <td>Key Point #2</td>
                                    <td>
                                        <form role="form" class="eval-radio-btn">
                                            <label class="radio-inline">
                                                <input type="radio" name="key-point-2">
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="key-point-2">
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="key-point-2">
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="key-point-2">
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="key-point-2">
                                            </label>
                                        </form>
                                    </td>
                                </tr><tr>
                                    <td>Key Point #3</td>
                                    <td>
                                        <form role="form" class="eval-radio-btn">
                                            <label class="radio-inline">
                                                <input type="radio" name="key-point-3">
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="key-point-3">
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="key-point-3">
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="key-point-3">
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="key-point-3">
                                            </label>
                                        </form>
                                    </td>
                                </tr><tr>
                                    <td>Key Point #4</td>
                                    <td>
                                        <form role="form" class="eval-radio-btn">
                                            <label class="radio-inline">
                                                <input type="radio" name="key-point-4">
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="key-point-4">
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="key-point-4">
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="key-point-4">
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="key-point-4">
                                            </label>
                                        </form>
                                    </td>
                                </tr><tr>
                                    <td>Key Point #5</td>
                                    <td>
                                        <form role="form" class="eval-radio-btn">
                                            <label class="radio-inline">
                                                <input type="radio" name="key-point-5">
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="key-point-5">
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="key-point-5">
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="key-point-5">
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="key-point-5">
                                            </label>
                                        </form>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="form-group" id="evaluation-comment">
                            <h4><strong>Comments:</strong></h4>
                            <textarea class="form-control" rows="5" id="comment"></textarea>
                        </div>
                    </div>

                    <div class="panel-footer text-center">
                        <a href="#" class="btn btn-primary">Submit</a>
                    </div>
                </div>
            </div>
        </div>

    </div>


</div>

</body>

</html>