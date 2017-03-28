<?php 
	require_once('../../mysql_connect.php');
	header("Content-type: application/json");
	$query="SELECT * 
			  FROM reversalrequests rr JOIN employees e ON rr.EMPLOYEENUMBER = e.EMPLOYEENUMBER
									   JOIN	applicants a ON e.APPNO = a.APPNO
			WHERE	isSeen = 1";
	$result=mysqli_query($dbc,$query);
	
	
	$data = [];
	foreach($result as $row){
		$data[] = $row;
	}
	
	echo json_encode($data);
?>