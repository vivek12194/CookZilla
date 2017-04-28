<?PHP

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cookzilla";
$conn = mysqli_connect($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);

}

session_start();
session_destroy();
unset($_SESSION['username']);
header("Location: ../Final/index.php");
die();



$conn->close();
  ?>
