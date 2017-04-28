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

$n = $_POST["gnames"];
echo $n;
$query = "select gid from groups where gname ='$n'";
$query1 = mysqli_query($conn, $query);
$row = mysqli_fetch_array($query1);
$g= $row[0];



$check = "Select MAX(mid) from members";
$check1 =mysqli_query($conn,$check);

$row = mysqli_fetch_array($check1);
$m= $row[0] + 1;





$x= $_SESSION['username'];

$test = "Select mid from members where uname='$x' and gid='$g'";
$test1=mysqli_query($conn, $test);

$row1 = mysqli_fetch_array($test1);
echo "<br>";
echo $row1[0];


if($row1[0] > 0)
{


	header("Location: ../Final/group_join.php?=Already a member");
	die();



}
else
{



$sql = "INSERT INTO members (gid, mid, uname)
VALUES ('$g', '$m', '$x')";
$res=mysqli_query($conn, $sql);

header("Location: ../Final/group.php?=joined");
die();
}
$conn->close();
?>
