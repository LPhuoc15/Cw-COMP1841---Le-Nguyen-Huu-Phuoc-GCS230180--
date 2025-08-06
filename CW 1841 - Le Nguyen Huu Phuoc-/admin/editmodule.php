<?php
include '../includes/DatabaseFunctions.php';
include '../includes/DatabaseConnection.php';
try {
    if(isset($_POST['name'],$_POST['id'])) {
        updateModule($pdo, $_POST['id'], $_POST['name']);
        header('Location: module.php');
        exit();
    } else {
        $module = getModule($pdo, $_GET['id']);
        $title = 'Edit Module';
        ob_start();
        include '../templates/editmodule.html.php';
        $output = ob_get_clean();
    }
    
} catch (PDOException $e) {
    $title = 'Error';
    $output = 'Error: ' . $e->getMessage();
}
include '../templates/admin_layout.html.php';