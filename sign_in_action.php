<?php
require_once 'config.php';
require_once 'db.php';
if(isset($_POST)){
    ob_start();
    session_start();
if (isset($_POST)) {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
   
    if (empty($password)) {
        $errors[] = "Password can't be blank.";
    }
    if (empty($email)) {
        $errors[] = "email can't be blank.";
    }
    if (!empty($errors))
    {
       $_SESSION['errors'] = $errors;
       header('location:'.'r.php');
       exit();
   }
}  
if (!empty($email) && !empty($password)) {
    $conn = db_connect();
    $sanitizeEmail = mysqli_real_escape_string($conn, $email);
    $sql = "SELECT * FROM `students` WHERE `email`='{$sanitizeEmail}'";
    $sqlResult = mysqli_query($conn, $sql);
    if (mysqli_num_rows($sqlResult) > 0) {
        $userInfo = mysqli_fetch_assoc($sqlResult);
    //    if (!empty($userInfo)) {
    //     $passwordInDb = $userInfo['password'];
    //          if (password_verify($password, $passwordInDb)) {
    //          unset($userInfo['password']);
    //          $_SESSION['user'] = $userInfo;
    //          $request_url = !empty($_SESSION['request_url']) ? $_SESSION['request_url'] :'./admission/.';
    //          unset($_SESSION['request_url']);
                header('location:' ."login.html");
            } else {
                $errors[] = "Something went wrong";
                $_SESSION['errors'] = $errors;
                header('location:'  . "log.php");
                exit();
            }
        }
    } 
   




//}

//}
?>
