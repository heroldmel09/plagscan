<!-- public/dashboard.php -->
<?php
require '../backend/db.php';

$sql = "SELECT * FROM scans";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    <h2>Plagiarism Scan Records</h2>
    <table border="1">
        <tr>
            <th>File Name</th>
            <th>Plagiarism Percentage</th>
            <th>Report</th>
        </tr>
        <?php while($row = $result->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $row['file_name']; ?></td>
            <td><?php echo $row['plagiarism_percentage']; ?>%</td>
            <td><a href="<?php echo $row['report_link']; ?>">View Report</a></td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>
