<!-- public/upload.php -->
<?php
require '../backend/db.php'; // Database connection
require '../backend/config.php'; // Copyleaks configuration

if (isset($_FILES['document'])) {
    $fileName = $_FILES['document']['name'];
    $fileTmp = $_FILES['document']['tmp_name'];
    $fileType = $_FILES['document']['type'];
    $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

    $allowedExt = ['docx', 'pdf'];
    if (in_array($fileExt, $allowedExt)) {
        $uploadDir = '../uploads/';
        $filePath = $uploadDir . basename($fileName);

        if (move_uploaded_file($fileTmp, $filePath)) {
            // Redirect to scan page with file path
            header("Location: scan.php?file=" . urlencode($filePath));
        } else {
            echo "Failed to upload file.";
        }
    } else {
        echo "Invalid file type. Only DOCX and PDF allowed.";
    }
}
?>
