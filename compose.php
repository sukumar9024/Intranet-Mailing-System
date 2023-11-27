<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $mysqli = require __DIR__ . "/database1.php";

    // Check if the user is logged in
    if (!isset($_SESSION["email"])) {
        // Redirect to the login page or handle unauthorized access
        header("Location: login.php");
        exit;
    }

    // Get sender email from the session
    $senderEmail = $_SESSION["email"];

    // Get other form data
    $recipientEmail = $mysqli->real_escape_string($_POST["recipient"]);
    $subject = $mysqli->real_escape_string($_POST["subject"]);
    $body = $mysqli->real_escape_string($_POST["body"]);

    // Get the timestamp from the system
    date_default_timezone_set("Asia/Kolkata");
    $timestamp = date("Y-m-d H:i:s");

    // Variables for handling attachments
    $targetFilePath = null;

    // Check if the form was submitted with a file
    if (isset($_FILES["attachment"]) && $_FILES["attachment"]["error"] === UPLOAD_ERR_OK) {
        // Specify the target directory for file uploads (htdocs/attachments)
        $targetDirectory = __DIR__ . "/../php-signup-login-main/attachments/";

        // Create the target directory if it doesn't exist
        if (!file_exists($targetDirectory)) {
            mkdir($targetDirectory, 0777, true);
        }

        // Generate a unique filename to avoid overwriting existing files
        $filename = uniqid() . "_" . basename($_FILES["attachment"]["name"]);
        $targetFilePath = $targetDirectory . $filename;

        // Move the uploaded file to the target directory
        if (!move_uploaded_file($_FILES["attachment"]["tmp_name"], $targetFilePath)) {
            echo "Error uploading file.";
            exit;
        }
    }

    // Insert data into the database
    $insertSql = "INSERT INTO emails (sender_email, recipient_email, subject, body, status, attachments, timestamp) 
                  VALUES (?, ?, ?, ?, 'sent', ?, ?)";

    $stmt = $mysqli->prepare($insertSql);
    $stmt->bind_param("ssssss", $senderEmail, $recipientEmail, $subject, $body, $targetFilePath, $timestamp);
    
    // Execute the prepared statement
    $stmt->execute();
    $stmt->close();

    // Redirect to a success page or do further processing
    header("Location: allmails.php");
    exit;
}
?>



<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Email Compose Page</title>
    <link rel="stylesheet" type="text/css" href="compose.css"/>
    <style>
        /* Add custom CSS for horizontal alignment */
        #compose-container {
            display: flex;
            flex-direction: column;
        }

        #compose-container label {
            margin-bottom: 5px;
        }

        #compose-container input,
        #compose-container textarea,
        #compose-container select {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            box-sizing: border-box;
        }

        #send-button {
            width: auto; /* Let the button take the natural width */
        }
        #logout{
            position:relative;
            margin-top:440px;
            color: red;
        }
    </style>
</head>
<body>
    <div id="mySidebar" class="sidebar">
        <a href="allmails.php">All messages</a>
        <a href="inbox.php">Inbox</a>
        <a href="sent.php">Sent</a>
        <a href="compose.php">Compose</a>
        <a href="logout.php" id="logout">Logout</a>
    </div>
    
    <div id="main">
        <button class="openbtn" id="open" onclick="toggleNav()">☰ Menu</button>

        <h2>Compose Email</h2>

        <!-- Add the form tag with the necessary attributes -->
        <form method="post" enctype="multipart/form-data">
            <div id="compose-container">
                <label for="recipient-input">To:</label>
                <input type="email" name="recipient" id="recipient-input" placeholder="Recipient Email">

                <label for="subject-input">Subject:</label>
                <input type="text" name="subject" id="subject-input" placeholder="Email Subject">

                <label for="message-input">Message:</label>
                <textarea name="body" id="message-input" placeholder="Your message here..."></textarea>

                <!-- Add the file input for attachments -->
                <label for="attachment-input">Attachment:</label>
                <input type="file" name="attachment" id="attachment-input">

            </div>
            <!-- Change the button type to "submit" -->
            <button type="submit" id="send-button">Send</button>
        </form>
    </div>

    <script src="compose.js"></script>
</body>
</html>


