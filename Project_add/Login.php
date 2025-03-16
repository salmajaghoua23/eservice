<?php

// Connexion à la base de données
$servername = "localhost"; // Adresse du serveur MySQL
$username = "root"; // Nom d'utilisateur MySQL
$password = ""; // Mot de passe MySQL
$dbname = "login"; // Nom de la base de données
$port=3308;
// Créer une connexion
$conn = new mysqli($servername, $username, $password, $dbname,$port);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Récupérer les données du formulaire
$email = $_POST['email'];
$password = $_POST['passwrd'];

// Hasher le mot de passe (recommandé pour la sécurité)
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Préparer et exécuter la requête SQL
$sql = "INSERT INTO utilisateurs (email, password) VALUES ('$email', '$hashed_password')";

if ($conn->query($sql) === TRUE) {
    echo "Nouvel enregistrement créé avec succès";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Fermer la connexion
$conn->close();
?>



