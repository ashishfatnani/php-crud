<?php
require 'db.php';

$result = $conn->query("SELECT * FROM tasks ORDER BY id DESC");

$output = '<ul>';
while ($row = $result->fetch_assoc()) {
    $output .= "<li>
        <strong>{$row['name']}</strong>: {$row['description']}
        <button class='edit-task' data-id='{$row['id']}' data-name='{$row['name']}' data-description='{$row['description']}'>Edit</button>
        <button class='delete-task' data-id='{$row['id']}'>Delete</button>
    </li>";
}
$output .= '</ul>';

echo $output;
?>
