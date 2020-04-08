<?php 

include 'database.php';

//check if form is submitted

$con = OpenCon();

if(isset($_POST['submit'])){

	$user = mysqli_real_escape_string($con , $_POST['user']);
	$message = mysqli_real_escape_string($con , $_POST['message']);

	// set the timezone

	date_default_timezone_set('America/New_York');
	$time = date('h:i:s a',time());


	if(!isset($user) || $user == '' || !isset($message) || $message == ''){

		$error = "Please fill your name and message!";
		header("Location : index.php?error = ".urlencode($error));

		exit();

	}

	else{

		$query = "insert into shouts (user,message,time)
					values('$user','$message','$time')";

		if(!mysqli_query($con,$query)){

			die('Error!');

		}

		else{

			header("Location : index.php");
			exit();

		}

	}


}


if(isset($_POST['delete'])){
	$query = "delete from shouts";

	if(!mysqli_query($con,$query)){

			die('Error!');

		}

		else{

			header("Location : index.php");
			exit();

		}
}


?>