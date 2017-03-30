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
if(isset($_POST['empElink'])){
	$appNum = $_POST['empElink'];
}
if(isset($_POST['submit'])){
	$appNum = $_POST['submit'];
}
// Get applicant
$queryForName="SELECT 	* 
				 FROM 	applicants a JOIN employees e ON a.APPNO = e.APPNO
				WHERE a.APPNO = '{$appNum}'";
$resultNames=mysqli_query($dbc,$queryForName);
$rows=mysqli_fetch_array($resultNames,MYSQLI_ASSOC);
$name = $rows['FIRSTNAME'].' '.$rows['LASTNAME'];
$empNum =  $rows['EMPLOYEENUMBER'];
$departments =  $rows['DEPT'];

$queryForActualDepartment="SELECT 	*
							FROM 	emp_dept";
$resultD=mysqli_query($dbc,$queryForActualDepartment);
while($rows=mysqli_fetch_array($resultD,MYSQLI_ASSOC))
{
	$actualDept[] = $rows['EDEPT'];
	$codeDept[] = $rows['DEPT'];
}
$deptName = '';
for ($x=0;$x<count($codeDept);$x++)
{
	if($departments==$codeDept[$x])
	{
		$deptName = $actualDept[$x];
	}
}
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
// For 16 item
if (empty($_POST['16A']) && empty($_POST['16B'])&& empty($_POST['16C'])&& empty($_POST['16D'])&& empty($_POST['16E']))
{
	$question16=0;
}
else if(isset($_POST['16A'])&& empty($_POST['16B'])&& empty($_POST['16C'])&& empty($_POST['16D'])&& empty($_POST['16E']))
{
	$question16=$_POST['16A'] + 12;
}
else if(isset($_POST['16B'])&& empty($_POST['16A'])&& empty($_POST['16C'])&& empty($_POST['16D'])&& empty($_POST['16E']))
{
	$question16=$_POST['16B'] + 9;
}
else if(isset($_POST['16C'])&& empty($_POST['16A'])&& empty($_POST['16B'])&& empty($_POST['16D'])&& empty($_POST['16E']))
{
	$question16=$_POST['16C'] + 6;
}
else if(isset($_POST['16D'])&& empty($_POST['16A'])&& empty($_POST['16B'])&& empty($_POST['16C'])&& empty($_POST['16E']))
{
	$question16=$_POST['16D'] + 3;
}
else if(isset($_POST['16E'])&& empty($_POST['16A'])&& empty($_POST['16B'])&& empty($_POST['16C'])&& empty($_POST['16D']))
{
	$question16=$_POST['16E'];
}
else
{
	$message="Please Follow the rules of rating";
}

// For 17 item
if (empty($_POST['17A']) && empty($_POST['17B'])&& empty($_POST['17C'])&& empty($_POST['17D'])&& empty($_POST['17E']))
{
	$question17=0;
}
else if(isset($_POST['17A'])&& empty($_POST['17B'])&& empty($_POST['17C'])&& empty($_POST['17D'])&& empty($_POST['17E']))
{
	$question17=$_POST['17A'] + 12;
}
else if(isset($_POST['17B'])&& empty($_POST['17A'])&& empty($_POST['17C'])&& empty($_POST['17D'])&& empty($_POST['17E']))
{
	$question17=$_POST['17B'] + 9;
}
else if(isset($_POST['17C'])&& empty($_POST['17A'])&& empty($_POST['17B'])&& empty($_POST['17D'])&& empty($_POST['17E']))
{
	$question17=$_POST['17C'] + 6;
}
else if(isset($_POST['17D'])&& empty($_POST['17A'])&& empty($_POST['17B'])&& empty($_POST['17C'])&& empty($_POST['17E']))
{
	$question17=$_POST['17D'] + 3;
}
else if(isset($_POST['17E'])&& empty($_POST['17A'])&& empty($_POST['17B'])&& empty($_POST['17C'])&& empty($_POST['17D']))
{
	$question17=$_POST['17E'];
}
else
{
	$message="Please Follow the rules of rating";
}

// For 18 item
if (empty($_POST['18A']) && empty($_POST['18B'])&& empty($_POST['18C'])&& empty($_POST['18D'])&& empty($_POST['18E']))
{
	$question18=0;
}
else if(isset($_POST['18A'])&& empty($_POST['18B'])&& empty($_POST['18C'])&& empty($_POST['18D'])&& empty($_POST['18E']))
{
	$question18=$_POST['18A'] + 12;
}
else if(isset($_POST['18B'])&& empty($_POST['18A'])&& empty($_POST['18C'])&& empty($_POST['18D'])&& empty($_POST['18E']))
{
	$question18=$_POST['18B'] + 9;
}
else if(isset($_POST['18C'])&& empty($_POST['18A'])&& empty($_POST['18B'])&& empty($_POST['18D'])&& empty($_POST['18E']))
{
	$question18=$_POST['18C'] + 6;
}
else if(isset($_POST['18D'])&& empty($_POST['18A'])&& empty($_POST['18B'])&& empty($_POST['18C'])&& empty($_POST['18E']))
{
	$question18=$_POST['18D'] + 3;
}
else if(isset($_POST['18E'])&& empty($_POST['18A'])&& empty($_POST['18B'])&& empty($_POST['18C'])&& empty($_POST['18D']))
{
	$question18=$_POST['18E'];
}
else
{
	$message="Please Follow the rules of rating";
}
// For 19 item
if (empty($_POST['19A']) && empty($_POST['19B'])&& empty($_POST['19C'])&& empty($_POST['19D'])&& empty($_POST['19E']))
{
	$question19=0;
}
else if(isset($_POST['19A'])&& empty($_POST['19B'])&& empty($_POST['19C'])&& empty($_POST['19D'])&& empty($_POST['19E']))
{
	$question19=$_POST['19A'] + 12;
}
else if(isset($_POST['19B'])&& empty($_POST['19A'])&& empty($_POST['19C'])&& empty($_POST['19D'])&& empty($_POST['19E']))
{
	$question19=$_POST['19B'] + 9;
}
else if(isset($_POST['19C'])&& empty($_POST['19A'])&& empty($_POST['19B'])&& empty($_POST['19D'])&& empty($_POST['19E']))
{
	$question19=$_POST['19C'] + 6;
}
else if(isset($_POST['19D'])&& empty($_POST['19A'])&& empty($_POST['19B'])&& empty($_POST['19C'])&& empty($_POST['19E']))
{
	$question19=$_POST['19D'] + 3;
}
else if(isset($_POST['19E'])&& empty($_POST['19A'])&& empty($_POST['19B'])&& empty($_POST['19C'])&& empty($_POST['19D']))
{
	$question19=$_POST['19E'];
}
else
{
	$message="Please Follow the rules of rating";
}

$totalScore = $question1+$question2+$question3+$question4+$question5+$question6+$question7+$question8+$question9+$question10+$question11+$question12+$question13+$question14+$question15+$question16+$question17+$question18+$question19;
  //actual evaluation of manager
  if (empty($_POST['remarks'])){
  	$remarks="";
  	$message="All field must be answered";
  }else
  	$remarks=$_POST['remarks'];


if(!isset($message)){
//Insert HR eval in emp Eval 
			   $query="UPDATE 	emp_evaluation
						  SET	HREMPNO = '{$currentEmpNum}',HRREMARKS = '{$remarks}', HRSCORE = '{$totalScore}', HREVALDATE = '{$currentDate}',
						  		Q1 = '{$question1}', Q2 = '{$question2}', Q3 = '{$question3}', Q4 = '{$question4}', Q5 = '{$question5}',
						  		Q6 = '{$question6}', Q7 = '{$question7}', Q8 = '{$question8}', Q9 = '{$question9}', Q10 = '{$question10}',
						  		Q11 = '{$question11}', Q12 = '{$question12}', Q13 = '{$question13}', Q14 = '{$question14}', Q15 = '{$question15}',
						  		Q16 = '{$question16}', Q17 = '{$question17}', Q18 = '{$question18}', Q19 = '{$question19}'
				 		WHERE   EMPLOYEENUMBER = '{$empNum}'
						";
	$result=mysqli_query($dbc,$query);
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
            <p>HR Manager</p>
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
				<a href="Attendance.php" class="list-group-item"><span class="glyphicon glyphicon-calendar"></span> Attendance</a>
				
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
                
                <!-- reports -->
                <a href="#report-items1" class="list-group-item" data-toggle="collapse" data-parent=".sidebar-nav">
                    <span class="glyphicon glyphicon-list-alt"></span> Visual Reports <span class="caret"></span>
                </a>
                <!-- report items -->
                <div class="list-group collapse" id="report-items1">
                    <!-- employee reports -->
                        <a href="Report - EmployeeTardiness.php" class="list-group-item"> &#x25cf Employee Tardiness</a>
                        <a href="Report - EmployeeTenureOverall.php" class="list-group-item"> &#x25cf Employee Tenure</a>
                        <a href="Report - ManpowerArchitects.php" class="list-group-item"> &#x25cf Manpower Architects</a>
                        <a href="Report - ManpowerEngineers.php" class="list-group-item"> &#x25cf Manpower Engineers</a>
                        <a href="Report - RecruitmentNewlyHired.php" class="list-group-item">&#x25cf Recruitment Newly Hired</a>					
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
                        <a href="ManpowerRequest.php" class="list-group-item"> &#x25cf Manpower</a>
                        <a href="ResignationRequest.php" class="list-group-item"> &#x25cf Resignation</a>
                        <a href="ChangeRecordRequest.php" class="list-group-item">&#x25cf Change Record</a>	                        				
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
						<div class="row">
							<label class="col-lg-1">Applicant: </label>
							<div class="col-lg-3">
                             <?php echo $name?>
                             </div>	
                            <label class="col-lg-1">Date: </label>
							<div class="col-lg-3">
							<?php echo $currentDate?>			
                             </div>
                         </div>	
                         <div class="row"> 
                            <label class="col-lg-1">Department: </label>
							<div class="col-lg-3">
							<?php echo $deptName?>			
                             </div>
                          </div>

							<h2 style="margin-left: 10px;"><br>Evaluation</h2>		  
							<p class="indent">(15) Outstanding</p>
                            <p class="indent">(12) Exceeds Expectations</p>
                            <p class="indent">(9) Meets Expectations</p>
                            <p class="indent">(6) Below Expectations</p>
                            <p class="indent">(3) Unsatisfactory</p>
                            <table border="1" class="table table-bordered table-hover table-striped">  
                            <thead>
                            <tr>
                                <th>Evaluation Criteria</th>
                                <th class="col-lg-1">15</th>
                                <th class="col-lg-1">12</th>
                                <th class="col-lg-1">9</th>
                                <th class="col-lg-1">6</th>
                                <th class="col-lg-1">3</th>                                
                            </tr>
                            </thead> 
                             <tbody>
                             		<tr>
                             			<td><b>Attendance</b></td>
                             			<td></td>
                             			<td></td>
                             			<td></td>
                             			<td></td>
                             			<td></td>
                             		</tr>                       
									<tr><td><label style="margin-left: 20px;"> 1. Absences</label></td>
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
									<tr><td><label style="margin-left: 20px;"> <br>2. Punctuality</label></td>
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
									<tr><td><label style="margin-left: 20px;"> <br>3. Under Time</label></td>
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
									<tr><td><label style="margin-left: 20px;"> <br>4. Half-day</label></td>
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
                             		<tr>
                             			<td><b>Conduct and Compliance</b></td>
                             			<td></td>
                             			<td></td>
                             			<td></td>
                             			<td></td>
                             			<td></td>
                             		</tr>										
									<tr><td><label style="margin-left: 20px;"> <br>1. Discussion Notice</label></td>
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
									<tr><td><label style="margin-left: 20px;"> <br>2. First Written Warning</label></td>
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
									<tr><td><label style="margin-left: 20px;"> <br>3. Second Written Warning</label></td>
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
									<tr><td><label style="margin-left: 20px;"> <br>4. Stern Warning or Final Warning</label></td>
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
                             		<tr>
                             			<td><b>Active Participation</b></td>
                             			<td></td>
                             			<td></td>
                             			<td></td>
                             			<td></td>
                             			<td></td>
                             		</tr>										
									<tr><td><label style="margin-left: 20px;"> <br>1. Attendance in Internal/External trainings and seminars</label></td>
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
									<tr><td><label style="margin-left: 20px;"> <br>2. Active participation in Company activities such as Christmas Party, ASYA Cup and Outing</label></td>
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
									<tr>
                             			<td><b>Core Values</b></td>
                             			<td></td>
                             			<td></td>
                             			<td></td>
                             			<td></td>
                             			<td></td>
                             		</tr>										
									<tr><td><label style="margin-left: 20px;"> <br>1. Loyalty</label></td>
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
									<tr><td><label style="margin-left: 20px;"> <br>2. Trustworthiness</label></td>
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
									<tr><td><label style="margin-left: 20px;"> <br>3. Discipline</label></td>
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
									<tr><td><label style="margin-left: 20px;"> <br>4. Passion and Commitment at Work</label></td>
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
									<tr><td><label style="margin-left: 20px;"> <br>5. Respect for Culture</label></td>
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
									<tr><td><label style="margin-left: 20px;"> <br>6. "Yes,We Can!" attitude</label></td>
										<div class="col-lg-10">
											<td><select class="form-control m-bot15" name="16A">
																				<option>0</option>
																				<option>1</option>
																				<option>2</option>
																				<option>3</option>
														 </select></td>
											<td><select class="form-control m-bot15" name="16B">
																				<option>0</option>
																				<option>1</option>
																				<option>2</option>
																				<option>3</option>
														 </select></td>
											<td><select class="form-control m-bot15" name="16C">
																				<option>0</option>
																				<option>1</option>
																				<option>2</option>
																				<option>3</option>
														 </select></td>
											<td><select class="form-control m-bot15" name="16D">
																				<option>0</option>
																				<option>1</option>
																				<option>2</option>
																				<option>3</option>
														 </select></td>
											<td><select class="form-control m-bot15" name="16E">
																				<option>0</option>
																				<option>1</option>
																				<option>2</option>
																				<option>3</option>
														 </select></td>
										</div></tr>
									<tr><td><label style="margin-left: 20px;"> <br>7. Customer Delight</label></td>
										<div class="col-lg-10">
											<td><select class="form-control m-bot15" name="17A">
																				<option>0</option>
																				<option>1</option>
																				<option>2</option>
																				<option>3</option>
														 </select></td>
											<td><select class="form-control m-bot15" name="17B">
																				<option>0</option>
																				<option>1</option>
																				<option>2</option>
																				<option>3</option>
														 </select></td>
											<td><select class="form-control m-bot15" name="17C">
																				<option>0</option>
																				<option>1</option>
																				<option>2</option>
																				<option>3</option>
														 </select></td>
											<td><select class="form-control m-bot15" name="17D">
																				<option>0</option>
																				<option>1</option>
																				<option>2</option>
																				<option>3</option>
														 </select></td>
											<td><select class="form-control m-bot15" name="17E">
																				<option>0</option>
																				<option>1</option>
																				<option>2</option>
																				<option>3</option>
														 </select></td>
										</div></tr>
									<tr><td><label style="margin-left: 20px;"> <br>8. Think like the owner concept</label></td>
										<div class="col-lg-10">
											<td><select class="form-control m-bot15" name="18A">
																				<option>0</option>
																				<option>1</option>
																				<option>2</option>
																				<option>3</option>
														 </select></td>
											<td><select class="form-control m-bot15" name="18B">
																				<option>0</option>
																				<option>1</option>
																				<option>2</option>
																				<option>3</option>
														 </select></td>
											<td><select class="form-control m-bot15" name="18C">
																				<option>0</option>
																				<option>1</option>
																				<option>2</option>
																				<option>3</option>
														 </select></td>
											<td><select class="form-control m-bot15" name="18D">
																				<option>0</option>
																				<option>1</option>
																				<option>2</option>
																				<option>3</option>
														 </select></td>
											<td><select class="form-control m-bot15" name="18E">
																				<option>0</option>
																				<option>1</option>
																				<option>2</option>
																				<option>3</option>
														 </select></td>
										</div></tr>
									<tr><td><label style="margin-left: 20px;"> <br>9. Sustainability and Environment Focus</label></td>
										<div class="col-lg-10">
											<td><select class="form-control m-bot15" name="19A">
																				<option>0</option>
																				<option>1</option>
																				<option>2</option>
																				<option>3</option>
														 </select></td>
											<td><select class="form-control m-bot15" name="19B">
																				<option>0</option>
																				<option>1</option>
																				<option>2</option>
																				<option>3</option>
														 </select></td>
											<td><select class="form-control m-bot15" name="19C">
																				<option>0</option>
																				<option>1</option>
																				<option>2</option>
																				<option>3</option>
														 </select></td>
											<td><select class="form-control m-bot15" name="19D">
																				<option>0</option>
																				<option>1</option>
																				<option>2</option>
																				<option>3</option>
														 </select></td>
											<td><select class="form-control m-bot15" name="19E">
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
										<input required name="remarks" type="text" class="form-control" >
										</div>
									
										<div class="panel-body" style="margin-top:70px;margin-left:7px;">											
											<button name="submit" type="submit" class="btn btn-success" value="<?php echo $appNum?>" onclick="myFunction()">Submit</button>
											<a class="btn btn-default"  href="Employees.php"> Previous </a> 
										</div>
							  </form>
						  </div>
				  </section>				  				 
			</div>   		       
    </div>
	 <script>
		function myFunction() {
		    var x;
		    if (confirm("Evaluation Success!") == true) {
		        window.location.href="home.php";
		    } else {
		        x = "You pressed Cancel!";
		    }
		}
	</script> 
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