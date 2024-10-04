<?php
// process_reservation.php

// Step 1: Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Step 2: Get form data and sanitize it
    $name = htmlspecialchars(trim($_POST['name']));
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $phone = htmlspecialchars(trim($_POST['phone']));
    $guests = htmlspecialchars(trim($_POST['guests']));
    $date = htmlspecialchars(trim($_POST['date']));
    $time = htmlspecialchars(trim($_POST['time']));

    // Step 3: Validate form inputs
    if (empty($name) || empty($email) || empty($phone) || empty($guests) || empty($date) || empty($time)) {
        echo "All fields are required!";
        exit();
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format!";
        exit();
    }

    // Step 4: Database connection (use your database credentials)
    $servername = "localhost"; // Replace with your DB server name
    $username = "root";        // Replace with your DB username
    $password = "";            // Replace with your DB password
    $dbname = "thegallerycafe"; // Replace with your database name

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Step 5: Insert data into the database
    $sql = "INSERT INTO reservations (name, email, phone, guests, date, time)
            VALUES ('$name', '$email', '$phone', '$guests', '$date', '$time')";

    if ($conn->query($sql) === TRUE) {
        // Reservation made successfully, redirect to thank you page
        header("Location: thank_you.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the connection
    $conn->close();

    exit();
}
