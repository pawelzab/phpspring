<?php
session_start();

if(!isset($_SESSION['email'])){
    header("Location: login.php");
    exit();
}else {
    print "<div>Hi ".$_SESSION['email']."</div>";
}

?>
