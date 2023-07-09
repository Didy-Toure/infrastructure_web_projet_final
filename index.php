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
      <div class="card">
        <img src="https://picsum.photos/id/380/500" alt="Chalet #1">
        <div class="container">
          <h4>Chalet #1</h4>
          <span>à partir de 0,00 $</span>
          <a href="#">Pour en savoir plus</a>
        </div>
      </div>

      <div class="card">
        <img src="https://picsum.photos/id/10/500" alt="Chalet #2">
        <div class="container">
          <h4>Chalet #2</h4>
          <span>à partir de 0,00 $</span>
          <a href="#">Pour en savoir plus</a>
        </div>
      </div>

      <div class="card">
        <img src="https://picsum.photos/id/13/500" alt="Chalet #3">
        <div class="container">
          <h4>Chalet #3</h4>
          <span>à partir de 0,00 $</span>
          <a href="#">Pour en savoir plus</a>
        </div>
      </div>

      <div class="card">
        <img src="https://picsum.photos/id/14/500" alt="Chalet #4">
        <div class="container">
          <h4>Chalet #4</h4>
          <span>à partir de 0,00 $</span>
          <a href="#">Pour en savoir plus</a>
        </div>
      </div>

      <div class="card">
        <img src="https://picsum.photos/id/17/500" alt="Chalet #5">
        <div class="container">
          <h4>Chalet #5</h4>
          <span>à partir de 0,00 $</span>
          <a href="#">Pour en savoir plus</a>
        </div>
      </div>

      <div class="card">
        <img src="https://picsum.photos/id/28/500" alt="Chalet #6">
        <div class="container">
          <h4>Chalet #6</h4>
          <span>à partir de 0,00 $</span>
          <a href="#">Pour en savoir plus</a>
        </div>
      </div>


  </div>

</main>

<!-- Footer -->
<?php include_once(__DIR__ . '/include/footer.php'); ?>
