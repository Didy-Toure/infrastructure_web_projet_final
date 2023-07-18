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
  
	<h1>Liste des produits avec leurs catégories</h1>	
    <p>Liste de produits en magasin. J'affiche la liste de produits selon les categories</p>
    
    <!-- Affichez les enregistrement de la table que vous avez ajoutée à la base de données. -->

  
	<?php $query = "SELECT produit.nom AS nom_produit, categorie.nom AS nom_categorie FROM produit JOIN categorie ON produit.categorie_id = categorie.id ORDER BY categorie.nom ASC"; 

$result = $mysqli->query($query); 

if ($result) {
  while ($row = $result->fetch_assoc()) {
echo '<table>';
echo '<tr>';
echo '<td>';
echo '<h2>' . $row['nom_produit'] . '</h2>';
echo '<p>' . $row['nom_categorie'] . '</p>';
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
