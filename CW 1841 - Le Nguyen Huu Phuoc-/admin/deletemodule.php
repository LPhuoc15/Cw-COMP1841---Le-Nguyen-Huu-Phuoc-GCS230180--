<?php
try {
    include __DIR__ . '/../includes/DatabaseConnection.php';
    include __DIR__ . '/../includes/DatabaseFunctions.php';

    
    if (isset($_GET['id'])) {
        $moduleId = $_GET['id'];

       
        deleteModule($pdo, $moduleId);

       
        header('Location: module.php');
        exit();
    } else {
        throw new Exception('Module ID not provided.');
    }
} catch (PDOException $e) {
    $title = 'An error has occurred';
    $output = 'Database error: ' . $e->getMessage();
} catch (Exception $e) {
    $title = 'An error has occurred';
    $output = 'Error: ' . $e->getMessage();
}