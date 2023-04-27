<?php

include_once("./includes/header.php");
include_once("./includes/db.php");
//-------------------------------------------------------------------------------------------

?>
	
<!DOCTYPE html>
<html>

<head>
	<link rel="stylesheet" href="./styles.css">
</head>

<body>
	<?php
	if(isset($_SESSION['USERNAME']) && strlen($_SESSION['USERNAME']) > 0){
		?><p>Logged User: <?php print $_SESSION['USERNAME'];?>&nbsp;&nbsp;<a href="logout.php">logout</a></p><?php	
	}
	?>
	<h2>Test Case 4</h2>
	
	<!-- THE POST IN THE METHOD ATTRIBUTE FOR THE FORM IS THE SECURE METHOD TO SUBMIT DATA IN THE SERVER --> 
	<form name="search" id="search" method="POST" action="./search_result.php" target="_blank">		
		<table>
			<tr>
				<td colspan="2" style="text-align:center;">Search User</td>
			</tr>
			<tr>
				<td>Name</td>
				<td><input type="text" name="field1" id="field1"/></td>
			</tr>
			<tr>
				<td>Class</td>
				<td><input type="text" name="field2" id="field2" /></td>
			</tr>
			<tr>
				<td colspan="2"><input type="submit" value="Search Person" /></td>
			</tr>
		</table>
	</form>
</body>
</html>
