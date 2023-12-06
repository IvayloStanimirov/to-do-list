<?php
require_once 'db.php';

// Get the task ID from the URL
$taskId = isset($_GET['id']) ? (int)$_GET['id'] : 0;

// Fetch the task data from the database
$sql = "SELECT * FROM tasks WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':id', $taskId, PDO::PARAM_INT);
$stmt->execute();
$task = $stmt->fetch();

if (!$task) {
    echo "Task not found";
    exit;
}

// Form with task data
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add/Edit Task</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Add/Edit Task</h1>
    </header>

    <main>
    <h2>Edit Task</h2>
    <form action="edit.php?id=<?= $taskId ?>" method="post">
        <label for="title">Title:</label>
        <input type="text" name="title" id="title" value="<?= htmlspecialchars($task['title']) ?>" required>

        <label for="description">Description:</label>
        <textarea name="description" id="description"><?= htmlspecialchars($task['description']) ?></textarea>

        <input type="submit" name="submit" value="Update Task">
    </form>
    </main>

    <footer>
        <p>&copy; 2023 To-Do List Application</p>
    </footer>
</body>
</html>




<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];

    // Update the task in the database
    $sql = "UPDATE tasks SET title = :title, description = :description WHERE id = :id";
    $stmt = $pdo->prepare($sql);

    $stmt->bindParam(':title', $title, PDO::PARAM_STR);
    $stmt->bindParam(':description', $description, PDO::PARAM_STR);
    $stmt->bindParam(':id', $taskId, PDO::PARAM_INT);

    if ($stmt->execute()) {
        echo '<div class="container-edit-succses">';
        echo '<p>Task Edit successfully.</p>';
        echo '<img src="images/edit-image.png" class="edit-image" alt="Deleted"/>'; // Replace with your image path
        echo '<script>setTimeout(function(){ window.location.href = "index.php"; }, 1500);</script>';
        echo '</div>';
        exit();;
        exit();
    }        
}

?>
