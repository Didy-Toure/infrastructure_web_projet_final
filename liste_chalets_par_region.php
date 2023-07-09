<?php include_once(__DIR__ . './include/header.php'); 
$username ="root";
$password = "mysql";
$host="localhost";
$database="Chalet_final2023";

$mysqli = new mysqli($host, $username, $password, $database);

// Vérifier la connexion
/*if ($mysqli->connect_errno) {
    echo "Échec de connexion à la base de données MySQL: " . $mysqli->connect_error;
    exit();
} else {
    echo "Connexion réussie!!";
}*/

?>

  <main>
  <!-- Nom de la region selectionnee -->
    <?php
    $query = "SELECT nom FROM regions WHERE id = " . $_GET['regions'];
    $result = $mysqli->query($query);

    if ($result) {
      while ($row = $result->fetch_assoc()) {
        echo '<h1>' . $row['nom'] . '</h1>';
      }
      $result->free_result();
    } else {
      echo 'Erreur SQL : ' . $mysqli->error;
    }

  

    ?>
    <!-- Afficher la liste de tous les chalets actifs appartenant à la région sélectionnée, en ordre alphabétique -->
    <!-- L'affichage est à votre discrétion -->
	
  </main>

<?php include_once(__DIR__ . './include/footer.php'); ?>

