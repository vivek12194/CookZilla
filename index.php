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


  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<?php

session_start();
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
        <li class="active"><a href="index.php">Home</a></li>

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




      <form class="navbar-form navbar-left" method ="post" action="Search.php">
      <div class="input-group">

        <input type="text" name="search" class="form-control" placeholder="Search" style="width: 500px">
        <div class="input-group-btn">
          <button class="btn btn-default" type="submit">
            <i class="glyphicon glyphicon-search"></i>
          </button>
        </div>
      </div>
    </form>

      <ul class="nav navbar-nav navbar-right">
        <li><a href="signup.php"><span class="glyphicon glyphicon-user"> </span> Sign Up</a></li>
        <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>
    </div>
  </div>
</nav>






<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cookzilla";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT rc.title, rp.recipe_image_url, rc.rid from recipe rc natural join recipe_photo rp";
$result = $conn->query($sql);

while ($row = mysqli_fetch_array($result))
{
    $new_array[ $row['title']] = $row;
}

while ($row = mysqli_fetch_array($result))
{
    $new_array[ $row['recipe_image_url']] = $row;
}

while ($row = mysqli_fetch_array($result))
{
    $new_array[ $row['rid']] = $row;
}


foreach($new_array as $array){
    //echo $array['rid'].'<br />';

    echo '<table style = "float:left"><tr><th style="text-align:center";>'.$array['title'].'</th></tr>';
    echo '<tr><td style="padding: 10px";><a href = "show_recipe_home.php?data1='.$array['title'].'&data2='.$array['recipe_image_url'].'&data3='.$array['rid'].'"><img src="' .$array['recipe_image_url']. '" width=640px height=360px></a></td></tr>';
    echo "</table>";
}

$conn = null;
?>



</body>
</html>
