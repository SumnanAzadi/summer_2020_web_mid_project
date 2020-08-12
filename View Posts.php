<?php 
require_once('config.php');
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>VIEW YOUR POST</title>
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
				<table width="100%">
					<td width="50%">
						<p><a href="Edit Posts.php">Edit this post</a></p>
					</td>
					<td width="50%" align="right">
						<p><a href="Delete.php">Delete this post</a></p>
					</td>
				</table>
				<p><STRONG>Donation Name:</STRONG></p>
				<p>Consectetur adipiscing elit. Morbi tincidunt metus.</p>
				<p><STRONG>Description:</STRONG></p>
				<p>consectetur adipiscing elit. Morbi tincidunt metus et quam molestie varius. Nulla id malesuada mauris, sit amet facilisis augue. Nullam sodales risus a nisl volutpat, id sagittis tellus maximus. Cras id ligula pellentesque, suscipit tortor eu, dictum quam. Integer vitae purus aliquet, tempor eros ut, cursus ipsum. Sed feugiat lectus odio, sit amet luctus nunc commodo eu. Phasellus vel congue arcu, at semper diam. Quisque elementum neque a malesuada malesuada. </p>
				<p><STRONG>Documents:</STRONG></p>
				<img src="documents.png" width="200px" height="200px"><img src="documents-01.png" width="200px" height="200px"><img src="documents-02.png" width="200px" height="200px">
				<p><STRONG>Budgets:</STRONG></p>
				<p>20,000 TK.</p>
				<p><STRONG>Donation till now:</STRONG></p>
				<p>12,000 TK.</p>
			</td>
		</tr>
	</table>
</body>
</html>