<?php 
include_once(__DIR__ . '/include/header.php');

error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once (__DIR__ . '/include/config.php');

$mysqli = new mysqli($host, $username, $password, $database);

// Vérifier la connexion
/*if ($mysqli->connect_errno) {
    echo "Échec de connexion à la base de données MySQL: " . $mysqli->connect_error;
    exit();
} else {
    echo "Connexion réussie!!";
}

// Fermer la connexion lorsque vous avez terminé
$mysqli->close();*/
?>







<main>
    <h1>Projet final</h1>

    <!-- Chalets sous forme de cartes -->
    <!-- Affiche 6 chalets ACTIFS et en PROMOTION en ordre aléatoire. Indice : https://www.mysqltutorial.org/select-random-records-database-table.aspx  -->
    <div class="flex">
      <?php
      
      $query = "SELECT * FROM chalets WHERE actif = 1 AND promo = 1 ORDER BY RAND() LIMIT 6";
      $result = $mysqli->query($query);

      if ($result) {
        while ($row = $result->fetch_assoc()) {
          echo '<div class="card">';
         
          echo '<div class="card-body">';
          echo '<h2>' . $row['nom'] . '</h2>';
          echo '<p>' . $row['description'] . '</p>';
          echo '<p>' . $row['prix_basse_saison'] . '</p>';
          echo '<img src="https://picsum.photos/id/' . $row['id_picsum'] . '/500" alt="' . $row['nom'] . '">';
          
          
          echo '<a href="fiche_chalet.php?id=' . $row['id'] . '" class="btn">Pour en savoir plus</a>';
        
          echo '</div>';
          echo '</div>';
        }
        $result->free_result();
      } else {
        echo 'Erreur SQL : ' . $mysqli->error;
      }




      ?>

  </div>

</main>

<!-- Footer -->
<?php include_once(__DIR__ . '/include/footer.php'); ?>
