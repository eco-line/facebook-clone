<html>
<head>
<title>My Profile</title>
<style>
			.welcomeheader
			{
				position:fixed;
				top : 0px;
				left : 0px;
				height : 46px;
				width : 1350px;
				background-color: #3a5795;
				z-index : 1;
			}
			.peoplepagebody
			{
				position:absolute;
				top : 0px;
				left : 0px;
				height : 1000px;
				width : 1350px;
				background-color: #edf0f5;
			}
			.rest
			{
			padding:13px 248px 10px 5px; border:2px solid #ccc; 
			-webkit-border-radius: 5px;
			border-radius: 5px;
			}
			.rest:focus
			{
				border-color:#333;
			}
			
			.logoutbutton
			{
			position:absolute;
			top:7px;
			left:1150px;
			background-color:#69a74e;
			border-radius:5px;
			border:1px solid #3b6e22;
			curson:pointer;
			color:white;
			font-family:verdana;
			font-size:15px;
			padding:5px 20px;
			text-decoration:none;
			text-shadow:0px 0px 0px #2f6627;
			}
			
			.logoutbutton:hover
			{
				background-color:#6FB551;
			}
			
			.postbutton
			{
			position:relative;
			top:-7px;
			left:350px;
			background-color:#0a3071;
			border-radius:3px;
			border:1px ;
			curson:pointer;
			color:white;
			font-family:verdana;
			font-size:15px;
			padding:5px 20px;
			text-decoration:none;
			text-shadow:0px 0px 0px #2f6627;
			}
			
			::-webkit-input-placeholder
			{
			
			font-family:verdana;
			font-size:15px;
			}
			.name
			{
			position:absolute;
			top:200px;
			left:500px;
			color:#5e2fc6;
			font-family:verdana;
			font-size:35px;
			text-rendering: optimizelegibility;
text-shadow: 0 0 3px rgba(0,0,0,.4);
			}
			.status
			{
			margin: 6px 0;
			font-weight: normal;
			line-height: 1.38;
			display: block;
			background-color:white;
			position:relative;
			padding: 16px 10px 10px 13px;
			top:400px;
			left:400px;
			height:auto;
			width:500px;
			color:black;
			font-family: verdana;
			font-size:14px;
			background: #fff;
			border: 1px solid;
			border-color: #e9eaed #dfe0e4 #d0d1d5;
			-webkit-border-radius: 3px;
			}
			.inputstatus{
			
			font-weight: normal;
			line-height: 1.38;
			
			
			position:relative;
			padding: 16px 10px 10px 13px;
			top:400px;
			left:400px;
			height:auto;
			width:500px;
			color:black;
			font-family: verdana;
			font-size:14px;
			
			}
			.statusbox
			{
			position:absolute;
			top:0px;
			left:0px;
			width=100%;
			line-height: 1.42857143;
			padding:50px 350px 10px 0px; 
			border:2px solid #ccc; 
			-webkit-border-radius: 1px;
			border-radius: 2px;
			}
			.statustopheader
			{
			margin: 9px 0;
			font-weight: normal;
			line-height: 1.38;
			display: block;
			position:relative;
			padding: 16px 10px 10px 13px;
			top:-72px;
			left:-11px;
			height:auto;
			width:499px;
			color:black;
			font-family: verdana;
			font-size:14px;
			background: #c8cfdc;
			border: 1px solid;
			border-color: #e9eaed #dfe0e4 #d0d1d5;
			-webkit-border-radius: 3px;
			
			}
			::-webkit-input-placeholder
			{
			
			font-family:verdana;
			font-size:15px;
			position:relative;
			top:-40px;
			left:0px;
			}
			.sidebox
			{
				position:absolute;
				top:354px;
				left:60px;
				height:300px;
				width:300px;
				background: #fff;
				font-family: verdana;
				font-size:14px;
				border:1	px solid #ccc;
			}
</style>
</head>
<body>
<div class="peoplepagebody">
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
	
	
//	echo "<h1>Hello " . $_GET["username"] . "</h1>";
	?>
	<div class="welcomeheader">
	
	<a href="logout.php" class="logoutbutton">Logout</a>
	</div>
	<?php
	$username1=$_GET["username"];
	$sql = "select * from personal where username = '$username1'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		?>
		<div class="name">
		<?php
        echo "". $row["firstname"]. " " . $row["lastname"]. "<br>";
		?>
		</div>
		<div style="position:absolute;top:70px;left:95px;">
		<?php
		echo '
		<td>
		<img src="uploads/'.$username1.'.jpg" style="height:250px;width:220px;border:1px solid #ccc;border-radius:5px;">
		</td>
		
		';
		?>
		</div>
		<div class="sidebox">
		<?php
		echo "<br>";
		echo "<br>";
		echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" .$row["worksas"]. "&nbsp";
		echo "&nbsp;&nbsp;&nbsp;at&nbsp;" .$row["worksat"]. "<br>";
		echo "<br>";
		echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" .$row["college"]. "<br>";
		echo "<br>";
		echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Lives in " .$row["currentcity"]."<br>";
		echo "<br>";
		echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;From " .$row["hometown"]."<br>";
		echo "<br>";
		echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Born on " .$row["birthday"]."<br>";
		echo "<br>";
		echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" .$row["email"]. "<br>";
		?>
		
		<?php
		?>
		
		</div>
		<?php
		
    }
} else {
    echo "No one is registered with this username";
		
	}
	?>
	
	<form class="inputstatus" action="statusupdate.php?username=<?php echo $username1; ?>" method="POST" >
	<div class="statustopheader">
	Status
	<input class="postbutton" type="submit" name="submit" value="Post">
	</div>
	<input class="statusbox" type="text" name="status"  placeholder="Whats on your mind ?" >
	
	</form>
	<?php 
	
/*	
	
if ( isset( $_POST['submit'] ) > 0) 
{
	header('location:statusupdate.php?user='.$username1);

	$status1=NULL;
	if(isset($_POST['status']))
	{
	$status1=$_POST['status'];
	}
	
	$sql2="Insert into ".$username1." (statusid , list_status) Values (NULL,'$status1')";
	
	$result3 = mysqli_query($conn,$sql2);

	if($result3){

	echo "";
	}

	else {
	
	echo "ERROR";
	}
	
}
	*/
	
	
	$sql3="select * from ".$username1." order by statusid desc";
	$result2=$conn->query($sql3);
	if($result2->num_rows>0)
	{
	//output data of each row
	while($row=$result2->fetch_assoc())
		{
		?>
		<div class="status">
		<?php
			echo $row['list_status'];
			echo "<br><br>";
			?>
		</div>
	<?php
		}
	}
	
	?>
	<div style="position:fixed;top:40px;left:1100px;min-height:700px;height:auto;width:300px;background:#fff;border:1px solid #ccc;">
	
		
		<?php
	
	$sql = "select firstname,lastname,username from personal ";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		?>
		<br>
		<?php
        echo '
		&nbsp;&nbsp;
		<td><a href="people.php?username='.$row["username"].'">
		<img src="uploads/'.$row["username"].'.jpg" style="height:75px;width:70px;border:1px solid #ccc;border-radius:5px;padding: 0px;margin: 0px 0px;">
		
		</a>
		</td>
		
		';

		echo '<a style="position:relative;top:-30px;left:5px;text-decoration:none;" href="people.php?username='.$row["username"].'">'.$row["firstname"].''.$row["lastname"].'</a>';
		
    }
} else {
    echo "No Friends";
		
	}
	?>
		
		
		
		
		
		
		
		
		
	</div>
	


	
</div>
</body>
</html>
