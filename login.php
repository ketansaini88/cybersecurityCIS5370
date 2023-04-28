<?php

include_once("./includes/db.php");

//-------------------------------------------------------------------------------------------	
	if(isset($_POST['username']) && strlen($_POST['username']) > 0 && isset($_POST['password']) && strlen($_POST['password'])){
		
		if (isset($data['field1']) && strlen($data['field1']) > 0){
			$sql_param .= " and person_name like '%".$data['field1']."%'";
		}
		
		if (isset($data['field2']) && strlen($data['field2']) > 0){
			$sql_param .= " and person_class like '%".$data['field2']."%'";
		}

		$sql="SELECT * FROM login_users where username = '".$_POST['username']."' and password = '".$_POST['password']."'";
		$result = $conn->query($sql);
		
		while ($row = $result->fetch_assoc()){
		  $data_array[] = $row;
		}
		
		if(count($data_array) > 0){
			session_start();
			
			$_SESSION['USERNAME'] = $data_array[0]['username'];
			$_SESSION['ROLE'] = $data_array[0]['role'];
			
			header ("Location: testCase_list.php");
		}
	}
?>
	
<!DOCTYPE html>
<html>

<head>
	<title>Vulnerabilities & Preventive Measures</title>
	
	<link rel="stylesheet" href="./styles.css?">
</head>

<body>
	<h1 class="text-center">Vulnerabilities & Preventive Measures For Web Application Design</h1>
	
	<?php
	if(isset($_SESSION['USERNAME']) && strlen($_SESSION['USERNAME']) > 0){
		?><p>Logged User: <?php print $_SESSION['USERNAME'];?>&nbsp;&nbsp;<a href="logout.php">logout</a></p><?php	
	}
	?>
		
	<form name="search" id="search" method="POST" action="" target="">
		<table class="mg-auto">
			<tr>
				<td colspan="2" style="text-align:center;">Login</td>
			</tr>
			<tr>
				<td>Username</td>
				<td><input type="text" name="username" id="username"/></td>
			</tr>
			<tr>
				<td>Password</td>
				<td><input type="text" name="password" id="password" /></td>
			</tr>
			<tr>
				<td colspan="2"><input type="submit" value="Submit" /></td>
			</tr>
		</table>
	</form>
	
	<?php
	if(isset($_SESSION['USERNAME']) && strlen($_SESSION['USERNAME']) > 0){
		?><p><a href="testCase_list.php">Test Cases List</a></p><?php	
	}
	?>
	
	<?php
	$conn->close();
	?>
</body>
</html>
