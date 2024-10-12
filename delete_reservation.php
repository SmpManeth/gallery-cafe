<?php
session_start();

// Ensure only admin or staff can delete reservations
if ($_SESSION['role'] !== 'admin' && $_SESSION['role'] !== 'staff') {
    header("Location: login.php");
    exit();
}

// Check if the reservation ID is provided
if (isset($_GET['id'])) {
    $reservation_id = intval($_GET['id']); // Ensure it's an integer

    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'thegallerycafe');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare the DELETE statement
    $stmt = $conn->prepare("DELETE FROM reservations WHERE id = ?");
    $stmt->bind_param("i", $reservation_id);

    // Execute the query
    if ($stmt->execute()) {
        header("Location: admin_dashboard.php?message=Reservation deleted successfully");
    } else {
        echo "Error deleting reservation: " . $conn->error;
    }

    // Close the connection
    $stmt->close();
    $conn->close();
} else {
    echo "No reservation ID provided.";
}
?>
