<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservations - The Gallery Café</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f4f4f4;
        }
        header {
            background-color: #333;
            color: white;
            padding: 1rem;
            text-align: center;
        }
        nav {
            display: flex;
            justify-content: space-between;
            padding: 0 40px;
            align-items: center;
        }
        nav .logo {
            font-size: 1.8rem;
            font-weight: 600;
            color: white;
        }
        nav ul {
            list-style: none;
            display: flex;
        }
        nav ul li {
            margin-left: 30px;
        }
        nav ul li a {
            color: white;
            text-decoration: none;
            font-size: 1rem;
            padding: 8px 16px;
            transition: background-color 0.3s ease;
        }
        nav ul li a:hover {
            background-color: rgba(255, 255, 255, 0.2);
            border-radius: 5px;
        }
        .container {
            max-width: 800px;
            margin: 2rem auto;
            padding: 20px;
            background-color: white;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }
        .container h2 {
            text-align: center;
            margin-bottom: 2rem;
            font-size: 2rem;
            color: #333;
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
        .note {
            font-size: 0.9rem;
            color: #777;
            text-align: center;
            margin-top: 1rem;
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

    <!-- Header with Navigation -->
    <header>
        <nav>
            <div class="logo"><a href="index.html" style="color: white;">The Gallery Café</a></div>
            <ul>
            <li><a href="index.php">Home</a></li>
                <li><a href="reservation.php">Reservations</a></li>
                <li><a href="menu.php">Menu</a></li>
                <li><a href="#promotions">Promotions</a></li>
                <li><a href="#contact">Contact</a></li>
            </ul>
        </nav>
    </header>

    <!-- Reservation Form -->
    <div class="container">
        <h2>Reserve Your Table</h2>
        <form action="process_reservation.php" method="POST">
            <label for="name">Full Name:</label>
            <input type="text" id="name" name="name" required placeholder="Enter your full name">

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required placeholder="Enter your email">

            <label for="phone">Phone Number:</label>
            <input type="tel" id="phone" name="phone" required placeholder="Enter your phone number">

            <label for="guests">Number of Guests:</label>
            <select id="guests" name="guests" required>
                <option value="" disabled selected>Select number of guests</option>
                <option value="1">1 Guest</option>
                <option value="2">2 Guests</option>
                <option value="3">3 Guests</option>
                <option value="4">4 Guests</option>
                <option value="5">5 Guests</option>
                <option value="6">6+ Guests</option>
            </select>

            <label for="date">Date:</label>
            <input type="date" id="date" name="date" required>

            <label for="time">Time:</label>
            <input type="time" id="time" name="time" required>

            <input type="submit" value="Reserve Now">
        </form>
        <p class="note">* Please ensure your details are correct before submitting the reservation.</p>
    </div>

    <footer>
        <p>&copy; 2024 The Gallery Café. All Rights Reserved.</p>
    </footer>

</body>
</html>
