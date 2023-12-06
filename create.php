





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
    <form action="create.php" method="post">
        <label for="title">Title:</label>
        <input type="text" name="title" id="title" required>

        <label for="description">Description:</label>
        <textarea name="description" id="description"></textarea>

        <input type="submit" name="submit" class="btn" value="Add Task">
    </form>
    </main>

    <footer>
        <p>&copy; 2023 To-Do List Application</p>
    </footer>
</body>
</html>







<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    require_once 'db.php'; // Ensure you have a db.php file with your PDO connection

    $title = $_POST['title'];
    $description = $_POST['description'];

    $sql = "INSERT INTO tasks (title, description) VALUES (:title, :description)";
    $stmt = $pdo->prepare($sql);

    $stmt->bindParam(':title', $title, PDO::PARAM_STR);
    $stmt->bindParam(':description', $description, PDO::PARAM_STR);

    if ($stmt->execute()) {
        echo '<div class="container-edit-succses">';
        echo '<p>Task Created successfully.</p>';
        echo '<img src="images/creat-image.png" class="edit-image" alt="Deleted"/>'; // Replace with your image path
        echo '<script>setTimeout(function(){ window.location.href = "index.php"; }, 1500);</script>';
        echo '</div>';
        exit();;
        exit();
    }   
}
?>
