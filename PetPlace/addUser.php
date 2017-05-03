<?php
    session_start();
    error_reporting( E_ERROR | E_WARNING | E_PARSE);
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Add A User</title>
    </head>
    <body>
        <div>
            <h1>Add A User</h1><hr />
        </div>
        <?php if(isset($_SESSION['errMsg'])){ ?>
            <div class="error-message"><?=$_SESSION['errMsg']?></div>
        <?php } ?>

        <div>
            <form name="addUserForm" action="doAddUser.php" method="post">
                <table width="80%">
                    <tr>
                        <td><label for="email">Email</label></td>
                        <td><input type="text"
                                   id="email"
                                   name="email"
                                   value="<?=$_SESSION['email']?>" /></td>
                    </tr>
                    <tr>
                        <td><label for="firstName">First Name</label></td>
                        <td><input type="text"
                                   id="firstName"
                                   name="firstName"
                                   value="<?=$_SESSION['firstName']?>"/></td>
                    </tr>
                    <tr>
                        <td><label for="lastName">Last Name</label></td>
                        <td><input type="text"
                                   id="lastName"
                                   name="lastName"
                                   value="<?=$_SESSION['lastName']?>"/></td>
                    </tr>
                    <tr>
                        <td><label for="password">Password</label></td>
                        <td><input type="password"
                                   id="password"
                                   name="password" /></td>
                    </tr>
                    <tr>
                        <td><label for="password2">Retype your password</label></td>
                        <td><input type="password"
                                   id="password2"
                                   name="password2" /></td>
                    </tr>

                    <tr>
                        <td colspan="2" align="right"><input type="submit" value="SAVE" /></td>
                    </tr>

                    <?php
                        unset($_SESSION['email']);
                        unset($_SESSION['firstName'] );
                        unset($_SESSION['lastName']);
                    ?>

                </table>
            </form>
        </div>
    </body>
</html>














