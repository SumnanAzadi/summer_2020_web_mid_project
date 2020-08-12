<?php
require_once('config.php');
$error = array("");
if($_SERVER["REQUEST_METHOD"] == "POST"){

	$name = $_POST['name'];
	$pass = $_POST['pass'];

	if(empty($name) == true || empty($pass) == true){
		array_push($error, "Input Your ID and PASSWORD");
	}else{

		$count = validate($name, $pass);

		if($count){
			
			$_SESSION['name'] = $name;
			$_SESSION['pass'] = $pass;

			setcookie("name", $name, time()+3600, "/");
			header('location: dash.php');

		}else{
			array_push($error, "invalid username/password");
		}
	}
	}else{

}

?>
<!DOCTYPE html>
<html>
<head>
	<title>LOGIN PAGE</title>
</head>
<body>
	<table border="1" width="70%" height ="350px" align="center">
		<tr>
			<td>
				<h2>Donation</h2>
			</td>
			<td align="right">
				<a href="index.php">Home</a>|
				<a href="login.php">Login</a>|
				<a href="reg.php">Registration</a>
			</td>
		</tr>
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
		<tr>
			<td colspan="2">
				<fieldset>
					<legend>LOGIN</legend>
					<form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
						<table>
							<tr>
								<td>User Name</td>
								<td>:<input type="text" name="name"></td>
							</tr>
							<tr>
								<td>Password</td>
								<td>:<input type="Password" name="pass"></td>
							</tr>

							<tr><td colspan="2"><hr></td></tr>	

							<tr>
								<td colspan="2">
									<input type="checkbox" name="opt" value="Remember Password">Remember Password
								</td>
							</tr>
							<tr>
								<td colspan="2">
									<input type="submit" name="submit" value="Submit">
									<a href="reg.php">Registration</a>
								</td>
							</tr>
						</table>
					</form>
				</fieldset>
			</td>
		</tr>
		<tr>
			<td colspan="2" align="center">
				Copyright &copy; 2020
			</td>
		</tr>
	</table>
</body>
</html>