<!DOCTYPE html>
<html>
<head>
<title>Cloud App Form</title>

<style>
body {
    margin: 0;
    font-family: Arial;
    background: black;
    color: white;
    overflow: hidden;
}

/* Moving background */
body::before {
    content: "";
    position: fixed;
    width: 200%;
    height: 200%;
    background: linear-gradient(45deg, #0f2027, #203a43, #2c5364);
    animation: moveBg 10s linear infinite;
    z-index: -1;
}

@keyframes moveBg {
    0% { transform: translate(0,0); }
    50% { transform: translate(-25%, -25%); }
    100% { transform: translate(0,0); }
}

.container {
    width: 350px;
    margin: 100px auto;
    padding: 25px;
    background: rgba(0,0,0,0.8);
    border-radius: 10px;
    box-shadow: 0 0 20px #00c6ff;
}

h2 {
    text-align: center;
}

input, select {
    width: 100%;
    padding: 10px;
    margin: 8px 0;
    border: none;
    border-radius: 5px;
}

button {
    width: 48%;
    padding: 10px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

.submit {
    background: #00c6ff;
    color: black;
}

.cancel {
    background: red;
    color: white;
}

.buttons {
    display: flex;
    justify-content: space-between;
}
</style>

</head>

<body>

<div class="container">
    <h2>Cloud Data Form</h2>

    <form action="insert.php" method="POST">

        <input type="text" name="name" placeholder="Enter Name" required>

        <input type="email" name="email" placeholder="Enter Email" required>

        <!-- Gender -->
        <select name="gender" required>
            <option value="">Select Gender</option>
            <option>Male</option>
            <option>Female</option>
        </select>

        <!-- Country Code + Phone -->
        <select name="country_code">
            <option value="+91">🇮🇳 +91 India</option>
            <option value="+49">🇩🇪 +49 Germany</option>
            <option value="+1">🇺🇸 +1 USA</option>
            <option value="+44">🇬🇧 +44 UK</option>
        </select>

        <input type="text" name="phone" placeholder="Mobile Number" required>

        <div class="buttons">
            <button type="submit" class="submit">Submit</button>
            <button type="reset" class="cancel">Cancel</button>
        </div>

    </form>
</div>

</body>
</html>

