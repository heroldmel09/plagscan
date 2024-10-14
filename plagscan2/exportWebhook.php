<?php

include('./backend/config.php'); // Correct path to config.php
include('./backend/db.php');

// Ensure this is a POST request
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);  // Method Not Allowed
    exit('Invalid request method.');
}

// Capture the POST data from Copyleaks
$data = file_get_contents('php://input');
error_log("Completion Webhook data received: " . $data);  // Log for debugging

// Decode the JSON payload
$json_data = json_decode($data, true);

if (json_last_error() === JSON_ERROR_NONE) {
    // Extract necessary fields: scanId, results, plagiarism percentage, and report link
    if (isset($json_data['scanId']) && isset($json_data['results']['internet'])) {
        $scan_id = $json_data['scanId'];
        $plagiarism_percentage = $json_data['results']['totalPlagiarism'];
        $report_link = $json_data['results']['internet'][0]['url'];  // Assuming the report link is in 'internet'

        // Update the scan details in the database
        $sql = "UPDATE scans SET plagiarism_percentage = '$plagiarism_percentage', report_link = '$report_link', status = 'completed' WHERE scan_id = '$scan_id'";
        
        if ($conn->query($sql) === TRUE) {
            error_log("Scan $scan_id updated successfully with plagiarism percentage $plagiarism_percentage and report link.");

            // Trigger the export request automatically
            $client = new \GuzzleHttp\Client();
            $exportResponse = $client->request('POST', '       https://1a69-216-247-17-29.ngrok-free.app/plagscan2/exportWebhook.php', [
                'json' => [
                    'scanId' => $scan_id,
                ]
            ]);

        } else {
            error_log("Database update error: " . $conn->error);
        }
    } else {
        error_log("Missing scanId or report link in the webhook payload.");
    }
} else {
    error_log("Invalid JSON payload received.");
}
?>
