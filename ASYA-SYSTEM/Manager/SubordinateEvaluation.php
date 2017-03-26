<!DOCTYPE html>
<html lang="en">
<?php
session_start();
require_once('../../mysql_connect.php');
if(isset($_POST['emplink'])){
	$appNum = $_POST['emplink'];
}
if(isset($_POST['submit'])){
	$appNum = $_POST['submit'];
}
// Predetermined value depends on login
$evaluation = 0;// 0 kasi ang tech evaluation
$currentEmpNum = $_SESSION['emp_number'];
$currentDate = date('Y-m-d');
$status =1;
// Get All applicant name and put in array
$queryForName="SELECT 	* 
				 FROM 	applicants a JOIN employees e ON a.APPNO = e.APPNO
				WHERE 	a.APPNO = '{$appNum}'";
$resultNames=mysqli_query($dbc,$queryForName);
$rows=mysqli_fetch_array($resultNames,MYSQLI_ASSOC);
$name = $rows['FIRSTNAME'].' '.$rows['LASTNAME'];
$empNum =  $rows['EMPLOYEENUMBER'];
$flag=0;
if (isset($_POST['submit'])){

$message=NULL;
// For 1 item	
 if (empty($_POST['1A']) && empty($_POST['1B'])&& empty($_POST['1C'])&& empty($_POST['1D'])&& empty($_POST['1E']))
 {
 	$question1=0;
 }
 else if(isset($_POST['1A'])&& empty($_POST['1B'])&& empty($_POST['1C'])&& empty($_POST['1D'])&& empty($_POST['1E']))
 {
  $question1=$_POST['1A'] + 12;
 }
 else if(isset($_POST['1B'])&& empty($_POST['1A'])&& empty($_POST['1C'])&& empty($_POST['1D'])&& empty($_POST['1E']))
 {
 	$question1=$_POST['1B'] + 9;
 }
 else if(isset($_POST['1C'])&& empty($_POST['1A'])&& empty($_POST['1B'])&& empty($_POST['1D'])&& empty($_POST['1E']))
 {
 	$question1=$_POST['1C'] + 6;
 }
 else if(isset($_POST['1D'])&& empty($_POST['1A'])&& empty($_POST['1B'])&& empty($_POST['1C'])&& empty($_POST['1E']))
 {
 	$question1=$_POST['1D'] + 3;
 }
 else if(isset($_POST['1E'])&& empty($_POST['1A'])&& empty($_POST['1B'])&& empty($_POST['1C'])&& empty($_POST['1D']))
 {
 	$question1=$_POST['1E'];
 }
 else
 {
 	$message="Please Follow the rules of rating";
 }
 
 // For 2 item
 if (empty($_POST['2A']) && empty($_POST['2B'])&& empty($_POST['2C'])&& empty($_POST['2D'])&& empty($_POST['2E']))
 {
 	$question2=0;
 }
 else if(isset($_POST['2A'])&& empty($_POST['2B'])&& empty($_POST['2C'])&& empty($_POST['2D'])&& empty($_POST['2E']))
 {
 	$question2=$_POST['2A'] + 12;
 }
 else if(isset($_POST['2B'])&& empty($_POST['2A'])&& empty($_POST['2C'])&& empty($_POST['2D'])&& empty($_POST['2E']))
 {
 	$question2=$_POST['2B'] + 9;
 }
 else if(isset($_POST['2C'])&& empty($_POST['2A'])&& empty($_POST['2B'])&& empty($_POST['2D'])&& empty($_POST['2E']))
 {
 	$question2=$_POST['2C'] + 6;
 }
 else if(isset($_POST['2D'])&& empty($_POST['2A'])&& empty($_POST['2B'])&& empty($_POST['2C'])&& empty($_POST['2E']))
 {
 	$question2=$_POST['2D'] + 3;
 }
 else if(isset($_POST['2E'])&& empty($_POST['2A'])&& empty($_POST['2B'])&& empty($_POST['2C'])&& empty($_POST['2D']))
 {
 	$question2=$_POST['2E'];
 }
 else
 {
 	$message="Please Follow the rules of rating";
 }
 
 // For 3 item
 if (empty($_POST['3A']) && empty($_POST['3B'])&& empty($_POST['3C'])&& empty($_POST['3D'])&& empty($_POST['3E']))
 {
 	$question3=0;
 }
 else if(isset($_POST['3A'])&& empty($_POST['3B'])&& empty($_POST['3C'])&& empty($_POST['3D'])&& empty($_POST['3E']))
 {
 	$question3=$_POST['3A'] + 12;
 }
 else if(isset($_POST['3B'])&& empty($_POST['3A'])&& empty($_POST['3C'])&& empty($_POST['3D'])&& empty($_POST['3E']))
 {
 	$question3=$_POST['3B'] + 9;
 }
 else if(isset($_POST['3C'])&& empty($_POST['3A'])&& empty($_POST['3B'])&& empty($_POST['3D'])&& empty($_POST['3E']))
 {
 	$question3=$_POST['3C'] + 6;
 }
 else if(isset($_POST['3D'])&& empty($_POST['3A'])&& empty($_POST['3B'])&& empty($_POST['3C'])&& empty($_POST['3E']))
 {
 	$question3=$_POST['3D'] + 3;
 }
 else if(isset($_POST['3E'])&& empty($_POST['3A'])&& empty($_POST['3B'])&& empty($_POST['3C'])&& empty($_POST['3D']))
 {
 	$question3=$_POST['3E'];
 }
 else
 {
 	$message="Please Follow the rules of rating";
 }
 
 // For 4 item
 if (empty($_POST['4A']) && empty($_POST['4B'])&& empty($_POST['4C'])&& empty($_POST['4D'])&& empty($_POST['4E']))
 {
 	$question4=0;
 }
 else if(isset($_POST['4A'])&& empty($_POST['4B'])&& empty($_POST['4C'])&& empty($_POST['4D'])&& empty($_POST['4E']))
 {
 	$question4=$_POST['4A'] + 12;
 }
 else if(isset($_POST['4B'])&& empty($_POST['4A'])&& empty($_POST['4C'])&& empty($_POST['4D'])&& empty($_POST['4E']))
 {
 	$question4=$_POST['4B'] + 9;
 }
 else if(isset($_POST['4C'])&& empty($_POST['4A'])&& empty($_POST['4B'])&& empty($_POST['4D'])&& empty($_POST['4E']))
 {
 	$question4=$_POST['4C'] + 6;
 }
 else if(isset($_POST['4D'])&& empty($_POST['4A'])&& empty($_POST['4B'])&& empty($_POST['4C'])&& empty($_POST['4E']))
 {
 	$question4=$_POST['4D'] + 3;
 }
 else if(isset($_POST['4E'])&& empty($_POST['4A'])&& empty($_POST['4B'])&& empty($_POST['4C'])&& empty($_POST['4D']))
 {
 	$question4=$_POST['4E'];
 }
 else
 {
 	$message="Please Follow the rules of rating";
 }
 
 // For 5 item
 if (empty($_POST['5A']) && empty($_POST['5B'])&& empty($_POST['5C'])&& empty($_POST['5D'])&& empty($_POST['5E']))
 {
 	$question5=0;
 }
 else if(isset($_POST['5A'])&& empty($_POST['5B'])&& empty($_POST['5C'])&& empty($_POST['5D'])&& empty($_POST['5E']))
 {
 	$question5=$_POST['5A'] + 12;
 }
 else if(isset($_POST['5B'])&& empty($_POST['5A'])&& empty($_POST['5C'])&& empty($_POST['5D'])&& empty($_POST['5E']))
 {
 	$question5=$_POST['5B'] + 9;
 }
 else if(isset($_POST['5C'])&& empty($_POST['5A'])&& empty($_POST['5B'])&& empty($_POST['5D'])&& empty($_POST['5E']))
 {
 	$question5=$_POST['5C'] + 6;
 }
 else if(isset($_POST['5D'])&& empty($_POST['5A'])&& empty($_POST['5B'])&& empty($_POST['5C'])&& empty($_POST['5E']))
 {
 	$question5=$_POST['5D'] + 3;
 }
 else if(isset($_POST['5E'])&& empty($_POST['5A'])&& empty($_POST['5B'])&& empty($_POST['5C'])&& empty($_POST['5D']))
 {
 	$question5=$_POST['5E'];
 }
 else
 {
 	$message="Please Follow the rules of rating";
 }
 
 // For 6 item
 if (empty($_POST['6A']) && empty($_POST['6B'])&& empty($_POST['6C'])&& empty($_POST['6D'])&& empty($_POST['6E']))
 {
 	$question6=0;
 }
 else if(isset($_POST['6A'])&& empty($_POST['6B'])&& empty($_POST['6C'])&& empty($_POST['6D'])&& empty($_POST['6E']))
 {
 	$question6=$_POST['6A'] + 12;
 }
 else if(isset($_POST['6B'])&& empty($_POST['6A'])&& empty($_POST['6C'])&& empty($_POST['6D'])&& empty($_POST['6E']))
 {
 	$question6=$_POST['6B'] + 9;
 }
 else if(isset($_POST['6C'])&& empty($_POST['6A'])&& empty($_POST['6B'])&& empty($_POST['6D'])&& empty($_POST['6E']))
 {
 	$question6=$_POST['6C'] + 6;
 }
 else if(isset($_POST['6D'])&& empty($_POST['6A'])&& empty($_POST['6B'])&& empty($_POST['6C'])&& empty($_POST['6E']))
 {
 	$question6=$_POST['6D'] + 3;
 }
 else if(isset($_POST['6E'])&& empty($_POST['6A'])&& empty($_POST['6B'])&& empty($_POST['6C'])&& empty($_POST['6D']))
 {
 	$question6=$_POST['6E'];
 }
 else
 {
 	$message="Please Follow the rules of rating";
 }
 
 // For 7 item
 if (empty($_POST['7A']) && empty($_POST['7B'])&& empty($_POST['7C'])&& empty($_POST['7D'])&& empty($_POST['7E']))
 {
 	$question7=0;
 }
 else if(isset($_POST['7A'])&& empty($_POST['7B'])&& empty($_POST['7C'])&& empty($_POST['7D'])&& empty($_POST['7E']))
 {
 	$question7=$_POST['7A'] + 12;
 }
 else if(isset($_POST['7B'])&& empty($_POST['7A'])&& empty($_POST['7C'])&& empty($_POST['7D'])&& empty($_POST['7E']))
 {
 	$question7=$_POST['7B'] + 9;
 }
 else if(isset($_POST['7C'])&& empty($_POST['7A'])&& empty($_POST['7B'])&& empty($_POST['7D'])&& empty($_POST['7E']))
 {
 	$question7=$_POST['7C'] + 6;
 }
 else if(isset($_POST['7D'])&& empty($_POST['7A'])&& empty($_POST['7B'])&& empty($_POST['7C'])&& empty($_POST['7E']))
 {
 	$question7=$_POST['7D'] + 3;
 }
 else if(isset($_POST['7E'])&& empty($_POST['7A'])&& empty($_POST['7B'])&& empty($_POST['7C'])&& empty($_POST['7D']))
 {
 	$question7=$_POST['7E'];
 }
 else
 {
 	$message="Please Follow the rules of rating";
 }
 
 // For 8 item
 if (empty($_POST['8A']) && empty($_POST['8B'])&& empty($_POST['8C'])&& empty($_POST['8D'])&& empty($_POST['8E']))
 {
 	$question8=0;
 }
 else if(isset($_POST['8A'])&& empty($_POST['8B'])&& empty($_POST['8C'])&& empty($_POST['8D'])&& empty($_POST['8E']))
 {
 	$question8=$_POST['8A'] + 12;
 }
 else if(isset($_POST['8B'])&& empty($_POST['8A'])&& empty($_POST['8C'])&& empty($_POST['8D'])&& empty($_POST['8E']))
 {
 	$question8=$_POST['8B'] + 9;
 }
 else if(isset($_POST['8C'])&& empty($_POST['8A'])&& empty($_POST['8B'])&& empty($_POST['8D'])&& empty($_POST['8E']))
 {
 	$question8=$_POST['8C'] + 6;
 }
 else if(isset($_POST['8D'])&& empty($_POST['8A'])&& empty($_POST['8B'])&& empty($_POST['8C'])&& empty($_POST['8E']))
 {
 	$question8=$_POST['8D'] + 3;
 }
 else if(isset($_POST['8E'])&& empty($_POST['8A'])&& empty($_POST['8B'])&& empty($_POST['8C'])&& empty($_POST['8D']))
 {
 	$question8=$_POST['8E'];
 }
 else
 {
 	$message="Please Follow the rules of rating";
 }
 
 // For 9 item
 if (empty($_POST['9A']) && empty($_POST['9B'])&& empty($_POST['9C'])&& empty($_POST['9D'])&& empty($_POST['9E']))
 {
 	$question9=0;
 }
 else if(isset($_POST['9A'])&& empty($_POST['9B'])&& empty($_POST['9C'])&& empty($_POST['9D'])&& empty($_POST['9E']))
 {
 	$question9=$_POST['9A'] + 12;
 }
 else if(isset($_POST['9B'])&& empty($_POST['9A'])&& empty($_POST['9C'])&& empty($_POST['9D'])&& empty($_POST['9E']))
 {
 	$question9=$_POST['9B'] + 9;
 }
 else if(isset($_POST['9C'])&& empty($_POST['9A'])&& empty($_POST['9B'])&& empty($_POST['9D'])&& empty($_POST['9E']))
 {
 	$question9=$_POST['9C'] + 6;
 }
 else if(isset($_POST['9D'])&& empty($_POST['9A'])&& empty($_POST['9B'])&& empty($_POST['9C'])&& empty($_POST['9E']))
 {
 	$question9=$_POST['9D'] + 3;
 }
 else if(isset($_POST['9E'])&& empty($_POST['9A'])&& empty($_POST['9B'])&& empty($_POST['9C'])&& empty($_POST['9D']))
 {
 	$question9=$_POST['9E'];
 }
 else
 {
 	$message="Please Follow the rules of rating";
 }
 
 // For 10 item
 if (empty($_POST['10A']) && empty($_POST['10B'])&& empty($_POST['10C'])&& empty($_POST['10D'])&& empty($_POST['10E']))
 {
 	$question10=0;
 }
 else if(isset($_POST['10A'])&& empty($_POST['10B'])&& empty($_POST['10C'])&& empty($_POST['10D'])&& empty($_POST['10E']))
 {
 	$question10=$_POST['10A'] + 12;
 }
 else if(isset($_POST['10B'])&& empty($_POST['10A'])&& empty($_POST['10C'])&& empty($_POST['10D'])&& empty($_POST['10E']))
 {
 	$question10=$_POST['10B'] + 9;
 }
 else if(isset($_POST['10C'])&& empty($_POST['10A'])&& empty($_POST['10B'])&& empty($_POST['10D'])&& empty($_POST['10E']))
 {
 	$question10=$_POST['10C'] + 6;
 }
 else if(isset($_POST['10D'])&& empty($_POST['10A'])&& empty($_POST['10B'])&& empty($_POST['10C'])&& empty($_POST['10E']))
 {
 	$question10=$_POST['10D'] + 3;
 }
 else if(isset($_POST['10E'])&& empty($_POST['10A'])&& empty($_POST['10B'])&& empty($_POST['10C'])&& empty($_POST['10D']))
 {
 	$question10=$_POST['10E'];
 }
 else
 {
 	$message="Please Follow the rules of rating";
 }
 
 // For 11 item
 if (empty($_POST['11A']) && empty($_POST['11B'])&& empty($_POST['11C'])&& empty($_POST['11D'])&& empty($_POST['11E']))
 {
 	$question11=0;
 }
 else if(isset($_POST['11A'])&& empty($_POST['11B'])&& empty($_POST['11C'])&& empty($_POST['11D'])&& empty($_POST['11E']))
 {
 	$question11=$_POST['11A'] + 12;
 }
 else if(isset($_POST['11B'])&& empty($_POST['11A'])&& empty($_POST['11C'])&& empty($_POST['11D'])&& empty($_POST['11E']))
 {
 	$question11=$_POST['11B'] + 9;
 }
 else if(isset($_POST['11C'])&& empty($_POST['11A'])&& empty($_POST['11B'])&& empty($_POST['11D'])&& empty($_POST['11E']))
 {
 	$question11=$_POST['11C'] + 6;
 }
 else if(isset($_POST['11D'])&& empty($_POST['11A'])&& empty($_POST['11B'])&& empty($_POST['11C'])&& empty($_POST['11E']))
 {
 	$question11=$_POST['11D'] + 3;
 }
 else if(isset($_POST['11E'])&& empty($_POST['11A'])&& empty($_POST['11B'])&& empty($_POST['11C'])&& empty($_POST['11D']))
 {
 	$question11=$_POST['11E'];
 }
 else
 {
 	$message="Please Follow the rules of rating";
 }
 
 // For 12 item
 if (empty($_POST['12A']) && empty($_POST['12B'])&& empty($_POST['12C'])&& empty($_POST['12D'])&& empty($_POST['12E']))
 {
 	$question12=0;
 }
 else if(isset($_POST['12A'])&& empty($_POST['12B'])&& empty($_POST['12C'])&& empty($_POST['12D'])&& empty($_POST['12E']))
 {
 	$question12=$_POST['12A'] + 12;
 }
 else if(isset($_POST['12B'])&& empty($_POST['12A'])&& empty($_POST['12C'])&& empty($_POST['12D'])&& empty($_POST['12E']))
 {
 	$question12=$_POST['12B'] + 9;
 }
 else if(isset($_POST['12C'])&& empty($_POST['12A'])&& empty($_POST['12B'])&& empty($_POST['12D'])&& empty($_POST['12E']))
 {
 	$question12=$_POST['12C'] + 6;
 }
 else if(isset($_POST['12D'])&& empty($_POST['12A'])&& empty($_POST['12B'])&& empty($_POST['12C'])&& empty($_POST['12E']))
 {
 	$question12=$_POST['12D'] + 3;
 }
 else if(isset($_POST['12E'])&& empty($_POST['12A'])&& empty($_POST['12B'])&& empty($_POST['12C'])&& empty($_POST['12D']))
 {
 	$question12=$_POST['12E'];
 }
 else
 {
 	$message="Please Follow the rules of rating";
 }
 
 // For 13 item
 if (empty($_POST['13A']) && empty($_POST['13B'])&& empty($_POST['13C'])&& empty($_POST['13D'])&& empty($_POST['13E']))
 {
 	$question13=0;
 }
 else if(isset($_POST['13A'])&& empty($_POST['13B'])&& empty($_POST['13C'])&& empty($_POST['13D'])&& empty($_POST['13E']))
 {
 	$question13=$_POST['13A'] + 12;
 }
 else if(isset($_POST['13B'])&& empty($_POST['13A'])&& empty($_POST['13C'])&& empty($_POST['13D'])&& empty($_POST['13E']))
 {
 	$question13=$_POST['13B'] + 9;
 }
 else if(isset($_POST['13C'])&& empty($_POST['13A'])&& empty($_POST['13B'])&& empty($_POST['13D'])&& empty($_POST['13E']))
 {
 	$question13=$_POST['13C'] + 6;
 }
 else if(isset($_POST['13D'])&& empty($_POST['13A'])&& empty($_POST['13B'])&& empty($_POST['13C'])&& empty($_POST['13E']))
 {
 	$question13=$_POST['13D'] + 3;
 }
 else if(isset($_POST['13E'])&& empty($_POST['13A'])&& empty($_POST['13B'])&& empty($_POST['13C'])&& empty($_POST['13D']))
 {
 	$question13=$_POST['13E'];
 }
 else
 {
 	$message="Please Follow the rules of rating";
 }
 
 // For 14 item
 if (empty($_POST['14A']) && empty($_POST['14B'])&& empty($_POST['14C'])&& empty($_POST['14D'])&& empty($_POST['14E']))
 {
 	$question14=0;
 }
 else if(isset($_POST['14A'])&& empty($_POST['14B'])&& empty($_POST['14C'])&& empty($_POST['14D'])&& empty($_POST['14E']))
 {
 	$question14=$_POST['14A'] + 12;
 }
 else if(isset($_POST['14B'])&& empty($_POST['14A'])&& empty($_POST['14C'])&& empty($_POST['14D'])&& empty($_POST['14E']))
 {
 	$question14=$_POST['14B'] + 9;
 }
 else if(isset($_POST['14C'])&& empty($_POST['14A'])&& empty($_POST['14B'])&& empty($_POST['14D'])&& empty($_POST['14E']))
 {
 	$question14=$_POST['14C'] + 6;
 }
 else if(isset($_POST['14D'])&& empty($_POST['14A'])&& empty($_POST['14B'])&& empty($_POST['14C'])&& empty($_POST['14E']))
 {
 	$question14=$_POST['14D'] + 3;
 }
 else if(isset($_POST['14E'])&& empty($_POST['14A'])&& empty($_POST['14B'])&& empty($_POST['14C'])&& empty($_POST['14D']))
 {
 	$question14=$_POST['14E'];
 }
 else
 {
 	$message="Please Follow the rules of rating";
 }
 
 // For 15 item
 if (empty($_POST['15A']) && empty($_POST['15B'])&& empty($_POST['15C'])&& empty($_POST['15D'])&& empty($_POST['15E']))
 {
 	$question15=0;
 }
 else if(isset($_POST['15A'])&& empty($_POST['15B'])&& empty($_POST['15C'])&& empty($_POST['15D'])&& empty($_POST['15E']))
 {
 	$question15=$_POST['15A'] + 12;
 }
 else if(isset($_POST['15B'])&& empty($_POST['15A'])&& empty($_POST['15C'])&& empty($_POST['15D'])&& empty($_POST['15E']))
 {
 	$question15=$_POST['15B'] + 9;
 }
 else if(isset($_POST['15C'])&& empty($_POST['15A'])&& empty($_POST['15B'])&& empty($_POST['15D'])&& empty($_POST['15E']))
 {
 	$question15=$_POST['15C'] + 6;
 }
 else if(isset($_POST['15D'])&& empty($_POST['15A'])&& empty($_POST['15B'])&& empty($_POST['15C'])&& empty($_POST['15E']))
 {
 	$question15=$_POST['15D'] + 3;
 }
 else if(isset($_POST['15E'])&& empty($_POST['15A'])&& empty($_POST['15B'])&& empty($_POST['15C'])&& empty($_POST['15D']))
 {
 	$question15=$_POST['15E'];
 }
 else
 {
 	$message="Please Follow the rules of rating";
 }
 
 $totalScore = ($question1+$question2+$question3+$question4+$question5+$question6+$question7+$question8+$question9+$question10+$question11+$question12+$question13+$question14+$question15);
//remarks of dept manager
  if (empty($_POST['remarks'])){
  	$remarks="";
  	$message="All field must be answered";
  }else
  	$remarks=$_POST['remarks'];


if(!isset($message)){
$queryinsert="insert into emp_evaluation (EMPLOYEENUMBER,DMEMPNO,DMREMARKS,DMSCORE,DMEVALDATE) 
								  values ('{$empNum}','{$currentEmpNum}','{$remarks}','{$totalScore}','{$currentDate}')";
$resultinsert= mysqli_query($dbc,$queryinsert);

//Insert result in Emp Eval
$queryForENInsert="UPDATE 	employees
					  SET	DMEVALUATORTHREE = $currentEmpNum
					WHERE   APPNO = $appNum
					";
$resultENInsert=mysqli_query($dbc,$queryForENInsert);
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
	<style type="text/css">
		table.table ul.dropdown-menu{
	    position:relative;
	    float:none;
	    max-width:160px;	
	</style>	
    <title>Evaluation</title>
</head>
<body>

<!-- navbar -->
<div class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="home.html"><img src="asyalogo.jpg" /> </a>
        </div>

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
					
						<a href="Subordinate - Evaluation.php" class="list-group-item active">Evaluation</a>
					
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
							<label class="col-lg-1">Applicant: </label>
							<div class="col-lg-3">
                             <?php echo $name?>
                             </div>	
                            <label class="col-lg-1">Date: </label>
							<div class="col-lg-3">
							<?php echo $currentDate?>			
                             </div>

							<h2 style="margin-left: 10px;"><br>Evaluation</h2>		  
                            <p class="indent">(15) Performance is consistently superior</p>
                            <p class="indent">(12) Exceeds Expectations Performance is routinely above job requirements</p>
                            <p class="indent">(9) Meets Expectations Performance is regularly competent and dependable</p>
                            <p class="indent">(6) Below Expectations Performance fails to meet job requirements on a frequent basis</p>
                            <p class="indent">(3) Unsatisfactory Performance is consistently unacceptable</p>
                            <table border="1" class="table table-bordered table-hover table-striped">  
                            <thead>
                            <tr>
                                <th>Category</th>
                                <th class="col-lg-1">15</th>
                                <th class="col-lg-1">12</th>
                                <th class="col-lg-1">9</th>
                                <th class="col-lg-1">6</th>
                                <th class="col-lg-1">3</th>                                
                            </tr>
                            </thead> 
                             <tbody>                       
									<tr><td><label style="margin-left: 20px;"><br> 1. INITIATIVE - Actively attempting to influence events to achieve goals; self-starting rather than passive acceptance.</label></td>
										<div class="col-lg-10">
											<td><select class="form-control m-bot15" name="1A">
																				<option>0</option>
																				<option>1</option>
																				<option>2</option>
																				<option>3</option>
														 </select></td>
											<td><select class="form-control m-bot15" name="1B">
																				<option>0</option>
																				<option>1</option>
																				<option>2</option>
																				<option>3</option>
														 </select></td>
											<td><select class="form-control m-bot15" name="1C">
																				<option>0</option>
																				<option>1</option>
																				<option>2</option>
																				<option>3</option>
														 </select></td>
											<td><select class="form-control m-bot15" name="1D">
																				<option>0</option>
																				<option>1</option>
																				<option>2</option>
																				<option>3</option>
														 </select></td>
											<td><select class="form-control m-bot15" name="1E">
																				<option>0</option>
																				<option>1</option>
																				<option>2</option>
																				<option>3</option>
														 </select></td>
										</div></tr>
									<tr><td><label style="margin-left: 20px;"> <br>2. ATTENTION TO DETAILS - Is thorough in accomplishing a  task with concern for all the areas involved, no matter how small.</label></td>
										<div class="col-lg-10">
											<td><select class="form-control m-bot15" name="2A">
																				<option>0</option>
																				<option>1</option>
																				<option>2</option>
																				<option>3</option>
														 </select></td>
											<td><select class="form-control m-bot15" name="2B">
																				<option>0</option>
																				<option>1</option>
																				<option>2</option>
																				<option>3</option>
														 </select></td>
											<td><select class="form-control m-bot15" name="2C">
																				<option>0</option>
																				<option>1</option>
																				<option>2</option>
																				<option>3</option>
														 </select></td>
											<td><select class="form-control m-bot15" name="2D">
																				<option>0</option>
																				<option>1</option>
																				<option>2</option>
																				<option>3</option>
														 </select></td>
											<td><select class="form-control m-bot15" name="2E">
																				<option>0</option>
																				<option>1</option>
																				<option>2</option>
																				<option>3</option>
														 </select></td>
										</div></tr>
									<tr><td><label style="margin-left: 20px;"> <br>3. ANALYSIS - Relating and camparing data from different sources, identifying issues and getting relevant information.</label></td>
										<div class="col-lg-10">
											<td><select class="form-control m-bot15" name="3A">
																				<option>0</option>
																				<option>1</option>
																				<option>2</option>
																				<option>3</option>
														 </select></td>
											<td><select class="form-control m-bot15" name="3B">
																				<option>0</option>
																				<option>1</option>
																				<option>2</option>
																				<option>3</option>
														 </select></td>
											<td><select class="form-control m-bot15" name="3C">
																				<option>0</option>
																				<option>1</option>
																				<option>2</option>
																				<option>3</option>
														 </select></td>
											<td><select class="form-control m-bot15" name="3D">
																				<option>0</option>
																				<option>1</option>
																				<option>2</option>
																				<option>3</option>
														 </select></td>
											<td><select class="form-control m-bot15" name="3E">
																				<option>0</option>
																				<option>1</option>
																				<option>2</option>
																				<option>3</option>
														 </select></td>
										</div></tr>
									<tr><td><label style="margin-left: 20px;"> <br>4. TOLERANCE FOR STRESS - Working well under pressure and/or against opposition.</label></td>
										<div class="col-lg-10">
											<td><select class="form-control m-bot15" name="4A">
																				<option>0</option>
																				<option>1</option>
																				<option>2</option>
																				<option>3</option>
														 </select></td>
											<td><select class="form-control m-bot15" name="4B">
																				<option>0</option>
																				<option>1</option>
																				<option>2</option>
																				<option>3</option>
														 </select></td>
											<td><select class="form-control m-bot15" name="4C">
																				<option>0</option>
																				<option>1</option>
																				<option>2</option>
																				<option>3</option>
														 </select></td>
											<td><select class="form-control m-bot15" name="4D">
																				<option>0</option>
																				<option>1</option>
																				<option>2</option>
																				<option>3</option>
														 </select></td>
											<td><select class="form-control m-bot15" name="4E">
																				<option>0</option>
																				<option>1</option>
																				<option>2</option>
																				<option>3</option>
														 </select></td>
										</div></tr>
									<tr><td><label style="margin-left: 20px;"> <br>5. PERFORMANCE STABILITY/DEPENDABILITY - Consistently meeting the day-to-day demands of the job.</label></td>
										<div class="col-lg-10">
											<td><select class="form-control m-bot15" name="5A">
																				<option>0</option>
																				<option>1</option>
																				<option>2</option>
																				<option>3</option>
														 </select></td>
											<td><select class="form-control m-bot15" name="5B">
																				<option>0</option>
																				<option>1</option>
																				<option>2</option>
																				<option>3</option>
														 </select></td>
											<td><select class="form-control m-bot15" name="5C">
																				<option>0</option>
																				<option>1</option>
																				<option>2</option>
																				<option>3</option>
														 </select></td>
											<td><select class="form-control m-bot15" name="5D">
																				<option>0</option>
																				<option>1</option>
																				<option>2</option>
																				<option>3</option>
														 </select></td>
											<td><select class="form-control m-bot15" name="5E">
																				<option>0</option>
																				<option>1</option>
																				<option>2</option>
																				<option>3</option>
														 </select></td>
										</div></tr>
									<tr><td><label style="margin-left: 20px;"> <br>6. JOB KNOWLEDGE - Measures effectiveness in keeping knowledgeable of methods required in own job and releated functions.</label></td>
										<div class="col-lg-10">
											<td><select class="form-control m-bot15" name="6A">
																				<option>0</option>
																				<option>1</option>
																				<option>2</option>
																				<option>3</option>
														 </select></td>
											<td><select class="form-control m-bot15" name="6B">
																				<option>0</option>
																				<option>1</option>
																				<option>2</option>
																				<option>3</option>
														 </select></td>
											<td><select class="form-control m-bot15" name="6C">
																				<option>0</option>
																				<option>1</option>
																				<option>2</option>
																				<option>3</option>
														 </select></td>
											<td><select class="form-control m-bot15" name="6D">
																				<option>0</option>
																				<option>1</option>
																				<option>2</option>
																				<option>3</option>
														 </select></td>
											<td><select class="form-control m-bot15" name="6E">
																				<option>0</option>
																				<option>1</option>
																				<option>2</option>
																				<option>3</option>
														 </select></td>
										</div></tr>
										
										<th>Company Core Values</th>
										<th> </th>
										<th> </th>
										<th> </th>
										<th> </th>
										<th> </th>    
									<tr><td><label style="margin-left: 20px;"> <br>7. LOYALTY</label></td>
										<div class="col-lg-10">
											<td><select class="form-control m-bot15" name="7A">
																				<option>0</option>
																				<option>1</option>
																				<option>2</option>
																				<option>3</option>
														 </select></td>
											<td><select class="form-control m-bot15" name="7B">
																				<option>0</option>
																				<option>1</option>
																				<option>2</option>
																				<option>3</option>
														 </select></td>
											<td><select class="form-control m-bot15" name="7C">
																				<option>0</option>
																				<option>1</option>
																				<option>2</option>
																				<option>3</option>
														 </select></td>
											<td><select class="form-control m-bot15" name="7D">
																				<option>0</option>
																				<option>1</option>
																				<option>2</option>
																				<option>3</option>
														 </select></td>
											<td><select class="form-control m-bot15" name="7E">
																				<option>0</option>
																				<option>1</option>
																				<option>2</option>
																				<option>3</option>
														 </select></td>
										</div></tr>
									<tr><td><label style="margin-left: 20px;"> <br>8. TRUSTWORTHINESS</label></td>
										<div class="col-lg-10">
											<td><select class="form-control m-bot15" name="8A">
																				<option>0</option>
																				<option>1</option>
																				<option>2</option>
																				<option>3</option>
														 </select></td>
											<td><select class="form-control m-bot15" name="8B">
																				<option>0</option>
																				<option>1</option>
																				<option>2</option>
																				<option>3</option>
														 </select></td>
											<td><select class="form-control m-bot15" name="8C">
																				<option>0</option>
																				<option>1</option>
																				<option>2</option>
																				<option>3</option>
														 </select></td>
											<td><select class="form-control m-bot15" name="8D">
																				<option>0</option>
																				<option>1</option>
																				<option>2</option>
																				<option>3</option>
														 </select></td>
											<td><select class="form-control m-bot15" name="8E">
																				<option>0</option>
																				<option>1</option>
																				<option>2</option>
																				<option>3</option>
														 </select></td>
										</div></tr>
									<tr><td><label style="margin-left: 20px;"> <br>9. DISCIPLINE</label></td>
										<div class="col-lg-10">
V											<td><select class="form-control m-bot15" name="9A">
																				<option>0</option>
																				<option>1</option>
																				<option>2</option>
																				<option>3</option>
														 </select></td>
											<td><select class="form-control m-bot15" name="9B">
																				<option>0</option>
																				<option>1</option>
																				<option>2</option>
																				<option>3</option>
														 </select></td>
											<td><select class="form-control m-bot15" name="9C">
																				<option>0</option>
																				<option>1</option>
																				<option>2</option>
																				<option>3</option>
														 </select></td>
											<td><select class="form-control m-bot15" name="9D">
																				<option>0</option>
																				<option>1</option>
																				<option>2</option>
																				<option>3</option>
														 </select></td>
											<td><select class="form-control m-bot15" name="9E">
																				<option>0</option>
																				<option>1</option>
																				<option>2</option>
																				<option>3</option>
														 </select></td>
										</div></tr>
									<tr><td><label style="margin-left: 20px;"> <br>10. PASSION AND COMMITMENT AT WORK</label></td>
										<div class="col-lg-10">
											<td><select class="form-control m-bot15" name="10A">
																				<option>0</option>
																				<option>1</option>
																				<option>2</option>
																				<option>3</option>
														 </select></td>
											<td><select class="form-control m-bot15" name="10B">
																				<option>0</option>
																				<option>1</option>
																				<option>2</option>
																				<option>3</option>
														 </select></td>
											<td><select class="form-control m-bot15" name="10C">
																				<option>0</option>
																				<option>1</option>
																				<option>2</option>
																				<option>3</option>
														 </select></td>
											<td><select class="form-control m-bot15" name="10D">
																				<option>0</option>
																				<option>1</option>
																				<option>2</option>
																				<option>3</option>
														 </select></td>
											<td><select class="form-control m-bot15" name="10E">
																				<option>0</option>
																				<option>1</option>
																				<option>2</option>
																				<option>3</option>
														 </select></td>
										</div></tr>
									<tr><td><label style="margin-left: 20px;"> <br>11. RESPECT FOR CULTURE</label></td>
										<div class="col-lg-10">
											<td><select class="form-control m-bot15" name="11A">
																				<option>0</option>
																				<option>1</option>
																				<option>2</option>
																				<option>3</option>
														 </select></td>
											<td><select class="form-control m-bot15" name="11B">
																				<option>0</option>
																				<option>1</option>
																				<option>2</option>
																				<option>3</option>
														 </select></td>
											<td><select class="form-control m-bot15" name="11C">
																				<option>0</option>
																				<option>1</option>
																				<option>2</option>
																				<option>3</option>
														 </select></td>
											<td><select class="form-control m-bot15" name="11D">
																				<option>0</option>
																				<option>1</option>
																				<option>2</option>
																				<option>3</option>
														 </select></td>
											<td><select class="form-control m-bot15" name="11E">
																				<option>0</option>
																				<option>1</option>
																				<option>2</option>
																				<option>3</option>
														 </select></td>
										</div></tr>
									<tr><td><label style="margin-left: 20px;"> <br>12. "YES, WE CAN!" ATTITUDE</label></td>
										<div class="col-lg-10">
											<td><select class="form-control m-bot15" name="12A">
																				<option>0</option>
																				<option>1</option>
																				<option>2</option>
																				<option>3</option>
														 </select></td>
											<td><select class="form-control m-bot15" name="12B">
																				<option>0</option>
																				<option>1</option>
																				<option>2</option>
																				<option>3</option>
														 </select></td>
											<td><select class="form-control m-bot15" name="12C">
																				<option>0</option>
																				<option>1</option>
																				<option>2</option>
																				<option>3</option>
														 </select></td>
											<td><select class="form-control m-bot15" name="12D">
																				<option>0</option>
																				<option>1</option>
																				<option>2</option>
																				<option>3</option>
														 </select></td>
											<td><select class="form-control m-bot15" name="12E">
																				<option>0</option>
																				<option>1</option>
																				<option>2</option>
																				<option>3</option>
														 </select></td>
										</div></tr>
									<tr><td><label style="margin-left: 20px;"> <br>13. CUSTOMER DELIGHT</label></td>
										<div class="col-lg-10">
											<td><select class="form-control m-bot15" name="13A">
																				<option>0</option>
																				<option>1</option>
																				<option>2</option>
																				<option>3</option>
														 </select></td>
											<td><select class="form-control m-bot15" name="13B">
																				<option>0</option>
																				<option>1</option>
																				<option>2</option>
																				<option>3</option>
														 </select></td>
											<td><select class="form-control m-bot15" name="13C">
																				<option>0</option>
																				<option>1</option>
																				<option>2</option>
																				<option>3</option>
														 </select></td>
											<td><select class="form-control m-bot15" name="13D">
																				<option>0</option>
																				<option>1</option>
																				<option>2</option>
																				<option>3</option>
														 </select></td>
											<td><select class="form-control m-bot15" name="13E">
																				<option>0</option>
																				<option>1</option>
																				<option>2</option>
																				<option>3</option>
														 </select></td>
										</div></tr>
									<tr><td><label style="margin-left: 20px;"> <br>14. THINK LIKE THE OWNER CONCEPT</label></td>
										<div class="col-lg-10">
											<td><select class="form-control m-bot15" name="14A">
																				<option>0</option>
																				<option>1</option>
																				<option>2</option>
																				<option>3</option>
														 </select></td>
											<td><select class="form-control m-bot15" name="14B">
																				<option>0</option>
																				<option>1</option>
																				<option>2</option>
																				<option>3</option>
														 </select></td>
											<td><select class="form-control m-bot15" name="14C">
																				<option>0</option>
																				<option>1</option>
																				<option>2</option>
																				<option>3</option>
														 </select></td>
											<td><select class="form-control m-bot15" name="14D">
																				<option>0</option>
																				<option>1</option>
																				<option>2</option>
																				<option>3</option>
														 </select></td>
											<td><select class="form-control m-bot15" name="14E">
																				<option>0</option>
																				<option>1</option>
																				<option>2</option>
																				<option>3</option>
														 </select></td>
										</div></tr>
									
									<tr><td><label style="margin-left: 20px;"> <br>15. SUSTAINABILITY AND ENVIRONMENT FOCUS</label></td>
										<div class="col-lg-10">
											<td><select class="form-control m-bot15" name="15A">
																				<option>0</option>
																				<option>1</option>
																				<option>2</option>
																				<option>3</option>
														 </select></td>
											<td><select class="form-control m-bot15" name="15B">
																				<option>0</option>
																				<option>1</option>
																				<option>2</option>
																				<option>3</option>
														 </select></td>
											<td><select class="form-control m-bot15" name="15C">
																				<option>0</option>
																				<option>1</option>
																				<option>2</option>
																				<option>3</option>
														 </select></td>
											<td><select class="form-control m-bot15" name="15D">
																				<option>0</option>
																				<option>1</option>
																				<option>2</option>
																				<option>3</option>
														 </select></td>
											<td><select class="form-control m-bot15" name="15E">
																				<option>0</option>
																				<option>1</option>
																				<option>2</option>
																				<option>3</option>
														 </select></td>
										</div></tr>
									</tbody>	
									</table>		
	                                    <h2 style="margin-left: 10px;"><br>Remarks</h2>
										<div class="row indent col-lg-8">
										<input required  name="remarks" type="text" class="form-control" >
										</div>
									
										<div class="panel-body" style="margin-top:70px;margin-left:7px;">											
											<button name="submit" type="submit" value="<?php  echo $appNum?>" class="btn btn-success" onclick="myFunction()">Submit</button>
											<a class="btn btn-default"  href="Subordinate - Evaluation.php"> Back </a> 
										</div>
							  </form>
						  </div>
				  </section>				  				 
			</div>   		       
	 <script>
		function myFunction() {
		    var x;
		    if (confirm("Interview Success!") == true) {
		        window.location.href="home.php";
		    } else {
		        x = "You pressed Cancel!";
		    }
		}
	</script>   
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