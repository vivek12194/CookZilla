<!DOCTYPE html>
<html lang="en">

<?php
session_start();
?>

<?php
include'check.php';
?>


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
    position: relative;
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


<?PHP

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cookzilla";
$conn = mysqli_connect($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);

}

//echo $_SESSION['username'];


$conn->close();
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

      <ul class="nav navbar-nav navbar-right">
       <div class="dropdown">
    <button style="height:50px" class="nav navbar-nav" type="button" data-toggle="dropdown"><?= $_SESSION['username']?>
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

//echo $_SESSION['username'];
$x= $_SESSION['username'];

$group= "Select * from groups g, members m where m.uname ='$x' and g.gid = m.gid";
$result = mysqli_query($conn, $group);


$all_group= "Select distinct * from groups";
$result1 = mysqli_query($conn, $all_group);




if($result->num_rows != 0)
{

?>


 <div class="container">
 <p style="text-align:center"> <h3 style="text-align: center"><b>User Groups </b></h3></p>
 <br>
 <br>

  <table class="table table-striped">

    <thead>
      <tr>
        <th>Gid</th>
        <th>Group name</th>
        <th>Group Description</th>

      </tr>
    </thead>

<?PHP


while($rows = mysqli_fetch_assoc($result))
{
  ?>





      <tr>
        <td><?=$rows['gid']?></td>
        <td><?=$rows['gname']?></td>
        <td><?= $rows['gdescription']?></td>

      </tr>

  <?PHP
    }

  ?>

  </table>

</div>




<?PHP
if($result1->num_rows != 0)
{

?>


 <div class="container">
 <p style="text-align:center"> <h3 style="text-align: center"><b>All groups </b></h3></p>
 <br>
 <br>

  <table class="table table-striped">

    <thead>
      <tr>
        <th>Gid</th>
        <th>Group name</th>
        <th>Group Description</th>

      </tr>
    </thead>

<?PHP


while($rows = mysqli_fetch_assoc($result1))
{
  ?>





      <tr>
        <td><?=$rows['gid']?></td>
        <td><?=$rows['gname']?></td>
        <td><?= $rows['gdescription']?></td>

      </tr>

  <?PHP

    }

  ?>

  </table>

</div>
<form action="group_add.php" method="post">

<div style="text-align:center"><input  style="float:center" type="submit" value="Create a Group"></div>


</form>

<br>
<form action="group_join.php" method="post">

<div style="text-align:center"><input  style="float:center" type="submit" value="Join a group"></div>


</form>


<?PHP
}
?>


<?PHP
}
else

{
  ?>
  <p style="text-align:center"> <h3 style="text-align: center"><b>No groups selected, Please click below to join a group</b></h3></p>
<form action="group_add.php" method="post">

<div style="text-align:center"><input  style="float:center" type="submit" value="Create a Group"></div>


</form>

<br>
<form action="group_join.php" method="post">

<div style="text-align:center"><input  style="float:center" type="submit" value="Join a group"></div>


</form>
<?PHP

}

$conn->close();
  ?>





</body>
</html>
