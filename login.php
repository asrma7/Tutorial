<?php
require_once 'dbconnect.php';
$user = $_POST['user'];
$pass = $_POST['pass'];
$sql = 'Select * from users where username = :user or email = :user';
$stmt = $db->prepare($sql);
$stmt->bindParam(':user', $user);
$stmt->execute();
$userData = $stmt->fetch(PDO::FETCH_ASSOC);
if($userData == null){
    echo '<h1>User Does not exist</h1>';
}
else if($userData['password'] != md5($pass)){
    echo '<h1>User and password do not match</h1>';
}
else {
    echo "<h1>Hello ".$userData['fullname']."</h1>";
    ?>
    <input type="hidden" name="author" value=<?php echo $userData['user_id']?>>
    <?php
}
?>