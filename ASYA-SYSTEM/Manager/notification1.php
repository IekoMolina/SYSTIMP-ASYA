<?php
require_once('../../mysql_connect.php');
$query="UPDATE 	reversalrequests
			  SET 	isSeen = 0
			WHERE	isSeen = 1";
$result=mysqli_query($dbc,$query);	
?>