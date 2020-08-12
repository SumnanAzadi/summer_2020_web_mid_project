<?php 
require_once('config.php');
session_start();
$error = array("");

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $dob = $_POST["dob"];

    //name Validation
    $name_array = str_split($name);
    if(strlen($name) < 2){
    	array_push($error,"Name has to be at least 2 characters");
	}
	$characters = array('a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z','A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z',' ','.','-');
	foreach($name_array as $value) {
        if(!in_array($value, $characters)){
        	array_push($error, $value."is not accepted character in name");
        }
    }
    if($name_array[0] == '.' || $name_array[0] == ' ' || $name_array[0] == '-'){
    	array_push($error, "name has to start with a letter");
    }

    //email validation
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		array_push($error,"Invalid Email Address");
	}
	//gender validation
	if(!isset($_POST["gender"])){
		array_push($error,"Please select a gender");
	}
	//DOB validation
	function validateDate($date, $format = 'Y-m-d'){
    	$d = DateTime::createFromFormat($format, $date);
    	return $d && $d->format($format) === $date;
	}
	if(!validateDate($dob, 'Y-m-d')){
		array_push($error,"Please select your date of birth");
	}
	else{
		$gender = $_POST["gender"];
		$status = userUpdate($_SESSION['name'], $name, $email, $gender, $dob);
		if($status){
			header('location: logout.php');
		}else{
			header('location: Edit Profile.php');
		}
	}
}else{

}
?>
<!DOCTYPE html>
<html>
<head>
	<title>EDIT YOUR PROFILE</title>
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
					<legend>EDIT PROFILE</legend>
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
					<form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
						<table>
							<tr>
								<td>Name</td>
								<td>:<input type="text" name="name" value="<?php echo $_SESSION['name']?>"></td>
							</tr>

							<tr><td colspan="2"></td></tr>

							<tr>
								<td>Email</td>
								<td>:<input type="text" name="email" value="<?php echo $_SESSION['email']?>"></td>
							</tr>
							<tr><td colspan="2"></td></tr>
							<tr>
								<td>Gender</td>
								<td>
									:<input type="radio" name="gender" value="Male" <?php if($_SESSION['gender']== 'Male'){echo "checked";}?>>Male
									<input type="radio" name="gender" value="Female" <?php if($_SESSION['gender']== 'Female'){echo "checked";}?>>Female
									<input type="radio" name="gender" value="Other" <?php if($_SESSION['gender']== 'Other'){echo "checked";}?>>Other
								</td>
							</tr>
							<tr><td colspan="2"></td></tr>
							<tr>
								<td>Date of Birth</td>
								<td>:<input type="Date" name="dob" value="<?php echo $_SESSION['dob']?>"></td>
							</tr>

							<tr><td colspan="3"><hr></td></tr>

							<tr>
								<td colspan="3">
									<input type="submit" name="submit" value="Submit">
									<a href="Change Password.php">Change Password</a>
									<a href="Change Profile Picture.php">Change Profile Picture</a>
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