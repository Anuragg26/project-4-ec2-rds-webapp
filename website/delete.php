<?php
$conn = new mysqli(
"mydb.cxqoii4oyf61.eu-north-1.rds.amazonaws.com",
"admin",
"Anurag12345",
"myapp"
);

$id = $_GET['id'];

$sql = "DELETE FROM users WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    header("Location: view.php");
} else {
    echo "Error deleting record";
}

$conn->close();
?>
