<?php
  include("config.php");

  try {
    $sql = "CREATE TABLE Items(
      id INT(6) UNSIGNED PRIMARY KEY AUTO_INCREMENT,
      email VARCHAR(75) NOT NULL,
      itemImg MEDIUMBLOB NOT NULL,
      itemTitle VARCHAR(27) NOT NULL,
      itemSale VARCHAR(5) NOT NULL, 
      itemCategory VARCHAR(27) NOT NULL,
      itemDesc VARCHAR(255) NOT NULL,
      itemLocation VARCHAR(27) NOT NULL, 
      itemPrice INT(10) NOT NULL
    )";

    $conn->exec($sql);
    echo("Table created successfully");
  } catch(PDOException $e) {
    echo($e->getMessage());
  }

  $conn = null;
?>