<?php
session_start();

// Redirect to login if user is not logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Fetch user reservations from the database
$conn = new mysqli('localhost', 'root', '', 'thegallerycafe');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the logged-in user's ID from the session
$user_id = $_SESSION['user_id'];

// Fetch reservations for this user
$stmt = $conn->prepare("SELECT guests, date, time, preorder FROM reservations WHERE user_id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

// Fetch user name for greeting
$user_name = $_SESSION['user_name'] ?? 'Guest';

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - The Gallery Café</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f4f4f4;
            padding: 50px;
        }
        .container {
            max-width: 800px;
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin: 0 auto;
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        .reservation-list {
            margin-top: 20px;
        }
        .reservation-item {
            background-color: #f4f4f4;
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .reservation-item h3 {
            margin: 0;
        }
        .reservation-item p {
            margin: 5px 0;
        }
        .no-reservations {
            text-align: center;
            color: #777;
        }
        footer {
            margin-top: 2rem;
            padding: 1rem;
            background-color: #333;
            color: white;
            text-align: center;
        }
    </style>
</head>
<body>

    <!-- Include Navbar -->
    <?php include 'navbar.php'; ?>

    <div class="container">
        <h2>Welcome, <?php echo htmlspecialchars($user_name); ?>!</h2>
        <p>Here are your current reservations:</p>

        <div class="reservation-list">
            <?php if ($result->num_rows > 0): ?>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <div class="reservation-item">
                        <h3>Reservation for <?php echo htmlspecialchars($row['guests']); ?> guests</h3>
                        <p>Date: <?php echo htmlspecialchars($row['date']); ?></p>
                        <p>Time: <?php echo htmlspecialchars($row['time']); ?></p>
                        <?php if (!empty($row['preorder'])): ?>
                            <p>Pre-ordered Dishes: <?php echo htmlspecialchars($row['preorder']); ?></p>
                        <?php endif; ?>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <p class="no-reservations">You have no current reservations.</p>
            <?php endif; ?>
        </div>
    </div>

    <footer>
        <p>&copy; 2024 The Gallery Café. All Rights Reserved.</p>
    </footer>

</body>
</html>
