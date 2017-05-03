<?php
    session_start();
    include 'database.php';

    $species      = $_POST['species'];
    $breed        = $_POST['breed'];
    $name         = $_POST['name'];
    $age          = $_POST['age'];
    $gender       = $_POST['gender'];
    $availability = $_POST['availability'];

    $hasError = false;
    $errMsg = "";
    if(empty($species)){
        $hasError = true;
        $errMsg = $errMsg."Please provide a species<br />";
    }
    if(empty($breed)){
        $hasError = true;
        $errMsg = $errMsg."Please provide a breed<br />";
    }
    if(empty($name)){
        $hasError = true;
        $errMsg = $errMsg."Please provide a name<br />";
    }
    if(empty($age)){
        $hasError = true;
        $errMsg = $errMsg."Please provide an age<br />";
    }

    if($hasError){
        // Save the error message in the session to send
        // to the next page
        $_SESSION['errMsg']        = $errMsg      ;

        // Send the values that were submitted when we
        // redirect the user
        $_SESSION['species']       = $species     ;
        $_SESSION['breed']         = $breed       ;
        $_SESSION['name']          = $name        ;
        $_SESSION['age']           = $age         ;
        $_SESSION['gender']        = $gender      ;
        $_SESSION['availability']  = $availability;

        // Redirect the user back to the form
        header("Location: addPet.php");

        // Stop doing stuff
        exit();
    }

    addPet($species, $breed, $name, $age, $gender, $availability);
    header("Location: index.php");
    exit();
?>















