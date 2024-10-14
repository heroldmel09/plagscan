<?php
include('../backend/config.php'); 
include('../backend/db.php'); 

$scan_id = $_GET['scan_id'];

// Retrieve scan details from the database
$sql = "SELECT `status_code` FROM `result_scanjson` WHERE `scanID`='$scan_id';";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

echo json_encode(['status' => $row['status_code']]);
?>
