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



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $nom = $_POST["nom"];
    error_reporting(E_ALL);
ini_set('display_errors', 1);

    

  
    $requeteInsertProduit = "INSERT INTO produit (nom) VALUES ('$nom')";

    
    if ($mysqli->query($requeteInsertProduit)) {
       
       
        echo '<script>
                alert("Le produit a été ajouté avec succès dans la liste.");
              
                window.location.href = "administration_module_personnel.php";
              </script>';
    } else {
        
        echo "Une erreur est survenue lors de l'ajout du produit : " . $mysqli->error;
    }
}
?>
