<?php
// admin_dashboard.php
session_start();
include('admin_auth.php'); // Include the authentication functions
check_admin_login(); // Ensure admin is logged in

$role = $_SESSION['admin_role'];
$admin_username = $_SESSION['admin_username'];


// Check if the admin is logged in
if (!isset($_SESSION['admin_username'])) {
    header("Location: admin_login.php");
    exit();
}

$role = $_SESSION['admin_role'];
$admin_username = $_SESSION['admin_username'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard - Pipes Hub</title>
    <link rel="stylesheet" href="style(admin_dashboard).css"> <!-- External CSS for styling -->
</head>
<body>

    <!-- Navigation Bar -->
    <header>
        <div class="navbar">
            <div class="site-name">
                <h2>Pipes Hub Admin</h2>
            </div>

            <!-- Search Bar in the middle -->
            <div class="search-bar">
                <input type="text" class="search-input" placeholder="Search...">
                <button class="search-button">Search</button>
            </div>

            <!-- Add to Cart, User Info, Chat Support, and Light/Dark Mode -->
            <div class="nav-right">
                <!-- Example button for Admins, you can customize as needed -->
                <button class="nav-btn">Add to Cart</button>

                <!-- Dropdown for the logged-in admin's username -->
                <div class="user-dropdown">
                    <button class="user-dropdown-btn"><?php echo htmlspecialchars($admin_username); ?></button>
                    <div class="user-dropdown-content">
                        <a href="#">My Account</a>
                        <a href="#">My Purchase</a>
                        <a href="admin_logout.php">Logout</a>
                    </div>
                </div>

                <button class="nav-btn" id="chatSupport">Chat Support</button>
                <button id="themeToggle" class="nav-btn">Light/Dark Mode</button>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main>
        <h1>Welcome to the Admin Dashboard, <?php echo htmlspecialchars($admin_username); ?>!</h1>
        
        <?php if ($role === 'superadmin'): ?>
            <section>
                <h2>Super Admin Actions</h2>
                <ul>
                    <li><a href="create_admin.php">Create New Admin</a></li>
                    <li><a href="#">Manage All Users</a></li>
                    <li><a href="#">View System Logs</a></li>
                </ul>
            </section>
        <?php endif; ?>

        <section>
            <h2>General Admin Actions</h2>
            <ul>
                <li><a href="#">Manage Products</a></li>
                <li><a href="#">View Sales</a></li>
            </ul>
        </section>
    </main>

    <script src="script(admin_dashboard).js"></script> <!-- External JS for functionality -->
</body>
</html>
