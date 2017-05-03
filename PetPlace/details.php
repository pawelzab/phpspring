<?php
    require_once 'database.php';
    $mysql = getDB();
    $theId = $_GET['id'];
    $result = $mysql->query("select id, species, breed, name, age, gender, available from pets where id = $theId");
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
                                <td><?=$aRow['name']?></td>
                                <td><?=$aRow['age']?></td>
                                <td><?=$aRow['gender']?></td>
                                <td><?=$aRow['available']?></td>
                            </tr>

                    <?php
                        }
                    ?>
                    </tbody>
                </table>
            </div>
            <a href="changePet.php?id=<?=$aRow['id']?>">Edit</a>
        </body>
    </html>















