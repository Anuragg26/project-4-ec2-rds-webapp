<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}
?>

<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$conn = new mysqli(
"mydb.cxqoii4oyf61.eu-north-1.rds.amazonaws.com",
"admin",
"Anurag12345",
"myapp"
);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM users";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
<a href="logout.php" style="color:red;">Logout</a>
<title>Dashboard</title>

<style>
body {
    font-family: Arial;
    background: #0f2027;
    color: white;
    margin: 0;
}

/* Header */
.header {
    background: black;
    padding: 15px;
    text-align: center;
    font-size: 22px;
}

/* Table */
table {
    width: 90%;
    margin: 40px auto;
    border-collapse: collapse;
    background: rgba(0,0,0,0.8);
}

th, td {
    padding: 12px;
    border: 1px solid #444;
    text-align: center;
}

th {
    background: #00c6ff;
    color: black;
}

/* Buttons */
.delete {
    background: red;
    color: white;
    padding: 6px 10px;
    text-decoration: none;
    border-radius: 5px;
}

.back {
    display: block;
    text-align: center;
    margin-top: 20px;
    color: cyan;
}
</style>

</head>

<body>

<div class="header">User Dashboard</div>

<table>
<tr>
    <th>ID</th>
    <th>Name</th>
    <th>Email</th>
    <th>Gender</th>
    <th>Phone</th>
    <th>Action</th>
</tr>

<?php
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr>
            <td>".$row['id']."</td>
            <td>".$row['name']."</td>
            <td>".$row['email']."</td>
            <td>".$row['gender']."</td>
            <td>".$row['country_code']." ".$row['phone']."</td>
            <td>
               <a href='edit.php?id=".$row['id']."' style='color:yellow;'>Edit</a> |
    <a class='delete' href='delete.php?id=".$row['id']."'>Delete</a>
            </td>
        </tr>";
    }
} else {
    echo "<tr><td colspan='6'>No data found</td></tr>";
}
?>

</table>

<a href="index.php" class="back">← Back to Form</a>

</body>
</html>

<?php
$conn->close();
?>
