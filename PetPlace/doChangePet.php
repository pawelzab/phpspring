<?php
include 'database.php';

$id           = $_POST['id'];
$species      = $_POST['species'];
$breed        = $_POST['breed'];
$name         = $_POST['name'];
$age          = $_POST['age'];
$gender       = $_POST['gender'];
$availability = $_POST['availability'];


updatePet($id, $species, $breed, $name, $age, $gender, $availability);
header("Location: index.php");
exit();
?>















