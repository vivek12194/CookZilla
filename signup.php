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
  <form name="myForm" action = "signup_insert.php" method = "post" onsubmit="return validateForm()" enctype="multipart/form-data">


    <div class="form-group">
      <label>Username:</label>
      <input type="text" class="form-control" name="uname" placeholder="Enter Username">
    </div>

    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" name="email" placeholder="Enter email">
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" name="pwd" >
    </div>
    <div class="form-group">

      <label>First Name:</label>
      <input type="text" class="form-control" name="fname" placeholder="Enter First name">
    </div>

    <div class="form-group">
      <label>Last name:</label>
      <input type="text" class="form-control" name="lname" placeholder="Enter last name">
    </div>



    <div class="form-group">
      <label>Bio:</label>
      <input type="text" style="height:75px" class="form-control" name="bio" placeholder="Enter description">
    </div>

    <div class="form-group">
      <label>Date of Birth:</label>
      <input type="date" class="form-control" name="dob">
    </div>





    <input type="submit" value="Next"></input>
  </form>
</div>








</body>
</html>
