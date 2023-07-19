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

<!-- Cette page doit être utilisée pour affiher la fiche détaillée d'un chalet -->
<?php 

if (isset($_GET['id'])) {
    $chaletId = $_GET['id'];

   
    $requeteChalet = "SELECT * FROM chalets WHERE id = $chaletId";
    $resultatChalet = $mysqli->query($requeteChalet);

    if ($resultatChalet) {
        $chalet = $resultatChalet->fetch_assoc();

        
        if ($chalet) {
            echo '<div class="chalets-card">';
            echo '<main>';
            echo '<img src="https://picsum.photos/id/' . $row['id_picsum'] . '/500" alt="' . $row['nom'] . '">';
            echo '<h1>Fiche détaillée du chalet</h1>';
            echo '<h2>' . $chalet['nom'] . '</h2>';
            echo '<p>' . $chalet['description'] . '</p>';
            echo '<p>Prix basse saison : ' . $chalet['prix_basse_saison'] . ' $</p>';
            echo '<p>Prix haute saison : ' . $chalet['prix_haute_saison'] . ' $</p>';
            echo '<p>Nombre de personnes maximum : ' . $chalet['personnes_max'] . '</p>';
            echo '</main>';
            echo '</div>';
        } else {
            
            echo 'Le chalet demandé n\'existe pas.';
        }

        $resultatChalet->free_result();
    } else {
        echo 'Erreur SQL : ' . $mysqli->error;
    }
} else {

    echo 'ID du chalet non spécifié.';
}


include_once(__DIR__ . '/include/footer.php');

?>



<?php include_once(__DIR__ . './include/footer.php'); ?>