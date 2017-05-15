<?php
	include("database.php");

	if (isset($_POST['entrar'])) {
		$email = $_POST['email'];
		$pass = $_POST['pass'];
		$verifica = mysql_query("SELECT * FROM users WHERE email = '$email' AND password='$pass'");
		if (mysql_num_rows($verifica)<=0) {
			echo "<h3>Senha ou e-mail errados!</h3>";
		}else{
			setcookie("login",$email);
			header("location: ./principal.php");
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
	<style type="text/css">
	*{font-family: 'Montserrat', cursive;}
	img{display: block; margin: auto; margin-top: 20px; width: 200px;}
	form{text-align: center; margin-top: 20px;}
	input[type="email"]{border: 1px solid #CCC; width: 250px; height: 25px; padding-left: 10px; border-radius: 3px;}
	input[type="password"]{border: 1px solid #CCC; width: 250px; height: 25px; padding-left: 10px; margin-top: 10px; border-radius: 3px;}
	input[type="submit"]{border: none; width: 80px; height: 30px; margin-top: 20px; border-radius: 3px; background-color: #CD5C5C;}
	input[type="submit"]:hover{background-color: #6F2224; color: #FFF; cursor: pointer;}
	h2{text-align: center; margin-top: 20px;}
	h3{text-align: center; color: #000; margin-top: 15px;}
	a{text-decoration: none; color: #333;}
	</style>
<title>ArtMix</title>
</head>
<body>
	<img src="img/logo.png"><br />
	<h2>Entre na sua conta</h2>
<form method="POST">
		<input type="email" placeholder="Email" name="email"><br />
		<input type="password" placeholder="Senha" name="pass"><br />
		<input type="submit" value="Entrar" name="entrar">
	</form>
	<h3>Ainda n&atilde;o possui cadastro? <a href="registrar.php">Cadastre-se!</a></h3>
</body>
</html>