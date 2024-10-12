<?php
session_start();

// Ensure only admin can access this page
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    // If the user is not logged in or not an admin, redirect to the login page
    header("Location: login.php");
    exit();
}

// Database connection
$conn = new mysqli('localhost', 'root', '', 'thegallerycafe');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch data for admin management
$users_result = $conn->query("SELECT * FROM users");
$menu_result = $conn->query("SELECT * FROM menu");
$reservations_result = $conn->query("SELECT reservations.id, users.name, reservations.guests, reservations.date, reservations.time FROM reservations JOIN users ON reservations.user_id = users.id");

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <!-- Admin Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Admin Dashboard</a>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container mt-5">
        <h2>Manage Users</h2>
        <!-- Table to manage users -->
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($user = $users_result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($user['id']); ?></td>
                        <td><?php echo htmlspecialchars($user['name']); ?></td>
                        <td><?php echo htmlspecialchars($user['email']); ?></td>
                        <td><?php echo ucfirst($user['role']); ?></td>
                        <td>
                            <a href="edit_user.php?id=<?php echo $user['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                            <a href="delete_user.php?id=<?php echo $user['id']; ?>" class="btn btn-danger btn-sm">Delete</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>

        <h2>Manage Menu</h2>
        <!-- Table to manage menu -->
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Dish Name</th>
                    <th>Cuisine Type</th>
                    <th>Price</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($menu_item = $menu_result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($menu_item['id']); ?></td>
                        <td><?php echo htmlspecialchars($menu_item['dish_name']); ?></td>
                        <td><?php echo htmlspecialchars($menu_item['cuisine_type']); ?></td>
                        <td>£<?php echo htmlspecialchars($menu_item['price']); ?></td>
                        <td>
                            <a href="edit_menu.php?id=<?php echo $menu_item['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                            <a href="delete_menu.php?id=<?php echo $menu_item['id']; ?>" class="btn btn-danger btn-sm">Delete</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>

        <h2>Manage Reservations</h2>
        <!-- Table to manage reservations -->
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
                            <a href="edit_reservation.php?id=<?php echo $reservation['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                            <a href="delete_reservation.php?id=<?php echo $reservation['id']; ?>" class="btn btn-danger btn-sm">Delete</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
