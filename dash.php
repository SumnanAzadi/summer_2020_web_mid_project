<?php 
if(isset($_COOKIE['name']))
?>

<!DOCTYPE html>
<html>
<head>
	<title>DASHBOARD</title>
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
			<td align="center">
				<table width="100%">
					<td width="50%">
						<p><a href="Add Post.php">Add new Post</a></p>
					</td>
				</table>
				<table width="100%">
					<td>
						<input type="text" name="search" placeholder="Search...">
						<button><a href="dash.php">Search</a></button>
					</td>
				</table>
				<h3>Lorem ipsum dolor sit amet</h3>
				<p>consectetur adipiscing elit. Morbi tincidunt metus et quam molestie varius. Nulla id malesuada mauris, sit amet facilisis augue. Nullam sodales risus a nisl volutpat, id sagittis tellus maximus. Cras id ligula pellentesque, suscipit tortor eu, dictum quam. Integer vitae purus aliquet, tempor eros ut, cursus ipsum. . .<a href="View Posts.php">View Post</a> </p>
				<h3>Morbi euismod orci non tincidunt elementum</h3>
				<p>Sed pretium pellentesque dolor, non efficitur nisl congue nec. Etiam imperdiet quis justo ut pellentesque. Sed mattis ultricies orci vel condimentum. Nulla vulputate ipsum eu justo sodales ornare. Ut blandit sagittis ligula a mollis. Morbi suscipit sem nisl, quis tincidunt odio vehicula eu. Sed eget sapien ex. . . .<a href="View Posts.php">View Post</a> </p>
				<h3>Lorem ipsum dolor sit amet</h3>
				<p>consectetur adipiscing elit. Morbi tincidunt metus et quam molestie varius. Nulla id malesuada mauris, sit amet facilisis augue. Nullam sodales risus a nisl volutpat, id sagittis tellus maximus. Cras id ligula pellentesque, suscipit tortor eu, dictum quam. Integer vitae purus aliquet, tempor eros ut, cursus ipsum. . .<a href="View Posts.php">View Post</a> </p>
				<h3>Mauris at venenatis velit. Quisque id purus</h3>
				<p>Suspendisse eget congue ante, pretium finibus nulla. Mauris posuere pellentesque condimentum. Fusce sit amet odio mattis, mollis elit eget, iaculis tellus. Aliquam nec nulla semper tortor blandit gravida. Nulla posuere neque vitae orci ullamcorper molestie vel nec mi. Morbi id eros dapibus, vestibulum eros at, maximus justo. . . .<a href="View Posts.php">View Post</a> </p>
			</td>
		</tr>
	</table>
</body>
</html>