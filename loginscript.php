<?php
	session_start();
	$error="";
	if (isset($_POST['submit'])){
		if (empty($_POST['username']) || empty($_POST['pwd'])) {	
			$error="Username or Password is empty";
		}
		else
		{
			$server_name = "localhost";
			$dbusername = "13095";
			$dbpassword = "0kgknY7fhK12aF54";
			$dbname = "13095";

			$username=$_POST['username'];
			$password=$_POST['pwd'];
			echo "$username";
		
			$connection = new mysqli($server_name, $dbusername, $dbpassword, $dbname);

			if ($connection->connect_error) {
				die("connection_failed" . $connection->connect_error);
			}

			$username = stripslashes($username);
			$password = stripslashes($password);
			
			$query = "SELECT* from Login_Info where dbPassword='$password' AND dbUsername='$username'";

			$result = $connection->query($query);

			if ($result->num_rows > 0) {

				$_SESSION['login_user']=$username;
				if($_SESSION['login_user'] == "admin"){
					header("location: admin.html");
				
				}else{

					header("location: index.html");
				}	

			}
			$connection->close();
		}
	}	

?>