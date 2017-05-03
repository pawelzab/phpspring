<?php
    session_start();
    include 'database.php';

    $email      = $_POST['email'];
    $password        = $_POST['password'];
    $passwordToCheck        = $_POST['password2'];
    $hasError = false;
    $errMsg = "";
    $faillogin = false;
    $badlogin = "";
    if(empty($email)){
        $hasError = true;
        $errMsg = $errMsg."Please provide a email<br />";
    }
    if(empty($password)){
        $hasError = true;
        $errMsg = $errMsg."Please provide a password<br />";
    }
    if(empty($passwordToCheck)){
        $hasError = true;
        $errMsg = $errMsg."Please confirm password<br />";
    }


    if($hasError){
        // Save the error message in the session to send
        // to the next page
        $_SESSION['errMsg']        = $errMsg      ;
        $_SESSION['badlogin']        = $badlogin      ;


        // Send the values that were submitted when we
        // redirect the user
        $_SESSION['email']       = $email     ;
       
        // Redirect the user back to the form
    

        // Stop doing stuff
        exit();
    }

    checkPassword($email, $passwordToCheck);
    if(checkPassword($email, $passwordToCheck) === false){
        $faillogin = true;
        $badlogin = $badlogin."Wrong information<br />";
        header("Location: login.php");
    }else{
    header("Location: index.php");}
    exit();
?>
