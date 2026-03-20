<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

$conn = new mysqli(
"mydb.cxqoii4oyf61.eu-north-1.rds.amazonaws.com",
"admin",
"Anurag12345",
"myapp"
);

$id = $_GET['id'];

/* FETCH EXISTING DATA */
$result = $conn->query("SELECT * FROM users WHERE id=$id");
$row = $result->fetch_assoc();

/* UPDATE DATA */
if (isset($_POST['update'])) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $country_code = $_POST['country_code'];
    $phone = $_POST['phone'];

    $sql = "UPDATE users SET 
        name='$name',
        email='$email',
        gender='$gender',
        country_code='$country_code',
        phone='$phone'
        WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        header("Location: view.php");
    } else {
        echo "Error updating record";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Edit User</title>

<style>
body {
    background: #0f2027;
    color: white;
    font-family: Arial;
}

.container {
    width: 350px;
    margin: 100px auto;
    background: black;
    padding: 20px;
    border-radius: 10px;
}

input, select {
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
<h2>Edit User</h2>

<form method="POST">

<input type="text" name="name" value="<?php echo $row['name']; ?>" required>

<input type="email" name="email" value="<?php echo $row['email']; ?>" required>

<select name="gender">
    <option><?php echo $row['gender']; ?></option>
    <option>Male</option>
    <option>Female</option>
</select>

<select name="country_code">
    <option><?php echo $row['country_code']; ?></option>
    <option value="+91">+91</option>
    <option value="+49">+49</option>
    <option value="+1">+1</option>
</select>

<input type="text" name="phone" value="<?php echo $row['phone']; ?>" required>

<button type="submit" name="update">Update</button>

</form>

</div>

</body>
</html>

<?php
$conn->close();
?>
