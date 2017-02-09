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
            <a class="navbar-brand" href="Home - Employee.php"><img src="asyalogo.jpg" /> </a>
        </div>
        <ul class="nav navbar-nav">
            <li><a href="#employeeInfo">Employee Information</a></li>
            <li><a href="#attendance">Attendance Summary</a></li>
            <li><a href="#leave">Request Summary</a></li>
            <li><a href="#eval">Evaluation Summary</a></li>
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
			
                <!-- reports -->
                <a href="#report-items" class="list-group-item" data-toggle="collapse" data-parent=".sidebar-nav">
                    <span class="glyphicon glyphicon-list-alt"></span> Request <span class="caret"></span>
                </a>
                <!-- report items -->
                <div class="list-group collapse" id="report-items">

                    <!-- FORMS -->
                    <a href="#attendance-reports" class="list-group-item" data-toggle="collapse">
                        <a href="Form - Absent Reversal.php" class="list-group-item">Absent Reversal</a>
						<a href="Form - Itenerary Authorization.php" class="list-group-item">Itenerary Authorization</a>
						<a href="Form - Leave.php" class="list-group-item">Leave</a>
                        <a href="Form - Overtime.php" class="list-group-item">Overtime</a>
                    </a>
                   
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
                <br/><br/><br/><br/><br/><br/>
                <h4 class="info-label-text">Status:</h4>
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
                <a href="edit-employee-info.html" class="btn btn-default">Edit Information</a>
            </div>
        </div>

       

        <!-- attendance summary section -->
        <a class="anchor" name="attendance"></a>
        <h2 class="page-title">Attendance Summary</h2>
        <div class="filldiv">
           

            <div class="row">
                <div class="col-md-12">
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                        <tr>
                            <th>Month</th>
                            <th>Total No. of Leaves Used</th>
                            <th>Total No. of Absent</th>
                            <th>Total No. of Undertime</th>
                            <th>Total No. of Absent Reversal</th>
                            <th>Total No. of Overtime</th>
                            <th>Total No. of Suspension</th>
							
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>January</td>
                            <td>1</td>
                            <td>2</td>
                            <td>8</td>
                            <td>3</td>
                            <td>0</td>
                            <td>5</td>
                        </tr>
                        <tr>
                            <td>February</td>
                            <td>1</td>
                            <td>6</td>
                            <td>7</td>
                            <td>3</td>
                            <td>8</td>
                            <td>0</td>
                        </tr>
                        <tr>
                            <td>March</td>
                            <td>2</td>
                            <td>5</td>
                            <td>8</td>
                            <td>6</td>
                            <td>3</td>
                            <td>8</td>
                        </tr>
                        <tr>
                            <td>April</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>1</td>
                            <td>3</td>
                        </tr>
                        <tr>
                            <td>May</td>
                            <td>2</td>
                            <td>5</td>
                            <td>0</td>
                            <td>2</td>
                            <td>4</td>
                            <td>2</td>
                        </tr>
                        <tr>
                            <td>June</td>
                            <td>0</td>
                            <td>2</td>
                            <td>0</td>
                            <td>1</td>
                            <td>0</td>
                            <td>1</td>
                        </tr>
                        <tr>
                            <td>July</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>1</td>
                        </tr>
                        <tr>
                            <td>August</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                        </tr>
                        <tr>
                            <td>September</td>
                            <td>1</td>
                            <td>2</td>
                            <td>0</td>
                            <td>0</td>
                            <td>1</td>
                            <td>1</td>
                        </tr>
                        <tr>
                            <td>October</td>
                            <td>1</td>
                            <td>2</td>
                            <td>5</td>
                            <td>3</td>
                            <td>0</td>
                            <td>0</td>
                        </tr>
                        <tr>
                            <td>November</td>
                            <td>0</td>
                            <td>1</td>
                            <td>1</td>
                            <td>4</td>
                            <td>5</td>
                            <td>8</td>
                        </tr>
                        <tr>
                            <td>December</td>
                            <td>2</td>
                            <td>4</td>
                            <td>2</td>
                            <td>3</td>
                            <td>0</td>
                            <td>8</td>
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
        <h2 class="page-title">Request Summary</h2>
        <div class="filldiv">
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                        <tr>
                            <th>Form Code</th>
                            <th>Date Filed</th>
							<td>Purpose</td>
							<td>Status</td>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>OT-000201</td>
                            <td>02/17/2016</td>
							<td>Needed more time for the project</td>
							<td>Waiting for Approval</td>
                        </tr>
                        <tr>
                            <td>AR-000158</td>
                            <td>03/14/2016</td>
							<td>Business meeting outside the company</td>
							<td>Accepted</td>
                        </tr>
                        <tr>
                            <td>AR-000145</td>
                            <td>03/13/2016</td>
							<td>Time is not enough to finish the project</td>
							<td>Rejected</td>
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
				<div class="text-right" style="margin-right: 30px">
                    <a href="#"><span class="glyphicon glyphicon-print"> Print</span></a>
                </div>
            </div>

        </div>

        <!-- conduct section -->
        <a class="anchor" name="eval"></a>
        <div class="row filldiv">
            <h2 class="page-title">Evaluation Summary</h2>

            <table class="table table-bordered table-hover table-striped">
                <thead>
                <tr>
					<th>Code</th>
                    <th>Type</th>
                    <th>Date</th>
                    <th>Evaluator</th>
					<th>Comments</th>
                </tr>
                </thead>
                <tbody>
                <tr>
					<td>EVAL-000142</td>
                    <td>3 Months</td>
                    <td>06/26/2012</td>
                    <td>Ieko Molina</td>
					<td>Showing promise</td>
                </tr>
                <tr>
					<td>EVAL-000634</td>
                    <td>6 Months</td>
                    <td>09/26/2012</td>
                    <td>Ieko Molina</td>
					<td>Average</td>
                </tr>
                <tr>
					<td>EVAL-000957</td>
                    <td>Annual</td>
                    <td>03/26/2013</td>
                    <td>Ana Laid</td>
					<td>Outstanding performance</td>
                </tr>
                <tr>
					<td>EVAL-001632</td>
                    <td>Annual</td>
                    <td>03/26/2014</td>
                    <td>Ana Laid</td>
					<td>Having trouble focusing on work</td>
                </tr>
                <tr>
					<td>EVAL-001953</td>
                    <td>Annual</td>
                    <td>03/26/2015</td>
					<td>Ana Laid</td>
                    <td>May be candidate for promotion</td>
                </tr>
                </tbody>
            </table>
			<div class="text-right" style="margin-right: 30px">
                    <a href="#"><span class="glyphicon glyphicon-print"> Print</span></a>
                </div>
        </div>

		
        
	
    </div>
	

</div>

</body>

</html>