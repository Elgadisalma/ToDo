<?php
require_once 'config.php';

if(isset($_POST['submit'])){
    $taskName = $_POST['taskName'];
    $taskDescription = $_POST['taskDescription'];
    $taskDeadline = $_POST['taskDeadline'];

    $sql = "INSERT INTO tasks (nom_tache, description_tache, deadline) VALUES ('$taskName', '$taskDescription', '$taskDeadline')";

    if ($link->query($sql) === TRUE) {
        // echo "La tâche a été ajoutée avec succès!";
        header("location:../index.php?task=added_successfully");
        exit();
    } else {
        echo "Erreur: " . $link->error;
    }

    $link->close();
}


?>
