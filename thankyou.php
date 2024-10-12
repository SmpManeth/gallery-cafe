<?php
session_start(); // Always start the session
?>
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

        /* Main Content Styling */
        .container {
            max-width: 600px;
            background-color: white;
            padding: 2rem;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            margin: 2rem auto;
            margin-top: 100px;
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

    <!-- Include the Navbar -->
    <?php include 'navbar.php'; ?>

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
