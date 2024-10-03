<?php
// admin_auth.php
session_start();

// Function to check if admin is logged in
function check_admin_login() {
    if (!isset($_SESSION['admin_username'])) {
        header("Location: admin_login.php");
        exit();
    }
}

// Function to check if admin is superadmin
function is_superadmin() {
    return isset($_SESSION['admin_role']) && $_SESSION['admin_role'] === 'superadmin';
}
?>
