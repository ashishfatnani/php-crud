<?php include('db.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Task Manager</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <div class="container">
        <h2>Task Manager</h2>
        
        <!-- Add Task Form -->
        <form id="add-task-form" method="POST">
            <div class="form-group">
                <label for="name">Task Name:</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="description">Task Description:</label>
                <textarea id="description" name="description" required></textarea>
            </div>
            <button type="submit">Add Task</button>
        </form>

        <h3>Task List</h3>
        <div id="task-list">
            <!-- Tasks will be dynamically loaded here -->
        </div>
    </div>

    <script>
        $(document).ready(function() {
            // Fetch tasks initially
            fetchTasks();

            // Add task via AJAX
            $('#add-task-form').submit(function(e) {
                e.preventDefault();
                const taskName = $('#name').val();  // Changed to name
                const taskDesc = $('#description').val();

                $.ajax({
                    url: 'add_task.php',
                    type: 'POST',
                    data: { name: taskName, description: taskDesc },  // Changed to name
                    success: function(response) {
                        // Reset the form
                        $('#name').val('');  // Changed to name
                        $('#description').val('');
                        // Reload the task list
                        fetchTasks();
                    }
                });
            });

            // Delete task via AJAX
            $(document).on('click', '.delete-btn', function() {
                const taskId = $(this).data('id');

                $.ajax({
                    url: 'delete_task.php',
                    type: 'POST',
                    data: { id: taskId },
                    success: function(response) {
                        fetchTasks();
                    }
                });
            });
        });

        // Function to fetch tasks
        function fetchTasks() {
            $.ajax({
                url: 'fetch_tasks.php',
                type: 'GET',
                success: function(response) {
                    $('#task-list').html(response);
                }
            });
        }
    </script>
</body>
</html>
