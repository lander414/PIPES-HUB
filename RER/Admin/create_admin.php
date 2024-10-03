<?php
// create_admin.php
include('admin_auth.php'); // Include the authentication functions
check_admin_login(); // Ensure admin is logged in

if (!is_superadmin()) {
    echo "Access denied. Only Super Admins can create new admins.";
    exit();
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pipes_hub_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $new_admin_username = $_POST['username'];
    $new_admin_password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash the password
    $new_admin_role = $_POST['role'];

    // Check if username already exists using prepared statement
    $stmt = $conn->prepare("SELECT * FROM admins WHERE username=?");
    $stmt->bind_param("s", $new_admin_username);
    $stmt->execute();
    $check_result = $stmt->get_result();

    if ($check_result->num_rows > 0) {
        $message = "Username already exists!";
    } else {
        // Insert new admin using prepared statement
        $stmt = $conn->prepare("INSERT INTO admins (username, password, role) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $new_admin_username, $new_admin_password, $new_admin_role);
        if ($stmt->execute()) {
            $message = "New admin created successfully!";
        } else {
            $message = "Error: " . $stmt->error;
        }
    }

    $stmt->close();
    $conn->close();
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create New Admin - Pipes Hub</title>
    <link rel="stylesheet" href="style(create_admin).css"> <!-- External CSS for styling -->
</head>
<body>
    <div class="create-admin-container">
        <h2>Create New Admin</h2>
        <?php if($message != "") { echo "<p class='message'>$message</p>"; } ?>
        <form method="POST" action="">
            <label for="username">Username:</label>
            <input type="text" name="username" id="username" required><br>

            <label for="password">Password:</label>
            <input type="password" name="password" id="password" required><br>

            <label for="role">Role:</label>
            <select name="role" id="role" required>
                <option value="admin">Admin</option>
                <option value="superadmin">Super Admin</option>
            </select><br>

            <input type="submit" value="Create Admin">
        </form>
        <a href="admin_dashboard.php">Back to Dashboard</a>
    </div>
</body>
</html>
