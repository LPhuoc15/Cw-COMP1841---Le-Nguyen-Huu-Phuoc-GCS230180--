<?php
include '../includes/DatabaseConnection.php';
include '../includes/DatabaseFunctions.php';
try {
    $user = allUsers($pdo);
    $totalUsers = totalUsers($pdo);
    $deleteUsers = deleteUser($pdo, $_GET['id'] ?? null);
    $title = 'Questions Database';
    ob_start();
    include '../templates/user.html.php';
    $output = ob_get_clean();
} catch (PDOException $e) {
    $output = 'Error connecting to the database: ' . $e->getMessage();
}include '../templates/admin_layout.html.php';