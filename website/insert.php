<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
<?php
$conn = new mysqli("mydb.cxqoii4oyf61.eu-north-1.rds.amazonaws.com", "admin", "Anurag12345", "myapp");

$name = $_POST['name'];
$email = $_POST['email'];
$gender = $_POST['gender'];
$country_code = $_POST['country_code'];
$phone = $_POST['phone'];

$sql = "INSERT INTO users (name, email, gender, country_code, phone)
VALUES ('$name', '$email', '$gender', '$country_code', '$phone')";

if ($conn->query($sql) === TRUE) {
    echo "Data inserted successfully";
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>
