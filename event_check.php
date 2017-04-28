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
$n = $_SESSION['username'];

$your_event= "select eid from members m, rsvp r where uname ='$n' and m.mid = r.mid and r.eid='$rid' ";
$result1 = mysqli_query($conn, $your_event);
$try = "select DISTINCT m.mid from members m, events e, groups g where uname ='$n' and e.eid = '$rid' and e.gid = m.gid";
$result = mysqli_query($conn, $try);
$row = mysqli_fetch_array($result);
$m= $row[0];

if($result1->num_rows != 0)

{
	$update = "delete from rsvp where eid = '$rid' and mid = '$m'";
	$res=mysqli_query($conn, $update);
	header("Location: ../final/event.php?=cancelled");

die();

}

else
{
  $accha = rand(0,1);
	$insert = "INSERT INTO rsvp (eid, mid, attended)
VALUES ('$rid', '$m', '$accha')";
$res1=mysqli_query($conn, $insert);
header("Location: ../final/event.php?=RSVP");
die();


}


$conn->close();
?>
