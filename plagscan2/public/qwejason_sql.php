<?php

include('../backend/config.php'); // Ensure correct path to config.php
include('../backend/db.php');

$scanId = "1";
$json_data = file_get_contents("name.json");

// Check if the JSON file was read successfully
if ($json_data === false) {
    echo "Failed to read JSON file.";
    exit;
}

$json_data_encoded = mysqli_real_escape_string($conn, $json_data);

$sql_json = "INSERT INTO result_scanjson VALUES ('0', '$scanId', '$json_data_encoded')";

echo "SQL Query: " . htmlspecialchars($sql_json) . "<br>";

if (mysqli_query($conn, $sql_json)) {
    echo "Database JSON insert success.";
} else {
    echo "Database JSON insert error: " . mysqli_error($conn);
}


?>