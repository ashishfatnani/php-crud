<?php
// edit_task.php
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM tasks WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $task = $result->fetch_assoc();
    } else {
        echo "Task not found.";
        exit;
    }
} else {
    echo "Invalid request.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Task</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>
<body>
    <div class="container">
        <h2>Edit Task</h2>
        <form id="editTaskForm" action="update_task.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $task['id']; ?>">
            <div class="form-group">
                <label for="name">Task Name</label>
                <input type="text" name="name" id="name" value="<?php echo $task['name']; ?>" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" required><?php echo $task['description']; ?></textarea>
            </div>
            <button type="submit" class="btn">Update Task</button>
        </form>
    </div>
</body>
</html>
