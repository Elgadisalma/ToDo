<?php
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    $taskId = $_GET['id'];

    $sql = "DELETE FROM tasks WHERE id = $taskId";

    if ($link->query($sql) === TRUE) {
        header('Content-Type: application/json');
        echo json_encode(['success' => true]);
    } else {
        header('Content-Type: application/json');
        echo json_encode(['success' => false, 'error' => $link->error]);
    }

    $link->close();
} else {
    http_response_code(405);
}
?>
