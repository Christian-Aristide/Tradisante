<?php
// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tradi_santé";

$conn = new mysqli($servername, $username, $password, $dbname);

// Vérification de la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Recevoir les données du client (email et nouveauMotDePasse)
$email = $_POST['email'];
$nouveauMotDePasse = $_POST['nouveauMotDePasse'];

// Mettre à jour le mot de passe dans la base de données
$sql = "UPDATE user SET mp = '$nouveauMotDePasse' WHERE email = '$email'";
if ($conn->query($sql) === TRUE) {
    $response = array("success" => true);
    echo json_encode($response);
} else {
    $response = array("success" => false);
    echo json_encode($response);
}

$conn->close();
?>
