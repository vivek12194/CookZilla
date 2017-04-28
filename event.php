<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

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

$event= "Select eid, ename, edescription from events e, members m where uname='$x' and e.gid=m.gid";
$result = mysqli_query($conn, $event);


$your_event= "select ename, edescription from events e, members m, rsvp r where uname ='$x' and m.mid = r.mid and e.eid=r.eid";
$result1 = mysqli_query($conn, $your_event);





if($result->num_rows != 0)
{

?>


 <div class="container">
 <p style="text-align:center"> <h3 style="text-align: center"><b>Available Events</b></h3></p>
 <br>
 <br>

  <table class="table table-striped">

    <thead>
      <tr>
        <th>Event name</th>
        <th>Event Description</th>
        <th> RSVP </th>

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


while($rows = mysqli_fetch_assoc($result))
{

  $index=0;
 $count =0;

  while($index<sizeof($data))
  {
    if($rows['ename'] == $data[$index]["ename"])
    {

      $count= $count +1;
    }
    $index=$index+1;
  }
  ?>
 <?php
 $p= $rows['eid'];


  ?>


      <tr>
        <td><?=$rows['ename']?></td>
        <td><?=$rows['edescription']?></td>
          <?php if($count>0) { ?>

       <td><a href="event_check.php?id=<?php echo $p?>"> <button type="button" class="btn btn-success">Cancel RSVP </button></a></td>

        <?php
      }
      ?>
      <?php
      if($count==0)

      {
        ?>
          <td> <a href="event_check.php?id=<?php echo $p?>"><button type="button" class="btn btn-success">RSVP </button></a> </td>

        <?PHP
      }
?>



      </tr>

  <?PHP
    }

  ?>

  </table>

</div>

<form action="Event_add.php" method="post">

<div style="text-align:center"><input  style="float:center" type="submit" value="Create an Event"></div>


</form>

<br>
<form method="post" action="report.php">

<div style="text-align:center"><input  style="float:center" type="submit" value="Add Report"></div>

</form>


<?php
}
$conn->close();
  ?>





</body>
</html>
