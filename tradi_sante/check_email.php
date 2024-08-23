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

// Récupérer l'e-mail de la requête POST
$email = $_POST['email'];

// Requête pour vérifier si l'e-mail existe dans la base de données
$sql = "SELECT COUNT(*) as count FROM user WHERE email = '$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $emailExists = $row['count'] > 0 ? true : false;
    echo json_encode(array('emailExists' => $emailExists));
} else {
    echo json_encode(array('emailExists' => false));
}

$conn->close();
?>
