<?php
session_start();
?>
<?php
include'check.php';
?>
<!DOCTYPE html>
<html lang="en">


<head>
<title></title>

<style>


#ul1 {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: black;
    position: fixed;
    bottom: 0;
    width: 100%;
}

#li1 {
    float: left;
}

li a {
    display: block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}



}
</style>


<script>

function validateForm() {
    var x = document.forms["myForm"]["name"].value;
    var l = document.forms["myForm"]["description"].value;


    if (x== "") {
        alert("Please fill all the fields");
        return false;
    }
    if(l=="")
    {
      alert("Please fill all the fields");
        return false;
        </script>



  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>






<?PHP

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cookzilla";
$conn = mysqli_connect($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);

}

$n= $_SESSION['username'];





?>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="user.php">CookZilla™</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="user.php">Home</a></li>

      </ul>
      <form class="navbar-form navbar-left">
      <div class="input-group">

        <input type="text" name="search" class="form-control" placeholder="Search" style="width: 500px">
        <div class="input-group-btn">
          <button class="btn btn-default" type="submit">
            <i class="glyphicon glyphicon-search"></i>
          </button>
        </div>
      </div>
    </form>





       <ul class="nav navbar-nav">
       <div class ="dropdown">
       <button style="height:50px" class="nav navbar-nav" type="button" data-toggle="dropdown">Browse</button>
        <ul class="dropdown-menu">
        <li><a href="tag.php?id=Vegetable">vegetable</a></li>
        <li><a href="tag.php?id=Italian">Italian</a></li>
        <li><a href="tag.php?id=chocolate">chocolate</a></li>
        <li><a href="tag.php?id=cake">Cake</a></li>
        <li><a href="tag.php?id=Tuna">Tuna</a></li>




      </ul>
    </div>


       </ul>



      <ul class="nav navbar-nav navbar-right">
       <div class="dropdown">
    <button style="height:50px" class="nav navbar-nav" type="button" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span><?= $_SESSION['username']?>
    <span class="caret"></span></button>
    <ul class="dropdown-menu">
    <li><a href="p.php"><span class="glyphicon glyphicon-group"></span>Profile</a></li>
    <li><a href="follower.php"><span class="glyphicon glyphicon-group"></span>Followers</a></li>
    <li><a href="add_recipe.php"><span class="glyphicon glyphicon-group"></span>Add Recipe</a></li>
    <li><a href="group.php"><span class="glyphicon glyphicon-group"></span> Groups</a></li>
    <li><a href="event.php">Events</a></li>
    <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>

      </ul>
    </div>
  </div>
</nav>




<div class="container">
  <form name="myForm" action = "Event_add_check.php" method = "post" onsubmit="return validateForm()">
    <div class="form-group">
      <label >Event name:</label>
      <input type="text" class="form-control" name="name" placeholder="Enter Event name">
    </div>

    <?PHP
    $group= "Select * from groups g, members m where m.uname ='$n' and g.gid = m.gid";
$result = mysqli_query($conn, $group);

?>
  <label> Select Group name</label>
 <select id="gnames" name="gnames">
<?PHP
    while ($row = mysqli_fetch_assoc($result))
{
    ?>


    <option value="<?=$row['gname']?>"><?=$row['gname']?> </option>
    <?php
  }
  ?>
</select>
    <div class="form-group">
      <label >Event description:</label>
      <input type="text" class="form-control" name="Description" placeholder="Enter Description">
    </div>
    <input type="submit" value ="Create"></input>
  </form>
</div>






<ul id="ul1">
  <li class="active" style="float:right"><a href="#contact">Contact</a></li>
  <li class="active" style="float:right"><a href="#about">About</a></li>
</ul>

<?php
$conn->close();
?>




</body>
</html>
