<?php 
require_once('config.php');
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>DELETE</title>
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
				<h2>Are you sure,You want to Delete it?</h2>
				<button><a href="dash.php">Yes</a></button>
				<button><a href="View Posts.php">No</a></button>
			</td>
		</tr>
	</table>
</body>
</html>