<?php
    session_start();
    error_reporting( E_ERROR | E_WARNING | E_PARSE);
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Sign In</title>
    </head>
    <body>
        <div>
            <h1>Sign In</h1><hr />
        </div>
        <?php if(isset($_SESSION['errMsg'])){ ?>
            <div class="error-message"><?=$_SESSION['errMsg']?></div>
        <?php } ?>
         <?php if(isset($_SESSION['$faillogin'])){ ?>
            <div class="failed-login"><?=$_SESSION['$faillogin']?></div>
        <?php } ?>


        <div>
            <form name="loginForm" action="doLogin.php" method="post">
                <table width="80%">
                    <tr>
                        <td><label for="email">email</label></td>
                        <td><input type="text"
                                   id="email"
                                   name="email"
                                   value="<?=$_SESSION['email']?>" /></td>
                    </tr>
                    <tr>
                        <td><label for="password">password</label></td>
                        <td><input type="password"
                                   id="password"
                                   name="password"/></td>
                    </tr>
                    <tr>
                        <td><label for="password2"> confirm your password</label></td>
                        <td><input type="password"
                                   id="password2"
                                   name="password2"/></td>
                    </tr>
                    <tr>
                        <td colspan="2" align="right"><input type="submit" value="Login" /></td>
                    </tr>

                    <?php
                        unset($_SESSION['email']);
                        
                    ?>

                </table>
            </form>
            <a href="index.php">go back</a>
        </div>
    </body>
</html>
