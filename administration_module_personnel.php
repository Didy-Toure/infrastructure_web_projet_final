<?php 
include_once(__DIR__ . '/include/header.php'); 
$username = "root";
$password = "mysql";
$host = "localhost";
$database = "Chalet_final2023";

$mysqli = new mysqli($host, $username, $password, $database);

// Vérifier la connexion
/*if ($mysqli->connect_errno) {
    echo "Échec de connexion à la base de données MySQL: " . $mysqli->connect_error;
    exit();
}*/
?>

<main>
    <h1>Administration - Module personnel</h1>

	
	
    <?php

    $requeteProduit = "SELECT * FROM produit";
    $resultatProduit = $mysqli->query($requeteProduit);
    ?>

<!--Affichage des produits-->

  <h2>Liste des produits</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Action</th> 
        </tr>
        <?php
        while ($ligne = $resultatProduit->fetch_assoc()) {
            echo "<tr><td>" . $ligne['id'] . "</td><td>" . $ligne['nom'] . "</td>";
            
            echo '<td><a href="modifier_produit.php?id=' . $ligne['id'] . '">Modifier</a>';
            
            echo ' | <a href="supprimer_produit.php?id=' . $ligne['id'] . '">Supprimer</a></td></tr>';
        }
        ?>
    </table>


    <?php

    $requeteCategorie = "SELECT * FROM categorie";
    $resultatCategorie = $mysqli->query($requeteCategorie);
    ?>

    <!-- Affichage des catégories -->
    <h2>Liste des catégories</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Nom</th>
        </tr>
        <?php
        while ($ligne = $resultatCategorie->fetch_assoc()) {
            echo "<tr><td>" . $ligne['id'] . "</td><td>" . $ligne['nom'] . "</td></tr>";
        }
        ?>
		
		
    </table>
	<!-- Ajouter un produit -->

	<form action="ajouter_produit.php" method="POST">
		<h3>Ajout d'un produit</h3>
        <label for="nom">Nom :</label>
        <input type="text" name="nom" id="nom" required>
        <!-- Ajoute d'autres champs pour les autres informations du produit -->
        <button type="submit">Ajouter</button>
    </form>

	<!-- Modifier un produit -->
	<form action="modifier_produit.php" method="POST">
		<h3>Modification d'un produit</h3>
		<label for="id">ID du produit :</label>
		<input type="number" name="id" id="id" required>
		<label for="nouveau_nom">Nouveau nom :</label>
		<input type="text" name="nouveau_nom" id="nouveau_nom" required>
		<!-- Ajoute d'autres champs pour les autres informations du produit -->
		<button type="submit">Modifier</button>
	</form>
	


</main>

<?php include_once(__DIR__ . '/include/footer.php'); ?>
