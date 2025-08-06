<?php
session_start();


if (!isset($_SESSION['loggedin'])) {
    header('Location: ../login.php');
    exit();
}

try {
    include __DIR__ . '/../includes/DatabaseFunctions.php';
    include __DIR__ . '/../includes/DatabaseConnection.php';

    
    $userIdToEdit = $_SESSION['userid'];

    if (isset($_POST['name'], $_POST['email'])) {
        if ($_POST['id'] != $userIdToEdit) {
            
            throw new Exception('You are not authorized to edit this user.');
        }

        $password = null;
        if (!empty($_POST['password'])) {
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        }

        updateUser($pdo, $userIdToEdit, $_POST['name'], $_POST['email'], $password);
        
        
        $_SESSION['username'] = $_POST['name'];

        header('Location: index.php'); 
        exit();
    } else {
        
        $user = getUser($pdo, $userIdToEdit);
        
        if (!$user) {
           
            throw new Exception('User not found.');
        }

        $title = 'Edit Your Profile';
        ob_start();
        include __DIR__ . '/../templates/edituser.html.php';
        $output = ob_get_clean();
    }
    
} catch (PDOException $e) {
    $title = 'Error';
    $output = 'Database Error: ' . $e->getMessage();
} catch (Exception $e) {
    $title = 'Error';
    $output = 'Error: ' . $e->getMessage();
}

include __DIR__ . '/../templates/guest_layout.html.php';