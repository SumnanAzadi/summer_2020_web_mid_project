<?php
require_once('config.php');
session_start();
$error = array("");
if($_SERVER["REQUEST_METHOD"] == "POST") {
	$target = './'.basename($_FILES['pic']['name']);
	$image = $_FILES['pic']['name'];
	picUpdate($_SESSION['name'], $image);
	if(move_uploaded_file($_FILES['pic']['tmp_name'], $target)){
		array_push($error,"Successfully Updated");
	}else{
		array_push($error,"Somethiong went wrong");
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>CHANGE PICTURE</title>
</head>
<body>
	<table border="1" width="70%" height ="350px" align="center">
		<tr>
			<td>
				<h2>Donation</h2>
			</td>
			<td align="center">
				<a href="dash.php">Dashboard</a> |  <a href="View Profile.php">View Profile</a> | Logged in as <?php echo $_SESSION['name'] ?> | <a href="logout.php">Logout</a>
			</td>
		</tr>
		<tr>
			<td></td>
			<td>
				<table>
					<tr>
						<td colspan="2" align="middle">
							<?php if(!empty($error)){
									foreach ($error as $err) {
										echo "$err <br>" ;
									}
								}
							?>
						</td>
					</tr>
				</table>
				<fieldset>
					<legend>PROFILE PICTURE</legend>
					<?php
					$data =single_user($_SESSION['name']);
					$rows = mysqli_fetch_assoc($data);
					$image= $rows['pic'];
					echo "<img src='".$image."' width='100px' height='100px'>";
					?>
					<form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>" enctype="multipart/form-data">
						<br>
						<input type="file" name="pic">
						<hr>
						<input type="submit" name="submit" value="Submit">
					</form>	
				</fieldset>
			</td>
		</tr>
	</table>
</body>
</html>