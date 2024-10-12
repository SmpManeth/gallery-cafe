<?php
session_start(); // Always call session_start() before any HTML or output
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Gallery Café</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            line-height: 1.6;
            background-color: #f4f4f4;
        }

        header {
            background: url('https://images.pexels.com/photos/15146466/pexels-photo-15146466/free-photo-of-beer-fries-and-burger.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1') no-repeat center center/cover;
            height: 100vh;
            color: white;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            position: relative;
        }

        header h1 {
            font-size: 3rem;
            margin-bottom: 1rem;
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.7);
        }

        header p {
            font-size: 1.2rem;
            max-width: 600px;
            text-shadow: 1px 1px 4px rgba(0, 0, 0, 0.7);
            color: white;
        }

        header a.cta-btn {
            margin-top: 2rem;
            padding: 10px 25px;
            background-color: #e67e22;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-size: 1.1rem;
            transition: background-color 0.3s ease;
        }

        header a.cta-btn:hover {
            background-color: #d35400;
        }

        /* Types of Meals Section */
        .meals-section {
            padding: 4rem 2rem;
            background-color: #fff;
            text-align: center;
        }

        .meals-section h2 {
            font-size: 2.5rem;
            color: #333;
            margin-bottom: 3rem;
        }

        .meal-cards {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
        }

        .meal-card {
            background-color: #f4f4f4;
            border-radius: 10px;
            padding: 20px;
            width: 250px;
            margin: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .meal-card img {
            width: 100%;
            height: 180px;
            object-fit: cover;
            border-radius: 10px;
        }

        .meal-card h3 {
            font-size: 1.5rem;
            margin: 1rem 0;
            color: #333;
        }

        .meal-card p {
            font-size: 1rem;
            color: #666;
        }

        .meal-card:hover {
            transform: scale(1.05);
        }

        /* Menus Section */
        .menus-section {
            padding: 4rem 2rem;
            background-color: #f4f4f4;
            text-align: center;
        }

        .menus-section h2 {
            font-size: 2.5rem;
            color: #333;
            margin-bottom: 3rem;
        }

        .menu-cards {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
        }

        .menu-card {
            background-color: white;
            border-radius: 10px;
            padding: 20px;
            width: 250px;
            margin: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .menu-card img {
            width: 100%;
            height: 180px;
            object-fit: cover;
            border-radius: 10px;
        }

        .menu-card h3 {
            font-size: 1.5rem;
            margin: 1rem 0;
            color: #333;
        }

        .menu-card p {
            font-size: 1rem;
            color: #666;
        }

        .menu-card a {
            display: inline-block;
            margin-top: 1rem;
            padding: 8px 16px;
            background-color: #e67e22;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-size: 1rem;
            transition: background-color 0.3s ease;
        }

        .menu-card a:hover {
            background-color: #d35400;
        }

        .menu-card:hover {
            transform: scale(1.05);
        }

        footer {
            background-color: #333;
            color: white;
            padding: 1rem 0;
            text-align: center;
        }

        footer p {
            margin: 0;
        }
    </style>
</head>

<body>
    <header>
        <!-- Include the Navbar -->
        <?php include 'navbar.php'; ?>
        <h1>Welcome to The Gallery Café</h1>
        <p>Indulge in an unforgettable dining experience with our exquisite menus and cozy atmosphere. Reserve your table now!</p>
        <a href="reservation.php" class="cta-btn">Make a Reservation</a>
    </header>

    <!-- Types of Meals Section -->
    <section class="meals-section" id="meals">
        <h2>Types of Meals</h2>
        <div class="meal-cards">
            <div class="meal-card">
                <img src="https://images.pexels.com/photos/46239/salmon-dish-food-meal-46239.jpeg" alt="Breakfast">
                <h3>Breakfast</h3>
                <p>Start your day with our delicious breakfast options including pancakes, omelets, and fresh juices.</p>
            </div>
            <div class="meal-card">
                <img src="https://images.pexels.com/photos/2252281/pexels-photo-2252281.jpeg" alt="Lunch">
                <h3>Lunch</h3>
                <p>Enjoy a variety of lunch options from healthy salads to hearty burgers and sandwiches.</p>
            </div>
            <div class="meal-card">
                <img src="https://images.pexels.com/photos/376464/pexels-photo-376464.jpeg" alt="Dinner">
                <h3>Dinner</h3>
                <p>Dine in with a fine selection of evening meals including pastas, steaks, and gourmet dishes.</p>
            </div>
            <div class="meal-card">
                <img src="https://images.pexels.com/photos/602750/pexels-photo-602750.jpeg" alt="Desserts">
                <h3>Desserts</h3>
                <p>Indulge in our sweet dessert offerings from cakes and pastries to ice creams and puddings.</p>
            </div>
        </div>
    </section>

    <!-- Menus Section -->
    <section class="menus-section" id="menu">
        <h2>Our Menus</h2>
        <div class="menu-cards">
            <div class="menu-card">
                <img src="https://images.pexels.com/photos/1640777/pexels-photo-1640777.jpeg" alt="Sri Lankan Cuisine">
                <h3>Sri Lankan Cuisine</h3>
                <p>Authentic Sri Lankan dishes with rich flavors, spices, and fresh ingredients.</p>
                <a href="#">View Menu</a>
            </div>
            <div class="menu-card">
                <img src="https://images.pexels.com/photos/357573/pexels-photo-357573.jpeg" alt="Chinese Cuisine">
                <h3>Chinese Cuisine</h3>
                <p>Delightful Chinese dishes, from noodles to dumplings and stir-fries.</p>
                <a href="#">View Menu</a>
            </div>
            <div class="menu-card">
                <img src="https://images.pexels.com/photos/357573/pexels-photo-357573.jpeg" alt="Italian Cuisine">
                <h3>Italian Cuisine</h3>
                <p>Classic Italian dishes including pastas, pizzas, and more.</p>
                <a href="#">View Menu</a>
            </div>
            <div class="menu-card">
                <img src="https://images.pexels.com/photos/1055058/pexels-photo-1055058.jpeg" alt="French Cuisine">
                <h3>French Cuisine</h3>
                <p>Elegant French dining experience with gourmet meals and fine wines.</p>
                <a href="#">View Menu</a>
            </div>
        </div>
    </section>

    <footer id="contact">
        <p>&copy; 2024 The Gallery Café. All Rights Reserved.</p>
    </footer>
</body>

</html>
