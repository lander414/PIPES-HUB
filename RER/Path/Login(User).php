<?php
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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Fetch user data
    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Verify the password
        if (password_verify($password, $row['password'])) {
            // Store user data in the session
            $_SESSION['username'] = $username;
            $_SESSION['first_name'] = $row['first_name'];
            $_SESSION['last_name'] = $row['last_name'];
            $_SESSION['phone_num'] = $row['phone_num'];

            // Redirect to the landing page after successful login
            header("Location: /RER/Landing_Page/landing.php");
            exit(); // Ensure no further code is executed after the redirect
        } else {
            echo "Incorrect password!";
        }
    } else {
        echo "No user found!";
    }

    $conn->close();
}
?>

<!-- Simple HTML Form for User Login -->
<form method="POST" action="">
    Username: <input type="text" name="username" required><br>
    Password: <input type="password" name="password" required><br>
    <input type="submit" value="Login">
</form>
