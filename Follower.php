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

$event= "Select * from users where uname != '$x'";
$result = mysqli_query($conn, $event);


$your_event= "select uname
from users
where uname in (select f.uid
 from Users as u, Followers as f
 where f.fid = '$x' ); ";
$result1 = mysqli_query($conn, $your_event);

$s = "SELECT count(fid) from followers where uid = '$x'
group by uid ";
$r = mysqli_query($conn, $s);
$row = mysqli_fetch_assoc($r);
if(mysqli_num_rows($r)== 0)
{
  $c=0;
}
else
{
$c = $row['count(fid)'];
}



$s1 = "SELECT count(uid) from followers where fid = '$x'
group by fid ";
$r1 = mysqli_query($conn, $s1);
$row1 = mysqli_fetch_assoc($r1);
if(mysqli_num_rows($r1)== 0)
{
  $c1=0;
}
else
{
$c1 = $row1['count(uid)'];
}



if($result->num_rows != 0)
{

?>


 <div class="container">
 <p style="text-align:center"> <h3 style="text-align: center"><b>All Members</b></h3></p>
 <br>
 <br>


  <table class="table table-striped">

    <thead>
      <tr>

        <th> Followers </th>
        <th> Following</th>
      </tr>
    </thead>
    <tr>

    <td> <?php echo $c ?></td>
    <td> <?php echo $c1 ?></td>

    </tr>


















  <table class="table table-striped">

    <thead>
      <tr>
        <th>Users</th>
        <th> Follow/ Unfollow</th>

      </tr>
    </thead>

<?PHP

$data=array();
$i=0;
while($row = mysqli_fetch_assoc($result1))
{
  $data[$i]=$row;
  $i++;

}
$check =0;


while($rows = mysqli_fetch_assoc($result))
{

  $index=0;
 $count =0;

  while($index<sizeof($data))
  {
    if($rows['uname'] == $data[$index]["uname"])
    {

      $count= $count +1;
    }
    $index=$index+1;
  }
  ?>
 <?php
 $p= $rows['uname'];


  ?>


      <tr>
        <td><?=$rows['uname']?></td>

          <?php if($count>0) { ?>

       <td><a href="follow_check.php?id=<?php echo $p?>"> <button type="button" class="btn btn-success">Unfollow </button></a></td>

        <?php
      }
      ?>
      <?php
      if($count==0)

      {
        ?>

          <td> <a href="follow_check.php?id=<?php echo $p;?>"><button type="button" class="btn btn-success">Follow </button></a> </td>



        <?PHP
      }
?>
      </tr>


  <?PHP
  $check ++;
    }

  ?>

  </table>

</div>




<?php
}
$conn->close();
  ?>





</body>
</html>
