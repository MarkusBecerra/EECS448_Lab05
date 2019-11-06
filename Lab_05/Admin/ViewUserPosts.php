<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
$mysqli = new mysqli("mysql.eecs.ku.edu", "markusbecerra", "UngohNg4", "markusbecerra");
$user = $_POST["userid"];


/* check connection */
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

$sql = "SELECT content FROM posts WHERE author_id = '$user'";
$result = $mysqli->query($sql);



if ($result->num_rows > 0) {
  echo "<table width=50% border = 1>";
  echo "<tr>";
  echo "<th>List of Posts from user: " . $user. "</th>";
  echo "</tr>";
 // output data of each row
 while($row = $result->fetch_assoc()) {
echo "<tr>";
echo "<td>" . $row["content"] . "</td>";
echo "</tr>";
 }

}
 else
{
 echo "This user has not made any posts...";
}
$result -> free();
/* close connection */
$mysqli->close();
?>
