
<?php
function getTasks() {
    require_once 'config.php';
    $tasks = [];
    
    
        $sql = "SELECT * FROM tasks  ;";
        $result = $link->query($sql);
        if(mysqli_num_rows($result) > 0){
            while ($row = $result->fetch_assoc()) {
                $tasks[] = $row;
            }
        }else {
            echo "No tasks found.";
        }
        mysqli_free_result($result);
        mysqli_close($link);

    
    return $tasks;

}

// $tas = getTasks();
// foreach($tas as $t){
//     echo $t['nom_tache'];
// }

