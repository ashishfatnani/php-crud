<?php
include 'db.php';

// Fetch the task data if the ID is provided
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $id = (int)$_GET['id'];
    $sql = "SELECT * FROM tasks WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $task = $result->fetch_assoc();
    } else {
        echo "Task not found!";
        exit;
    }
}

// Handle the update request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = (int)$_POST['id'];
    $name = $conn->real_escape_string($_POST['name']);
    $description = $conn->real_escape_string($_POST['description']);

    $sql = "UPDATE tasks SET name = '$name', description = '$description' WHERE id = $id";
    if ($conn->query($sql) === TRUE) {
        header('Location: index.php');
    } else {
        echo 'Error updating task: ' . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Task</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Edit Task</h1>
        <form action="edit_task.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $task['id']; ?>">
            <input type="text" name="name" value="<?php echo $task['name']; ?>" placeholder="Task Name" required>
            <textarea name="description" placeholder="Task Description" required><?php echo $task['description']; ?></textarea>
            <button type="submit">Update Task</button>
        </form>
        <a href="index.php" class="btn-back">Back to Task List</a>
    </div>
</body>
</html>
