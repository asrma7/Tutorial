<?php
session_start();
require_once 'dbconnect.php';
$fullname = $_POST['fullname']??"";
$username = $_POST['username']??"";
$email = $_POST['email']??"";
$password = $_POST['pass']??"";
$confirm = $_POST['confirm']??"";
?>
    <?php
        if($password != $confirm){
            $message = 'Sorry your password and confirm password doesnot match!';
            $status = 201;
        }
        else if(check_username($username)){
            $message = 'Sorry Username already exists!';
            $status = 201;
        }
        else if(check_email($email)){
            $message = 'Sorry Email already exists!';
            $status = 201;
        }
        else if(strlen($password)<8){
            $message = 'Password must be atleast 8 characters long!';
            $status = 201;
        }
        else {
            $encryptpass = md5($password);
            $sql = "INSERT INTO users VALUES(null, :fn, :un, :email, :pw)";
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':fn', $fullname);
            $stmt->bindParam(':un', $username);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':pw', $encryptpass);
            $stmt->execute();
            $message = 'Registered Successfully! Login to continue';
            $status = 200;
        }
        echo json_encode(['status'=>$status, 'message'=>$message]);
    ?>

<?php
function check_username($un) {
    global $db;
    $sql = "Select count(*) as count from users where username = :username";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':username', $un);
    $stmt->execute();
    $data = $stmt->fetch(PDO::FETCH_ASSOC);
    return $data['count'] > 0;
}
function check_email($email) {
    global $db;
    $sql = "Select count(*) as count from users where email = :email";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $data = $stmt->fetch(PDO::FETCH_ASSOC);
    return $data['count'] > 0;
}
?>