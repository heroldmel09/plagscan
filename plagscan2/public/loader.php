<?php 
    include('../backend/config.php'); 
    include('../backend/db.php'); 
    
    $scanId = isset($_GET['scan_id']) ? $_GET['scan_id'] : null;

    if ($scanId === null) {
        http_response_code(400); 
        exit('Invalid request: scan_id is required.');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../CSS/reload.css">
</head>
<body>
    <div id="loading-screen">
        <div class="loader"></div>
        <h2>Loading...</h2>
        <p>Please wait</p>
    </div>

    <div id="content" style="display: none;">
        <h1>Welcome to the Main Content!</h1>
    </div>

    <script>
    function checkStatus() {
        fetch('check_status.php?scan_id=<?php echo $scanId; ?>')
            .then(response => response.json())
            .then(data => {
                if (data.status === "Complete") {
                    document.getElementById('loading-screen').style.display = 'none';
                    window.location.href = 'results.php?scan_id=<?php echo $scanId; ?>';
                } else {
                    console.log('Status not complete, checking again...');
                }
            })
            .catch(error => console.error('Error:', error));
    }

    // Check status every 3 seconds
    setInterval(checkStatus, 3000);
</script>


</body>
    
</html>