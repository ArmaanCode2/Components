<?php  
session_start();
include '../db.php';//to be changed

if($_SERVER["REQUEST_METHOD"] == "POST"){
    if($_POST['g-recaptcha-response'] != ""){
        $email = $_POST['email'];//to be changed 
        $pass = $_POST['pass'];//to be changed

        $sql ="SELECT * FROM register WHERE email = '$email'";//to be changed
        $result = mysqli_query($conn,$sql);
        $num = mysqli_num_rows($result);

        if($num == 1){
            while($row=mysqli_fetch_assoc($result)){
              if(password_verify($pass,$row['password'])){
                $_SESSION['loggedin'] = true;
                $_SESSION['username'] = $row['name'];
                $_SESSION['userid'] = $row['id'];
                $_SESSION['photo'] = $row['profile_url'];
                header("Location: ../login/");//to be changed
                // header("refresh:1;url=../../"); //to be changed
              }else{
                $_SESSION['error'] = "Incorrect Password please try again";
                header('Location: ../login/');//to be changed
              }
            }
        }else{
            $_SESSION['error'] = "Wrong Email Please try again";
            header('Location: ../login/');//to be changed
        }
    }else{
        $_SESSION['error'] = "Please Fill the reCaptcha for Verification";
        header('Location: ../login/');//to be changed
        // echo $_SESSION['error'];
    }
}

?>