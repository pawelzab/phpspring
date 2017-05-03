<?php
    include_once 'database.php';

    if(isset($_GET['petId'])){
        deletePet($_GET['petId']);
    }

    header("Location: index.php");
?>