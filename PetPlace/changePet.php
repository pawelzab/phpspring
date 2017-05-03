<?php
require_once 'database.php';
$mysql = getDB();
$theId = $_GET['id'];
$result = $mysql->query("select id, species, breed, name, age, gender, available from pets where id = $theId");
$result->data_seek(1);
$aRow = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Change A Pet</title>
</head>
<body>
<div>
    <h1>Change A Pet</h1><hr />
</div>
<div>
    <form name="changePetForm" action="doChangePet.php" method="post">
        <input type="hidden" name="id" value="<?=$aRow['id']?>" />
        <table width="80%">
            <tr>
                <td><label for="species">Species</label></td>
                <td><input type="text"
                           id="species"
                           name="species"
                           value="<?=$aRow['species']?>" /></td>
            </tr>
            <tr>
                <td><label for="breed">Breed</label></td>
                <td><input type="text"
                           id="breed"
                           name="breed"
                           value="<?=$aRow['breed']?>"/></td>
            </tr>
            <tr>
                <td><label for="name">Name</label></td>
                <td><input type="text"
                           id="name"
                           name="name"
                           value="<?=$aRow['name']?>"/></td>
            </tr>
            <tr>
                <td><label for="age">Age</label></td>
                <td><input type="text"
                           id="age"
                           name="age"
                           value="<?=$aRow['age']?>"/></td>
            </tr>
            <tr>
                <td><label for="gender">Gender</label></td>
                <td>
                    <select id="gender" name="gender">
                        <option value="M" <?=($aRow['gender'] == "M") ? "SELECTED" : "" ?> >Male</option>
                        <option value="F" <?=($aRow['gender'] == "F") ? "SELECTED" : "" ?> >Female</option>
                        <option value="U" <?=($aRow['gender'] == "U") ? "SELECTED" : "" ?> >Unknown</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td><label for="availability">Availability</label></td>
                <td>
                    <select id="availability" name="availability">
                        <option value="AVAILABLE" <?=($aRow['available'] == "AVAILABLE") ? "SELECTED" : "" ?> >AVAILABLE</option>
                        <option value="UNAVAILABLE" <?=($aRow['available'] == "UNAVAILABLE") ? "SELECTED" : "" ?> >UNAVAILABLE</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td colspan="2" align="right"><input type="submit" value="SAVE" /></td>
            </tr>
        </table>
    </form>
</div>
</body>
</html>















