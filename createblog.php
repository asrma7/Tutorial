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
    <title>Create blog</title>
    <style>
    .container {
        position: relative;
        height: calc(100vh - 30px);
    }
    .content {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }
    </style>
</head>
<body>
<div class="container">
<a href="index.php">Home</a>
<a href="logout.php">Logout</a>
<div class="content">
<h1>Create your blog</h1>
    <form action="postblog.php" method="POST">
    <table>
        <tr>
        <td>Title:</td><td><input type="text" name="title"></td>
        </tr>
        <tr>
        <td>Description:</td><td><textarea rows="5" name="description"></textarea></td>
        </tr>
        <tr>
        <td colspan=2><center><input type="submit" value="Post"></center></td>
        </tr>
        </table>
    </form>
    </div>
    </div>
    <?php
    require_once "footer.php";
    ?>
</body>
</html>