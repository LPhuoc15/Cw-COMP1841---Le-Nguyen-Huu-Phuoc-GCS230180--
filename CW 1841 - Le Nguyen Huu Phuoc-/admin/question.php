<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['role'] !== 'admin') {
    header('Location: ../login.php');
    exit();
}

try {
    include __DIR__ . '/../includes/DatabaseConnection.php';
    include __DIR__ . '/../includes/DatabaseFunctions.php';

    $posts= allPosts($pdo);
    $totalPosts = totalPosts($pdo);
    $title = 'Questions Database (Admin)';
    ob_start();
    include __DIR__ . '/../templates/admin_question.html.php';
    $output = ob_get_clean();
} catch (PDOException $e) {
    $output = 'Error connecting to the database: ' . $e->getMessage();
}
include __DIR__ . '/../templates/admin_layout.html.php';
?>