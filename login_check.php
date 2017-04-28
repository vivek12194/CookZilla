<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cookzilla";
$conn = mysqli_connect($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$n=$_POST["name"];
$p=$_POST["password"];
$p1=md5($p);
$sql= "Select * from users where uname = '$n' and password= '$p1' ";
$result = mysqli_query($conn, $sql);
if($result->num_rows == 0)
{
		//echo'<script>alert("wrong login details") </script>';
		header("Location: ../Final/login.php?=Incorrect_login_details");
		die();
}
else
{
	$_SESSION['username']=$n;
	header("Location:user.php");
	die();
}

?>
