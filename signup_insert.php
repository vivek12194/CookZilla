<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cookzilla";
$conn = mysqli_connect($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

session_start();


Echo"tesT";
$uname=  $_POST['uname'];
$firstname = $_POST['fname'];
$lastname =$_POST ['lname'];
$d = $_POST['dob'];
$email = $_POST ['email'];
$pass=$_POST['pwd'];
$password = md5($pass);
$bio = $_POST['bio'];
$dob = date('y-m-d', strtotime($d));
//$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
//$_SESSION['f']= $target_file;


$_SESSION['u'] = $username;

$sql11= "Select * from users where uname = '$uname' ";
$result11 = mysqli_query($conn, $sql11);
//if($result11->num_rows ==0)



if(mysqli_num_rows($result11)==0)
{

//echo mysqli_num_rows($result11);

	$stmt = $conn->prepare("INSERT INTO users (uname, email, firstname, lastname, password, bio, dob) VALUES (?, ?, ?, ?, ?, ?, ?)");
//$sql = "INSERT INTO users (uname, email, firstname, lastname, password, bio, dob)
//VALUES ('$u', '$e', '$f', '$l', '$p','$b', '$insertdate')";
//$res=mysqli_query($conn, $sql);
//echo $target_file;
	$stmt->bind_param("sssssss", $uname, $email, $firstname, $lastname, $password, $bio, $dob);
	$uname=  $_POST['uname'];
$firstname = $_POST['fname'];
$lastname =$_POST ['lname'];
$d = $_POST['dob'];
$email = $_POST ['email'];
$pass=$_POST['pwd'];
$password = md5($pass);
$bio = $_POST['bio'];
$dob = date('y-m-d', strtotime($d));
		$stmt->execute();
		$stmt->close();



header("location: ../final/user_image.html");
die();

if(!$res){
	echo"query failed";
}
else {

	echo "ata inserted";
}

}
else if($result11->num_rows != 0)
{
header("Location: ../final/signup.php?=username_exists");
die();
Echo"Username already exists";
}
//$res=mysqli_query($conn, $sql);
//if(!$res){
	//echo"query failed";
//}+
//else {
//	echo " data inserted";
//}

$conn->close();


?>
