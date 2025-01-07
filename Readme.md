# PHP CRUD Application with jQuery

This is a simple CRUD (Create, Read, Update, Delete) application built with PHP, MySQL, and jQuery. It allows users to manage tasks by adding, editing, and deleting them. The application is structured with a clean and minimalistic user interface, which leverages jQuery for interactions and PHP for backend logic.

## Project Features

- **Create**: Add new tasks to the database.
- **Read**: View the list of tasks.
- **Update**: Edit existing tasks.
- **Delete**: Remove tasks from the database.

## Requirements

- **PHP** (>= 7.4)
- **MySQL** (>= 5.7)
- **Apache Web Server** (with mod_rewrite enabled)
- **jQuery** (For frontend interactions)

## Setup Instructions

### 1. Clone the Repository

Clone the repository to your local machine using:

```bash
git clone https://github.com/ashishfatnani/php-crud
```

### 2. Install XAMPP

Download and install XAMPP, which includes Apache, MySQL, and PHP for local development.

Start the Apache and MySQL servers in XAMPP.

### 3. Setup MySQL Database

- Open phpMyAdmin in your browser: http://localhost/phpmyadmin.
- Create a new database named php_crud or any other name of your choice.
- Create a table called tasks with the following columns:

```sql
CREATE TABLE tasks (
   task_id INT AUTO_INCREMENT PRIMARY KEY,
   name VARCHAR(255) NOT NULL,
   task_desc TEXT NOT NULL,
   created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

### 4. Update Database Configuration

- In the db.php file, update the MySQL connection settings to match your local environment:

```php
$servername = "localhost";
$username = "root";  // Default username
$password = "";      // Default password (leave empty if you didn't set one)
$dbname = "php_crud"; // Database name
```

### 5. Start the Application

- Place the project folder inside the htdocs directory of your XAMPP installation (usually located at C:\xampp\htdocs).
- Open your browser and navigate to http://localhost/php-crud.

### 6. Features

- Create Task: Fill out the task name and description in the form to add a task.
- Edit Task: Click on the "Edit" button next to any task to edit its details.
- Delete Task: Click on the "Delete" button to remove a task from the database.

```bash
/php-crud
│
├── db.php                 # MySQL database configuration
├── index.php              # Main page to display tasks
├── edit_task.php          # Page to edit tasks
├── delete_task.php        # Delete task logic
├── fetch_tasks.php        # Fetch and display tasks
├── update_task.php        # Update task logic
└── style.css
```
