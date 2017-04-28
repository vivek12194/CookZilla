<?php
session_start();
?>
<!DOCTYPE html>

<html>
<head>
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
    var x = document.forms["myForm"]["fname"].value;
    var l = document.forms["myForm"]["lname"].value;
   var p = document.forms["myForm"]["pwd"].value;
   var d = document.forms["myForm"]["dob"].value;
   var u = document.forms["myForm"]["uname"].value;


    if (x== "") {
        alert("Please fill all the fields");
        return false;
    }
    if(l=="")
    {
      alert("Please fill all the fields");
        return false;

    }
    else if(p=="")
    {
      alert("Please fill all the fields");
        return false;

    }
    else if(d=="")
    {
      alert("Please fill all the fields");
        return false;

    }

    else if(u=="")
    {
      alert("Please fill all the fields");
      return false;
    }

}
</script>


  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<body>

<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cookzilla";
$conn = mysqli_connect($servername, $username, $password, $dbname);
?>


<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php">CookZilla™</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="user.php">Home</a></li>

      </ul>




    </ul>
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



      <form class="navbar-form navbar-left" action="search1.php">
      <div class="input-group">

        <input type="text" name="search" class="form-control" placeholder="Search1" style="width: 500px">
        <div class="input-group-btn">
          <button class="btn btn-default" type="submit">
            <i class="glyphicon glyphicon-search"></i>
          </button>
        </div>
      </div>
    </form>

      <ul class="nav navbar-nav navbar-right">
       <div class="dropdown">
    <button style="height:50px" class="nav navbar-nav" type="button" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span><?= $_SESSION['username']?>
    <span class="caret"></span></button>
    <ul class="dropdown-menu">
      <li><a href="p.php"><span class="glyphicon glyphicon-group"></span>Profile</a></li>
      <li><a href="add_recipe.php"><span class="glyphicon glyphicon-group"></span>Add Recipe</a></li>
      <li><a href="group.php"><span class="glyphicon glyphicon-group"></span> Groups</a></li>
      <li><a href="event.php">Events</a></li>
      <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>

      </ul>
    </div>
  </div>
</nav>





<!--
<form name="myForm" action="demo_form.asp"
onsubmit="return validateForm()" method="post">
Name: <input type="text" name="fname">
<input type="submit" value="Submit">
</form>
-->
<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cookzilla";
$conn = mysqli_connect($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$name = $_SESSION['username'];
$sql= "SELECT * from users where uname = '$name'";
$result = mysqli_query($conn, $sql);

$rows = mysqli_fetch_assoc($result);

//echo $rows['uname'];

?>


<div class="container">
  <img src="<?php echo $rows['image_link'];?>" class="img-circle" alt="Cinque Terre" width="304" height="236">
</div>


<div class="container">
  <form name="myForm" action = "update.php" method = "post" onsubmit="return validateForm()">


    <div class="form-group">
      <label>First name:</label>
      <input type="text" class="form-control" name="fname" value ="<?= $rows['firstname']?>">
    </div>

    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" name="email" value="<?=$rows['email']?>">
    </div>

    <div class="form-group">
      <label>Last Name:</label>
      <input type="text" class="form-control" name="lname" value ="<?=$rows['lastname']?>">
    </div>


    <div class="form-group">
      <label>Bio:</label>
      <input type="text" style="height:75px" class="form-control" name="bio" value="<?=$rows['bio']?>">
    </div>


    <input type="submit" value="Save changes"></input>
  </form>
</div>








<?php

$conn->close();
?>
