<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Manager</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <div class="container">
        <h1>Task Manager</h1>
        <form id="addTaskForm">
            <input type="text" id="taskName" placeholder="Task Name" required>
            <textarea id="taskDescription" placeholder="Task Description" required></textarea>
            <button type="submit">Add Task</button>
        </form>
        <div id="tasks"></div>
    </div>

    <script>
        $(document).ready(function () {
            // Load tasks on page load
            function loadTasks() {
                $.ajax({
                    url: 'fetch_tasks.php',
                    type: 'GET',
                    success: function (response) {
                        $('#tasks').html(response);
                    }
                });
            }
            loadTasks();

            // Add new task
            $('#addTaskForm').on('submit', function (e) {
                e.preventDefault();
                const taskName = $('#taskName').val();
                const taskDescription = $('#taskDescription').val();

                $.post('add_task.php', { name: taskName, description: taskDescription }, function (response) {
                    alert(response.message);
                    loadTasks();
                    $('#addTaskForm')[0].reset();
                }, 'json');
            });

            // Delete task
            $(document).on('click', '.delete-task', function () {
                const taskId = $(this).data('id');
                $.post('delete_task.php', { id: taskId }, function (response) {
                    alert(response.message);
                    loadTasks();
                }, 'json');
            });

            // Edit task
            $(document).on('click', '.edit-task', function () {
                const taskId = $(this).data('id');
                const taskName = prompt("Edit Task Name:", $(this).data('name'));
                const taskDescription = prompt("Edit Task Description:", $(this).data('description'));

                if (taskName && taskDescription) {
                    $.post('edit_task.php', { id: taskId, name: taskName, description: taskDescription }, function (response) {
                        alert(response.message);
                        loadTasks();
                    }, 'json');
                }
            });
        });
    </script>
</body>
</html>
