<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['role'] !== 'guest') {
    header('Location: ../login.php');
    exit();
}

$messageSent = false;
$error = '';

try {
    include __DIR__ . '/../includes/DatabaseConnection.php';
    include __DIR__ . '/../includes/DatabaseFunctions.php';

    if (isset($_POST['text'])) {
        insertContact($pdo, $_SESSION['userid'], $_POST['text']);
        $messageSent = true;
    }

    $title = 'Contact Admin';
    ob_start();
    include __DIR__ . '/../templates/contact.html.php';
    $output = ob_get_clean();

} catch (PDOException $e) {
    $error = 'Database error: ' . $e->getMessage();
    $title = 'An error has occurred';
    $output = $error;
}

include __DIR__ . '/../templates/guest_layout.html.php';