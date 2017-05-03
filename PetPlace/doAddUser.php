<?php
    session_start();
    include 'database.php';

    $email      = $_POST['email'];
    $firstName  = $_POST['firstName'];
    $lastName   = $_POST['lastName'];
    $password   = $_POST['password'];
    $password2  = $_POST['password2'];


    $hasError = false;
    $errMsg = "";
    if(empty($email)){
        $hasError = true;
        $errMsg = $errMsg."Please provide an email<br />";
    }
    if(empty($firstName)){
        $hasError = true;
        $errMsg = $errMsg."Please provide a first name<br />";
    }
    if(empty($lastName)){
        $hasError = true;
        $errMsg = $errMsg."Please provide a last name<br />";
    }
    if(empty($password)){
        $hasError = true;
        $errMsg = $errMsg."Please provide a password<br />";
    }

    if($hasError){
        // Save the error message in the session to send
        // to the next page
        $_SESSION['errMsg']        = $errMsg      ;

        // Send the values that were submitted when we
        // redirect the user
        $_SESSION['email']       = $email     ;
        $_SESSION['firstName']   = $firstName       ;
        $_SESSION['lastName']    = $lastName        ;

        // Redirect the user back to the form
        header("Location: addUser.php");

        // Stop doing stuff
        exit();
    }

    createUser($email, $firstName, $lastName, $password, 'N');
    header("Location: index.php");
    exit();
?>















