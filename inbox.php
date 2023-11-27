<?php
session_start();

// Assuming you have a database connection established in the database1.php file
$mysqli = require __DIR__ . "/database1.php";

// Check if the user is logged in
if (!isset($_SESSION["email"])) {
    // Redirect to the login page or handle unauthorized access
    header("Location: login.php");
    exit;
}

$senderEmail = $_SESSION["email"];

// Query to retrieve emails from the database
$query = "SELECT * FROM emails WHERE recipient_email = '$senderEmail'";
$result = $mysqli->query($query);

// Check if there are any emails
if (!$result) {
    echo "Error retrieving emails: " . $mysqli->error;
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inbox</title>
    <link rel="stylesheet" type="text/css" href="compose.css"/>
    <style>
        .email {
            margin: 20px auto;
            margin-bottom: 0px;
            border: 1px solid #ccc;
            border: 1px solid #ccc;
            padding: 20px;
            cursor: pointer;
            border-radius: 8px;
            transition: background 0.3s;
            position: relative;
            background-color: #f9f9f9;
        }

        .email:hover {
            background: #f0f0f0;
        }

        .email-content {
            display: none;
            margin-top: 0px;
        }

        .display{
            border: 1px solid gray;
            margin: 1px auto;
            padding: 12px 48px;
            width: 800px;
            background-color: rgba(151, 135, 99, 0.5);
        }
        .timestamp {
            position: absolute;
            top: 0px;
            right: 10px; /* Adjusted to the left */
            color: #555;
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
        <div class="display">

        <h2 style="text-align: center">Inbox</h2>
        <!-- Add content specific to the "Inbox" page here -->
        <!-- Display emails -->
        <?php while ($row = $result->fetch_assoc()): ?>
            <div class="email" onclick="toggleEmailContent(this)">
                <p class="timestamp"><?= htmlspecialchars($row["timestamp"]) ?></p>
                <p style="font-size: 20px"><strong><?= htmlspecialchars($row["subject"]) ?></strong> </p>
                <p>From:<?= htmlspecialchars($row["sender_email"]) ?></p>
                <!-- Add more details as needed -->
                <div class="email-content">
                    <p><?= htmlspecialchars($row["body"]) ?></p>
                    <!-- Add more details as needed -->
                </div>
            </div>
            
        <?php endwhile; ?>
        </div>
    </div>

    <script src="compose.js"></script>
    <script>
        function toggleEmailContent(emailElement) {
            var content = emailElement.querySelector('.email-content');
            content.style.display = (content.style.display === 'none') ? 'block' : 'none';
        }
    </script>
</body>
</html>
