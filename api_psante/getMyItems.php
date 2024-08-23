<?php
  include("config.php");

  try {
    $email = $_POST["useremail"];

    $checkSql = "SELECT * FROM Items WHERE email = '$email'";
    $check = $conn->prepare($checkSql);
    $check->execute();
    
    $check->setFetchMode(PDO::FETCH_ASSOC);
    $result = $check->fetchAll();

    if(count($result) >= 1) {
    function modifyElem($a) {
      $url = "http://192.168.43.45/flutterAppChatGPT/api/photos/"; //redmi9c
      //$url = "https://s-p5.com/chris/market/api/photos";
      $a["itemImg"] = $url . basename($a["itemImg"]);
      return $a;
    }
    $result = array_map("modifyElem", $result);
    echo(json_encode($result));
    }else{
      echo("false");
    }
  } catch(PDOException $e) {
    echo($e->getMessage());
  }
?>