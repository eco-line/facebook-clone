<html>
<head>
<title>Facebook</title>
</head>
<body>
	<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname="facebook";
	
	
	$users_firstname = $_POST['firstname'];
	$users_lastname = $_POST['lastname'];
	$users_email = $_POST['email'];
	$users_username=$_POST['username'];
	$users_password = $_POST['password'];
	$users_college = $_POST['college'];
	$users_worksas = $_POST['worksas'];
	$users_worksat = $_POST['worksat'];
	$users_currentcity = $_POST['currentcity'];
	$users_hometown = $_POST['hometown'];
	$users_birthday = $_POST['birthday'];
	$users_sex = $_POST['sex'];
	
	$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["dp"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["dp"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}


// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {

$temp = explode(".",$_FILES["dp"]["name"]);
$newfilename = $users_username . '.' .end($temp);

    if (move_uploaded_file($_FILES["dp"]["tmp_name"],"uploads/" .$newfilename)) {
        echo "The file ". basename( $_FILES["dp"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
	

	// Create connection
	$conn = new mysqli($servername, $username, $password,"facebook");

	// Check connection
	if ($conn->connect_error) 
	{
    die("Connection failed: " . $conn->connect_error);
	} 
	echo "Connected successfully";
	
	$sql = "INSERT INTO personal(id,firstname,lastname,email,username,password,college,worksas,worksat,currentcity,hometown,birthday,sex)
	VALUES (NULL,'$users_firstname','$users_lastname','$users_email','$users_username','$users_password','$users_college','$users_worksas','$users_worksat','$users_currentcity','$users_hometown','$users_birthday','$users_sex')";

	$result = mysqli_query($conn,$sql);

	if($result){

	echo "Great you are now on Facebook :D";
	}

	else {
	
	echo "ERROR";
	}
	
	$sql1="create table ".$users_username."(statusid int(6) unsigned auto_increment primary key , list_status varchar(10000))";

	if ($conn->query($sql1) === TRUE) {
    echo "Table created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}
	
	echo "<br>";
	
	
	
	echo "<a href='people.php?username=$users_username'>Click here to go to your profile</a>";
	
	$conn->close();
	?>


	
</body>
</html>
