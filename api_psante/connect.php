<?php
  include("config.php");

  try {
    $email = $_POST["useremail"];
    $password = $_POST["userpassword"];

    $checkSql = "SELECT * FROM Users WHERE useremail = '$email' AND userpassword = '$password'";
    
    $check = $conn->prepare($checkSql);
    $check->execute();
    $check->setFetchMode(PDO::FETCH_ASSOC);
    $result = $check->fetchAll();

    if(count($result) == 1) {
      echo(json_encode($result));
    }else{
      echo("false");
    }
  } catch(PDOException $e) {
    echo($e->getMessage());
  }
?>