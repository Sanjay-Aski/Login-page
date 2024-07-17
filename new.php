<?php
    $server = "localhost";
    $user_name = "root";
    $pass_word = "sanjay";
    $check;
     $connection = mysqli_connect($server, $user_name, $pass_word);
    function dupplifound(){ echo $check;};

    if (! $connection) {
        die("Connection failed: " .  mysqli_connect_error());
    }
    $username;
    $password;
    $mobile_no;
    $email;
    $name;
    
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
            <h1 >Create Account </h1>
            <form action="new.php" method="post">
                <div class="inputsdiv">
                    <input name ="name" type="text" placeholder = "Your Name">
                    <input type="text" name="mobile" placeholder="Mobile No.">
                    <input id="email" name="email" type="text" placeholder="Email">
                    <input id="user" name="user" type="text" placeholder="Set UserName" >
                    <input id="PassWord" name="pass" type="password" placeholder="PassWord">
                </div>
            <button class="login">Sign Up</button>
            </form>
            <div id="error">
                <?php

                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $username = $_POST['user'];
                    $password = $_POST['pass'];
                    $sql2 = "SELECT username FROM login_info.LOGIN_ID_PASSWORD WHERE username = '$username'";
                    $result =  $connection->query($sql2);
                    if ($result->num_rows > 0) {
                        echo "USERNAME ALREADY EXIST";  
                    }
                    else{
                            
                            $mobile_no = $_POST['mobile'];
                            $email = $_POST['email'];
                            $name = $_POST['name'];
                            
                        $sql = "INSERT INTO login_info.login_id_password (username, password, email, phonE, name) VALUES ('$username', '$password', '$email', '$mobile_no', '$name');";
        
                         $connection->query($sql);
                    }
                     $connection->close();
                }
                ?>
            </div>
        </div>
        <div id="mid-end"></div>
        <div id="last-start"></div>
    </div>
</body>

</html>
