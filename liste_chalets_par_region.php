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
$query = "SELECT nom FROM regions WHERE id = " . $_GET['region'];
$result = $mysqli->query($query);

if ($result) {
  $row = $result->fetch_assoc();
  echo '<h1>' . $row['nom'] . '</h1>';
  $result->free_result();
} else {
  echo 'Erreur SQL : ' . $mysqli->error;
}



?>
    <!-- Afficher la liste de tous les chalets actifs appartenant à la région sélectionnée, en ordre alphabétique -->
    <!-- L'affichage est à votre discrétion -->
<?php
$query = "SELECT chalets.* FROM chalets INNER JOIN regions ON chalets.fk_region = regions.id WHERE regions.id = " . $_GET['region'] . " AND chalets.actif = 1 ORDER BY chalets.nom ASC";

$result = $mysqli->query($query);

if ($result) {
  while ($row = $result->fetch_assoc()) {
    
echo '<table>';
echo '<tr>';
echo '<td>';
echo '<h2>' . $row['nom'] . '</h2>';
echo '<p>' . $row['prix_basse_saison'] . '</p>';
echo '<img src="https://picsum.photos/id/' . $row['id_picsum'] . '/500" alt="' . $row['nom'] . '">';
echo '<a href="fiche_chalet.php?id=' . $row['id'] . '" class="btn">Pour en savoir plus</a>';
echo '</td>';
echo '</tr>';
echo '</table>';

  }


  $result->free_result();
} else {
  echo 'Erreur SQL : ' . $mysqli->error;
}

$mysqli->close();




?>

  
</main>




<?php include_once(__DIR__ . './include/footer.php'); ?>

