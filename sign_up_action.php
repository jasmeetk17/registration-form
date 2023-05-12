<?php
require_once 'config.php';
require_once 'db.php';
    ob_start();
    session_start();
    $errors=[];

   if (isset($_POST)) {
        $firstName = trim($_POST['fname']);
        $lastName = trim($_POST['lname']);
        $father=trim($_POST['fathname']);
        $mother=trim($_POST['mothname']);
        $course = trim($_POST['cour']);
        $phnno= trim($_POST['phone']);
        $state = trim($_POST['state']);
        $gender = trim($_POST['gender']);
        $email = trim($_POST['email']);
        $password = trim($_POST['password']);
        $confirmPassword = trim($_POST['cpassword']);
        $passport = trim($_POST['passport']);
        $dmc = trim($_POST['dmc']);
        // validations
        if (empty($firstName)) {
            $errors[] = "First name can't be blank.";
        }
        if (empty($course)) {
            $errors[] = "Course cant't be blank";
        }
        if (empty($father)) {
            $errors[] = "Father name can't be blank.";
        }
        if (empty($mother)) {
            $errors[] = "Mother name cant't be blank";
        }
        if (empty($phnno)) {
            $errors[] = "Phone no can't be blank.";
        }
        if (empty($state)) {
            $errors[] = "State cant't be blank";
        }
        if (empty($gender)) {
            $errors[] = "Gender can't be blank.";
        }
        if (empty($email)) {
            $errors[] = "Email can't be blank.";
        }
      
        if (empty($password)) {
            $errors[] = "Password can't be blank.";
        }
        if (empty($confirmPassword)) {
            $errors[] = "Confirm Password can't be blank.";
        }
    
        if (!empty($password) && !empty($confirmPassword) && $password != $confirmPassword) {
            $errors[] = "Confirm password doesn't match.";
        }
        if (empty($passport)) {
            $errors[] = "Add our photograph";
        }
        if (empty($dmc)) {
            $errors[] = "Add your dmc";
        }

        if (!empty($email)) {
            $conn = db_connect();
            $sanitizeEmail = mysqli_real_escape_string($conn, $email);
            $emailSql = "SELECT id FROM `students` WHERE `email` = '{$sanitizeEmail}'";
            $sqlResult = mysqli_query($conn, $emailSql);
            $emailRow = mysqli_num_rows($sqlResult);
            if ($emailRow > 0) {
                $errors[] = "Email Address already exists.";
            }
            db_close($conn);
        }
    
        // if email already exists
        if (!empty($errors))
         {
            $_SESSION['errors'] = $errors;
            header('location:'.'adreg.php');
            exit();
        }
        
       
    
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO `Students` (firstname, lastname,father,mother,course,phnno,state,gender,email,password) VALUES ('{$firstName}','{$lastName}','{$father}','{$mother}','{$course}','{ $phnno}','{$state}','{$gender}','{$email}','{$passwordHash}')";
        $conn = db_connect();
        if (mysqli_query($conn, $sql)) {
            db_close($conn);
            $message = "You are registered successfully!";
            $_SESSION['success'] = $message;
            header('location:'. 'register.html');
        }
}?>
