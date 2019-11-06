<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
$user = $_POST["userID"];
$post = $_POST["post"];
$mysqli = new mysqli("mysql.eecs.ku.edu", "markusbecerra", "UngohNg4", "markusbecerra");


/* check connection */
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

$query = "SELECT users, user_id FROM users";
$userfound = false;
$userpresent = mysqli_query($mysqli, "SELECT * FROM users WHERE user_id = '$user'");
   if(mysqli_num_rows($userpresent) > 0)
    {
      $userfound = true;
    }
    else
    {
      $userfound = false;
    }

if($userfound == true)
{
  $sql = "INSERT INTO posts (content,author_id) VALUES ('$post','$user')";
$mysqli->query($sql);
 echo "Post created by " . $user. "!<br>";
}
else {
  echo "User not found! Error!\n";
}

/* close connection */
$mysqli->close();
?>
