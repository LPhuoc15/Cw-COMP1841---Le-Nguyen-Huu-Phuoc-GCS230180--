<?php
if (isset($_POST['name'])) {
    try {
    include __DIR__. '/../includes/DatabaseConnection.php';
    include __DIR__. '/../includes/DatabaseFunctions.php';

    insertModule($pdo, $_POST['name']);
    header('Location: module.php');
    exit();
    }catch (PDOException $e) {
    $title = 'Error';
    $output = 'Database error: ' . $e->getMessage();}
}else {
    $title = 'Add Module';
    ob_start();
    include __DIR__ . '/../templates/addmodule.html.php';
    $output = ob_get_clean();
}
include __DIR__ . '/../templates/admin_layout.html.php';
