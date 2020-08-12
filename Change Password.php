<?php 
require_once('config.php');
session_start();
$error = array("");
if($_SERVER["REQUEST_METHOD"] == "POST") {
	$oldpass = $_POST["oldpass"];
    $pass = $_POST["pass"];
    $conpass = $_POST["conpass"];

    $data =single_user($_SESSION['name']);
	$rows = mysqli_fetch_assoc($data);
	$pa_ss= $rows['pass'];

	if (strlen($pass) < 3 && strlen($conpass) < 3) {
		array_push($error,"Password has to be bigger than 3 characters");
	}
	if($oldpass !== $pa_ss ){
		array_push($error,"Put your Current Password");
	}
	if($pass !== $conpass){
		array_push($error,"Password has to match");
	}
	else{
		$status = passUpdate($_SESSION['name'],$pass);
		if($status){
			header('location: Change Password.php');
		}else{
			header('location: Change Password.php');
		}
	}
}else{

}
?>
<!DOCTYPE html>
<html>
<head>
	<title>CHANGE PASSWORD</title>
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
				<fieldset>
					<legend>CHANGE PASSWORD</legend>
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
					<table>
						<form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
							<tr>
								<td><font color="Red"> Current Password </font></td>
								<td>:<input type="text" name="oldpass" value="<?php echo $_SESSION['pass'] ?>"></td>
							</tr>
							<tr>
								<td>New Password</td>
								<td>:<input type="Password" name="pass"></td>
							</tr>
							<tr>
								<td>Retype New Password</td>
								<td>:<input type="Password" name="conpass"></td>
							</tr>
							<tr><td colspan="2"><hr></td></tr>
							<tr>
								<td colspan="2">
									<input type="submit" name="submit" value="Submit">
								</td>
							</tr>
						</form>
					</table>
				</fieldset>
			</td>
		</tr>
	</table>
</body>
</html>