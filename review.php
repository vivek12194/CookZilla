<?php

session_start();
$rid = $_SESSION['rid'];
$u = $_SESSION['username'];
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
      return false;2
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
        <li><a href="signup.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
        <li><a href="Login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
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

<div class="container">
  <form name="myForm" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method = "post">


    <div class="form-group">
      <label>Review Title</label>
      <input type="text" class="form-control" name="title" placeholder="Enter Title">
    </div>

      <div class="form-group">
      <label>Review Description</label>
      <textarea name="review" rows="10" cols="50" class="form-control" placeholder="Enter description"></textarea>
    </div>

    <div class="form-group">
      <label>Rating</label>
    </div>



<link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
<link rel="stylesheet" href="styles.css">

<div class="stars">
    <input class="star star-5" id="star-5" type="radio" name="star5"/>
    <label class="star star-5" for="star-5"></label>
    <input class="star star-4" id="star-4" type="radio" name="star4"/>
    <label class="star star-4" for="star-4"></label>
    <input class="star star-3" id="star-3" type="radio" name="star3"/>
    <label class="star star-3" for="star-3"></label>
    <input class="star star-2" id="star-2" type="radio" name="star2"/>
    <label class="star star-2" for="star-2"></label>
    <input class="star star-1" id="star-1" type="radio" name="star1"/>
    <label class="star star-1" for="star-1"></label>
</div>

<div class="form-group">
      <input type="submit" value="Submit Review" style="float: left"; name="submit"></input>
</div>

  </form>
</div>

<?php

if(isset($_POST["submit"])){



  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "cookzilla";

  $conn = new mysqli($servername, $username, $password, $dbname);
  // Check connection
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }



    if(isset($_POST['star5']))
    {
      $rating = 5;
    }
    else if(isset($_POST['star4'])){

      $rating = 4;
    }

    else if(isset($_POST['star3'])){

      $rating = 3;
    }

    else if(isset($_POST['star2'])){

      $rating = 2;
    }
    else if(isset($_POST['star1'])){

      $rating = 1;
    }


    $sql = "SELECT max(review_id) as review_id from reviews";
        // use query() because no results are returned
    $result = $conn->query($sql);
    $id = mysqli_fetch_assoc($result);

    $review_id = $id["review_id"] + 1;

    $sql1 = "INSERT INTO reviews VALUES ($review_id, $rid, '$u', '$_POST[title]', '$_POST[review]', $rating)";
        // use query() because no results are returned
        $conn->query($sql1);

}

 ?>


</body>
</html>
