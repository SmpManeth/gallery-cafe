<?php
session_start();

// Ensure only admin has access
if ($_SESSION['is_admin'] !== 1) {
    header("Location: login.php");
    exit();
}

// Database connection
$conn = new mysqli('localhost', 'root', '', 'thegallerycafe');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle deletion of users, menu items, or reservations
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['delete_user'])) {
        $user_id = $_POST['user_id'];
        $conn->query("DELETE FROM users WHERE id = $user_id");
        $conn->query("DELETE FROM reservations WHERE user_id = $user_id");
    }

    if (isset($_POST['delete_menu'])) {
        $menu_id = $_POST['menu_id'];
        $conn->query("DELETE FROM menu WHERE id = $menu_id");
    }

    if (isset($_POST['delete_reservation'])) {
        $reservation_id = $_POST['reservation_id'];
        $conn->query("DELETE FROM reservations WHERE id = $reservation_id");
    }
}

// Fetch data from the database
$users_result = $conn->query("SELECT * FROM users");
$menu_result = $conn->query("SELECT * FROM menu");
$reservations_result = $conn->query("SELECT reservations.id, users.name, reservations.guests, reservations.date, reservations.time 
                                     FROM reservations 
                                     JOIN users ON reservations.user_id = users.id");

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - The Gallery Café</title>
    <!-- Bootstrap CSS for professional UI -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f4f4f4;
        }
        .navbar {
            background-color: #343a40;
        }
        .navbar-brand {
            color: white !important;
        }
        .container {
            margin-top: 30px;
        }
        h2, h3 {
            margin-top: 20px;
        }
        table {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

    <!-- Admin Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Admin Dashboard</a>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <!-- User Management Section -->
        <h2>User Management</h2>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($user = $users_result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($user['id']); ?></td>
                        <td><?php echo htmlspecialchars($user['name']); ?></td>
                        <td><?php echo htmlspecialchars($user['email']); ?></td>
                        <td>
                            <form method="POST" action="" class="d-inline">
                                <input type="hidden" name="user_id" value="<?php echo $user['id']; ?>">
                                <button type="submit" name="delete_user" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>

        <!-- Menu Management Section -->
        <h2>Menu Management</h2>
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
                            <form method="POST" action="" class="d-inline">
                                <input type="hidden" name="menu_id" value="<?php echo $menu_item['id']; ?>">
                                <button type="submit" name="delete_menu" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>

        <!-- Reservation Management Section -->
        <h2>Reservation Management</h2>
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
                            <form method="POST" action="" class="d-inline">
                                <input type="hidden" name="reservation_id" value="<?php echo $reservation['id']; ?>">
                                <button type="submit" name="delete_reservation" class="btn btn-danger btn-sm">Delete</button>
                            </form>
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
