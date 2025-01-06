<?php
// update_task.php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $description = $_POST['description'];

    $sql = "UPDATE tasks SET name = ?, description = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ssi', $name, $description, $id);

    if ($stmt->execute()) {
        header("Location: index.php?msg=Task updated successfully");
        exit;
    } else {
        echo "Error updating task: " . $stmt->error;
    }
} else {
    echo "Invalid request.";
    exit;
}
?>
