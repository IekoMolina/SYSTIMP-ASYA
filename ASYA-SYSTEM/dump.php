<!DOCTYPE html>
<html>
<?php 
session_start();
require_once('../mysql_connect.php');

//Getting Employees with Leave
$queryForEmployeesOnLeave="SELECT A.FIRSTNAME,A.LASTNAME,LR.LEAVEFROM,LR.LEAVETO 
							 FROM LeaveRequests LR JOIN Employees E
													 ON	LR.employeenumber = E.employeenumber
												   JOIN	Applicants A
													 ON	E.appno = A.appno
							WHERE YEAR(LR.leaveto) = YEAR(CURRENT_DATE())";
$result=mysqli_query($dbc,$queryForEmployeesOnLeave);
while($rows=mysqli_fetch_array($result,MYSQLI_ASSOC))
{
	$names[] = $rows['FIRSTNAME'].' '.$rows['LASTNAME'];
	$leaveFrom[] = $rows['LEAVEFROM'];
	$leaveTo[] = $rows['LEAVETO'];
}
$_SESSION['names'] = $names;
$_SESSION['leaveFrom'] = $leaveFrom;
$_SESSION['leaveTo'] = $leaveTo;
?>
<head>
<meta charset='utf-8' />
<link href='../fullcalendar.css' rel='stylesheet' />
<link href='../fullcalendar.print.css' rel='stylesheet' media='print' />
<script src='../lib/moment.min.js'></script>
<script src='../lib/jquery.min.js'></script>
<script src='../fullcalendar.min.js'></script>
<script>

	$(document).ready(function() {
		
		$('#calendar').fullCalendar({
			header: {
				left: 'prev,next today',
				center: 'title',
				right: 'month,basicWeek,basicDay'
			},
			defaultDate: '<?php echo date('Y-m-d')?>',
			navLinks: true, // can click day/week names to navigate views
			editable: false,
			eventLimit: false, // allow "more" link when too many events
			events: [
			<?php 
			for($i=0;$i<count($names);$i++)
			{
			echo "{
					title: '$names[$i]',
					url: 'EmployeeLeaveInfo.php',
					start: '$leaveFrom[$i]',
					end: '$leaveTo[$i]'
			},";
			}
			?>
			]
		});
		
	});

</script>
<style>

	body {
		margin: 40px 10px;
		padding: 0;
		font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
		font-size: 14px;
	}

	#calendar {
		max-width: 900px;
		margin: 0 auto;
	}

</style>
</head>
<body>

	<div id='calendar'></div>

</body>
</html>
