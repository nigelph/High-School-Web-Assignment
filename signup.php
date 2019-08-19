<?php
if (isset($_POST['submit'])){
	if (empty($_POST['username']) || empty($_POST['pwd'])) {	
			$error="Username or Password is empty";
		}else{

	$servername ="localhost";
	$username = "13095";
	$password = "0kgknY7fhK12aF54";
	$dbname = "13095";

	$newusername=$_POST ['username'];
	$newpassword=$_POST ['pwd'];

	$connection = new mysqli($servername, $username, $password, $dbname);


	if($connection->connect_error) {
		die("Connection Failed: " . $connection->connect_error);
	}

	$sql_query = "INSERT INTO Login_Info (dbUsername, dbPassword) VALUES ('$newusername', '$newpassword')";

	if ($connection->query($sql_query)){
		echo "New record created";		
	}else{
		echo "Error:" . $sql_query . "<br>" . $connection->error;
	}

	$connection->close();
}
}
?>

<!DOCTYPE html>
<html>
	<head>
			<title>Sign Up | Northcote College Leavers Jerseys 2017</title>

			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
				<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
				<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
				<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>

			<meta charset="utf-8">

			<link rel="stylesheet" href="style.css">

		</head>
	<body>
		<form action="" method="post">
			<div class="form-group">
			<h1 class="txtcntr">Sign Up</h1>
				<label for="username">Username:		</label>
				<input type="text" class="form-control" id="username" name="username">

				<label for ="password">Password:	</label>
				<input type="password" class="form-control" id="password" name="pwd">

				<input class="button" type="submit" value="Sign Up" name="submit"></button>

<!--http://www.hyperlinkcode.com/button-links.php! (Button Code)-->
			<form>
				<input class="button" type="button" value="Back" onclick="window.location.href='index.html'" />
				
			</form>
							
			</div>
			
		</form>
	</body>
</html>