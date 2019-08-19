<?php
$connect = mysqli_connect("localhost", "root", "1234", "WebDatabase");
if (isset($_POST['add'])){
    if (empty($_POST['quantity']) || empty($_POST['colour']) || empty($_POST['size'])) {    
            $error="Username or Password is empty";
        }else{

    $servername ="localhost";
    $username = "root";
    $password = "1234";
    $dbname = "WebDatabase";

    $product=$_POST['product'];
    $colour=$_POST['colour'];
    $size=$_POST['size'];
    $quantity=$_POST['quantity'];
    
    $totalprice=50*$quantity;

    $connection = new mysqli($servername, $username, $password, $dbname);
}
}
    if($connection->connect_error) {
        die("Connection Failed: " . $connection->connect_error);
    }

    $sql_query = "INSERT INTO order_table (product, quantity, colour, size, price) 
    VALUES ('$product', '$quantity', '$colour', '$size', '$totalprice')";

    if ($connection->query($sql_query)){
        echo "New record created";      
    }else{
        echo "Error:" . $sql_query . "<br>" . $connection->error;
    }

    $connection->close(); 


?>
<!DOCTYPE html>
    <html>
        <head>
        <meta charset="UTF-8">
            <title>Northcote College | Leavers Jerseys Online</title>
            <!-- Latest compiled and minified CSS -->
            <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
            <!-- jQuery library -->
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

            <link rel="stylesheet" href="style.css">
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
      <a class="navbar-brand" href="index.html">Northcote College Leaver Jerseys</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="index.html">Home</a></li>
        <li class="active"><a href="jerseys.php">Shop Jerseys</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="signup.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
        <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
        <li><a href="logoutpage.php"><span class="glyphicon glyphicon-log-out"></span> Log Out</a></li>
      </ul>
    </div>
  </div>
</nav>

<!--Main Shopping Content!-->
<div class="container" style="width:70%; align="center;">
	<h2 style="text-align: center;">Leavers Jerseys | Northcote College</h2>
    <?php
	$query = "SELECT * FROM products ORDER BY id ASC";
	$result = mysqli_query($connect, $query);
	if(mysqli_num_rows($result) > 0)
	{
		while($row = mysqli_fetch_array($result))
		{
			?>
            <!--Shopping Content Details!-->
            <div class="col-md-6" align="center">
                <form method="post" action="#"> <!-- type in what you want the add to cart button to do!-->
                            <div style="border: 1px solid #eaeaec; margin: -1px 19px 3px -1px; box-shadow: 0 1px 2px rgba(0,0,0,0.05); padding:10px;" align="center">
                            <img src="<?php echo $row["image"]; ?>" class="img-responsive">
                    <h5 class="text-info"><?php echo $row["p_name"]; ?></h5>
                    <h5 class="text-danger">$ <?php echo $row["price"]; ?></h5>
                </div>
            </form>
        </div>
           <?php
		}
	}

    ?>

<div class="col-md-6" style="width: 100%;" align="center">
    <form method="post" action="#">

 <select name="product">
    <option value="No-Zip Sweater">No-Zip Sweater</option>
    <option value="Zip-Through Sweater">Zip-Through Sweater</option>
  </select>

           <h5 name="price" value="$50.00">$50.00</h5>

            <input type="text" name="quantity" class="form-control" value="1" style="text-align: center;">
        <br>
            <input type="text" name="colour" class="form-control" value="Please Insert Individual Colour (Grey or Navy)" style="text-align: center;">
        <br>
            <input type="text" name="size" class="form-control" value="Insert Size: (XXS, XS, S, M, L, XL, XXL, XXXL)" style="text-align: center;">

            <input type="submit" name="add" style="margin-top:5px; text-align: center;" class="btn btn-default" value="Add to Cart">

        </form>
    </div>
</div>

<footer style="margin-top: 20px;">
    <h5>@ Copyright Northcote College Leavers Jerseys 2017</h5>
</footer>

 </body>
</html>
