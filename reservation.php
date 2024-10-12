<?php
session_start();

// Ensure the user is logged in before making a reservation
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservations - The Gallery Café</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        /* Same styling, no changes */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 800px;
            margin: 2rem auto;
            padding: 20px;
            background-color: white;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            margin-top: 100px;
        }
        h2 {
            text-align: center;
            font-size: 2rem;
            margin-bottom: 2rem;
        }
        .availability {
            margin-bottom: 2rem;
        }
        form {
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
        }
        label {
            font-size: 1.1rem;
            color: #555;
        }
        input, select {
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            font-size: 1rem;
        }
        input[type="submit"] {
            background-color: #e67e22;
            color: white;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        input[type="submit"]:hover {
            background-color: #d35400;
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

    <!-- Include the Navbar -->
    <?php include 'navbar.php'; ?>

    <div class="container">
        <h2>Reserve Your Table</h2>

        <!-- Table Capacities and Parking Information -->
        <div class="availability">
            <h3>Table Capacities</h3>
            <p>Tables available for 2, 4, 6, and 8 guests.</p>
            
            <h3>Parking Availability</h3>
            <p>Parking available for 20 vehicles.</p>
            
            <h3>Special Promotions</h3>
            <p>Enjoy 10% off your meal on weekdays!</p>
        </div>

        <form action="process_reservation.php" method="POST">
            <label for="guests">Number of Guests:</label>
            <select id="guests" name="guests" required>
                <option value="2">2 Guests</option>
                <option value="4">4 Guests</option>
                <option value="6">6 Guests</option>
                <option value="8">8 Guests</option>
            </select>

            <label for="date">Date:</label>
            <input type="date" id="date" name="date" required>

            <label for="time">Time:</label>
            <input type="time" id="time" name="time" required>

            <!-- Pre-order food items -->
            <h3>Pre-order Your Food</h3>
            <label for="preorder">Select Your Meals:</label>
            <select id="preorder" name="preorder[]" multiple>
                <option value="Sri Lankan Rice and Curry">Sri Lankan Rice and Curry</option>
                <option value="Chinese Stir-Fry Noodles">Chinese Stir-Fry Noodles</option>
                <option value="Italian Margherita Pizza">Italian Margherita Pizza</option>
                <option value="French Croissants">French Croissants</option>
            </select>

            <input type="submit" value="Reserve Now">
        </form>
    </div>

    <footer>
        <p>&copy; 2024 The Gallery Café. All Rights Reserved.</p>
    </footer>

</body>
</html>
