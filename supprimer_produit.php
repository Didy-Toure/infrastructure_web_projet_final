<?php
$username = "root";
$password = "mysql";
$host = "localhost";
$database = "Chalet_final2023";

$mysqli = new mysqli($host, $username, $password, $database);

// Vérifier la connexion
if ($mysqli->connect_errno) {
    echo "Échec de connexion à la base de données MySQL: " . $mysqli->connect_error;
    exit();
}

?>
// Supprimer un produit

<?php
if (isset($_GET['id'])) {
    $idProduit = $_GET['id'];
}

$requeteDeleteProduit = "DELETE FROM produit WHERE id = $idProduit";

   if ($mysqli->query($requeteDeleteProduit)) {
        
        echo "Le produit a été supprimé avec succès.";
    } else {
        
        echo "Une erreur est survenue lors de la suppression du produit : " . $mysqli->error;
    }

?>