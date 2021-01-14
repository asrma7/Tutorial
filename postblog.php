<?php
session_start();
if(isset($_SESSION['user'])){
    $user = $_SESSION['user'];
}
else {
    header('Location:loginpage.php');
}
require_once "dbconnect.php";
$title = $_POST['title'];
$description = $_POST['description'];

if($title==""){
    // TODO: return error
}
else if($description==""){
    // TODO: return error
}
else {
    $sql = "INSERT INTO blogs Values(null, :title, :description, :author)";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':author', $user['user_id']);
    $stmt->execute();
    header('Location:index.php');
}
?>