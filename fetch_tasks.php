
<?php
include('db.php');

$result = $conn->query("SELECT * FROM tasks");

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo '<div class="task-item">';
        echo '<h4>' . $row['name'] . '</h4>';  // Changed task_name to name
        echo '<p>' . $row['description'] . '</p>';
        echo '<small>' . $row['created_at'] . '</small>';
        echo '<div class="task-actions">';
        echo '<button class="edit-btn" onclick="window.location=\'edit_task.php?id=' . $row['id'] . '\'">Edit</button>';
        echo '<button class="delete-btn" data-id="' . $row['id'] . '">Delete</button>';
        echo '</div>';
        echo '</div>';
    }
} else {
    echo 'No tasks found';
}
?>

