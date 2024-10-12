<?php
session_start();
require 'db.php'; // Include your database connection

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$user_id = $_SESSION['user_id'];
$user_name = $_SESSION['user_name'];

// Fetch the user's reservations
$stmt = $conn->prepare("SELECT table_number, guests, date, time FROM reservations WHERE user_id = ? ORDER BY date DESC");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$reservations = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - My Reservations</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f4f4f4;
            padding: 30px;
        }

        .container {
            max-width: 900px;
            margin: 0 auto;
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            color: #333;
        }

        .reservations-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .reservations-table th, .reservations-table td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: center;
        }

        .reservations-table th {
            background-color: #f4f4f4;
            font-weight: bold;
        }

        .no-reservations {
            text-align: center;
            margin-top: 20px;
            font-size: 1.2rem;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #e67e22;
            color: white;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            font-size: 1rem;
            margin-top: 20px;
            text-align: center;
        }

        .btn:hover {
            background-color: #d35400;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .header h3 {
            margin: 0;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="header">
            <h3>Welcome, <?php echo htmlspecialchars($user_name); ?>!</h3>
            <a href="logout.php" class="btn">Logout</a>
        </div>
        <h2>Your Reservations</h2>

        <?php if ($reservations->num_rows > 0): ?>
            <table class="reservations-table">
                <thead>
                    <tr>
                        <th>Table Number</th>
                        <th>Guests</th>
                        <th>Date</th>
                        <th>Time</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $reservations->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['table_number']); ?></td>
                            <td><?php echo htmlspecialchars($row['guests']); ?></td>
                            <td><?php echo htmlspecialchars($row['date']); ?></td>
                            <td><?php echo htmlspecialchars($row['time']); ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p class="no-reservations">You have no reservations.</p>
        <?php endif; ?>
    </div>

</body>

</html>
