<?php
include('db.php');

if (isset($_POST['id'])) {
    $taskId = $_POST['id'];

    $stmt = $conn->prepare("DELETE FROM tasks WHERE id = ?");
    $stmt->bind_param("i", $taskId);
    $stmt->execute();
    $stmt->close();
}
?>
