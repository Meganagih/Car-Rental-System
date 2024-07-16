<?php
session_start();
require "connection.php";
$errors = array();

$c=false;


    if(isset($_POST['check'])){
        $_SESSION['info'] = "";
        $otp_code = mysqli_real_escape_string($con, $_POST['otp']);
        $check_code = "SELECT * FROM user WHERE code = $otp_code";
        $code_res = mysqli_query($con, $check_code);
        if(mysqli_num_rows($code_res) > 0){
            $fetch_data = mysqli_fetch_assoc($code_res);
            $fetch_code = $fetch_data['code'];
            $email = $fetch_data['Email'];
            $code = 0;
            $status = 'verified';
            $update_otp = "UPDATE user SET code = $code, status = '$status' WHERE code = $fetch_code";
            $update_res = mysqli_query($con, $update_otp);
            if($update_res){
                $_SESSION['email'] = $email;
                echo "<script>alert('Verified Successful');</script>";
                header('location:  ../index.php');
                exit();
            }else{
                $errors['otp-error'] = "Failed while updating code!";
                echo "<script>alert('Failed while updating code!');</script>";
            }
        }else{
            $errors['otp-error'] = "You've entered incorrect code!";
            echo "<script>alert('You've entered incorrect code!');</script>";
        }
    }
 //if user click login button
    if(isset($_POST['login'])){
        $username = mysqli_real_escape_string($con, $_POST['fullname']);
        $password = mysqli_real_escape_string($con, $_POST['password']);
        $get_email="SELECT EmailId from tblusers WHERE FullName = '$username';";
        $sql=mysqli_query($con,  $get_email);
        if(mysqli_num_rows($sql) > 0){
            $fetch1 = mysqli_fetch_assoc($sql);
        $email =  $fetch_pass = $fetch1['EmailId'];
    }
        
        $check_email = "SELECT * FROM tblusers WHERE FullName = '$username';";
        $res = mysqli_query($con, $check_email);
        if(mysqli_num_rows($res) > 0){
            $fetch = mysqli_fetch_assoc($res);
            $fetch_pass = $fetch['Password'];
            if($password == $fetch_pass){
            
                $_SESSION['email'] =$email; 
                $_SESSION['password'] = $password;
                $_SESSION['username'] = $_POST['fullname'];
                $_SESSION['fname']=$_POST['fullname'];
                $_SESSION['login']=$email;
                $status = $fetch['status'];
                if($status == 'verified'){
                   $_SESSION['email'] = $email;
                  $_SESSION['username'] = $username;
                  $_SESSION['password'] = $password;
                  header('location: ../../index.php');
                  
                }else{
                    $info = "It's look like you haven't still verify your email - $email";
                    $_SESSION['info'] = $info;
                    header('location: user-otp.php');
                }
            }else{
                $errors['email'] = "Incorrect Username or password!";
            }
        }else{
            $errors['email'] = "It's look like you're not yet a member! Click on the bottom link to signup.";
        }
    }


    //if user click change password button
    if(isset($_POST['change-password'])){
        $_SESSION['info'] = "";
        $password = mysqli_real_escape_string($con, $_POST['password']);
        $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
        if($password !== $cpassword){
            $errors['password'] = "Confirm password not matched!";
        }else{
            $code = 0;
           $email = $_SESSION['email'];
          //getting this email using session
            $encpass = $password ;
            $update_pass = "UPDATE tblusers SET code = $code, Password = '$encpass' WHERE EmailId = '$email';";
            $run_query = mysqli_query($con, $update_pass);
            if($run_query){
                $info = "Your password changed. Now you can login with your new password.";
                $_SESSION['info'] = $info;
                header('Location: password-changed.php');
            }else{
                $errors['db-error'] = "Failed to change your password!";
            }
        }
    }
//if login now button click
    if(isset($_POST['login-now'])){
        header('Location: login-user.php');
    }






