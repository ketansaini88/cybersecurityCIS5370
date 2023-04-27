<?php

include_once("./includes/header.php");
include_once("./includes/db.php");
//-------------------------------------------------------------------------------------------
	
	//THE FOLLOWING CODE PREVENTS THE SQL INJECTION BY USING A SIMPLE PRACTICE OF ESCAPING STRINGS TO BE USED AS QUERY VARIABLES
	$role = $conn->real_escape_string($_GET['role']);
	$sql="SELECT * FROM student_info where role = '".$role."'";
	
	$result = $conn->query($sql);
	
	while ($row = $result->fetch_assoc()){
	  $data_array[] = $row;
	}
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
	<h2>Test Case 3</h2>
	
	<?php
	if ($result->num_rows > 0) {
		foreach($data_array as $row){
			?>
			<table>
				<?php if($row['role'] == 'student'){?>
					<tr><th colspan="5">Student Information</th></tr>
				<?php }else{ ?>
					<tr><th colspan="4">Teacher Information</th></tr>
				<?php } ?>
				<tr>
					<th>Id</th>
					<th>Name</th>
					<th>Phone</th>
					<th>Course</th>
					<?php if($row['role'] == 'student'){?>
						<th>GPA</th>
					<?php } ?>
				</tr>
			<tr>
				<td><?php print $row["person_id"]; ?></td>
				<td><?php print $row["person_name"]; ?></td>
				<td><?php print $row["person_phone"]; ?></td>
				<td><?php print $row["person_class"]; ?></td>
				<?php if($row['role'] == 'student'){?>
					<td><?php print $row["person_gpa"]; ?></td>
				<?php } ?>
			</tr>
			</table> 
			<br>
			<br>
			<?php
		}
	}
	else {
		?>
		<table>
			<tr>
				<td colspan="5">No Results</td>
			</tr>
		</table>
		<?php
	}
	?>
	<?php
	print "<br><br>SQL Statemet: ".$sql;
	print "<br>Query Variable: ".$role;
	
	$conn->close();
	?>
</body>
</html>
