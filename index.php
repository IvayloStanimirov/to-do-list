<?php
require_once 'db.php';

$sql = "SELECT * FROM tasks";
$stmt = $pdo->query($sql);
$tasks = $stmt->fetchAll();
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>To-Do List</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>To-Do List</h1>
    </header>

    <main>
        <a href="create.php" class="btn">Add New Task</a>
        <ul class="task-list">
            <?php foreach ($tasks as $task): ?>
                <li class="task-item">
                    <div class="task-content">
                        <h3 class="task-title"><?= htmlspecialchars($task['title']) ?></h3>
                        <p class="task-description"><?= htmlspecialchars($task['description']) ?></p>
                    </div>
                    <div class="task-actions">
                        <a href="edit.php?id=<?= $task['id'] ?>" class="btn edit-btn">Edit</a>
                        <a href="delete.php?id=<?= $task['id'] ?>" class="btn delete-btn">Delete</a>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
    </main>

    <footer>
        <p>&copy; 2023 To-Do List Application</p>
    </footer>
</body>
</html>


