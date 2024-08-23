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
$email = $_POST['email'];
$motdepasse = md5(md5($_POST['motdepasse']));

// Rechercher l'utilisateur par email dans la base de données
$sql = "SELECT id, mp FROM user WHERE email = '$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $storedPassword = $row['mp'];

    // Vérifier le mot de passe stocké avec le mot de passe fourni
    if ($motdepasse === $storedPassword) {
        // Authentification réussie
        http_response_code(200);
        echo "Authentification réussie";
    } else {
        // Mot de passe incorrect
        http_response_code(401);
        echo "Mot de passe incorrect";
    }
} else {
    // Utilisateur inexistant
    http_response_code(404);
    echo "Utilisateur inexistant";
}

$conn->close();
?>
