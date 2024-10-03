<?php
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
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash the password
    $phone_num = $_POST['phone_num'];

    // Insert data into the database
    $sql = "INSERT INTO users (first_name, last_name, username, password, phone_num) 
            VALUES ('$first_name', '$last_name', '$username', '$password', '$phone_num')";

    if ($conn->query($sql) === TRUE) {
        // If registration is successful, redirect to the landing page
        header("Location: /RER/Landing_Page/landing.php");
        exit(); // Ensure no further code is executed after the redirect
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<!-- Simple HTML Form for User Registration -->
<form method="POST" action="">
    First Name: <input type="text" name="first_name" required><br>
    Last Name: <input type="text" name="last_name" required><br>
    Username: <input type="text" name="username" required><br>
    Password: <input type="password" name="password" required><br>
    Phone Number: <input type="text" name="phone_num" required><br>
    <input type="submit" value="Register">
</form>
