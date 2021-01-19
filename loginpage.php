<?php
session_start();
if(isset($_SESSION['user'])){
    header('Location:index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tutorial</title>
</head>
<body>
<h1 id="msg"></h1> 
<h1>Register to our site</h1>
    <form method="POST" onsubmit="registerSubmit()">
    <table>
        <tr>
        <td>Full Name:</td><td><input type="text" id="fullname"></td>
        </tr>
        <tr>
        <td>Username:</td><td><input type="text" id="username"></td>
        </tr>
        <tr>
        <td>Email:</td><td><input type="email" id="email"></td>
        </tr>
        <tr>
        <td>Password:</td><td><input type="password" id="pass"></td>
        </tr>
        <tr>
        <td>Confirm Password:</td><td><input type="password" id="confirm"></td>
        </tr>
        <tr>
        <td colspan=2><center><input type="submit" value="Register"></center></td>
        </tr>
        </table>
    </form>
    <h1>Login to our site</h1>
    <form method="POST" onsubmit="loginSubmit()">
    <table>
        <tr>
        <td>Login:</td><td><input type="text" id="user"></td>
        </tr>
        <tr>
        <td>Password:</td><td><input type="password" id="password"></td>
        </tr>
        <tr>
        <td colspan=2><center><input type="submit" value="Login"></center></td>
        </tr>
        </table>
    </form>
    <?php
    require_once "footer.php";
    ?>
    <script src="scripts/script.js"></script>
</body>
</html>