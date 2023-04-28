<?php

include_once("./includes/header.php");
include_once("./includes/db.php");
//-------------------------------------------------------------------------------------------
	
	if(count($_GET) > 0){
		$data = $_GET;
	}
	else if(count($_POST) > 0){
		$data = $_POST;
	}
	else{
		$data = [];
	}
	
	$sql_param = "";
	
	if (isset($data['field1']) && strlen($data['field1']) > 0){
		$sql_param .= " and person_name like '%".$data['field1']."%'";
	}
	
	if (isset($data['field2']) && strlen($data['field2']) > 0){
		$sql_param .= " and person_class like '%".$data['field2']."%'";
	}

	$sql="SELECT * FROM student_info where 1=1 $sql_param";
	$result = $conn->query($sql);
	
	while ($row = $result->fetch_assoc()){
	  $data_array[] = $row;
	}
?>
	
<!DOCTYPE html>
<html>

<head>
	<title>Vulnerabilities & Preventive Measures</title>
	
	<link rel="stylesheet" href="./styles.css">
</head>

<body>
	<h1 class="text-center">Vulnerabilities & Preventive Measures For Web Application Design</h1>
	
	<?php
	if(isset($_SESSION['USERNAME']) && strlen($_SESSION['USERNAME']) > 0){
		?><p>Logged User: <?php print $_SESSION['USERNAME'];?>&nbsp;&nbsp;<a href="logout.php">logout</a></p><?php	
	}
	?>
	<h2>Test Case 4</h2>
	
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
	$conn->close();
	?>
</body>
</html>
