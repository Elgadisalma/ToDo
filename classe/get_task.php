<?php
// error_reporting(E_ALL);
// ini_set('display_errors', 1);
?>

<?php
require_once 'config.php';

$sql = "SELECT * FROM tasks";
$result = $link->query($sql);

$donnees_des_taches = array(); 

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Ajoute les données de chaque tâche au tableau
        $donnees_des_taches[] = array(
            'nom_tache' => $row['nom_tache'],
            'description_tache' => $row['description_tache'],
            'deadline' => $row['deadline'],
            'etat_tache' => $row['etat_tache'],
            'id' => $row['id']
        );
    }
}

$link->close();

// Envoie les données au format JSON
header('Content-Type: application/json');
echo json_encode($donnees_des_taches);
?>
