<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add New Task</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
  
</body>
</html>
<?php
require_once 'db.php';

$taskId = $_GET['id']; // Get the task ID from the URL

$sql = "DELETE FROM tasks WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':id', $taskId, PDO::PARAM_INT);

if ($stmt->execute()) {
     // HTML to display the video
     echo '<div class="container-edit-succses">';
     echo '<p>Task deleted successfully.</p>';
     echo '<video class="video-delete"  autoplay>';
     echo '<source src="videos/del-video.mp4" type="video/mp4">'; // Replace with your video path
     echo 'Your browser does not support the video tag.';
     echo '</video>';
     echo '<script>setTimeout(function(){ window.location.href = "index.php"; }, 1500);</script>';
     echo '</div>';
     exit();
}

?>
