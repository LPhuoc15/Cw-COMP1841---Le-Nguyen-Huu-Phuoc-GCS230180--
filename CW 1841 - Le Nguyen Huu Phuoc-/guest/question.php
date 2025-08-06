<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
    header('Location: ../login.php');
    exit();
}

try {
    include __DIR__ . '/../includes/DatabaseConnection.php';
    include __DIR__ . '/../includes/DatabaseFunctions.php';

    $posts= allPosts($pdo);
    $totalPosts = totalPosts($pdo);
    $title = 'Questions Database';
    ob_start();
    include __DIR__ . '/../templates/guest_question.html.php';
    $output = ob_get_clean();
} catch (PDOException $e) {
    $output = 'Error connecting to the database: ' . $e->getMessage();
}
include __DIR__ . '/../templates/guest_layout.html.php';
?>