<?php
session_start();
if(isset($_SESSION['user'])){
    $user = $_SESSION['user'];
}
else {
    header('Location:loginpage.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My blog site</title>
</head>
<body>
    Hello <?php echo $user['fullname'];?>
    <a href="logout.php">Logout</a>
    <a href="createblog.php">create blog</a>
</body>
</html>