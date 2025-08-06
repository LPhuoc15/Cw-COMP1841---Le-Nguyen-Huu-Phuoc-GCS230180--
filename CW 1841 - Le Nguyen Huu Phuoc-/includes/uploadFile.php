<?php
$target_dir = __DIR__ . '/../uploads/';
$filename = '';

if (isset($_FILES["fileToUpload"]) && $_FILES["fileToUpload"]["error"] === UPLOAD_ERR_OK) {
    $filename = basename($_FILES["fileToUpload"]["name"]);
    $target_file = $target_dir . $filename;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0777, true);
    }

    if ($imageFileType !== "png") {
        die("Only PNG files are allowed.");
    }

    if (!move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        die("Error uploading file.");
    }
} elseif (isset($_POST['existingImage'])) {
    $filename = $_POST['existingImage']; 
} else {
    $filename = null; 
}