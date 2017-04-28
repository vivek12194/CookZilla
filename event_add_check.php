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

$g = $_POST["gnames"];

$try = "select gid from groups where gname ='$g'";
$result = mysqli_query($conn, $try);
$row = mysqli_fetch_array($result);
$m= $row[0];


$n=$_POST["name"];
$d=$_POST["Description"];

$check = "Select MAX(eid) from events";
$check1 =mysqli_query($conn,$check);

$row = mysqli_fetch_array($check1);
$e= $row[0] + 1;






/*$check = "Select max(gid) from groups";
$check1 =mysqli_query($conn,$check);
$value = mysql_fetch_object($check1);
$g= mt_rand('$value',1000);
*/

//while(mysqli_query($conn, $check)->num_rows==0)
//{
	//$g=mt_rand(4,1000);
	//$check = "Select gid from groups where gid='$g'";
//}


//$g1= "Select gid"
//$sql = "INSERT INTO events (eid, ename, edescription, gid)
//VALUES ('$e', '$n', '$d', '$m')";
//$res=mysqli_query($conn, $sql);
echo"succesfully created";

$stmt = $conn->prepare("INSERT INTO events (eid, ename, edescription, gid)
VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $e, $n, $d, $m);
$stmt->execute();
$stmt->close();


header("Location: ../final/Event.php?=created");
die();
/*$result = mysqli_query($conn, $sql);
if($result->num_rows == 0)
{
		//echo'<script>alert("wrong login details") </script>';
		header("Location: ../project/login.php?=Incorrect_login_details");
		die();
}
else
{
	$_SESSION['username']=$n;
	header("Location:user.php");
	die();
}
*/

$conn->close();
?>
