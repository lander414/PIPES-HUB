<?php
// admin_login.php
session_start();

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
    $admin_username = $_POST['username'];
    $admin_password = $_POST['password'];

    // Fetch admin data using prepared statement
    $stmt = $conn->prepare("SELECT * FROM admins WHERE username=?");
    $stmt->bind_param("s", $admin_username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Verify the password
        if (password_verify($admin_password, $row['password'])) {
            $_SESSION['admin_username'] = $admin_username;
            $_SESSION['admin_role'] = $row['role']; // Store the role in the session

            // Redirect to admin dashboard
            header("Location: admin_dashboard.php");
            exit();
        } else {
            $message = "Incorrect password!";
        }
    } else {
        $message = "No admin found with that username!";
    }

    $stmt->close();
    $conn->close();
}
?>

<!-- Rest of the HTML remains the same -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Login - Pipes Hub</title>
    <link rel="stylesheet" href="style(admin_login).css"> <!-- External CSS for styling -->
</head>
<body>
    <div class="login-container">
        <h2>Admin Login</h2>
        <?php if($message != "") { echo "<p class='error'>$message</p>"; } ?>
        <form method="POST" action="">
            <label for="username">Username:</label>
            <input type="text" name="username" id="username" required><br>

            <label for="password">Password:</label>
            <input type="password" name="password" id="password" required><br>

            <input type="submit" value="Login">
        </form>
    </div>
</body>
</html>
