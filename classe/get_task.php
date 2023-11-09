<?php
// error_reporting(E_ALL);
// ini_set('display_errors', 1);

require_once 'config.php';

$sql = "SELECT * FROM tasks";
$result = $link->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['nom_tache'] . "</td>";
        echo "<td>" . $row['description_tache'] . "</td>";
        echo "<td>" . $row['deadline'] . "</td>";
        echo "<td>" . $row['etat_tache'] . "</td>";
        echo "<td>
                <button class='btn btn-warning btn-sm' onclick='editTask(" . $row['id'] . ")'>
                    <i class='fas fa-edit'></i> Modifier
                </button>
                <button class='btn btn-danger btn-sm' onclick='deleteTask(" . $row['id'] . ")'>
                    <i class='fas fa-trash'></i> Supprimer
                </button>
            </td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='5'>Aucune tâche trouvée</td></tr>";
}

$link->close();
?>
