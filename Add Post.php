<?php 
require_once('config.php');
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>PUBLIC HOME</title>
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
					<legend>ADD NEW POST</legend>
					<form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
						<table>
							<tr>
								<td>Name</td>
								<td>:<input type="text" name="name"></td>
							</tr>

							<tr><td colspan="2"></td></tr>

							<tr>
								<td>Description</td>
								<td>:<textarea name="desc" rows="4" cols="30"></textarea></td>
							</tr>
							<tr><td colspan="2"></td></tr>
							<tr>
								<td>Budget</td>
								<td>:<input type="text" name="budget"></td>
							</tr>
							<tr>
								<td>Documents 01</td>
								<td>:<input type="file" name="name"></td>
							</tr>
							<tr>
								<td>Documents 02</td>
								<td>:<input type="file" name="name"></td>
							</tr>
							<tr>
								<td>Documents 03</td>
								<td>:<input type="file" name="name"></td>
							</tr>

							<tr><td colspan="3"><hr></td></tr>
							<tr>
								<td colspan="3">
									<input type="submit" name="submit" value="Submit">
								</td>
							</tr>
						</table>
					</form>
				</fieldset>
			</td>
		</tr>
	</table>
</body>
</html>