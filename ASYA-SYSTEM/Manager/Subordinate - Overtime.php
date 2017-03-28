<!DOCTYPE html>
<html lang="en">
<?php 
session_start();
require_once('../../mysql_connect.php');
$appNum= $_SESSION['emp_appno'];

//Getting Employees who has pending absent reversal
$queryForEmployees="SELECT 	*
							FROM 	APPLICANTS A JOIN 	EMPLOYEES E ON A.APPNO = E.APPNO
												 JOIN	OVERTIMEREQUESTS OQ ON E.EMPLOYEENUMBER = OQ.EMPLOYEENUMBER
						   WHERE 	OQ.DMAPPROVERID IS NULL";
$result=mysqli_query($dbc,$queryForEmployees);
while($rows=mysqli_fetch_array($result,MYSQLI_ASSOC))
{
	$empNum[]= $rows['EMPLOYEENUMBER'];
	$formNum[] = $rows['FORMNUMBER'];
	$names[] = $rows['FIRSTNAME'].' '.$rows['LASTNAME'];
	$positions[] = $rows['ACTUALPOSITION'];
	$dateFiled[] = $rows['DATE'];
}
//Getting Actual Position from Position code
//get all actual position
$queryForActualPosition="SELECT 	*
							FROM 	emp_positions";
$resultP=mysqli_query($dbc,$queryForActualPosition);
while($rows=mysqli_fetch_array($resultP,MYSQLI_ASSOC))
{
	$actualPos[] = $rows['EPOSITION'];
	$codePos[] = $rows['POSITION'];
}
//create array containing actual position
$positionName[] = array();
for ($x=0;$x<count($positions);$x++)
{
	for ($y=0;$y<count($codePos);$y++)
	{
		if($positions[$x]==$codePos[$y])
		{
			$positionName[$x] = $actualPos[$y];
		}
	}
}
?>
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

    <title>Subordinate Overtime</title>
</head>
<body>

<!-- navbar -->
<div class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="home.html"><img src="asyalogo.jpg" /> </a>
        </div>
        <ul class="nav navbar-nav">
            <li><a href="#welcome">Welcome Page</a></li>
            <li><a href="#attendance">Attendance Summary</a></li>
            <li><a href="#leave">Request Summary</a></li>
            <li><a href="#eval">Evaluation Summary</a></li>
        </ul>
        <!-- right side stuffs -->
        <ul class="nav navbar-nav navbar-right">
            <li id="but" class="dropdown">
           	 <a href="#" class="dropdown-toggle" data-toggle="dropdown">
           	 	<span id="red" class="label label-pill label-danger count" style="border-radius:10px;"></span>
           	 	<span class="glyphicon glyphicon-envelope"></span>
           	 	
           	 	</a>
				 <ul id="canvas" class="dropdown-menu">
				 	<li style="background-color:#ccffcc;"></li>
				 </ul>            
            </li>
            <li><a href="../login.php">Logout</a></li>
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
                </div>
				
				 <!-- subordinate -->
                <a href="#sub-items" class="list-group-item active" data-toggle="collapse" data-parent=".sidebar-nav">
                    <span class="glyphicon glyphicon-list-alt"></span> Subordinates <span class="caret"></span>
                </a>
                <!-- subordinate items -->
                <div class="list-group collapse" id="sub-items">

                    <!-- FORMS -->
					
						<a href="Subordinate - Evaluation.php" class="list-group-item">Evaluation</a>
					
						 <a href="#penreq-items" class="list-group-item active" data-toggle="collapse" data-parent=".sidebar-nav">
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
								<a href="Subordinate - Overtime.php" class="list-group-item  active">Overtime</a>
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
      		
		<!-- picker and dropdown -->
		<!--  <div class="row">
			<div class="col-md-12">
				<form action="" method="post">
					<div class="col-md-4">
						Startdate	:
						<input required name="employmentstart" type="text" class="form-control dpd1"   data-date-format="yyyy-mm-dd">				
					</div>
					
					<div class="col-md-4">
						Enddate		: 
						<input required name="employmentstart" type="text" class="form-control dpd1"   data-date-format="yyyy-mm-dd">					
					</div>
					<div>
					</div>



					<div><input type="submit" name="submit" value="Submit"/></div>
				</form>
			</div>
		</div>-->
		<!-- picker and dropdown end --> 
		
        <!-- Applicants -->
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default" id="applicants-panel">
                    <div class="panel-heading" align="center">
                        <h3 class="panel-title">
						ASYA <br>
						Overtime Request					
						</h3>
                                        </div>
                    <div class="panel-body">
                    <form action="Subordinate - Overtime Detailed.php" method="post">
                        <table class="table table-bordered table-hover table-striped">
                            <thead>
                            <tr>
                                <th>Form Number</th>
                                <th>Date Filed</th>
                                <th>Name</th>
                                <th>Position</th>															
                            </tr>
                            </thead>
                            <tbody>
                            <?php 
                            for($i=0;$i<count($names);$i++)
                            {
                            	echo "<tr>
										<td><button name='link' value='$formNum[$i]' style='background-color:white;border:none;color:blue;'>$formNum[$i]</button></td>
										<td>$dateFiled[$i]</td>
										<td>$names[$i]</td>
										<td>$positionName[$i]</td>
									  <tr>";
                            }
                            ?>                         
                            </tbody>
                        </table>
                    </form>
                    </div>
                    <div class="panel-footer text-right">
						<div class="row" align="center">
						Generated as of: 2017-02-06 20:13:01 </br>
						<b>---END OF REQUEST---</b>
						</div>
                    </div>
                </div>
            </div>
        </div>
       
    </div>

</div>

</body>

</html>