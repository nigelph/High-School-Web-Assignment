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

<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<title>SQL Select Formatted</title>
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
        <li class="active"><a href="accountlist.php">Accounts List</a></li>
        <li><a href="deleteusers.php">Delete Accounts</a></li>
        <li><a href="updateusers.php">Update Account Details</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="logoutpage.php"><span class="glyphicon glyphicon-log-out"></span> Log Out</a></li>
      </ul>
    </div>
  </div>
</nav>

<!-- Container !-->

<div class="container-fluid" style="border: 1px solid grey; width: 90%; border-radius: 15px;">
<h1 align="center"> Account Details</h1>
<br>

<?php
	if($result->num_rows > 0){
		while($row = $result->fetch_assoc()){
?>

			<!-- Table with stored information !-->
			<table class="table table-striped">
				<thead>
					<tr>
					<!-- Title Headings !-->
						<th>Account ID</th>
						<th>Username</th>
						<th>Password</th>
					</tr>
				</thead>

					<!-- Database Linked Values !-->
				<tbody>
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

	</body>
</html>
