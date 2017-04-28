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
$c=$_POST["City"];
$d=$_POST["Description"];

$check = "Select MAX(gid) from groups";
$check1 =mysqli_query($conn,$check);

$row = mysqli_fetch_array($check1);
$g= $row[0] + 1;






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
//$sql = "INSERT INTO groups (gid, gname, gcity, gdescription)
//VALUES ('$g', '$n', '$c', '$d')";
//$res=mysqli_query($conn, $sql);
//echo"succesfully created";


$stmt1 = $conn->prepare("INSERT INTO groups (gid, gname, gcity, gdescription)
VALUES (?, ?, ?, ?)");
$stmt1->bind_param("ssss", $g, $n, $c, $d);
$stmt1->execute();
$stmt1->close();




$check = "Select MAX(mid) from members";
$check1 =mysqli_query($conn,$check);

$row = mysqli_fetch_array($check1);
$m= $row[0] + 1;





$x= $_SESSION['username'];

//$sql = "INSERT INTO members (gid, mid, uname)
//VALUES ('$g', '$m', '$x')";
//$res=mysqli_query($conn, $sql);



$stmt = $conn->prepare("INSERT INTO members (gid, mid, uname)
VALUES (?, ?, ?)");
$stmt->bind_param("sss", $g, $m, $x);
$stmt->execute();
$stmt->close();



header("Location: ../Final/group.php?=created");
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
