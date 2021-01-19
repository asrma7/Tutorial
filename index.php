<?php
session_start();
require_once "dbconnect.php";
if(isset($_SESSION['user'])){
    $user = $_SESSION['user'];
}
else {
    header('Location:loginpage.php');
}
$sql = "SELECT * FROM blogs";
$stmt = $db->prepare($sql);
$stmt->execute();
$blogs = $stmt->fetchall();
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
    <ul>
    <?php
    foreach($blogs as $blog) {
        ?>
        <li>
        <a href="viewblog.php?id=<?php echo $blog['blog_id']; ?>">
        <?php echo $blog['title']; ?>
        </a>
        </li>
        <?php
    }
    ?>
    </ul>
    <?php
    require_once "footer.php";
    ?>
</body>
</html>