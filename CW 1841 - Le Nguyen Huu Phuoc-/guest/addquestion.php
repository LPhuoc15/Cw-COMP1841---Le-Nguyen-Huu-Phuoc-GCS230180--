<?php
session_start();


if (!isset($_SESSION['loggedin'])) {
    header('Location: login.php');
    exit();
}

try {
    include __DIR__ . '/../includes/DatabaseConnection.php';
    include __DIR__ . '/../includes/DatabaseFunctions.php';
    $target_dir = __DIR__ . '/../uploads/';
    $filename = '';

    
    if (isset($_POST['question'], $_POST['moduleid'])) {
        
       
        $usersid = $_SESSION['userid'];

        
        

        if (isset($_FILES["fileToUpload"]) && $_FILES["fileToUpload"]["error"] === UPLOAD_ERR_OK) {
            $filename = basename($_FILES["fileToUpload"]["name"]);
            $target_file = $target_dir . $filename;
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

            if (!is_dir($target_dir)) {
                mkdir($target_dir, 0777, true);
            }

           
            if ($imageFileType !== "png") {
                throw new Exception("Only PNG files are allowed.");
            }

            
            if (!move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                throw new Exception("Error uploading file.");
            }
        }
        
        
        insertPost($pdo, $_POST['question'], $filename, $usersid, $_POST['moduleid']);

        
        if ($_SESSION['role'] === 'admin') {
            header('Location: question.php');
        } else {
            header('Location: question.php');
        }
        exit();
    } else {
        
        $title = 'Add a new Question';
        
        $modules = allModules($pdo);

        ob_start();
        
        
        if ($_SESSION['role'] === 'admin') {
            
            $users = allUsers($pdo);
            include __DIR__ . '/../templates/admin_addquestion.html.php';
        } else {
            
            include __DIR__ . '/../templates/guest_addquestion.html.php'; 
        }

        $output = ob_get_clean();
    }

} catch (PDOException $e) {
    $title = 'An error has occurred';
    $output = 'Database error: ' . $e->getMessage();
} catch (Exception $e) {
    $title = 'An error has occurred';
    $output = 'Error: ' . $e->getMessage();
}


if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin') {
    include __DIR__ . '/../templates/admin_layout.html.php';
} else {
    include __DIR__ . '/../templates/guest_layout.html.php';
}
?>