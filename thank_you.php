<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You - The Gallery Café</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        /* Global Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Body Styling */
        .body-content {
            font-family: 'Poppins', sans-serif;
            background-color: #f4f4f4;
            text-align: center;
        }

        /* Header Styling */
        .header {
            background-color: #333;
            color: white;
            padding: 1rem;
        }

        .header-nav {
            display: flex;
            justify-content: space-between;
            padding: 0 40px;
            align-items: center;
        }

        .header-logo {
            font-size: 1.8rem;
            font-weight: 600;
        }

        .header-nav ul {
            list-style: none;
            display: flex;
        }

        .header-nav ul li {
            margin-left: 30px;
        }

        .header-nav ul li a {
            color: white;
            text-decoration: none;
            font-size: 1rem;
            padding: 8px 16px;
            transition: background-color 0.3s ease;
        }

        .header-nav ul li a:hover {
            background-color: rgba(255, 255, 255, 0.2);
            border-radius: 5px;
        }

        /* Main Content Styling */
        .container {
            max-width: 600px;
            background-color: white;
            padding: 2rem;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            margin: 2rem auto;
        }

        .thankyou-title {
            font-size: 2rem;
            margin-bottom: 1rem;
            color: #333;
        }

        .thankyou-message {
            font-size: 1rem;
            color: #555;
            margin-bottom: 1rem;
        }

        .thankyou-link {
            display: inline-block;
            padding: 10px 20px;
            background-color: #e67e22;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .thankyou-link:hover {
            background-color: #d35400;
        }

        /* Footer Styling */
        .footer {
            margin-top: 2rem;
            padding: 1rem;
            background-color: #333;
            color: white;
            text-align: center;
            width: 100%;
        }
    </style>
</head>
<body class="body-content">

    <!-- Header with Navigation -->
    <header class="header">
        <nav class="header-nav">
            <div class="header-logo">The Gallery Café</div>
            <ul>
            <li><a href="index.php">Home</a></li>
                <li><a href="reservation.php">Reservations</a></li>
                <li><a href="menu.php">Menu</a></li>
                <li><a href="#promotions">Promotions</a></li>
                <li><a href="#contact">Contact</a></li>
            </ul>
        </nav>
    </header>

    <!-- Thank You Section -->
    <div class="container">
        <h2 class="thankyou-title">Thank You for Your Reservation!</h2>
        <p class="thankyou-message">Your reservation has been successfully submitted. We look forward to welcoming you at The Gallery Café!</p>
        <p class="thankyou-message">If you need to modify or cancel your reservation, please <a href="contact.php">contact us</a>.</p>
        <a href="index.php" class="thankyou-link">Return to Home</a>
    </div>

    <!-- Footer -->
    <footer class="footer">
        <p>&copy; 2024 The Gallery Café. All Rights Reserved.</p>
    </footer>

</body>
</html>
