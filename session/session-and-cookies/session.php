<?php
// Start the session
session_start();

// Check if the session variable is already set
if (!isset($_SESSION['user'])) {
    // If not, set the session variable
    $_SESSION['user'] = 'JohnDoe';
    echo "Session variable 'user' is set.";
} else {
    // If the session variable is already set, display its value
    echo "Session variable 'user' already exists. Value: " . $_SESSION['user'];
}
?><?php
// Start the session
session_start();

// Check if the session variable exists and print it
if (isset($_SESSION['user'])) {
    echo "Session variable 'user' is: " . $_SESSION['user'];
} else {
    echo "Session variable 'user' is not set.";
}
?>