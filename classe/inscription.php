<?php
// Récupérez les données du formulaire
$nom_utilisateur = $_POST['nom_utilisateur'];
$mot_de_passe = password_hash($_POST['mot_de_passe'], PASSWORD_DEFAULT); // Hachez le mot de passe

require_once "config.php";


if (!$connexion) {
    die("La connexion à la base de données a échoué : " . mysqli_connect_error());
}

// Préparez la requête d'insertion (insérez les informations dans la table "utilisateur")
$requete = "INSERT INTO utilisateur (nom_utilisateur, mot_de_passe) VALUES ('$nom_utilisateur', '$mot_de_passe')";

// Exécutez la requête
if (mysqli_query($connexion, $requete)) {
    echo "Inscription réussie. Vous pouvez vous connecter.";
} else {
    echo "Erreur lors de l'inscription : " . mysqli_error($connexion);
}

// Fermez la connexion à la base de données
mysqli_close($connexion);
?>
