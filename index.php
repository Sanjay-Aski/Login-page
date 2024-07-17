<?php
    
    $server = "localhost";
    $username = "root";
    $password = "sanjay";
    $connection = new mysqli($server, $username, $password);

    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }

    function check1() {
        echo "Sign in Successful 👍";
    }

    function check2() {
        echo "Incorrect credentials 😣";
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $myusername = $_POST['user'];
        $mypassword = $_POST['pass'];

        $sql = "SELECT * FROM login_info.LOGIN_ID_PASSWORD WHERE username = '$myusername'";
        $result = $connection->query($sql);

        $connection->close();
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
            <h1>Login</h1>
            <form action="index.php" method="post">
                <div class="inputsdiv">
                    <input id="user" name="user" type="text" placeholder="UserName">
                    <input id="pass" name="pass" type="password" placeholder="PassWord">
                </div>
                <button class="login">Sign in</button>
            </form>
            <div id="error">
                <?php
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        if ($result->num_rows > 0) {
                            $row = $result->fetch_assoc();
                            if ($row["PASSWORD"] == $mypassword) {
                                check1();
                            } else {
                                check2(); 
                            }
                        } else {
                            check2();
                        }
                    }
                ?>
            </div>
            <div id="linksdiv">
                <a class="links" href="new.html">New user? Sign up now</a>
                <a class="links" href="forget.php">Forget password?</a>
            </div>
        </div>
        <div id="mid-end"></div>
        <div id="last-start"></div>
    </div>
</body>
</html>
