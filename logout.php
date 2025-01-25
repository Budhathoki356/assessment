<?php
// logout.php - Logout functionality
session_start();
session_destroy();
echo "You have logged out successfully. <a href='login.php'>Login again</a>";
?>