<?php
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
        ?>
        <h1>Sorry your password and confirm password doesnot match!</h1>
        <?php
        }
        else if(check_username($username)){
            echo '<h1>Sorry Username already exists</h1>';
        }
        else if(check_email($email)){
            echo '<h1>Sorry Email already exists</h1>';
        }
        else if(strlen($password)<8){
            echo '<h1>Password must be atleast 8 characters long</h1>';
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
            echo '<h1>Registered Successfully! Hurray!!!!</h1>';
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