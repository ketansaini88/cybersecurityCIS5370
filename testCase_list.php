<?php

include_once("./includes/header.php");
include_once("./includes/db.php");
//-------------------------------------------------------------------------------------------
	$sql = "SELECT *  FROM student_info";
	$result = $conn->query($sql);
	
	while ($row = $result->fetch_assoc()){
	  $data_array[] = $row;
	}
	
	$ciphering = "AES-128-CTR";
	$iv_length = openssl_cipher_iv_length($ciphering);
	$options = 0;
	$iv = '1234567891011121';
	$key = "ketan0911";
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
	<h2>Test Case 1</h2>
	<table>
		<tr>
			<td>
				Case
			</td>
			<td>
				<a href="testCase1.php?Id=1" target="_blank">testCase1.php?Id=1</a>
				<br><br>
				<a href="testCase1.php?Id=2" target="_blank">testCase1.php?Id=2</a>
			</td>
			<td>
				<a href="preventCase1.php?Id=1" target="_blank">preventCase1.php?Id=1</a>
				<br><br>
				<a href="preventCase1.php?Id=2" target="_blank">preventCase1.php?Id=2</a>
			</td>
		<tr>
	</table>
	
	
	<h2>Test Case 2</h2>
	<table>
		<tr>
			<td>
				Case
			</td>
			<td>
				<a href="person_list.php" target="_blank">person_list.php</a>
			</td>
		<tr>
	</table>


	<h2>Test Case 3</h2>	
	<table>
		<tr>
			<td>
				Case
			</td>
			<td>
				<a href="testCase3.php?role=student" target="_blank">testCase3.php?role=student</a>
				<br><br>
				<a href="testCase3.php?role=student'+OR+1='1" target="_blank">testCase3.php?role=student'+OR+1='1</a>
			</td>
			<td>
				<a href="preventCase3.php?role=student'+OR+1='1" target="_blank">preventCase3.php?role=student'+OR+1='1</a>
			</td>
		<tr>
	</table>
	
	
	<h2>Test Case 4</h2>	
	<table>
		<tr>
			<td>
				Case
			</td>
			<td>
				<a href="testCase4.php" target="_blank">testCase4.php</a>
			</td>
			<td>
				<a href="preventCase4.php" target="_blank">preventCase4.php</a>
			</td>
		<tr>
	</table>
</body>
</html>

<?php
	$conn->close();
?>
