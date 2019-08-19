<?php
	 include('loginscript.php');
	if (isset($_SESSION['login_user'])){
		if($_SESSION['login_user'] == "admin"){
			header("location: admin.html");

		} else {
			header("location: index.html");

		}
		
	}
?>

<!DOCTYPE html>
<html>
	<head>
			<title>Login | Northcote College Leavers Jerseys 2017</title>
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
			<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
			<link rel="stylesheet" href="style.css">
		</head>
	<body>
		<form action="" method="post">
			<div class="form-group">
			<h1 class="txtcntr">Log In</h1>
				<label for="username">Username:		</label>
				<input type="text" class="form-control" id="username" name="username">

				<label for ="password">Password:	</label>
				<input type="password" class="form-control" id="password" name="pwd">
				
				<input class="button" type="submit" value="Login" name="submit"></button>

			<form>
				<input class="button" type="button" value="Back" onclick="window.location.href='index.html'" />
			</form>

			</div>
			<span><?php echo $error; ?></span>
		</form>

	</body>
</html>