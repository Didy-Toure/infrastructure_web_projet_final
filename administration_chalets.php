<?php include_once(__DIR__ . './include/header.php'); ?>

<?php
session_start();

if (!isset($_SESSION["nom_utilisateur"])) {
    echo '<script type="text/javascript">alert("Erreur : Accès non autorisé. Veuillez vous connecter."); window.location.href = "index.php";</script>';
    exit();
}
?>






<main>
  
	<h1>Administration - Chalets</h1>

	<p>
		<b>En construction. On présume que cette partie serait réalisée dans une phase ultérieure.</b>
	</p> 

	<p>
		Il doit être impossible d'accéder à cette page sans être préalablement connecté.<br> 
		Le menu Administration doit être présent seulement si l'utilisateur est connecté. <br>
		Si un utilisateur non connecté essaie d'accéder à la page, un message d'erreur doit s'afficher.
	</p>
</main>

