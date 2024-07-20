<?php


// Check if running on localhost
if ($_SERVER['SERVER_NAME'] == 'localhost' || $_SERVER['SERVER_ADDR'] == '127.0.0.1') {
    // Use local database credentials
    $db_host = "localhost";
    $db_user = "root";
    $db_password = "";
    $db_name = "lms_db";
    //echo "Connected to localhost database";
} else {
    // Use remote server database credentials
    $db_host = "localhost";
    $db_user = "dijisoft_lms_db";
    $db_password = "diji@2025";
    $db_name = "dijisoft_lms_db";
    //echo "Connected to remote server database";
}

// Create Connection
$conn = new mysqli($db_host, $db_user, $db_password, $db_name);

// Check Connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
