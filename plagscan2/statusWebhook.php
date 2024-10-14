<?php

include('./backend/config.php'); // Correct path to config.php
include('./backend/db.php'); 

Ensure this is a POST request
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);  // Method Not Allowed
    exit('Invalid request method.');
}

// Capture the POST data from Copyleaks
$data = file_get_contents('php://input');
error_log("Status Webhook data received: " . $data);  // Log for debugging


// Decode the JSON payload
$json_data = json_decode($data, true);

if (json_last_error() !== JSON_ERROR_NONE) {
    error_log("JSON decode error: " . json_last_error_msg());
    exit('Invalid JSON payload.');
}
// changes made ===========
if (isset($json_data['scannedDocument'])) {
    $scanId = $json_data['scannedDocument']['scanId'];
    $json_data_insert = mysqli_real_escape_string($conn, $data);
    $sql_json=mysqli_query($conn,"UPDATE result_scanjson SET status_code='Complete',resullt_json='$json_data_insert' WHERE scanID='$scanId';");
            if ($sql_json){
                error_log("Database Json insert sucess: ");  
            }else{
                error_log("Database Json insert error: ");
                throw new Exception("Error: ");

            }
} else {
    error_log("Invalid payload structure.");
}


?>
