<?php
function getConnection(){
		$conn =mysqli_connect('localhost', 'root', '','mid_exam');
		return $conn;
	}

function register($name, $email, $pass, $gender, $dob){

	$conn = getConnection();
	$sql = "INSERT INTO users VALUES('', '{$name}','{$email}', '{$pass}', '{$gender}', '{$dob}', 0";

	if(mysqli_query($conn, $sql)){
		return true;
	}else{
		return false;
	}

}

function validate($name, $pass){

	$conn = getConnection();
	
	$sql = "SELECT * FROM users WHERE name='{$name}' AND pass='{$pass}'";

	$result = mysqli_query($conn, $sql);
	$user = mysqli_fetch_assoc($result);
	return $user;
}

function single_user($name){
	$conn = getConnection();
	$sql = "SELECT * FROM users WHERE name='{$name}'";
	$result = mysqli_query($conn,$sql);
	return $result;
}

function userUpdate($session_name, $name, $email, $gender, $dob){
	$conn = getConnection();
	$sql = "UPDATE users SET name='{$name}', email = '{$email}', gender = '{$gender}', dob = '{$dob}' WHERE name = '{$session_name}'";
	if(mysqli_query($conn, $sql)){
		return true;
	}else{
		return false;
	}
}
function passUpdate($name,$pass){
	$conn = getConnection();
	$sql = "UPDATE users SET pass='{$pass}' WHERE name = '{$name}'";
	if(mysqli_query($conn, $sql)){
		return true;
	}else{
		return false;
	}
}
function picUpdate($name,$pic){
	$conn = getConnection();
	$sql = "UPDATE users SET pic='{$pic}' WHERE name = '{$name}'";
	mysqli_query($conn, $sql);
}
