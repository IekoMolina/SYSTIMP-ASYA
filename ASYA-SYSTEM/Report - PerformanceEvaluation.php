<!DOCTYPE html>
<html lang="en">
<?php
session_start();
require_once('../mysql_connect.php');
// Predetermined value depends on login
$evaluation = 0;// 0 kasi ang tech evaluation
$currentEmpNum = $_SESSION['emp_number'];
$currentDate = date('Y-m-d');
$status =1;
$appNum= $_POST['empPElink'];
// Get All applicant name and put in array
$query="SELECT 		* 
		  FROM 		applicants a JOIN employees e ON a.APPNO = e.APPNO
		  						 JOIN emp_evaluation ee ON e.EMPLOYEENUMBER = ee.EMPLOYEENUMBER
		 WHERE 		a.APPNO = '{$appNum}'";
$result=mysqli_query($dbc,$query);
$rows=mysqli_fetch_array($result,MYSQLI_ASSOC);
$name = $rows['FIRSTNAME'].' '.$rows['LASTNAME'];
$dateHired = $rows['APPROVEDDATE']; 
$dmEmpNo = $rows['DMEMPNO'];
$dmRemarks= $rows['DMREMARKS'];
$dmScore = ($rows['DMSCORE']/225)*70;
$hrEmpNo = $rows['HREMPNO'];
$hrRemarks = $rows['HRREMARKS'];
$hrScore = ($rows['HRSCORE']/285)*30;
$totalScore = $dmScore + $hrScore;
$value="";
if ($totalScore>=88)
{
	$value="Excellent";
}
else if($totalScore<=87.99 && $totalScore>=75)
{
	$value="Above Average";
}
else if($totalScore<=74.99 && $totalScore>=60)
{
	$value="Average";
}
else if($totalScore<=59.99 && $totalScore>=30)
{
	$value="Below Average";
}
else
{
	$value="Poor";
}
$queryForActualName="SELECT 	*
							FROM 	employees e JOIN applicants a ON e.APPNO = a.APPNO";
$resultN=mysqli_query($dbc,$queryForActualName);
while($rows=mysqli_fetch_array($resultN,MYSQLI_ASSOC))
{
	$actualNames[] = $rows['FIRSTNAME'].' '.$rows['LASTNAME'];
	$codeName[] = $rows['EMPLOYEENUMBER'];
}
$actualDMName = "";
for ($y=0;$y<count($codeName);$y++)
{
	if($dmEmpNo==$codeName[$y])
	{
		$actualDMName = $actualNames[$y];
	}
}


$actualHRName = "";
for ($y=0;$y<count($codeName);$y++)
{
	if($hrEmpNo==$codeName[$y])
	{
		$actualHRName = $actualNames[$y];
	}
}

$flag=0;
if (isset($_POST['submit'])){

$message=NULL;
	
 if (empty($_POST['optionsRadios'])){
 	$optionRadios=0;
 	$message="All field must be answered";
 }else
  $optionRadios=$_POST['optionsRadios'];

 if (empty($_POST['optionsRadios2'])){
  $optionRadios2=0;
  $message="All field must be answered";
 }else
  $optionRadios2=$_POST['optionsRadios2'];
 
 
  if (empty($_POST['remarks'])){
  	$remarks="";
  	$message="All field must be answered";
  }else
  	$remarks=$_POST['remarks'];


if(!isset($message)){
}
 

}/*End of main Submit conditional*/

if (isset($message)){
 echo '<font color="red">'.$message. '</font>';
}


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
		
    <title>Performance Evaluation</title>
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
                <a href="home.php" class="list-group-item"><span class="glyphicon glyphicon-home"></span> Home</a>

                <!-- recruitment -->
                <a href="recruitment.php" class="list-group-item"><span class="glyphicon glyphicon-eye-open"></span> Recruitment</a>

                <!-- employee -->
                <a href="employees.php" class="list-group-item active"><span class="glyphicon glyphicon-pawn"></span> Employees</a>
				
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
					  <section class="panel">
                          <div class="panel-body">
                          <form class="form-horizontal tasi-form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
	                        <h4 align="center">
							ASYA <br>
							Performance Evaluation Report<br>
							<?php echo $currentDate?>					
							</h4>
							<!--  Employee Infor table -->
							<div class="form-group clearfix">
								<label class="col-sm-3 control-label">Employee Name:</label>
									<div class="col-sm-3">
									<?php echo $name?>
									</div>
									
								 <label class="col-sm-3 control-label">Date Hired:</label>
									<div class="col-sm-3">
									<?php echo $dateHired?>
									</div>									
							</div>
							<div class="form-group clearfix">
								<label class="col-sm-3 control-label">Department Evaluator:</label>
									<div class="col-sm-3">
									<?php echo $actualDMName?>
									</div>
									
								 <label class="col-sm-3 control-label">HR Evaluator:</label>
									<div class="col-sm-3">
									<?php echo $actualHRName?>
									</div>									
							</div>							
							<br>
                            <table border="1" class="table table-bordered table-hover table-striped">  
                            <thead>
                            	<tr>
                            		<th>Rater</th>
                            		<th>Weight</th>
                            		<th>Weighted Score</th>
                            	</tr>
                            </thead> 
	                            <tbody>                       
		                        <tr>
	                                <td><b>Immediate Superior</b></td>
	                                <td>70%</td>
	                                <td><?php  echo(round($dmScore,3)) ?></td>                              
	                            </tr><br>
		                        <tr>
	                                <td><b>HR Manager</b></td>
	                                <td>30%</td>
	                                <td><?php echo(round($hrScore,3))?></td>                               
	                            </tr>
		                        <tr>
	                                <td></td>
	                                <td><b>Total Weighted Score:</b></td>
	                                <td><?php echo (round($dmScore+$hrScore,3))?></td>                               
	                            </tr>
		                        <tr>
	                                <td></td>
	                                <td><b>Descriptive Value:</b></td>
	                                <td><?php echo $value?></td>                               
	                            </tr>	                            	                            	                            	                            	                            	                            	                            
								</tbody>
							</table>
							<br>
							<h5 align="left"><b>Observation and Comments</b></h5>
							<div class="form-group clearfix">
								<label class="col-sm-3 control-label">Immediate Superior:</label>
									<div class="col-sm-3">
									<?php echo $dmRemarks?>
									</div>								
							</div>
							<div class="form-group clearfix">
								<label class="col-sm-3 control-label">HR Manager:</label>
									<div class="col-sm-3">
									<?php echo $hrRemarks?>
									</div>								
							</div>														
							<br><br>
							<div class="row" align="center">
								A Place Bldg, Coral Way Drive, CBP1, Island A, MOA Complex, Pasay City <br>
								Tel No.:8085888|asya@asyadesign.com.ph|www.asyadesign.com.ph <br>
								<b>---END OF REPORT---</b>
							</div><br>
							<div class="row" style="margin-top:70px;margin-left:7px;">											
								<button name="submit" type="submit" class="btn btn-success">Print</button>
								<a class="btn btn-default"  href="employees.php"> Previous </a> 
							</div>																															
							  </form>
						  </div>
				  </section>				  				 
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