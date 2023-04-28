<?php

include_once("./includes/header.php");
include_once("./includes/db.php");
//-------------------------------------------------------------------------------------------	
	$ciphering = "AES-128-CTR";
	$iv_length = openssl_cipher_iv_length($ciphering);
	$options = 0;
	$iv = '1234567891011121';
	$key = "ketan0911";

	$param_url = explode('=', openssl_decrypt($_GET['param'], $ciphering, $key, $options, $iv));
	
	$sql = "SELECT *  FROM student_info where person_name = '".$param_url[1]."'";
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
	<h2>Test Case 2</h2>
	
	<table>
		<?php if($data_array[0]['role'] == 'student'){?>
			<tr><th colspan="5">Student Information</th></tr>
		<?php }else{ ?>
			<tr><th colspan="4">Teacher Information</th></tr>
		<?php } ?>
		<tr>
			<th>Id</th>
			<th>Name</th>
			<th>Phone</th>
			<th>Course</th>
			<?php if($data_array[0]['role'] == 'student'){?>
				<th>GPA</th>
			<?php } ?>
		</tr>
		<?php
		if ($result->num_rows > 0) {
			foreach($data_array as $row){
				?>
				<tr>
					<td><?php print $row["person_id"]; ?></td>
					<td><?php print $row["person_name"]; ?></td>
					<td><?php print $row["person_phone"]; ?></td>
					<td><?php print $row["person_class"]; ?></td>
					<?php if($data_array[0]['role'] == 'student'){?>
						<td><?php print $row["person_gpa"]; ?></td>
					<?php } ?>
				</tr>
				<?php
			}
		}
		else {
			?>
			<tr>
				<td colspan="5">No Results</td>
			</tr>
			<?php
		}
		?>
	</table> 

	<?php
	$conn->close();
	?>
</body>
</html>
