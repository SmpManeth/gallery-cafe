<?php
// Start the session only if it's not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<nav class="navbar">
    <div class="logo">The Gallery Café</div>
    <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="menu.php">Menu</a></li>
        <li><a href="reservation.php">Reservations</a></li>
        
        <?php if (isset($_SESSION['user_id'])): ?>
            <!-- If the user is logged in, show Dashboard and Logout -->
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href="logout.php">Logout</a></li>
        <?php else: ?>
            <!-- If the user is not logged in, show Login and Register -->
            <li><a href="login.php">Login</a></li>
            <li><a href="register.php">Register</a></li>
        <?php endif; ?>
    </ul>
</nav>

<style>
    .navbar {
        position: absolute;
        top: 20px;
        width: 100%;
        display: flex;
        justify-content: space-between;
        padding: 0 40px;
        align-items: center;
    }

    .navbar .logo {
        font-size: 1.8rem;
        font-weight: 600;
        color: white;
    }

    .navbar ul {
        list-style: none;
        display: flex;
    }

    .navbar ul li {
        margin-left: 30px;
    }

    .navbar ul li a {
        color: white;
        text-decoration: none;
        font-size: 1rem;
        padding: 8px 16px;
        transition: background-color 0.3s ease;
    }

    .navbar ul li a:hover {
        background-color: rgba(255, 255, 255, 0.2);
        border-radius: 5px;
    }
</style>
