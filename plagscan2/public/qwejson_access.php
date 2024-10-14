<?php
include('../backend/config.php'); // Correct path to config.php
include('../backend/db.php');

$sql_requestjson=mysqli_query($conn,"SELECT * from result_scanjson where id=3 ;");
$result=mysqli_fetch_all($sql_requestjson);
echo "id : ",$result[0][0];

echo "scanID :",$result[0][1];

$json1=json_decode($result[0][2],true);
echo $json1['scannedDocument']['metadata']['author'];
?>