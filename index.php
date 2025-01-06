<?php
include 'db.php';

// Fetch tasks
$sql = "SELECT * FROM tasks ORDER BY created_at DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Manager</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Task Manager</h1>
        <form action="add_task.php" method="POST">
            <input type="text" name="name" placeholder="Task Name" required>
            <textarea name="description" placeholder="Task Description" required></textarea>
            <button type="submit">Add Task</button>
        </form>
        <hr>
        <h2>Your Tasks</h2>
        <?php if ($result->num_rows > 0): ?>
            <ul>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <li>
                        <strong><?php echo $row['name']; ?></strong>
                        <p><?php echo $row['description']; ?></p>
                        <a href="edit_task.php?id=<?php echo $row['id']; ?>">Edit</a>
                        <a href="delete_task.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure?')">Delete</a>
                    </li>
                <?php endwhile; ?>
            </ul>
        <?php else: ?>
            <p>No tasks yet. Add one above!</p>
        <?php endif; ?>
    </div>
</body>
</html>
