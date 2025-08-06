<?php
try {
    include __DIR__ . '/../includes/DatabaseConnection.php';
    include __DIR__ . '/../includes/DatabaseFunctions.php';
    deleteUser($pdo, $_GET['id']);
    header('Location: user.php');
} catch (PDOException $e) {
    $title ='Anerror has occurred';
    $output ='Database error' . $e->getMessage();
}
include __DIR__. '/../templates/admin_layout.html.php';
