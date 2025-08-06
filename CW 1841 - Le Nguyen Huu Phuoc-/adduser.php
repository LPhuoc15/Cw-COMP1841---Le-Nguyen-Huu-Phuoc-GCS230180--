<?php
if (isset($_POST['name'])) {
    try {
        include __DIR__ . '/includes/DatabaseConnection.php';
        include __DIR__ . '/includes/DatabaseFunctions.php';

        
        $password = password_hash($_POST['password'] ?? '', PASSWORD_DEFAULT);
        $role = $_POST['role'] ?? 'guest';

        insertUser($pdo, $_POST['name'], $_POST['email'], $password, $role);

        header('Location: index.php');
        exit();
    } catch (PDOException $e) {
        $title = 'An error has occurred';
        $output = 'Database error: ' . $e->getMessage();
    }
} else {
    $title = 'Add a new User';

    ob_start();
    include __DIR__ . '/templates/adduser.html.php';
    $output = ob_get_clean();
}

include __DIR__ . '/templates/layout.html.php';
?>
