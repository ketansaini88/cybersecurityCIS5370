<?php

include_once("./includes/header.php");
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
	
	<form name="search" id="search" method="GET" action="./search_result.php" target="_blank">		
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
