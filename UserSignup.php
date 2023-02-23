<?php
session_start();

include("Connection.php");


if ($_SERVER['REQUEST_METHOD'] == "POST") {

	$username = $_POST['username'];
	$password = $_POST['password'];


	$query1 = "select * from user where username = '$username' limit 1";
	$result = mysqli_query($con, $query1);
	$isValid = false;
	if ($result) {
		if ($result && mysqli_num_rows($result) === 0) {
			$isValid = true;
		} else {
			echo "Username is taken, try again";

		}
	}




	if (!empty($username) && !empty($password) && !is_numeric($username) && $isValid === true) {

		$query2 = "insert into user (username,password) values ('$username','$password')";

		mysqli_query($con, $query2);

		header("Location: UserLogin.php");
		die;
	} else {
		echo "Please enter some valid information!";
	}




}
?>


<!DOCTYPE html>
<html>

<head>
	<title>Signup</title>
	<style>
		* {
			margin: 0;
			padding: 0;
		}

		.page {
			background-color: #439A97;
			height: 100vh;
			display: flex;
			align-items: center;
			justify-content: center;
		}

		#text {

			height: 25px;
			border-radius: 5px;
			padding: 4px;
			border: solid thin #aaa;
			width: 100%;
		}

		#button {

			padding: 10px;
			width: 100px;
			color: white;
			background-color: #22A39F;
			border: none;
		}

		#box {

			background-color: #2B3A55;
			/* margin: auto; */
			width: 250px;
			box-shadow: 1px 1px 30px #434242;
			height: 300px;
			padding: 80px;
		}

		a:link {
			color: green;
			background-color: transparent;
			text-decoration: none;
		}

		a:visited {
			color: pink;
			background-color: transparent;
			text-decoration: none;
		}

		a:hover {
			color: red;
			background-color: transparent;
			text-decoration: underline;
		}

		a:active {
			color: yellow;
			background-color: transparent;
			text-decoration: underline;
		}
	</style>
</head>

<body>


	<div class="page">
		<div id="box">

			<form method="post">
				<div style="font-size: 20px;margin: 10px;color: white;">Signup</div>

				<input id="text" type="text" name="username"><br><br>
				<input id="text" type="password" name="password"><br><br>

				<input id="button" type="submit" value="Signup"><br><br>

				<a href="UserLogin.php">Click to Login</a><br><br>
			</form>
		</div>
	</div>
</body>

</html>