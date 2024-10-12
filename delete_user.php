<?php
session_start();

// Ensure only admin can delete users
if ($_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}

// Check if the user ID is provided
if (isset($_GET['id'])) {
    $user_id = intval($_GET['id']); // Ensure it's an integer

    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'thegallerycafe');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare the DELETE statement
    $stmt = $conn->prepare("DELETE FROM users WHERE id = ?");
    $stmt->bind_param("i", $user_id);

    // Execute the query
    if ($stmt->execute()) {
        header("Location: admin_dashboard.php?message=User deleted successfully");
    } else {
        echo "Error deleting user: " . $conn->error;
    }

    // Close the connection
    $stmt->close();
    $conn->close();
} else {
    echo "No user ID provided.";
}
?>
