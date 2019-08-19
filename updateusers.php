<?php
$error = "";
	if (isset($_POST['submit'])){
		if (empty($_POST['UpdateID']) || empty($_POST['UpdateUsername']) || empty($_POST['UpdatePassword'])) {	
			$error="Please fill in all rows";
		}else{
		
			$servername = "localhost";
			$username = "13095";
			$password = "0kgknY7fhK12aF54";
			$dbname = "13095";

			$updateID = $_POST['UpdateID'];
			$updateUsername = $_POST['UpdateUsername'];
			$updatePassword = $_POST['UpdatePassword'];

			$connection = new mysqli ($servername, $username, $password, $dbname);

			if($connection->connect_error) {
				die("Connection Failed: " . $connection->connect_error);
			}

			$sql_query = "UPDATE Login_Info SET dbUsername='$updateUsername', dbPassword='$updatePassword' WHERE dbUserID='$updateID'";	

			if ($connection->query($sql_query)){
				echo "Record has been updated successfully";		
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
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<title>SQL Delete Formatted</title>
</head>
<body>

<!--Navigation Bar | Source: https://www.w3schools.com/bootstrap/tryit.asp?filename=trybs_navbar_collapse&stacked=h !-->
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span> 
      </button>
      <a class="navbar-brand" href="admin.html">Admin</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="admin.html">Home</a></li>
        <li><a href="orderlist.php">Transactions List</a></li>
        <li><a href="delete.php">Delete Transactions</a></li>
        <li><a href="updateorder.php">Update Transactions</a></li>
        <li><a href="accountlist.php">Accounts List</a></li>
        <li><a href="deleteusers.php">Delete Accounts</a></li>
        <li class="active"><a href="updateusers.php">Update Account Details</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="logoutpage.php"><span class="glyphicon glyphicon-log-out"></span> Log Out</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="container-fluid">
<div class="col-lg-6 col-sm-12 col-xs-12" style="width: 45%; border: 1px solid grey; border-radius: 15px; float left; margin-left: 2%">
	<h1 style="text-align: center;">Current Accounts Available</h1>
<br>

<?php
	$servername = "localhost";
	$username = "13095";
	$password = "0kgknY7fhK12aF54";
	$dbname = "13095";

	$connection = new mysqli ($servername, $username, $password, $dbname);

	if($connection->connect_error) {
		die("Connection Failed: " . $connection->connect_error);
	}

	$sql_query = "SELECT * FROM Login_Info";

	$result = $connection->query($sql_query);
?>

			<table class="table table-striped">
				<thead>
					<tr>
						<th>User ID</th>
						<th>Username</th>
						<th>Password</th>
					</tr>
				</thead>
			<tbody>

<?php
	if($result->num_rows > 0){
		while($row = $result->fetch_assoc()){
?>
					<tr>
						<td><?php echo $row["dbUserID"]; ?></td>
						<td><?php echo $row["dbUsername"]; ?></td>
						<td><?php echo $row["dbPassword"]; ?></td>
					</tr>

<?php
		}
	}else{
		echo"Return 0 result.";
	}
	$connection->close(); 
?>
			</tbody>
		</table>
	</div>
		<form action="" method="post">
			<div class="col-lg-6 col-lg-6 col-sm-12 col-xs-12 container-fluidform-group" style="margin-right: 2%; border: 1px solid grey; border-radius: 15px; margin-left: 10px;">
			<h1 align="center">Update Account Details</h1>
				<label for="UpdateID">ID:</label>
				<input type="text" class="form-control" id="UpdateID" name="UpdateID">

				<label for="UpdateUsername">New Username:</label>
				<input type="text" class="form-control" id="UpdateUsername" name="UpdateUsername">

				<label for="UpdatePassword">New Password:</label>
				<input type="text" class="form-control" id="UpdatePassword" name="UpdatePassword">
				<br>
				<input type="submit" value="Update" name="submit" style="margin-bottom: 25px;">
			</div>
		</div>
			<span><?php echo $error; ?></span>
		</form>
		</div>
	</body>
</html>