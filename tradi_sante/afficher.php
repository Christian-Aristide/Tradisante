<?php
// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tradi_santé";

$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
  die("La connexion à la base de données a échoué: " . $conn->connect_error);
}

// Récupérer les données de la base de données
$sql = "SELECT * FROM produits";
$result = $conn->query($sql);

// Vérifier si des données sont renvoyées
if ($result->num_rows > 0) {
  // Convertir les résultats en un tableau associatif
  $rows = array();
  while($row = $result->fetch_assoc()) {
      $rows[] = $row;
  }
  // Renvoyer les données au format JSON
  echo json_encode($rows);
} else {
  echo "0 results";
}
// Fermer la connexion à la base de données
$conn->close();
?>
