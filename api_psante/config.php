<?php
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "testGpt";

  /*$servername = "localhost";
  $username = "spcom1_chris";
  $password = "8KCUhHEk[9nI";
  $dbname = "spcom1_chrisdb";*/

  try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  } catch(PDOException $e) {
    echo($e->getMessage());
  }
?>