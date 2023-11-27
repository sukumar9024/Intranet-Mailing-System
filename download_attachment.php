<?php
$mysqli = require __DIR__ . "/database1.php";
if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET["email"])) {
    $emailId = $_GET["email"];
    // Retrieve attachment information from the database
    $selectSql = "SELECT attachments FROM emails WHERE id = ?";
    $stmt = $mysqli->prepare($selectSql);
    $stmt->bind_param("i", $emailId);
    $stmt->execute();
    $stmt->bind_result($attachmentPath);
    $stmt->fetch();
    $stmt->close();
    
    if ($attachmentPath) {
        // Set appropriate headers for file download
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . basename($attachmentPath) . '"');
        header('Content-Length: ' . filesize($attachmentPath));

        // Read and output the file content
        readfile($attachmentPath);
        exit;
    } else {
        echo 'Attachment not found.';
    }
} else {
    echo 'Invalid request.';
}
?>
