<?php
// Start session to access user data
session_start();

// Check if the user is logged in, if not redirect to login page
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit;
}

// Fetch user info from the session
$username = $_SESSION['username'];
$first_name = $_SESSION['first_name'];
$last_name = $_SESSION['last_name'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page - Pipes Hub</title>
    <link rel="stylesheet" href="landing(style).css"> <!-- External CSS for styling -->

</head>
<body>

    <!-- Navigation Bar -->
    <header>
        <div class="navbar">
            <div class="site-name">
                <h2>Pipes Hub</h2>
            </div>

            <!-- Search Bar in the middle -->
            <div class="search-bar">
                <input type="text" class="search-input" placeholder="Search...">
                <button class="search-button">Search</button>
            </div>

            <!-- Add to Cart, User Info, Chat Support, and Light/Dark Mode -->
            <div class="nav-right">
                <button class="nav-btn">Add to Cart</button>

                <!-- Dropdown for the logged-in user's username -->
                <div class="user-dropdown">
                    <button class="user-dropdown-btn"><?php echo $first_name . ' ' . $last_name; ?></button>
                    <div class="user-dropdown-content">
                        <a href="#">My Account</a>
                        <a href="#">My Purchase</a>
                        <a href="/RER/Landing_Page/Func_logout.php">Logout</a>
                    </div>
                </div>

                <button class="nav-btn" id="chatSupport">Chat Support</button>
                <button id="themeToggle" class="nav-btn">Light/Dark Mode</button>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main>
        <h1>Welcome to Pipes Hub</h1>
        <p>Paka design nyo dito.</p>
      
    </main>

    <script>
        // Toggle theme
        var themeToggle = document.getElementById("themeToggle");
        themeToggle.onclick = function() {
            document.body.classList.toggle("dark-mode");
        }
    </script>

</body>
</html>
