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


if (isset($_POST['id'])) {
    $idProduit = $_POST['id'];
    $nouveauNom = $_POST['nouveau_nom'];

   
    $requeteUpdateProduit = "UPDATE produit SET nom = '$nouveauNom' WHERE id = $idProduit";

    
    if ($mysqli->query($requeteUpdateProduit)) {

        
      
        header("Location: administration_module_personnel.php");
        exit(); 
    } else {
     
        echo "Une erreur est survenue lors de la mise à jour du produit : " . $mysqli->error;
    }
}
?>

</main>

