<?php
session_start();
?>
<!Doctype HTML>
<html>
<head>
  <title>Add Recipe</title>
<head>
<body>

  <form action="report_photo_upload.php" method="post" enctype="multipart/form-data">
      Select image to upload:
      <input type="file" name="fileToUpload" id="fileToUpload">
      <input type="submit" value="Upload Image" name="submit">
  </form>

</body>
</html>


<?php

  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "cookzilla";

  $conn = new mysqli($servername, $username, $password, $dbname);
  // Check connection
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }

$event = $_POST['gnames'];

$sql1 = "SELECT eid from events where ename = '$event'";

$result1 = mysqli_query($conn, $sql1);

$row1 = mysqli_fetch_assoc($result1);

$e = $row1['eid'];

echo $e;

$u = $_SESSION['username'];

echo $u;

$sql = "SELECT mid from groups g, members m, events e where m.gid = g.gid and e.gid = g.gid
and uname = '$u' and e.eid = '$e' LIMIT 1";

$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_assoc($result);

$m = $row['mid'];

echo $m;



$sql2 = "SELECT max(report_id) as m from reports";

$result2 = mysqli_query($conn, $sql2);

$row2 = mysqli_fetch_assoc($result2);

$report_id = $row2['m'] + 1;



echo $report_id;

$report = $_POST['report'];

echo $report;

$sql2 = "INSERT into reports values ('$report_id', '$e', '$m', '$report')";

$result2 = mysqli_query($conn, $sql2);


$_SESSION['rid'] = $report_id;


$conn = NULL;


?>
