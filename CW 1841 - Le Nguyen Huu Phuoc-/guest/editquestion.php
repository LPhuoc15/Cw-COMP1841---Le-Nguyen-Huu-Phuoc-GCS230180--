<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
    header('Location: ../login.php');
    exit();
}

try {
    include __DIR__ . '/../includes/DatabaseConnection.php';
    include __DIR__ . '/../includes/DatabaseFunctions.php';

    if(isset($_POST['postsid'])) {
        $post = getPost($pdo, $_POST['postsid']);
        if ($post['usersid'] != $_SESSION['userid']) {
           
            header('Location: question.php');
            exit();
        }
        
        updatePost($pdo, $_POST['postsid'], $_POST['question'], $filename);
        header('Location: question.php');
        exit();
    } else {
        $post = getPost($pdo, $_GET['id']);
        if ($post['usersid'] != $_SESSION['userid']) {
            
            header('Location: question.php');
            exit();
        }
        $title = 'Edit Question';
        ob_start();
        include __DIR__ . '/../templates/editquestion.html.php';
        $output = ob_get_clean();
    }
} catch (PDOException $e) {
    $title = 'Error';
    $output = 'Error: ' . $e->getMessage();
}
include __DIR__ . '/../templates/guest_layout.html.php';
?>