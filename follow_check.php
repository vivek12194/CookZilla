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


$rid=$_GET['id'];
echo $rid;
$x = $_SESSION['username'];

//$your_event= "SELECT * from users where uname != '$x' ";
//$result1 = mysqli_query($conn, $your_event);
$try = "SELECT *
from followers where fid='$x' and uid = '$rid' ";
echo $try;

$result = mysqli_query($conn, $try);
$row = mysqli_fetch_array($result);
$m= $row[0];


if($m != '')
	
{
	$update = "DELETE from followers where fid = '$x' and uid = '$rid' ";
	$res=mysqli_query($conn, $update);
	echo $update;
		
	header("Location: ../final/follower.php?=unfollowed");

die();

}

else
{
	$insert = "INSERT INTO followers (uid, fid)
VALUES ('$rid', '$x')";
$res1=mysqli_query($conn, $insert);
header("Location: ../final/follower.php?=followed");
die();


}


$conn->close();
?>
