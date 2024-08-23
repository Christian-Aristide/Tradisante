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

// Récupérer les données de la requête POST
$nomProduit = $_POST['nomProduit'];
$maladie = $_POST['maladie'];
$prix = $_POST['prix'];
$categorie = $_POST['categorie'];
$description = $_POST['description'];

// Récupérer les données de l'image
$imageData = $_POST['image'];

// Convertir la chaîne base64 en données binaires
$imageData = base64_decode($imageData);

// Définir l'emplacement de stockage de l'image sur le serveur
$filePath = 'C:/xampp/htdocs/image_tradi_sante/' . $nomProduit . '.jpg';

// Écrire les données binaires dans un fichier sur le serveur
file_put_contents($filePath, $imageData);

// Préparer et exécuter la requête d'insertion
$stmt = $conn->prepare("INSERT INTO produits (nomProduit, maladie, prix, categorie, description, image) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssdsss", $nomProduit, $maladie, $prix, $categorie, $description, $filePath);

if ($stmt->execute() === TRUE) {
  echo "Nouveau produit ajouté avec succès";
} else {
  echo "Erreur : " . $conn->error;
}

// Fermer la connexion à la base de données
$conn->close();
?>
