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
  
    <h1>Promotions (chalets actifs en promotion)</h1>
    <!-- Afficher la liste de tous les chalets ACTIFS et EN PROMOTION en ordre alphabétique -->
    <!-- L'affichage doit être le même que celui utilisé pour l'affichage des chalets par région -->
	<?php $query = "SELECT * FROM chalets WHERE promo = 1 AND actif = 1 ORDER BY nom ASC";

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

?>
  </main>

<?php include_once(__DIR__ . './include/footer.php'); ?>

