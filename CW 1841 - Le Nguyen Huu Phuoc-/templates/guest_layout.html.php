<?php

$title ??= 'User Questions Database';
$output ??= '';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../jokes.css">
        <title>
            <?= htmlspecialchars($title, ENT_QUOTES, 'UTF-8') ?>
        </title>
    </head>
    <body>
        <header><h1> User Questions Database</h1></header>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="question.php">Questions</a></li>
                <li><a href="addquestion.php">Add Question</a></li>
                <li><a href="edituser.php">Change Information</a></li>
                <li><a href="contact.php">Contact Admin</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
        <main>
            <?= $output ?>
        </main>
        <footer>&copy; IJDB2023</footer>
    </body>
</html>
