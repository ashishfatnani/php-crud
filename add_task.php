<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $conn->real_escape_string($_POST['name']);
    $description = $conn->real_escape_string($_POST['description']);

    $sql = "INSERT INTO tasks (name, description) VALUES ('$name', '$description')";
    if ($conn->query($sql) === TRUE) {
        header('Location: index.php');
    } else {
        echo 'Error: ' . $conn->error;
    }
}
?>
