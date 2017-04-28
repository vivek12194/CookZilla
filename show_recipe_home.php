<?php session_start(); ?>

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

      <ul class="nav navbar-nav navbar-right">
        <li><a href="signup.php"><span class="glyphicon glyphicon-user"> </span> Sign Up</a></li>
        <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>

      </div>
    </div>
  </nav>


  <style>
.card {
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
    transition: 0.3s;
    width: 40%;
    border-radius: 5px;
}

.c {
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
    transition: 0.3s;
    width: 100%;
    border-radius: 5px;
}


.card:hover {
    box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
}

img {
    border-radius: 5px 5px 0 0;
}

.container {
    padding: 2px 16px;

}
</style>

<?php
    if(isset($_GET["data1"]) && isset($_GET["data2"]))
    {
        $data1 = $_GET["data1"];
        $data2 = $_GET["data2"];
    }

    $_SESSION['rid'] = $_GET["data3"];

    $rid = $_GET["data3"];;

?>



<div class="card">
  <img src="<?php echo $data2;?>" alt="Avatar" style="width:100%">
  <div class="container">
    <h4><b><?php echo $data1; ?></b></h4>
  </div>
</div>


<?php
    //echo '<img src="' .$data2. '" width=640px height=360px style = "padding: 10px">';

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


    $sql = "SELECT uname, servings, cooktime_quantity, ctime_unit, preptime_quantity, preptime_unit, substring(recipe,1,5000) as recipe from recipe
    where title like '%$data1%' limit 1";

    $result = $conn->query($sql);

    if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        ?>

        <br><br>
        <div class="card">
          <div class="container">
            <h4><b>Submitted By:</b></h4>
            <p>I<?=$row['uname']?></p>
          </div>
        </div>


        <br><br>
        <div class="card">
          <div class="container">
            <h4><b>Servings:</b></h4>
            <p><?=$row['servings']?></p>
          </div>
        </div>

        <br><br>
        <div class="card">
          <div class="container">
            <h4><b>Cooktime:</b></h4>
            <p><?=$row['cooktime_quantity']?> <?=$row['ctime_unit'] ?></p>
          </div>
        </div>


        <br><br>
        <div class="card">
          <div class="container">
            <h4><b>Preptime:</b></h4>
            <p><?=$row['preptime_quantity']?> <?=$row['preptime_unit'] ?></p>
          </div>
        </div>

<?php

          }
  }   else {
    echo "0 results";
    }


    $sql1 = "SELECT quantity,unit,ingredient from recipe natural join ingredient where title like '%$data1%'";

    $result1 = $conn->query($sql1);

    if (mysqli_num_rows($result1) > 0) {

      //echo "ingredients:<br/>";
?>



<br><br>
<div class="card">
  <div class="container">
    <h4><b>Ingredients:</b></h4>
    <div class="col">


<!--<div class="panel panel-info">
<div class="panel-heading"><h3><b>Ingredients</b></div>
</div>-->
<?php
        while($row1 = mysqli_fetch_assoc($result1)) {

?>


<p><?=$row1['quantity']?> <?=$row1['unit'] ?> <?=$row1['ingredient'] ?></p>


<?php
        //echo "   " . $row1["quantity"]. " " . $row1["unit"]. " " . $row1["ingredient"]. "<br/>";      //count++;
    }
  ?>

</div>
</div>
</div>

<?php
  }   else {
    echo "0 results";
    }

    $sql2 = "SELECT substring(recipe,1,5000) as recipe from recipe
    where title like '%$data1%' limit 1";

    $result2 = $conn->query($sql2);

    if (mysqli_num_rows($result2) > 0) {

      ?>

      <br><br>
      <div class="card">
        <div class="c">
          <h4><b>Instructions:</b></h4>
          <div class="col1">

      <?php

      $sql2 = "SELECT substring(recipe,1,5000) as recipe from recipe
      where title like '%$data1%' limit 1";

      $result2 = $conn->query($sql2);


    // output data of each row
    while($row2 = mysqli_fetch_assoc($result2)) {
      ?>

      <p><?=$row2['recipe']?></p>


      <?php

        //echo "<br/>Instructions: " . $row2["recipe"]. "<br/>";
    }
    ?>
  </div>
  </div>
  </div>
  <br>

  <?php
    }   else {
    echo "0 results";
    }

?>


<br><br>
<div class="card">
  <div class="container" style = "width:100%">
    <h4 style= "text-align: center;"><b>Related Recipes:</b></h4>
</div>
</div>
<br><br>




<?php

    $sql3 = "SELECT related_id1, related_id2
             from
             (SELECT rid from recipe where title like '%$data1%' limit 1) as A left join related rl
             on A.rid = rl.related_id1";

    $result3 = $conn->query($sql3);


    if (mysqli_num_rows($result3) > 0) {

      //count = 1;

        while($row3 = mysqli_fetch_array($result3)) {
                  $related_array[] = $row3['related_id2'];
        }


        for($y = 0; $y< count($related_array); $y++) {


          $sql4 = "SELECT rc.title, rp.recipe_image_url, rc.rid from recipe rc natural join recipe_photo rp where rc.rid = $related_array[$y]";
          $result4 = $conn->query($sql4);


              while($row4 = mysqli_fetch_array($result4))
              {
                $x= $row4['title'];
?>


<a href = "show_recipe_home.php?data1=<?php echo $x ?>&data2=<?php echo $row4['recipe_image_url']?>&data3=<?php echo $row4['rid']?>">
<div class="card">
  <img src=" <?php echo $row4['recipe_image_url']?> " width=427px height=240px alt="Avatar" style="width:100%">
  <div class="container" style = "width:100%">
    <h4 style= "text-align:center";><b><?php $row4['title']?></b></h4>
  </div>
</div>
</a>

                <?php
              }
    }


}
else {
echo "0 results";
}


    $conn = null;

?>
</body>
</html>
