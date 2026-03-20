<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
<title>Login</title>
<style>
body {
    background: #0f2027;
    color: white;
    font-family: Arial;
}
.container {
    width: 300px;
    margin: 150px auto;
    padding: 20px;
    background: black;
    border-radius: 10px;
}
input {
    width: 100%;
    padding: 10px;
    margin: 10px 0;
}
button {
    width: 100%;
    padding: 10px;
    background: #00c6ff;
    border: none;
}
</style>
</head>

<body>
<div class="container">
<h2>Login</h2>

<form action="auth.php" method="POST">
<input type="text" name="username" placeholder="Username" required>
<input type="password" name="password" placeholder="Password" required>
<button type="submit">Login</button>
</form>

</div>
</body>
</html>
