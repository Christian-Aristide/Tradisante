<?php
  include("config.php");

  try {
    $name = $_POST["username"];
    $email = $_POST["useremail"];
    $password = $_POST["userpassword"];
    $conn->exec("INSERT INTO Users(useremail, username, userpassword) VALUES('$email', '$name', '$password')");
    echo("Success");
   
  } catch(PDOException $e) {
    echo($e->getMessage());
  }
 
?>