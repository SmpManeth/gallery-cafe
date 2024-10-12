<?php
session_start();

// Ensure only admin can delete menu items
if ($_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}

// Check if the menu ID is provided
if (isset($_GET['id'])) {
    $menu_id = intval($_GET['id']); // Ensure it's an integer

    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'thegallerycafe');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare the DELETE statement
    $stmt = $conn->prepare("DELETE FROM menu WHERE id = ?");
    $stmt->bind_param("i", $menu_id);

    // Execute the query
    if ($stmt->execute()) {
        header("Location: admin_dashboard.php?message=Menu item deleted successfully");
    } else {
        echo "Error deleting menu item: " . $conn->error;
    }

    // Close the connection
    $stmt->close();
    $conn->close();
} else {
    echo "No menu ID provided.";
}
?>
