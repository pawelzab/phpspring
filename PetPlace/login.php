<?php
	error_reporting(E_ERROR | E_WARNING | E_PARSE);
	session_start(); // starts the session so we can put things in the session superglobal (i.e. an error message)
?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8">
		<title>Login</title>
	</head>
	<body>
		<div>
			<h1>Login</h1><hr />
		</div>
	<?php if(isset($_SESSION['errMsg'])){ ?> <!---- closes php so can write a block of html ---->
		<div class="error-message"><?=$_SESSION['errMsg']?></div>
		
	<?php } ?>
				<form name="loginForm" action="doLogin.php" method="post">
					<table width="80%">
						<tr>
							<td><label for="email">Email</label></td>
							<td><input type="text"
								       id="email" 
								       name="email"
								       value="<?=$_SESSION['email']?>" /></td>
						</tr>
						<tr>
							<td><label for="password">Password</label></td>
							<td><input type="text" 
								       id="password" 
								       name="password"
								       </td>
						</tr>
						<tr>
							<td colspan="2" align="right">
								<input type="submit" value="Log In">
							</td>
						</tr>
						<?php // unset the variables because we just finished using them
							
							unset($_SESSION['email']);
							unset($_SESSION['password']);	
							unset($_SESSION['errMsg']);

							
						?>
					</table>
				</form>
