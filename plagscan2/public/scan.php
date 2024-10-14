<?php
require '../backend/config.php'; // Your API keys and configuration
require '../backend/db.php'; // Database connection
require '../vendor/autoload.php'; // Autoload Copyleaks SDK and dependencies
include('../backend/config.php'); 
include('../backend/db.php'); 

use GuzzleHttp\Client;

if (isset($_GET['file'])) {
    $filePath = urldecode($_GET['file']);

    try {
        // Step 1: Get the access token via Copyleaks login
        $client = new Client();
        $response = $client->request('POST', 'https://id.copyleaks.com/v3/account/login/api', [
            'json' => [
                'email' => 'turlaglenn@gmail.com', // Your Copyleaks email here
                'key' => 'f42d1909-1ad9-4403-b4e6-e6c9e37f4d1a',  // Copyleaks API key here
            ]
        ]);

        $data = json_decode($response->getBody(), true);
        $accessToken = $data['access_token'];

        // Step 2: Ensure the file exists
        if (!file_exists($filePath)) {
            throw new Exception("File not found: $filePath");
        }

        // Step 3: Encode the file in base64
        $fileContent = base64_encode(file_get_contents($filePath));

        // Step 4: Submit the file to Copyleaks and generate a unique scan ID
        $scanId = uniqid();  // Generate a unique scan ID
        $submitResponse = $client->request('PUT', "https://api.copyleaks.com/v3/scans/submit/file/$scanId", [
            'headers' => [
                'Authorization' => "Bearer $accessToken"
            ],
            'json' => [
                'base64' => $fileContent,
                'filename' => basename($filePath),
                'properties' => [
                    'webhooks' => [
                        'status' => ' https://1a69-216-247-17-29.ngrok-free.app/plagscan2/statusWebhook.php',
                    ]
                ]
            ]
        ]);
        $sql_json=mysqli_query($conn,"INSERT INTO result_scanjson(id, scanID, status_code) VALUES ('0','$scanId','Pending')");
        if ($sql_json){
            error_log("Database Json insert sucess: ");  
            header("Location: loader.php?scan_id=$scanId");
        }else{
            error_log("Database Json insert error: ");

        }
       
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
}
