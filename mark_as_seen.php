<?php
// Assuming you have a database connection established in the database1.php file
$mysqli = require __DIR__ . "/database1.php";

if ($_SERVER["REQUEST_METHOD"] === "GET") {
    $emailId = $_GET["id"];

    // Update the status to "seen" in the database
    $updateQuery = "UPDATE emails SET status = 'seen' WHERE id = $emailId";
    $result = $mysqli->query($updateQuery);

    if (!$result) {
        echo "Error updating status: " . $mysqli->error;
    } else {
        echo "Status updated successfully";
    }
}
?>