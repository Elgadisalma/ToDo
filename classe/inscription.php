<?php
// Récupérez les données du formulaire
$nom_utilisateur = $_POST['nom_utilisateur'];
$mot_de_passe = password_hash($_POST['mot_de_passe'], PASSWORD_DEFAULT); // Hachez le mot de passe

require_once'config.php';



// Préparez la requête d'insertion (insérez les informations dans la table "utilisateur")
$requete = "INSERT INTO utilisateur (nom_utilisateur, mot_de_passe) VALUES ('$nom_utilisateur', '$mot_de_passe')";

// Exécutez la requête
if (mysqli_query($link, $requete)) {
    echo "Inscription réussie. Vous pouvez vous connecter.";
} else {
    echo "Erreur lors de l'inscription : " . mysqli_error($link);
}

// Fermez la connexion à la base de données
mysqli_close($link);
?>
