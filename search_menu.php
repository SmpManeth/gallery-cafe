<?php
session_start();

$search_results = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $search_term = htmlspecialchars(trim($_POST['search']));

    // Check if the search term is empty
    if (empty($search_term)) {
        $error_message = "Please enter a cuisine type to search.";
    } else {
        $conn = new mysqli('localhost', 'root', '', 'thegallerycafe');

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $stmt = $conn->prepare("SELECT * FROM menu WHERE cuisine_type LIKE ?");
        $search_param = "%" . $search_term . "%";
        $stmt->bind_param("s", $search_param);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $search_results[] = $row;
            }
        } else {
            $error_message = "No results found for '$search_term'.";
        }

        $stmt->close();
        $conn->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Menu - The Gallery Café</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f4f4f4;
            padding: 2rem;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: white;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        form {
            display: flex;
            justify-content: center;
            gap: 10px;
        }
        input[type="text"] {
            padding: 10px;
            width: 200px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        input[type="submit"] {
            padding: 10px 20px;
            background-color: #e67e22;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #d35400;
        }
        .search-results {
            margin-top: 30px;
        }
        .result-item {
            background-color: #f4f4f4;
            padding: 15px;
            margin-bottom: 10px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .error-message {
            color: red;
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>

    <!-- Include Navbar -->
    <?php include 'navbar.php'; ?>

    <div class="container">
        <h2>Search Our Menu</h2>
        <form action="search_menu.php" method="POST">
            <input type="text" id="search" name="search" placeholder="e.g., Chinese, Italian">
            <input type="submit" value="Search">
        </form>

        <div class="search-results">
            <?php if (isset($error_message)): ?>
                <p class="error-message"><?php echo $error_message; ?></p>
            <?php endif; ?>

            <?php if (!empty($search_results)): ?>
                <?php foreach ($search_results as $result): ?>
                    <div class="result-item">
                        <h3><?php echo htmlspecialchars($result['dish_name']); ?> (<?php echo htmlspecialchars($result['cuisine_type']); ?>)</h3>
                        <p>Price: £<?php echo htmlspecialchars($result['price']); ?></p>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>

</body>
</html>
