<?php
    require 'securityWall.php';
    session_start();
    error_reporting( E_ERROR | E_WARNING | E_PARSE);
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Add A Pet</title>
    </head>
    <body>
        <div>
            <h1>Add A Pet</h1><hr />
        </div>
        <?php if(isset($_SESSION['errMsg'])){ ?>
            <div class="error-message"><?=$_SESSION['errMsg']?></div>
        <?php } ?>

        <div>
            <form name="addPetForm" action="doAddPet.php" method="post">
                <table width="80%">
                    <tr>
                        <td><label for="species">Species</label></td>
                        <td><input type="text"
                                   id="species"
                                   name="species"
                                   value="<?=$_SESSION['species']?>" /></td>
                    </tr>
                    <tr>
                        <td><label for="breed">Breed</label></td>
                        <td><input type="text"
                                   id="breed"
                                   name="breed"
                                   value="<?=$_SESSION['breed']?>"/></td>
                    </tr>
                    <tr>
                        <td><label for="name">Name</label></td>
                        <td><input type="text"
                                   id="name"
                                   name="name"
                                   value="<?=$_SESSION['name']?>"/></td>
                    </tr>
                    <tr>
                        <td><label for="age">Age</label></td>
                        <td><input type="text"
                                   id="age"
                                   name="age"
                                   value="<?=$_SESSION['age']?>"/></td>
                    </tr>
                    <tr>
                        <td><label for="gender">Gender</label></td>
                        <td>
                            <select id="gender" name="gender">
                                <option value="M" <?=($_SESSION['gender'] == "M") ? "SELECTED" : "" ?> >Male</option>
                                <option value="F" <?=($_SESSION['gender'] == "F") ? "SELECTED" : "" ?> >Female</option>
                                <option value="U" <?=($_SESSION['gender'] == "U") ? "SELECTED" : "" ?> >Unknown</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="availability">Availability</label></td>
                        <td>
                            <select id="availability" name="availability">
                                <option value="AVAILABLE" <?=($_SESSION['availability'] == "AVAILABLE") ? "SELECTED" : "" ?> >AVAILABLE</option>
                                <option value="UNAVAILABLE" <?=($_SESSION['availability'] == "UNAVAILABLE") ? "SELECTED" : "" ?> >UNAVAILABLE</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" align="right"><input type="submit" value="SAVE" /></td>
                    </tr>

                    <?php
                        unset($_SESSION['errMsg']);
                        unset($_SESSION['species'] );
                        unset($_SESSION['breed']);
                        unset($_SESSION['name']);
                        unset($_SESSION['age']);
                        unset($_SESSION['gender']);
                        unset($_SESSION['availability']);
                    ?>

                </table>
            </form>
        </div>
    </body>
</html>














