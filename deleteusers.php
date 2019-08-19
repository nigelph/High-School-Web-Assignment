<?php
$error = "";

if (isset($_POST['submit'])){
	if (empty($_POST['deleteID'])){
		echo "User ID is empty";
	}else{

		$servername ="localhost";
		$username = "13095";
		$password = "0kgknY7fhK12aF54";
		$dbname = "13095";

		$deleteID = $_POST['deleteID'];


		$connection = new mysqli ($servername, $username, $password, $dbname);

		if($connection->connect_error) {
			die("Connection Failed: " . $connection->connect_error);
		}

		$sql_query = "DELETE FROM Login_Info WHERE dbUserID='$deleteID'";	//delete user records

		if ($connection->query($sql_query)){
			echo "Record has been deleted successfully";		
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
        <li class="active"><a href="deleteusers.php">Delete Accounts</a></li>
        <li><a href="updateusers.php">Update Account Details</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="logoutpage.php"><span class="glyphicon glyphicon-log-out"></span> Log Out</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="container" style="width: 96%; border: 1px solid grey; border-radius: 15px; margin-left: 2%; margin-right: 2%;">
	<h1 style="text-align: center;">Delete Existing Accounts</h1>
<br>

<?php
	$servername ="localhost";
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
		echo "Return 0 result.";
	}
	$connection->close(); 
?>
			</tbody>
		</table>
			<h3>Delete by User ID:</h3>
		<br>
			<form action="" method="post">
					<label for="deleteID"> User ID: </label>
					<input type="text" class="form-control" id="deleteID" name="deleteID">
				<br>
					<input type="submit" value="Delete Order" name="submit" style="margin-bottom: 25px;">
				<span><?php echo $error; ?></span>
			</form>
		</div>
	</body>
</html>