<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu - The Gallery Café</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        /* Global Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f4f4f4;
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

        /* Section Styling */
        .section {
            padding: 4rem 2rem;
            text-align: center;
            background-color: #fff;
        }

        .section h2 {
            font-size: 2.5rem;
            color: #333;
            margin-bottom: 3rem;
        }

        .menu-items {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
        }

        .menu-item {
            background-color: #f4f4f4;
            border-radius: 10px;
            padding: 20px;
            width: 250px;
            margin: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .menu-item img {
            width: 100%;
            height: 180px;
            object-fit: cover;
            border-radius: 10px;
        }

        .menu-item h3 {
            font-size: 1.5rem;
            margin: 1rem 0;
            color: #333;
        }

        .menu-item p {
            font-size: 1rem;
            color: #666;
        }

        .menu-item span {
            font-weight: 600;
            color: #e67e22;
        }

        .menu-item:hover {
            transform: scale(1.05);
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
<body>

    <!-- Header with Navigation -->
    <header class="header">
        <nav class="header-nav">
            <div class="header-logo">The Gallery Café</div>
            <ul>
                <li><a href="index.html">Home</a></li>
                <li><a href="reservation.php">Reservations</a></li>
                <li><a href="menu.php">Menu</a></li>
                <li><a href="#promotions">Promotions</a></li>
                <li><a href="#contact">Contact</a></li>
            </ul>
        </nav>
    </header>

    <!-- Types of Meals Section -->
    <section class="section" id="types-of-meals">
        <h2>Types of Meals</h2>
        <div class="menu-items">
            <div class="menu-item">
                <img src="https://images.pexels.com/photos/1640777/pexels-photo-1640777.jpeg" alt="Breakfast">
                <h3>Breakfast</h3>
                <p>Start your day with our delicious breakfast options including pancakes, omelets, and fresh juices.</p>
                <span>£5.99</span>
            </div>
            <div class="menu-item">
                <img src="https://images.pexels.com/photos/2252281/pexels-photo-2252281.jpeg" alt="Lunch">
                <h3>Lunch</h3>
                <p>Enjoy a variety of lunch options from healthy salads to hearty burgers and sandwiches.</p>
                <span>£9.99</span>
            </div>
            <div class="menu-item">
                <img src="https://images.pexels.com/photos/376464/pexels-photo-376464.jpeg" alt="Dinner">
                <h3>Dinner</h3>
                <p>Dine in with a fine selection of evening meals including pastas, steaks, and gourmet dishes.</p>
                <span>£12.99</span>
            </div>
        </div>
    </section>

    <!-- Menus Section -->
    <section class="section" id="menus">
        <h2>Our Menus</h2>
        <div class="menu-items">
            <div class="menu-item">
                <img src="https://images.pexels.com/photos/1640777/pexels-photo-1640777.jpeg" alt="Sri Lankan Cuisine">
                <h3>Sri Lankan Rice and Curry</h3>
                <p>Authentic Sri Lankan rice and curry with spicy flavors and fresh ingredients.</p>
                <span>£10.99</span>
            </div>
            <div class="menu-item">
                <img src="https://images.pexels.com/photos/357573/pexels-photo-357573.jpeg" alt="Chinese Cuisine">
                <h3>Chinese Stir-Fry Noodles</h3>
                <p>Delicious stir-fried noodles with vegetables and your choice of protein.</p>
                <span>£8.99</span>
            </div>
            <div class="menu-item">
                <img src="https://images.pexels.com/photos/721863/pexels-photo-721863.jpeg" alt="Italian Cuisine">
                <h3>Italian Margherita Pizza</h3>
                <p>Classic Italian pizza with fresh mozzarella, basil, and tomato sauce.</p>
                <span>£11.50</span>
            </div>
            <div class="menu-item">
                <img src="https://images.pexels.com/photos/97083/pexels-photo-97083.jpeg" alt="French Cuisine">
                <h3>French Croissants</h3>
                <p>Freshly baked buttery croissants served with jam and butter.</p>
                <span>£4.99</span>
            </div>
        </div>
    </section>

    <!-- Special Food and Beverages Section -->
    <section class="section" id="special-food">
        <h2>Special Food & Beverages</h2>
        <div class="menu-items">
            <div class="menu-item">
                <img src="https://images.pexels.com/photos/602750/pexels-photo-602750.jpeg" alt="Special Dessert">
                <h3>Signature Chocolate Cake</h3>
                <p>A rich, indulgent chocolate cake with layers of creamy ganache.</p>
                <span>£6.99</span>
            </div>
            <div class="menu-item">
                <img src="https://images.pexels.com/photos/2147490/pexels-photo-2147490.jpeg" alt="Signature Cocktail">
                <h3>Mango Passionfruit Cocktail</h3>
                <p>A refreshing cocktail made with fresh mango, passionfruit, and rum.</p>
                <span>£9.99</span>
            </div>
            <div class="menu-item">
                <img src="https://images.pexels.com/photos/264793/pexels-photo-264793.jpeg" alt="Special Latte">
                <h3>Caramel Latte</h3>
                <p>Rich espresso combined with steamed milk and caramel syrup.</p>
                <span>£4.99</span>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <p>&copy; 2024 The Gallery Café. All Rights Reserved.</p>
    </footer>

</body>
</html>
