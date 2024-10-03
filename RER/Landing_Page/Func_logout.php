<?php
session_start();
session_destroy(); // Destroy the session
header("Location:/RER/Path/index.php"); // Redirect to the homepage (index.php)
exit;
?>
