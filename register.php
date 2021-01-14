<?php
session_start();
require_once 'dbconnect.php';
$fullname = $_POST['fullname']??"";
$username = $_POST['username']??"";
$email = $_POST['email']??"";
$password = $_POST['pass']??"";
$confirm = $_POST['confirm']??"";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <?php
        if($password != $confirm){    
            $_SESSION['error'] = 'Sorry your password and confirm password doesnot match!';
            header('Location:loginpage.php');
        }
        else if(check_username($username)){
            $_SESSION['error'] = 'Sorry Username already exists!';
            header('Location:loginpage.php');
        }
        else if(check_email($email)){
            $_SESSION['error'] = 'Sorry Email already exists!';
            header('Location:loginpage.php');
        }
        else if(strlen($password)<8){
            $_SESSION['error'] = 'Password must be atleast 8 characters long!';
            header('Location:loginpage.php');
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
            $_SESSION['error'] = 'Registered Successfully! Login to continue';
            header('Location:loginpage.php');
        }
    ?>
</body>
</html>

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