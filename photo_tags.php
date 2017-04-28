<?php
session_start();
?>
<!Doctype HTML>
<html>
<head>
  <title>Add Recipe</title>
<head>
<body>

  <form action="upload.php" method="post" enctype="multipart/form-data">
      Select image to upload:
      <input type="file" name="fileToUpload" id="fileToUpload">
      <input type="submit" value="Upload Image" name="submit">
  </form>

</body>
</html>


<?php
ob_start();

if(isset($_POST["next"])){

  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "cookzilla";

  $conn = new mysqli($servername, $username, $password, $dbname);
  // Check connection
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }



    $six_digit_random_number = mt_rand(100000, 999999);

    $_SESSION['rid'] = $six_digit_random_number;

    $sql1 = "INSERT INTO recipe (rid, uname, title, description, servings, cooktime_quantity, ctime_unit, preptime_quantity, preptime_unit)
    VALUES ($six_digit_random_number, 'vivek123', '$_POST[recipe_title]', '$_POST[description]',
    $_POST[servings], $_POST[cook_time], '$_POST[cook_unit]', $_POST[prep_time], '$_POST[prep_unit]')";
        // use query() because no results are returned
        $conn->query($sql1);
        //echo "\nRecipe submitted successfully";



        $data = $_POST['tags'];
        $len = count($data);
        for($x=0 ; $x < $len ; $x++){

          $sql4 = "INSERT INTO tags (rid, tag)
          VALUES ($six_digit_random_number, '$data[$x]')";
              // use query() because no results are returned
          $conn->query($sql4);
          //echo "\nTags were added";
        }


        $total = count($_POST['ingredient']);
        			for ($i = 0; $i < $total; $i++)
        			{
        				$ingredient=$_POST['ingredient'][$i];
        				$quantity=$_POST['quantity'][$i];
        				$unit=$_POST['ingre_unit'][$i];
        				$sql5 = "insert into ingredient values($six_digit_random_number,'$ingredient',$quantity,'$unit');";
        				$conn->query($sql5);
        			}



        //insert into ingredient values ('520048','watermelon','1','bowl(s)');

    /*$sql2 = "INSERT INTO ingredient (rid, ingredient, quantity, unit)
    VALUES ($six_digit_random_number, '$_POST[ingredient]', $_POST[quantity], '$_POST[ingre_unit]')";
            // use query() because no results are returned*/
    //$conn->query($sql2);


    function mynl2br($text) {
      return strtr($text, array("\r\n" => '<br />', "\r" => '<br />', "\n" => '<br />'));
    }

    $textToStore = mynl2br($_POST['recipe']);

    $sql3 = "UPDATE recipe SET recipe = '$textToStore' WHERE rid = $six_digit_random_number";

                // use query() because no results are returned
    $conn->query($sql3);

        $conn = NULL;


}
?>
