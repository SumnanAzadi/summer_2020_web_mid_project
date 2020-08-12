<?php

require_once('config.php');

$error = array("");

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $pass = $_POST["pass"];
    $conpass = $_POST["conpass"];
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

    $data =single_user($name);
	if(mysqli_num_rows($data) >0){
		array_push($error, "Name already existed,You may want to login!!!");
	}

    //email validation
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		array_push($error,"Invalid Email Address");
	}
	//password validation
	if (strlen($pass) < 3 && strlen($conpass) < 3) {
		array_push($error,"Password has to be bigger than 3 characters");
	}
	if($pass !== $conpass){
		array_push($error,"Password has to match");
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
		$image = $_FILES['pic']['name'];
		$status = register($name, $email, $pass, $gender, $dob);
		if($status){
			header('location: login.php');
		}else{
			header('location: reg.php');
		}
	}
}else{

}

?>

<!DOCTYPE html>
<html>
<head>
	<title>REGISTRATION PAGE</title>
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
				<form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
					<fieldset>
						<legend>REGISTRATION</legend>
						<form method="POST">
							<table>
								<tr>
									<td>Name</td>
									<td>:<input type="text" name="name" ></td>
								</tr>
								<tr><td colspan="2"><hr></td></tr>
								<tr>
									<td>Email</td>
									<td>:<input type="text" name="email" ></td>
								</tr>
								<tr><td colspan="2"><hr></td></tr>
								<tr><td colspan="2"><hr></td></tr>
								<tr>
									<td>Password</td>
									<td>:<input type="Password" name="pass" ></td>
								</tr>
								<tr><td colspan="2"><hr></td></tr>
								<tr>
									<td>Confirm Password
									</td>
									<td>:<input type="Password" name="conpass" >
									</td>
								</tr>
								<tr><td colspan="2"><hr></td></tr>
								<tr>
									<td colspan="2">
										<fieldset>
											<legend>Gender</legend>
											<input type="radio" name="gender" value="Male" >Male
											<input type="radio" name="gender" value="Female" >Female
											<input type="radio" name="gender" value="Other" >Other
										</fieldset>
										<hr>
									</td>
								</tr>
								<tr>
									<td colspan="2">
										<fieldset>
											<legend>Date of Birth</legend>
											<input type="Date" name="dob" >
										</fieldset>
										<hr>
									</td>
								</tr>
								<tr>
									<td colspan="2">
										<fieldset>
											<legend>Profile Picture:</legend>
											<input type="file" name="pic" >
										</fieldset>
										<hr>
									</td>
								</tr>
								<tr>
									<td>
										<input type="submit" name="submit" value="Submit">
										<a href="login.php">Login</a>
									</td>
								</tr>
							</table>
						</form>
					</fieldset>
				</form>
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