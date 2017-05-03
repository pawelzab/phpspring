<?php
    require_once 'database.php';
    $mysql = getDB();
    $result = $mysql->query("select id, species, breed, name, age, gender, available from pets");
?>
<!DOCTYPE html>
    <html>
        <head>
            <title>PetPlace</title>
        </head>
        <body>
            <div id="header"><h1>PetPlace</h1></div>
            <div id="body">
                <p>Welcome to the Pet Place.</p>
                <table id="petTable" border="1">
                    <thead>
                        <tr>
                            <td>species</td>
                            <td>breed</td>
                            <td>name</td>
                            <td>age</td>
                            <td>gender</td>
                            <td>availability</td>
                            <td>&nbsp;</td>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        for($i = 0; $i < $result->num_rows; $i++){
                            $result->data_seek($i);
                            $aRow = $result->fetch_assoc();
                    ?>
                            <tr>
                                <td><?=$aRow['species']?></td>
                                <td><?=$aRow['breed']?></td>
                                <td><a href="./details.php?id=<?=$aRow['id']?>"><?=$aRow['name']?></a></td>
                                <td><?=$aRow['age']?></td>
                                <td><?=$aRow['gender']?></td>
                                <td><?=$aRow['available']?></td>
                                <td><a href="./doDeletePet.php?petId=<?=$aRow['id']?>"><img src="trash.jpg" style="height: 1em"/></a></td>
                            </tr>

                    <?php
                        }
                    ?>
                    </tbody>
                </table>
                <a href="addPet.php">Add a new pet</a>
            </div>
        </body>
    </html>















