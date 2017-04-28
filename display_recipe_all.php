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
    echo '<tr><td style="padding: 10px";><a href = "show_recipe.php?data1='.$array['title'].'&data2='.$array['recipe_image_url'].'&data3= '.$array['rid'].'"><img src="' .$array['recipe_image_url']. '" width=640px height=360px></a></td></tr>';
    echo "</table>";
}

$conn = null;
?>
