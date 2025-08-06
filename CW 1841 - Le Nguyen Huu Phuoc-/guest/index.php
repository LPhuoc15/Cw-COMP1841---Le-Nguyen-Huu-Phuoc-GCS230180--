<?php
$title = 'Guest Internet Question Database';
ob_start();
include '../templates/home.html.php';
$output = ob_get_clean();
include '../templates/guest_layout.html.php';