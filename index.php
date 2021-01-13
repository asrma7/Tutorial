<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>Register to our site</h1>
    <form action="register.php" method="POST">
    <table>
        <tr>
        <td>Full Name:</td><td><input type="text" name="fullname"></td>
        </tr>
        <tr>
        <td>Username:</td><td><input type="text" name="username"></td>
        </tr>
        <tr>
        <td>Email:</td><td><input type="email" name="email"></td>
        </tr>
        <tr>
        <td>Password:</td><td><input type="password" name="pass"></td>
        </tr>
        <tr>
        <td>Confirm Password:</td><td><input type="password" name="confirm"></td>
        </tr>
        <tr>
        <td colspan=2><center><input type="submit" value="Register"></center></td>
        </tr>
        </table>
    </form>
    <h1>Login to our site</h1>
    <form action="login.php" method="POST">
    <table>
        <tr>
        <td>Login:</td><td><input type="text" name="user"></td>
        </tr>
        <tr>
        <td>Password:</td><td><input type="password" name="pass"></td>
        </tr>
        <tr>
        <td colspan=2><center><input type="submit" value="Login"></center></td>
        </tr>
        </table>
    </form>
</body>
</html>