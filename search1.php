<?php

session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title></title>

<style>


table {
    border-collapse: collapse;
    width: 100%;
}

th, td {
    text-align: left;
    padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2;}

th {
    background-color: #4CAF50;
    color: white;
}




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
      <form class="navbar-form navbar-left" method ="post" action="Search1.php">
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









<?PHP
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cookzilla";
$conn = mysqli_connect($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);

}

$s = $_POST["search1"];
$sql = "select distinct r.* from recipe r, tags t where title like '%{$s}%' or (r.rid = t.rid and tag like '%{$s}%')";
//$sql = "Select * from recipe";
$sql1=mysqli_query($conn, $sql);
if($s==" ")
{
  $sql = "select distinct r.* from recipe r, tag t where title like '%'$s'%' or (r.rid = t.rid and tag like '%'$s'%')";


}


else if($sql1->num_rows != 0)
{

?>


 <div class="container">
 <p style="text-align:center"> <h3 style="text-align: center"><b>Recipes Related to <?=$s?> </b></h3></p>
 <br>
 <br>

  <table class="table table-striped">

    <thead>
      <tr>
        <th>Title</th>
        <th>Posted By</th>
        <th>Servings</th>

      </tr>
    </thead>

<?PHP


while($rows = mysqli_fetch_assoc($sql1))
{
  ?>





      <tr>
        <td><?=$rows['title']?></td>
        <td><?=$rows['uname']?></td>
        <td><?= $rows['servings']?></td>
      </tr>

  <?PHP
    }

  ?>

  </table>

</div>







<?php
}
else
{

  echo'<p style="text-align:center"><h3 style="text-align:center"><b> Sorry, no results </h3> <b></p>';

}
$conn->close();
  ?>





</body>
</html>
