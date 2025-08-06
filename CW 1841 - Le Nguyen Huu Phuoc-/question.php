<?php
try{
    include 'includes/DatabaseConnection.php';
    include 'includes/DatabaseFunctions.php';

    $posts= allPosts($pdo);
    $totalPosts = totalPosts($pdo);
    $title = 'Questions Database';
    ob_start();
    include 'templates/question.html.php';
    $output = ob_get_clean();
} catch (PDOException $e) {
    $output = 'Error connecting to the database: ' . $e->getMessage();
}
include 'templates/layout.html.php';
?>