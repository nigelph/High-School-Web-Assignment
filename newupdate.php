<?php
$error = "";
	if (isset($_POST['submit'])){
		if (empty($_POST['UpdateID']) || empty($_POST['UpdateProduct']) || empty($_POST['UpdateColour']) || 
			empty($_POST['UpdateSize']) || empty($_POST['UpdateQuantity'])) {	
			echo "Please fill in all rows";
		}else{
		
			$servername = "localhost";
			$username = "13095";
			$password = "0kgknY7fhK12aF54";
			$dbname = "13095";

			$updateID = $_POST['UpdateID'];
			$updateProduct = $_POST['UpdateProduct'];
			$updateColour = $_POST['UpdateColour'];
			$updateSize = $_POST['UpdateSize'];
			$updateQuantity = $_POST['UpdateQuantity'];

	   		$totalprice=50*$updateQuantity;

			$connection = new mysqli ($servername, $username, $password, $dbname);

			if($connection->connect_error) {
				die("Connection Failed: " . $connection->connect_error);
			}

			$sql_query = "UPDATE order_table SET colour='$updateColour', product='$updateProduct', size='$updateSize', quantity='$updateQuantity', price='$totalprice' WHERE orderID='$updateID'";	

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
        <li class="active"><a href="newupdate.php">Update Transactions</a></li>
        <li><a href="accountlist.php">Accounts List</a></li>
        <li><a href="deleteusers.php">Delete Accounts</a></li>
        <li><a href="updateusers.php">Update Account Details</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="logoutpage.php"><span class="glyphicon glyphicon-log-out"></span> Log Out</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="col-lg-6" style="width: 45%; border: 1px solid grey; border-radius: 15px; float left; margin-left: 2%">
	<h1 style="text-align: center;">Current Order Details</h1>
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

	$sql_query = "SELECT * FROM order_table";

	$result = $connection->query($sql_query);
?>

			<table class="table table-striped">
				<thead>
					<tr>
						<th>Order ID</th>
						<th>Product</th>
						<th>Colour</th>
						<th>Size</th>
						<th>Quantity</th>
						<th>Price</th>
					</tr>
				</thead>
			<tbody>
<?php
	if($result->num_rows > 0){
		while($row = $result->fetch_assoc()){
?>
					<tr>
						<td><?php echo $row["orderID"]; ?></td>
						<td><?php echo $row["product"]; ?></td>
						<td><?php echo $row["quantity"]; ?></td>
						<td><?php echo $row["colour"]; ?></td>
						<td><?php echo $row["size"]; ?></td>						
						<td><?php echo $row["price"]; ?></td>
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
			
			<div class="col-lg-6 form-group" style="float: right; margin-right: 2%; border: 1px solid grey; border-radius: 15px;">
		<h1 align="center">Update Order Details</h3>
				<label for="UpdateID">ID:</label>
				<input type="text" class="form-control" id="UpdateID" name="UpdateID">

				<label for="UpdateProduct">Product:</label>
				<input type="text" class="form-control" id="UpdateProduct" name="UpdateProduct">

				<label for="UpdateQuantity">Quantity:</label>
				<input type="text" class="form-control" id="UpdateQuantity" name="UpdateQuantity">

				<label for="UpdateColour">Colour:</label>
				<input type="text" class="form-control" id="UpdateColour" name="UpdateColour">

				<label for="UpdateSize">Size:</label>
				<input type="text" class="form-control" id="UpdateSize" name="UpdateSize">
			<br>
				<input type="submit" value="Update" name="submit" style="margin-bottom: 25px;">

			</div>
			<span><?php echo $error; ?></span>
		</form>
		</div>
	</body>
</html>