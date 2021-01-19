<?php
session_start();
require_once "dbconnect.php";
if(isset($_SESSION['user'])){
    $user = $_SESSION['user'];
}
else {
    header('Location:loginpage.php');
}
$id = $_GET['id'];
$sql = "SELECT blogs.*, users.fullname as authorname FROM blogs LEFT JOIN users ON users.user_id = blogs.author WHERE blog_id = $id";
$stmt = $db->prepare($sql);
$stmt->execute();
$blog = $stmt->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $blog['title'];?></title>
</head>
<body>
    <h1><?php echo $blog['title'];?></h1>
    <h2>By:- <?php echo $blog['authorname'];?></h2>
    <p><?php echo $blog['description'];?></p>
    <?php
    require_once "footer.php";
    ?>
</body>
</html>