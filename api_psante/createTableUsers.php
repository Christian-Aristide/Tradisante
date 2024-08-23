<?php 
  include("config.php");

  try {
    $sql = "CREATE TABLE users(
      id INT(12) UNSIGNED PRIMARY KEY AUTO_INCREMENT,
      useremail VARCHAR(125) NOT NULL UNIQUE,
      username VARCHAR(125) NOT NULL,
      userpassword VARCHAR(255) NOT NULL
    )";

    $conn->exec($sql);
    echo("Table users created successfully");
  } catch(PDOException $e) {
    echo($e->getMessage());
  }

?>