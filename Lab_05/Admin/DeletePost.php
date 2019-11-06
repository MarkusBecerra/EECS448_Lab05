
<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

if(isset($_POST["checkboxarr"]))
{
  $mysqli = new mysqli("mysql.eecs.ku.edu", "markusbecerra", "UngohNg4", "markusbecerra");
$post = $_POST["checkboxarr"];
$arrlength = count($post);


/* check connection */
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}
for($i=0; $i<$arrlength; $i++)
{
  $sql = "DELETE FROM posts WHERE post_id = $post[$i]";
  $mysqli->query($sql);
  echo "Post Deleted! Post ID: " .$post[$i] . "<br>";

}
$mysqli->close();
}
else {
echo "Nothing was checked marked to be deleted! <br>";
}
?>
