<!-- public/index.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plagiarism Checker</title>
    <link rel="stylesheet" href="styles.css"> <!-- Link to styles.css -->
</head>
<body>
    <div class="container mt-5">
        <h2>Plagiarism Checker Dashboard</h2>

        <!-- File Upload Form -->
        <div class="mt-4">
            <h4>Upload DOCX or PDF:</h4>
            <form action="upload.php" method="POST" enctype="multipart/form-data">
                <input type="file" name="document" class="form-control" required>
                <button type="submit" class="btn btn-primary mt-3">Upload and Scan</button>
            </form>
        </div>

        <!-- Display Progress Bar -->
        <div id="progress-bar" class="mt-5">
            <h4>Scanning Progress:</h4>
            <div class="progress">
                <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: 0%;">0%</div>
            </div>
        </div>
    </div>
</body>
</html>
