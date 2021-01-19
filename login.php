<?php
session_start();
require_once 'dbconnect.php';
$user = $_POST['user']??"";
$pass = $_POST['pass']??"";
$sql = 'Select * from users where username = :user or email = :user';
$stmt = $db->prepare($sql);
$stmt->bindParam(':user', $user);
$stmt->execute();
$userData = $stmt->fetch(PDO::FETCH_ASSOC);
if($userData == null){
    $message = 'User Does not exist!';
    $status = 201;
}
else if($userData['password'] != md5($pass)){
    $message = 'User and password do not match!';
    $status = 201;
}
else {
    $_SESSION['user'] = $userData;
    $message = 'Login Successfully! Redirecting to Home';
    $status = 200;
}
echo json_encode(['status'=>$status, 'message'=>$message]);
?>