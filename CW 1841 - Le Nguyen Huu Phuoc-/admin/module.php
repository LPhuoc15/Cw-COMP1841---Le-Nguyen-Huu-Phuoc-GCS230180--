<?php

include '../includes/DatabaseConnection.php';
include '../includes/DatabaseFunctions.php';
try {
    $module = allModules($pdo);
    $totalModules = totalModules($pdo);
    $deleteModule = deleteModule($pdo, $_GET['id'] ?? null);
    $title = 'Questions Database';
    ob_start();
    include '../templates/module.html.php';
    $output = ob_get_clean();
} catch (PDOException $e) {
    $output = 'Error connecting to the database: ' . $e->getMessage();
}include '../templates/admin_layout.html.php';