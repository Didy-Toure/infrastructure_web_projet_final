<?php
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

<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['nom_utilisateur'];
    $password = $_POST['mot_de_passe'];

    
    $requete = $mysqli->prepare("SELECT mot_de_passe FROM utilisateurs WHERE utilisateur = ?");
    $requete->bind_param("s", $username);
    $requete->execute();
    $result = $requete->get_result();
    $utilisateur = $result->fetch_assoc();

    
    if ($utilisateur && password_verify($password, $utilisateur["mot_de_passe"])) {
  
        $_SESSION["nom_utilisateur"] = $username;
        header("Location: administration_chalets.php");
        exit();
    } else {
        //message d'erreur
        $messageErreur = "Erreur d'authentification";
    }

    $requete->close();
}
?>



<!DOCTYPE html>
<html lang="fr-CA">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title> Vacances Québec | Chalet 2023 </title>
  
  <link rel="stylesheet" href="css/styles.css">
</head>

<body class="light-mode">

  <!-- Navigation -->
  <header>
    <nav>
      <img src="https://picsum.photos/id/13/80" alt="logo">
      <ul>
          <li><a href="index.php">Accueil</a></li>
          <li><a href="liste_chalets_en_promotion.php">Chalets en promotion</a></li>

          <li>
            <a href="liste_chalets_par_region.php">Chalets par région &nbsp;<i class="arrow down"></i></a>
            <ul>
      <?php
      $query = "SELECT id, nom FROM regions";
      $result = $mysqli->query($query);

      if ($result) {
        while ($row = $result->fetch_assoc()) {
          echo '<li><a href="liste_chalets_par_region.php?region=' . $row['id'] . '">' . $row['nom'] . '</a></li>';
        }
        $result->free_result();
      }
      ?>

               
            </ul>
          </li>
          <li><a href="liste_chalets.php">Chalets à louer</a></li>
          <li><a href="module_personnel.php">Module personnel</a></li>
          <li>
            <a href="administration_chalets.php">Administration &nbsp;<i class="arrow down"></i></a>
            <ul>
              <li><a href="administration_chalets.php">Chalets</a></li>
              <li><a href="administration_module_personnel.php">Module personnel</a></li>
            </ul>
          </li>
      </ul>




    


      <!-- Formulaire de connexion -->
      <dialog id="dialog_login">   

    
          <form action="administration_chalets.php" method="POST">
            <input type="text" name="nom_utilisateur" placeholder="Utilisateur">

            <input type="password" name="mot_de_passe" placeholder="Mot de passe">

            <button>Connexion</button>
            
            
            <button id="close" class="annuler" aria-label="close" formnovalidate onclick="document.getElementById('dialog_login').close();">Annuler</button>
<?php if (isset($messageErreur)) { ?>
        <p><?php echo $messageErreur; ?></p>
    <?php } ?>

          </form> 
      </dialog>        
      <button onclick="document.getElementById('dialog_login').showModal();">Connexion</button>
    </nav>
    <hr>
  </header>

  
