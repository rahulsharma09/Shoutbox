
<?php include 'database.php'; ?>

<?php 

//create select query
$con = OpenCon();
$query = "select * from shouts";
$shouts = mysqli_query($con,$query);

?>

<!DOCTYPE html>
<html>
<head>
	<title>Shout Box</title>

	<link rel="stylesheet" type="text/css" href="css/style.css">

	 <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> 

	 <style>
	 	body{
	 		margin: 0px;
	 	}

	 </style>

</head>
<body>
		<div class="w3-card-4 w3-display-container w3-dark-gray w3-red maincont">

			<h1 class="w3-center w3-blue w3-container">Shout It!</h1>

			<ul class="w3-card-4 w3-light-gray shouts">

				<?php while($row = mysqli_fetch_assoc($shouts)) :?>

					<li class="w3-large"><span><?php echo $row['time'] ?> - </span> <b><i><?php echo $row['user'] ?></i></b> : <?php echo $row['message'] ?>  </li><hr class="w3-border-black">



			<?php endwhile; ?>


				
			</ul>

			<div id = "input">
				<?php if(isset($_GET['error'])) : ?>
					<div class="w3-red"><?php echo $_GET['error']; ?></div>

				<?php endif; ?>
				
				<form class="w3-center" method="post" action="process.php">

					<input class="w3-center" id="name" type="text" name="user" placeholder="Enter your name">

					<input class="w3-center" id="message" type="text" name="message" placeholder="Enter your message"><br/><br/>

					<button class="w3-xlarge w3-button w3-hover-light-green w3-round-xlarge w3-panel w3-green" type="submit" name="submit"> 
							Shout
					</button>


					<button class="w3-xlarge w3-button w3-hover-red-green w3-round-xlarge w3-panel w3-red" type="submit" name="delete"> 
							Delete Shouts
					</button>

				</form>

			</div>
</body>
</html>