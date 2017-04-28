<?php session_start(); ?>
<?php
include'check.php';
?>
<html>
<head><title>Add Recipe</title>


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <script>

  $(function () {
      var addInputRow = function () {
          $('#input').append($('#template').html());
      };


      //addInputRow();

      $('#ActionAddRow').on('click', addInputRow);

  });

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



<div class="container">

<form method="post" action="photo_tags.php">


  <div class="form-group">
    <label>Recipe Title:</label>
    <input type="text" class="form-control" name="recipe_title" placeholder="Recipe Title">
  </div>

  <div class="form-group">
    <label>Description:</label>
    <input type="text" class="form-control" name="description" placeholder="Enter Description">
  </div>


  <div class="form-group">
    <label>Servings:</label>
    <input type="text" class="form-control" name="servings" placeholder="servings">
  </div>


  <div class="form-group">
    <label>Preparation Time:</label>
    <input type="text" class="form-control" name="prep_time" placeholder="Preparation Time">
    <select name="prep_unit" class="form-control">
      <option>minutes</option>
      <option>hours</option>
    </select>
  </div>

  <div class="form-group">
    <label>Cook Time:</label>
    <input type="text" class="form-control" name="cook_time" placeholder="Cooking Time">
    <select name="cook_unit" class="form-control">
      <option>minutes</option>
      <option>hours</option>
    </select>
  </div>






<div class="form-group">
<table class="form-group" 	id="input">

 <tbody id="template">
       <tr  class="form-group">
           <td><input type='text' class="form-control" name='ingredient[]' placeholder='ingedient' /></td>
           <td><input   type='number' class="form-control" step='any' name='quantity[]' placeholder='quantity'/></td>
           <td><select class="form-control" name="ingre_unit[]">
             <option>bowl(s)</option>
             <option>cup(s) solid</option>
             <option>cup(s) liquid</option>
             <option>desert spoon</option>
             <option>fl oz(s)</option>
             <option>gm(s)</option>
             <option>lb(s)</option>
             <option>mg(s)</option>
             <option>ml(s)</option>
             <option>ounce(s)</option>
             <option>oz(s)</option>
             <option>pinch</option>
             <option>pound(s)</option>
             <option>tablespoon(s)</option>
             <option>teaspoon(s)</option>
             <option>pint(s)</option>
           </select></td>

       </tr>
</tbody>

        <p><button type= "button" id="ActionAddRow">+</button></p>
</table>
</div>





<div class="form-group">
  <label>Instructions:</label>
  <textarea class="form-control" name="recipe" rows="10" cols="50"></textarea>
</div>


<div class="form-group">
<label>Tags</label>
<select multiple name="tags[]" class="form-control" style="width: 250px; height: 225px">
  <option value="Appetizers and Snacks">Appetizers and Snacks</option>
  <option value="BBQ and Grilling">BBQ and Grilling</option>
  <option value="Bread Recipes">Bread Recipes</option>
  <option value="Desserts">Desserts</option>
  <option value="Dinner Recipes">Dinner Recipes</option>
  <option value="Drinks">Drinks</option>
  <option value="Everyday Cooking">Everyday Cooking</option>
  <option value="Soups and Stews">Soups and Stews</option>
  <option value="Italian">Italian</option>
  <option value="Mexican">Mexican</option>
  <option value="Indian">Indian</option>
  <option value="Chinese">Chinese</option>
  <option value="Korean">Korean</option>
</select>
</div>
<p></p>
<input type="submit" name="next" value="next">
</form>
</div>

</body>
</html>
