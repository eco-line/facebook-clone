<html>
<head>
</head>
<body>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "facebook";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
else


$myusername=NULL;
$mypassword=NULL;
$myusername = $_POST['username3'];
$mypassword = $_POST['password3'];


$sql="SELECT * FROM personal WHERE username='$myusername' and password='$mypassword'";


$result = $conn->query($sql);
	if ($result->num_rows > 0) 
	{
	echo "Successfully Logged In" ;
	echo "<br>";
	
	echo "<a href='people.php?username=$myusername'>Click here to go to your profile</a>";
	
	
	$_session['myusername']=$myusername;
		$_session['mypassword']=$mypassword;
	
	?>
	<a href="logout.php">Logout</a>
	<?php 	
  }
	else {
    echo "No one is registered with this username";
	}

	?>
</body>
</html>
