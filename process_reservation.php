<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_SESSION['user_id'];
    $guests = htmlspecialchars(trim($_POST['guests']));
    $date = htmlspecialchars(trim($_POST['date']));
    $time = htmlspecialchars(trim($_POST['time']));
    $preorder = isset($_POST['preorder']) ? implode(", ", $_POST['preorder']) : '';

    $conn = new mysqli('localhost', 'root', '', 'thegallerycafe');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("INSERT INTO reservations (user_id, guests, date, time, preorder) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("iisss", $user_id, $guests, $date, $time, $preorder);

    if ($stmt->execute()) {
        header("Location: thankyou.php");
        exit();
    } else {
        echo "Error: Could not complete your reservation.";
    }

    $stmt->close();
    $conn->close();
}
?>
