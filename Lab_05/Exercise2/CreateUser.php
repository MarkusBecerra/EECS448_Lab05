<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
$newuser = $_POST["userID"];
$mysqli = new mysqli("mysql.eecs.ku.edu", "markusbecerra", "UngohNg4", "markusbecerra");
$userpresent = false;

/* check connection */
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

$sql = "INSERT INTO users(user_id) VALUES ('$newuser')";
   if($mysqli->query($sql))
    {
      echo "User " . $newuser . " was successfully created\n";
    }
    else
    {
      echo "User already exists. Try again...";

    }
/* close connection */
$mysqli->close();
?>
