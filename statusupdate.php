<?php 

$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname="facebook";
	
	// Create connection
	$conn = new mysqli($servername, $username, $password,"facebook");

	// Check connection
	if ($conn->connect_error) 
	{
    die("Connection failed: " . $conn->connect_error);
	} 


$username=$_GET["username"];

$status1=NULL;
	if(isset($_POST['status']))
	{
	$status1=$_POST['status'];
	}
	
	
	$sql2="Insert into ".$username." (statusid , list_status) Values (NULL,'$status1')";
	
	$result3 = mysqli_query($conn,$sql2);

	if($result3 ){
	
	header("location:people.php?username=".$username,true,303	);

	echo "";
	}

	else {
	
	echo "ERROR";
	
	}
	
	
	
	?>
	
