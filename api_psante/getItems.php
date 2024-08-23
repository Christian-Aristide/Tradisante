<?php 
  include("config.php");

  try {
    $sql = "SELECT * FROM Items";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetchAll();

    

    function modifyElem($a) {
      $url = "http://192.168.43.45/flutterAppChatGPT/api/photos/"; //redmi9c
      //$url = "https://s-p5.com/chris/market/api/photos";

      $a["itemImg"] = $url . basename($a["itemImg"]);
      return $a;
    }
    $result = array_map("modifyElem", $result);
    echo(json_encode($result));
  } catch(PDOException $e) {
    echo($e->getMessage());
  }

  $conn = null;
?>