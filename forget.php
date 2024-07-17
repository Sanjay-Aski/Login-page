<?php
    // Database connection 
    $server = "localhost";
    $username = "root";
    $password = "sanjay";
    $CHECK = 0;

    // Establish a database connection
    $connection = new mysqli($server, $username, $password);

    // Check if the connection failed
    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div>
        <div id="first-end"></div>
        <div id="mid-start"></div>
        <div class="main-container">
            <div class="check">
                <?php
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        $email = $_POST['EmailOrUser'];
                        $otpEntered = $_POST['input_otp'];
                        $sql = "SELECT * FROM login_info.LOGIN_ID_PASSWORD WHERE USERNAME ='$email' OR Email = '$email';";
                        $result = $connection->query($sql);
                        $otpsent = $_POST['otp'];

                        if ($result->num_rows > 0 && $otpEntered == $otpsent) {
                            $row = $result->fetch_assoc();
                            echo "Name: " . $row["NAME"] . "<br>";
                            echo "Username: " . $row["USERNAME"] . "<br>";
                            echo "Password: " . $row["PASSWORD"];
                        } else {
                            $CHECK = 1;
                        }
                    }
                ?>
            </div>
            <h1>Forget Password?</h1>
            <form action="forget.php" method="post">
                <div class="inputsdiv">
                    <input id="user" name="EmailOrUser" type="text" placeholder="UserName/E-mail Id">
                    <input id="otp" type="hidden" name="otp" value="123">
                </div>
                <div class="btns">
                    <button class="login" id="OTPbtn">Get OTP/Code</button>
                </div>
            </form>
            <div id="error">
                <?php
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        if ($CHECK == 1) {
                            echo "UserName/Email/OTP is INCORRECT";
                        }
                    }
                ?>
            </div>
        </div>
        <div id="mid-end"></div>
        <div id="last-start"></div>
    </div>
</body>
<script src="Forget.js"></script>
</html>
