<?php
include '../includes/DatabaseFunctions.php';
include '../includes/DatabaseConnection.php';
try {
    if(isset($_POST['name'], $_POST['email'], $_POST['id'])) {
        updateUser($pdo, $_POST['id'], $_POST['name'], $_POST['email'], $_POST['password'] ?? null);
        header('Location: user.php');
    exit();
    }else{
        $user = getUser($pdo, $_GET['id']);
        $title = 'Edit User';
        ob_start();
        include '../templates/edituser.html.php';
        $output = ob_get_clean();
    }
    
}catch (PDOException $e) {
    $title = 'Error';
    $output = 'Error: ' . $e->getMessage();
}include '../templates/admin_layout.html.php';