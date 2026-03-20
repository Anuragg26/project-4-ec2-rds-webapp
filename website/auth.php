<?php
session_start();

$username = $_POST['username'];
$password = $_POST['password'];

/* Simple login (for project demo) */
if ($username == "database" && $password == "database123") {
    $_SESSION['user'] = $username;
    header("Location: view.php");
} else {
    echo "Invalid credentials";
}
?>
