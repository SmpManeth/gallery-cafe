<?php
session_start();

// Ensure only customers have access
if ($_SESSION['role'] !== 'customer') {
    header("Location: login.php");
    exit();
}

// Fetch user reservations
$conn = new mysqli('localhost', 'root', '', 'thegallerycafe');
$reservations_result = $conn->prepare("SELECT id, guests, date, time FROM reservations WHERE user_id = ?");
$reservations_result->bind_param("i", $_SESSION['user_id']);
$reservations_result->execute();
$reservations = $reservations_result->get_result();

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Dashboard - The Gallery Café</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <!-- Customer Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Customer Dashboard</a>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container mt-5">
        <h2>Your Reservations</h2>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Guests</th>
                    <th>Date</th>
                    <th>Time</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($reservation = $reservations->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($reservation['id']); ?></td>
                        <td><?php echo htmlspecialchars($reservation['guests']); ?></td>
                        <td><?php echo htmlspecialchars($reservation['date']); ?></td>
                        <td><?php echo htmlspecialchars($reservation['time']); ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>

        <a href="make_reservation.php" class="btn btn-primary mt-3">Make a Reservation</a>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
