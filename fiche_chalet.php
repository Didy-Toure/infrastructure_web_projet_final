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
<!-- Elle est volontairement vide, c'est à vous de la construire -->

<!-- La mise en forme est à votre discrétion. -->
<!-- Les informations à afficher sont le nom du chalet, la date,le format de votre choix, la
description longue, et le prix -->


<!-- Assurez-vous que la page affiche l'entête et le pied de page, comme les autres pages -->

<?php include_once(__DIR__ . './include/footer.php'); ?>