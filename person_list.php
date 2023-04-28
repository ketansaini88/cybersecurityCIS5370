<?php

include_once("./includes/header.php");
include_once("./includes/db.php");
//-------------------------------------------------------------------------------------------

	$sql = "SELECT *  FROM student_info";
	$result = $conn->query($sql);

	while ($row = $result->fetch_assoc()){
	  $data_array[] = $row;
	}
	
	//THE FOLLOWING CODE IS USED TO ENCRYPT THE PARAMETERS TO BE SENT IN THE URL
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
	<h2>Test Case 2</h2>
	
	<table>
		<tr><th colspan="4">Person List</th></tr>
		<tr>
			<th>Id</th>
			<th>Name</th>
			<th>View Details</th>
		</tr>
		<?php
		if ($result->num_rows > 0) {
			foreach($data_array as $row){
				?>
				<tr>
					<td><?php print $row["person_id"]; ?></td>
					<td><?php print $row["person_name"]; ?></td>
					<td>
						<a target="_blank" href="./testCase2.php?name=<?php print $row["person_name"]; ?>">Insecure Link</a>
						<br>
						<a target="_blank" href="./preventCase2.php?param=<?php print openssl_encrypt("name=".$row["person_name"], $ciphering, $key, $options, $iv); ?>">Secure Link</a>
					</td>
				</tr>
				<?php
			}
		}
		else {
			?>
			<tr>
				<td colspan="4">No Results</td>
			</tr>
			<?php
		}
		?>
	</table>
</body>
</html>

<?php
	$conn->close();
?>
