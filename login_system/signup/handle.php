<?php
session_start();
include '../db.php';//to be changed

if($_SERVER["REQUEST_METHOD"] == "POST"){
    if($_POST['g-recaptcha-response'] != ""){
        $username = $_POST['name'];
        $email = $_POST['email'];
        $pass = $_POST['pass'];
        $cpass = $_POST['cpass'];
        $existSql = "SELECT * FROM `register` WHERE name = '$username'";//to be changed
        $row=mysqli_fetch_assoc($existSql);
        $result = mysqli_query($conn,$existSql);
        $numExistRows = mysqli_num_rows($result);
        if($numExistRows > 0){
            $_SESSION['error'] = "Username Already Exists";
            header('Location: ../signup/');//to be changed
        }else{
            $existSql = "SELECT * FROM `register` WHERE email = '$email'";//to be changed
            $result = mysqli_query($conn,$existSql);
            $numExistRows = mysqli_num_rows($result);
            if($numExistRows > 0){
                $_SESSION['error'] = "Email Already Exists";
                header('Location: ../signup/');//to be changed
            }else{
                if($pass === $cpass){
                    $hash  = password_hash($pass , PASSWORD_DEFAULT);
                    $sql ="INSERT INTO `register` (`name`, `email`,  `password`,`date`,`profile_url`) VALUES ('$username', '$email', '$hash',current_timestamp(),'global/dropdown/img/default-edit.jpg')";//to be changed
                    $result = mysqli_query($conn,$sql);
                    $_SESSION['loggedin'] = true;
                    $_SESSION['username'] = $username;
                    $_SESSION['userid'] = $row['id'];
                    $_SESSION['success'] = "Your Account has been created by the Name of " .  $username . ". You can now Discover New Features!";
                    header('Location: ../signup/');//to be changed
                }else{
                    $_SESSION['error'] = "Please Check the Confirm Password is same as Password ";
                    header('Location: ../signup/');//to be changed
                }
            }
        }


    }else{
    $_SESSION['error'] = "Please Fill the reCaptcha for Verification";
    header('Location: ../signup/');//to be changed
    // echo $_SESSION['error'];
    }
}
?>