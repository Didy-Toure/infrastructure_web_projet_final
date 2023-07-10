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
  

<?php
$query = "SELECT chalets.* FROM chalets INNER JOIN regions ON chalets.fk_region = regions.id WHERE regions.id = " . $_GET['regions'] . " ORDER BY chalets.nom";

$result = $mysqli->query($query);

if ($result) {
  echo '<table>';
  echo '<thead>';
  echo '<tr>';
  echo '<th>Nom</th>';
  echo '<th>Prix (basse saison)</th>';
  echo '<th>Photo</th>'; 
  echo '<th>En savoir plus</th>'; 
  echo '</tr>';
  echo '</thead>';
  echo '<tbody>';
  while ($row = $result->fetch_assoc()) {
    echo '<tr>';
    echo '<td>' . $row['nom'] . '</td>';
    echo '<td>' . $row['prix_basse_saison'] . '</td>';
    echo '<td><img src="https://picsum.photos/id/' . $row['id_picsum'] . '/500" alt="' . $row['nom'] . '"></td>';
    echo '<td><a href="fiche_chalet.php?id=' . $row['id'] . '" class="btn">Pour en savoir plus</a></td>';
    echo '</tr>';
  }
  echo '</tbody>';
  echo '</table>';  

  
  
  $result->free_result();
} else {
  echo 'Aucune région sélectionnée : ' . $mysqli->error;
}



?>   

  </main>

<?php include_once(__DIR__ . './include/footer.php'); ?>

