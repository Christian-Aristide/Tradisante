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

// Recevoir les données du client (email et motdepassee)
$nom = $_POST['nom'];
$email = $_POST['email'];
$contact = $_POST['contact'];
$motdepasse = md5(md5($_POST['motdepasse']));

// Insérer les données dans la base de données
$sql = "INSERT INTO user(nom, email, contact, mp) VALUES ('$nom','$email','$contact','$motdepasse')";
if ($conn->query($sql) === TRUE) {
    http_response_code(200);
    echo "Enregistrement réussi";
} else {
    http_response_code(500); // Erreur de serveur interne
    echo "Erreur d'enregistrement: " . $conn->error;
}

$conn->close();
?>
