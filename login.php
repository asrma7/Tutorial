<?php
session_start();
require_once 'dbconnect.php';
$user = $_POST['user'];
$pass = $_POST['pass'];
$sql = 'Select * from users where username = :user or email = :user';
$stmt = $db->prepare($sql);
$stmt->bindParam(':user', $user);
$stmt->execute();
$userData = $stmt->fetch(PDO::FETCH_ASSOC);
if($userData == null){
    $_SESSION['error'] = 'User Does not exist!';
    header('Location:loginpage.php');
}
else if($userData['password'] != md5($pass)){
    $_SESSION['error'] = 'User and password do not match!';
    header('Location:loginpage.php');
}
else {
    $_SESSION['user'] = $userData;
    header('Location:index.php');
}
?>