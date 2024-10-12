<?php
session_start();

// Ensure only operational staff have access
if ($_SESSION['role'] !== 'staff') {
    header("Location: login.php");
    exit();
}

// Database connection
$conn = new mysqli('localhost', 'root', '', 'thegallerycafe');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch reservations
$reservations_result = $conn->query("SELECT reservations.id, users.name, reservations.guests, reservations.date, reservations.time FROM reservations JOIN users ON reservations.user_id = users.id");

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff Dashboard - The Gallery Café</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <!-- Staff Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Staff Dashboard</a>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container mt-5">
        <!-- Reservation Management Section -->
        <h2>Manage Reservations</h2>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>User Name</th>
                    <th>Guests</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($reservation = $reservations_result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($reservation['id']); ?></td>
                        <td><?php echo htmlspecialchars($reservation['name']); ?></td>
                        <td><?php echo htmlspecialchars($reservation['guests']); ?></td>
                        <td><?php echo htmlspecialchars($reservation['date']); ?></td>
                        <td><?php echo htmlspecialchars($reservation['time']); ?></td>
                        <td>
                            <a href="confirm_reservation.php?id=<?php echo $reservation['id']; ?>" class="btn btn-success btn-sm">Confirm</a>
                            <a href="edit_reservation.php?id=<?php echo $reservation['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                            <a href="delete_reservation.php?id=<?php echo $reservation['id']; ?>" class="btn btn-danger btn-sm">Delete</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
