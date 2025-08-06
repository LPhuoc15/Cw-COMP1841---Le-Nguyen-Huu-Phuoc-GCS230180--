<?php
try{
    include __DIR__ . '/../includes/DatabaseConnection.php';
    include __DIR__ . '/../includes/DatabaseFunctions.php';
    
    
    if (isset($_GET['id'])) {
        $postId = $_GET['id'];
        
        
        deletePost($pdo, $postId);
        
        
        header('Location: question.php');
        exit();
    } else {
        throw new Exception('Post ID not provided.');
    }
} catch (PDOException $e) {
    $title = 'An error has occurred';
    $output = 'Database error: ' . $e->getMessage();
} catch (Exception $e) {
    $title = 'An error has occurred';
    $output = 'Error: ' . $e->getMessage();
}