<!DOCTYPE html>
<html lang="en">
<?php
session_start();
require_once('../mysql_connect.php');
$queryForinfo="SELECT * FROM Employees";
$results=mysqli_query($dbc,$queryForinfo);
$usernames = array();
$passwords = array();
while($rows=mysqli_fetch_array($results,MYSQLI_ASSOC)){
   $usernames[] = $rows['USERNAME'];
   $passwords[] = $rows['PASSWORD'];
}
if (isset($_POST['submit'])){
$message=NULL;
 if (empty($_POST['username'])){
  $_SESSION['username']=FALSE;
  $message.='<p>You forgot to enter your username!';
 } else {
  $_SESSION['username']=$_POST['username']; 
 }
 if (empty($_POST['password'])){
  $_SESSION['password']=FALSE;
  $message.='<p>You forgot to enter your password!';
 } else {
  $_SESSION['password']=$_POST['password']; 
 }
$pass = $_SESSION['password'];
// EMPLOYEE NUMBER
 $queryforPID = "SELECT * FROM employees Where PASSWORD = '{$pass}'";
$resultsPID = mysqli_query($dbc,$queryforPID);
$row1 = mysqli_fetch_array($resultsPID,MYSQLI_ASSOC);
$passID = $row1['EMPLOYEENUMBER'];
$passapp = $row1['APPNO'];
// POSITION
$queryforposition = "SELECT * FROM employees Where EMPLOYEENUMBER = '{$passID}'";
$resultsposition = mysqli_query($dbc,$queryforposition);
$EMPLOYEEINFORMATIONS = mysqli_fetch_array($resultsposition,MYSQLI_ASSOC);
$position = $EMPLOYEEINFORMATIONS['ACTUALPOSITION'];
 $_SESSION['emp_number'] = $row1['EMPLOYEENUMBER'];
 $_SESSION['emp_appno'] = $row1['APPNO'];

if ($position != 2222 && $position != 3333) {
  $_SESSION['emp_number'] = $row1['EMPLOYEENUMBER'];
   $_SESSION['emp_appno'] = $row1['APPNO'];
       header("Location: http://".$_SERVER['HTTP_HOST'].  dirname($_SERVER['PHP_SELF'])."/Employee/home.php");
       
}else if ($position == 2222){
		$_SESSION['emp_number'] = $row1['EMPLOYEENUMBER'];
		$_SESSION['emp_appno'] = $row1['APPNO'];
		header("Location: http://".$_SERVER['HTTP_HOST'].  dirname($_SERVER['PHP_SELF'])."/Manager/home.php");		
}
else{
	if ($position == 3333)
	{      
          $_SESSION['emp_number'] = $row1['EMPLOYEENUMBER'];
           $_SESSION['emp_appno'] = $row1['APPNO'];
	       header("Location: http://".$_SERVER['HTTP_HOST'].  dirname($_SERVER['PHP_SELF'])."/home.php");
	} 
}
}/*End of main Submit conditional*/
if (isset($message)){
 echo '<font color="red">'.$message. '</font>';
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

    <link rel="stylesheet" href="css/custom.css">
    <link rel="stylesheet" href="css/custom-theme.css">

    <title>Log-In</title>
</head>
<body>


<!-- navbar -->
<div class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="#"><img src="asyalogo.jpg" /> </a>
        </div>
    </div>
</div>

<!-- login panel -->
<div class="container col-md-4 col-md-offset-4">
    <div class="panel panel-default" id="panel-login">
        <div class="panel-heading"><h3 class="text-center">Welcome</h3></div>
        <form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">        
	        <div class="panel-body">            
	                <div class="form-group">
	                    <input type="text" class="form-control" name="username" placeholder="Username">
	                </div>
	                <div class="form-group">
	                    <input type="password" class="form-control" name="password" placeholder="Password">
	                </div>           
	        </div>
	        <div class="panel-footer text-center">
	            <input type="submit" name="submit" value="Login" class="btn btn-success">
	        </div>
         </form>
    </div>
</div>

</body>
</html>