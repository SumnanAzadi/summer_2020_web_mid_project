<?php 
require_once('config.php');
session_start();
if(isset($_COOKIE['name'])){
	$data =single_user($_COOKIE['name']);
	$rows = mysqli_fetch_assoc($data);
	$_SESSION['name'] = $rows['name'];
	$_SESSION['email'] = $rows['email'];
	$_SESSION['gender'] = $rows['gender'];
	$_SESSION['dob'] = $rows['dob'];
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>USER PROFILE</title>
</head>
<body>
	<table border="1" width="70%" height ="350px" align="center">
		<tr>
			<td>
				<h2>Donation</h2>
			</td>
			<td align="center">
				<a href="dash.php">Dashboard</a> |  <a href="View Profile.php">View Profile</a> | Logged in as <?= $_COOKIE['name'] ?> | <a href="logout.php">Logout</a>
			</td>
		</tr>
		<tr>
			<td></td>
			<td>
				<fieldset>
					<legend>YOUR PROFILE</legend>
					<table>
						<tr>
							<td>Name</td>
							<td>:<?php echo $_SESSION['name']?></td>
							<td rowspan="4" align="center">
								
							</td>
						</tr>
						<tr>
							<td>Email</td>
							<td>:<?php echo $_SESSION['email']?></td>
						</tr>
						<tr>
							<td>Gender</td>
							<td>:<?php echo $_SESSION['gender']?></td>
						</tr>
						<tr>
							<td>Date of Birth</td>
							<td>:<?php echo $_SESSION['dob']?></td>
						</tr>
						<tr>
							<td>Profile Picture:</td>
							<td colspan="3">
								<?php
									$data =single_user($_SESSION['name']);
									$rows = mysqli_fetch_assoc($data);
									$image= $rows['pic'];
									echo "<img src='".$image."' width='100px' height='100px'>";
								?>
							</td>
						</tr>
						<tr><td colspan="3"><hr></td></tr>
						<tr>
							<td colspan="3">
								<a href="Edit Profile.php">Edit Profile</a>
							</td>
						</tr>
					</table>
				</fieldset>
			</td>
		</tr>
	</table>
</body>
</html>