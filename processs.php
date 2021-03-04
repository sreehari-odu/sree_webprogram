<?php

//initialising variables
$uname="";
$fname="";
$lname="";
$email="";
$errors = array();

require_once  'config.php';
require_once  'email.php';


//Register user
if(isset($_POST['register'])){
    $uname = mysqli_real_escape_string($db, $_POST['uname']);
    $fname = mysqli_real_escape_string($db,$_POST['fname']);
    $lname = mysqli_real_escape_string($db, $_POST['lname']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password = mysqli_real_escape_string($db,$_POST['password']);
    $confirmPassword = mysqli_real_escape_string($db,$_POST['confirm-password']);

    if (empty($uname)) {
        array_push($errors, "Username is required");
    }
    if (empty($fname)){
        array_push($errors,"First Name is required");
    }
    if (empty($lname)){
        array_push($errors,"Last Name is required");
    }
    if (empty($email)){
        array_push($errors,"Email is required");
    }
    if (empty($password)){
        array_push($errors,"Password is required");
    }
    if ($password != $confirmPassword){
        array_push($errors,"Password and Confirmation password did not match");
    }
    if(count($errors)==0){
        //check database for existing user with same username
        error_log('Checking for existing user');
        $profile_check_query = "SELECT * FROM $userTable WHERE uname = '$uname' or email = '$email' LIMIT 1";
        $result = mysqli_query($db, $profile_check_query);
        $profile = mysqli_fetch_assoc($result);
        if ($profile){
            if ($profile['uname'] === $uname){array_push($errors,"Username already exists");}
            if ($profile['email'] === $email){array_push($errors,"User account with given email already exists");}
            error_log('User already exists');
        }
        if (count($errors) == 0) {
            error_log('creating password');
            $password = md5($password);
            error_log('adding to DB');
            $query = "INSERT INTO $userTable (uname,fname,lname,email,password) VALUES ('$uname','$fname','$lname','$email','$password')";
            mysqli_query($db,$query);
            error_log($query);
            error_log('Created user');
            $_SESSION['uname'] = $uname;
            $_SESSION['nickname'] = $fname;
            $_SESSION['lname'] = $lname;
            $_SESSION['success'] = "You are now logged in";
            $to = $email;
            $subject = "Account Created";
            $msg = "Hi there, Your account has been successfully created. \n\nYour username is ".$uname.".\n\n<a href=\"http://localhost/signin.php\">Click Here</a> to Login. ";
            $msg = wordwrap($msg,70);

            $success = sendEmail($to, $subject, $msg);
            if (!$success) {
                error_log('Email did no go out');
            }else{
                error_log('Successfully sent email');
            }
            header('location: profile.php');
        }
    }
}
//Edit Profile
if(isset($_POST['editprofile'])){
    $uname = $_SESSION['uname'];
    $fname = mysqli_real_escape_string($db, $_POST['fname']);
    $lname = mysqli_real_escape_string($db,$_POST['lname']);
    $email = mysqli_real_escape_string($db,$_POST['email']);
    $password = mysqli_real_escape_string($db,$_POST['password']);
    $confirmPassword = mysqli_real_escape_string($db,$_POST['confirm-password']);
    if(empty($fname)||empty($lname)||empty($email)){
        array_push($errors,'Name and Email fields are required');
    }else{
        if(!empty($password)||!empty($confirmPassword)) {
            if($password!==$confirmPassword) {
                array_push($errors,'Passwords did not match');
            }else{
                $newpassword = md5($password);
                //echo "updating $uname account first name to $fname, last name to $lname and email to $email";
                $sql = "update users set password='$newpassword' where uname = '$uname'";
                $update = mysqli_query($db,$sql);
                $to = $email;
                $subject = "Account Updated";
                $msg = "Hi $fname, The password for your account has been updated";
                $msg = wordwrap($msg,70);
                sendEmail($to, $subject, $msg);
            }
        }
        $_SESSION['nickname'] = $fname;
        $_SESSION['lname'] = $lname;
        $sql = "update users set fname='$fname', lname='$lname', email = '$email' where uname = '$uname'";
        $update = mysqli_query($db,$sql);
        header('location: profile.php?ref=changessaved');
    }


}
//log user in sign-in page
if (isset($_POST['signin'])) {
    error_log('Logging in');
    $uname = mysqli_real_escape_string($db, $_POST['uname']);
    $password = mysqli_real_escape_string($db,$_POST['password']);
    error_log('Logging in User ' || $uname || " with password " || $password );
    //check fields are filled properly
    if (empty($uname)) {
        array_push($errors, "Username is required");
    }elseif (empty($password)){
        array_push($errors,"Password is required");
    }
    if (count($errors) == 0) {
        $password = md5($password);
        error_log('Checking for user');
        $query = "SELECT * FROM $userTable WHERE uname='$uname' AND password='$password'";
        $result = mysqli_query($db,$query);
        if (mysqli_num_rows($result) == 1){
            //log user
            $user = mysqli_fetch_assoc($result);
            $_SESSION['uname'] = $uname;
            $_SESSION['nickname'] = $user['fname'];
            $_SESSION['lname'] = $user['lname'];
            $_SESSION['success'] = "You are logged in successfully";
            header('location: profile.php');
        }else{
            array_push($errors,"Wrong User ID/Password combination");
        }
    }

}
//Generating token for Reset password
if (isset($_POST['reset'])) {
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $uname = mysqli_real_escape_string($db, $_POST['uname']);
    if(!empty($email)&&!empty($uname)){
        array_push($errors, "Enter username or email but not both");
    }elseif (empty($email) && empty($uname)) {
        array_push($errors, "Username or Email is required");
    }
    if(count($errors) == 0){
        // ensure that the user exists on our system
        $query = "SELECT uname, email FROM $userTable WHERE email='$email' or uname='$uname'";
        $result = mysqli_query($db, $query);
        if(mysqli_num_rows($result) <= 0) {
            array_push($errors, "Sorry, no user exists on our system with that username or email");
        }
        $user = mysqli_fetch_assoc($result);
    }
    if (count($errors) == 0) {
        // generate a unique random token of length 50
        $token = bin2hex(random_bytes(50));
        $uname = $user['uname'];
        $email = $user['email'];
        // store token in the password-reset database table against the user's email
        $sql = "INSERT INTO $passwordResetTable (uname, token) VALUES ('$uname', '$token')";
        $results = mysqli_query($db, $sql);

        // Send email to user with the token in a link they can click on
        $to = $email;
        $subject = "Reset your password";
        $msg = "Hi there, click on this <a href=\"http://localhost/newpassword.php?token=" . $token . "\">link</a> to reset your password on our site";
        $msg = wordwrap($msg,70);
        sendEmail($to, $subject, $msg);
        array_push($errors, "An email was sent to the registered address. Click the link the email to reset your password");
    }
}
//Reset Password with a token
if(isset($_REQUEST['token'])){
    $token = $_REQUEST['token'];
    $sql = "SELECT * FROM $passwordResetTable WHERE token='$token' LIMIT 1";
    $results = mysqli_query($db, $sql);
    if(mysqli_num_rows($results) <= 0){
        array_push($errors, "Token is invalid");
    }else{

        $resetRecord = mysqli_fetch_assoc($results);
        if($resetRecord['used']==1){
            array_push($errors, "Your token has already been used. Please try to reset your password again by clicking <a href='resetpassword.php'>here</a>");
        }
         if(time() - strtotime($resetRecord['created_date']) >= 3600){
            array_push($errors, "Your token is expired. Please try to reset your password again by clicking <a href='resetpassword.php'>here</a>");
        }else{
             $_SESSION['token'] = $token;
         }
    }

}
// Update password through Reset Password Link
if (isset($_POST['updatepass'])) {
    $new_pass = mysqli_real_escape_string($db, $_POST['password']);
    $new_pass_c = mysqli_real_escape_string($db, $_POST['confirm-password']);

    // Grab to token that came from the email link
    $token = $_SESSION['token'];
    if (empty($new_pass) || empty($new_pass_c)) array_push($errors, "Password is required");
    if ($new_pass !== $new_pass_c) array_push($errors, "Passwords do not match");
    if (count($errors) == 0) {
        // select email address of user from the password_reset table
        $sql = "SELECT p.uname,email, fname FROM $passwordResetTable p,$userTable u WHERE token='$token' and p.uname = u.uname  LIMIT 1";
        $results = mysqli_query($db, $sql);
        $resetRecord = mysqli_fetch_assoc($results);
        $uname = $resetRecord['uname'];
        $email = $resetRecord['email'];
        $fname = $resetRecord['fname'];
        if ($uname) {
            $new_pass = md5($new_pass);
            $sql = "UPDATE $userTable SET password='$new_pass' WHERE uname='$uname'";
            $results = mysqli_query($db, $sql);
            $sql = "UPDATE $passwordResetTable SET used=1 WHERE token='$token'";
            $results = mysqli_query($db, $sql);
            $to = $email;
            $subject = "Account Updated";
            $msg = "Hi $fname, The password for your account has been updated";
            $msg = wordwrap($msg,70);
            sendEmail($to, $subject, $msg);
            header('location: signin.php');
        }
    }
}

