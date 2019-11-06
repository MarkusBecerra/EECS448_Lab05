<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
$mysqli = new mysqli("mysql.eecs.ku.edu", "markusbecerra", "UngohNg4", "markusbecerra");
$userpresent = false;

/* check connection */
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

$sql = "SELECT * FROM users";
$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
  echo "<table width=50% border = 1>";
  echo "<tr>";
  echo "<th>Registered Users</th>";
  echo "</tr>";
 // output data of each row
 while($row = $result->fetch_assoc()) {
echo "<tr>";
echo "<td>" . $row["user_id"] . "</td>";
echo "</tr>";
 }

}
 else
{
 echo "No users exist";
}
$result -> free();
/* close connection */
$mysqli->close();
?>
