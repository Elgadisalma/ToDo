<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <title>To-Do List</title>
</head>
<body>

<div class="container mt-5">
    <h2>To-Do List</h2>

    <a href="add_task.html"><button>Add Task</button></a>

    <table class="table mt-3">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Description</th>
                <th>Deadline</th>
                <th>État</th>
                <th>Actions</th>
            </tr>
        </thead>
        
        <tbody id="taskTableBody">
        <?php
            include_once './classe/get_task.php';
            $tasks = getTasks();
            foreach ($tasks as $task) {
        ?>
            <tr>
                <td><?php echo $task['nom_tache'] ;?></td>
                <td><?php echo $task['description_tache'] ;?> </td>
                <td><?php echo $task['deadline'] ;?> </td>
                <td><?php echo $task['etat_tache'] ;?> </td>
                
                <td>
                <button class="btn btn-warning btn-sm" onclick="editTask(${task.id})">
                    <i class="fas fa-edit"></i> Modifier
                </button>
                <button class="btn btn-danger btn-sm" onclick="deleteTask(${task.id})">
                <i class="fas fa-trash"></i> Supprimer
                </button>


            </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

<script>
    // Fonction pour ajouter les tâches au tableau
function addTasksToTable(tasks) {
    var tableBody = document.getElementById('taskTableBody');

    tasks.forEach(task => {
        var row = document.createElement('tr');
        row.innerHTML = `
            <td>${task.nom_tache}</td>
            <td>${task.description_tache}</td>
            <td>${task.deadline}</td>
            <td>${task.etat_tache}</td>
            <td>
                <button class="btn btn-warning btn-sm" onclick="editTask(${task.id})">
                    <i class="fas fa-edit"></i> Modifier
                </button>
                <button class="btn btn-danger btn-sm" onclick="deleteTask(${task.id})">
                <i class="fas fa-trash"></i> Supprimer
                </button>


            </td>
        `;

        tableBody.appendChild(row);
    });
}

fetch('./classe/get_task.php')
    .then(response => response.json())
    .then(data => addTasksToTable(data)) 
    .catch(error => console.error('Erreur lors de la récupération des tâches:', error));

</script>

<script>
    function deleteTask(taskId) {
    fetch(`./classe/delete_task.php?id=${taskId}`, {
        method: 'DELETE'
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            console.log("Tâche supprimée avec succès!");
        } else {
            console.error("Erreur lors de la suppression de la tâche:", data.error);
        }
    })
    .catch(error => console.error('Erreur lors de la suppression de la tâche:', error));
}

</script>


</body>
</html>
