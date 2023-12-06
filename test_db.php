<?php
require_once 'db.php'; // Include your database connection file

try {
    // Attempt to query the database
    $stmt = $pdo->query("SELECT * FROM tasks"); // Replace 'tasks' with your table name
    $tasks = $stmt->fetchAll();

    // Display the results
    echo "<pre>";
    print_r($tasks);
    echo "</pre>";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
