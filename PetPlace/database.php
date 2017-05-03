<?php

    function getDB(){
        $mysql = new mysqli("localhost",
            "root", "root", "petplace", 3306);

        if($mysql->connect_errno){
            echo("Failed to connect to MySQL: ".$mysql->error);
        }

        return $mysql;
    }

    function updatePet($id, $species, $breed, $name, $age, $gender, $availability){
        $mysql = getDB();
        $pstmt = $mysql->prepare("update pets set species=?, breed=?, name=?, age=?, gender=?,available=? where id=?");
        $pstmt->bind_param("sssissi", $species, $breed, $name, $age, $gender, $availability, $id);
        $pstmt->execute();
    }

    function createUser($email, $firstName, $lastName, $password, $admin){
        $mysql = getDB();
        $pstmt = $mysql->prepare("insert into users (email, firstName, lastName, password, admin) values (?, ?, ?, ?, ?)");
        $pstmt->bind_param("sssss", $email, $firstName, $lastName, $password, $admin);
        $pstmt->execute();
    }

    function addPet($species, $breed, $name, $age, $gender, $availability){
        $mysql = getDB();
        $stmt = "insert into pets (species, breed, name, age, gender, available) values ('$species', '$breed', '$name', $age, '$gender', '$availability')";
        error_log($stmt);
        $mysql->query($stmt);
    }

    function deletePet($petId){
        $mysql = getDB();
        $stmt = "DELETE FROM PETS WHERE ID=".$petId;
        $mysql->query($stmt);
    }

    function checkPassword($email, $passwordToCheck){
        $mysql = getDB();
        $result = $mysql->query("select password from users where email = '$email'");
        if($result->num_rows < 1){
            return false;
        }

        $result->data_seek(1);
        $aRow = $result->fetch_assoc();

        return $aRow['password'] == $passwordToCheck;
    }















?>