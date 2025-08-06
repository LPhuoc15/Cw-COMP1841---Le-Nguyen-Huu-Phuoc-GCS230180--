<?php
$title = 'Log In';
session_start();


if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    if ($_SESSION['role'] === 'admin') {
        header('Location: admin/index.php');
    } else {
        header('Location: guest/index.php');
    }
    exit();
}

if (isset($_POST['email'])) {
    try {
        include __DIR__ . '/includes/DatabaseConnection.php';
        include __DIR__ . '/includes/DatabaseFunctions.php';

        $user = getUserByEmail($pdo, $_POST['email']);

        if ($user && password_verify($_POST['password'], $user['password'])) {
            session_regenerate_id();
            $_SESSION['loggedin'] = true;
            $_SESSION['userid'] = $user['id'];
            $_SESSION['username'] = $user['name'];
            $_SESSION['role'] = $user['role'];

            if ($_SESSION['role'] === 'admin') {
                header('Location: admin/index.php');
            } else {
                header('Location: guest/index.php');
            }
            exit();
        } else {
            $loginError = 'Invalid email or password.';
        }

    } catch (PDOException $e) {
        $title = 'An error has occurred';
        $output = 'Database error: ' . $e->getMessage();
    }
}

ob_start();
include __DIR__ . '/templates/login.html.php';
$output = ob_get_clean();
include __DIR__ . '/templates/layout.html.php';
?>