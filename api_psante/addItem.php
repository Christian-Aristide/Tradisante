<?php
  include("config.php");

  try {
    $itemTitle = $_POST["itemTitle"];
    $itemCategory = $_POST["itemCategory"];
    $itemDesc = $_POST["itemDesc"];
    $itemSale = $_POST["itemSale"];
    $itemLocation = $_POST["itemLocation"];
    $itemPrice = intval($_POST["itemPrice"]);
    $email = $_POST["email"]; 
    $base64img = $_POST["itemImg"];
    $itemImg = base64_decode($base64img);

    //$targetDir = "photos/";
    $imgName ="photos/" . basename(rand(225, 300000) . ".jpg");
    file_put_contents($imgName, $itemImg);
    

    $sql = "INSERT INTO Items(email, itemImg, itemTitle, itemSale, itemCategory, itemDesc, itemLocation, itemPrice) VALUES('$email', '$imgName', '$itemTitle', '$itemSale', '$itemCategory', '$itemDesc', '$itemLocation', $itemPrice)";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    echo("Success");
  }catch(PDOException $e) {
    echo($e->getMessage());
  }

  $conn = null;
?>