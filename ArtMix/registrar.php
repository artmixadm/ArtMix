<?php
	include("database.php");

	if (isset($_POST['criar'])) {
		$nome = $_POST['nome'];
		$apelido = $_POST['apelido'];
		$email = $_POST['email'];
		$pass = $_POST['pass'];
		$data = date("Y/m/d");

		$email_check = mysql_query("SELECT email FROM users WHERE email='$email'");
		$do_email_check = mysql_num_rows($email_check);
		if ($do_email_check >= 1) {
			echo '<h3>Este email já está registado, faça o login <a href="login.php">aqui</a></h3>';
		}elseif ($nome == '' OR strlen($nome)<3) {
			echo '<h3>Escreva seu nome corretamente!</h3>';
		}elseif ($email == '' OR strlen($email)<10) {
			echo '<h3>Escreve seu email corretamente!</h3>';
		}elseif ($pass == '' OR strlen($pass)<8) {
			echo '<h3>Escreve sua senha corretamente, deve possuir 8 ou mais caracteres!</h3>';
		}else{
			$query = "INSERT INTO users (`nome`,`apelido`,`email`,`password`,`data`) VALUES ('$nome','$apelido','$email','$pass','$data')";
			$data = mysql_query($query) or die(mysql_error());
			if ($data) {
				setcookie("login",$email);
				header("Location: ./principal.php");
			}else{
				echo "<h3>Desculpa, houve um erro ao registar...</h3>";
			}
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
	form{text-align: center; margin-top: 10px;}
	input[type="text"]{border: 1px solid #CCC; width: 250px; height: 25px; padding-left: 10px; border-radius: 3px; margin-top: 10px;}
	input[type="email"]{border: 1px solid #CCC; width: 250px; height: 25px; padding-left: 10px; border-radius: 3px; margin-top: 10px;}
	input[type="password"]{border: 1px solid #CCC; width: 250px; height: 25px; padding-left: 10px; margin-top: 10px; border-radius: 3px;}
	input[type="submit"]{border: none; width: 80px; height: 30px; margin-top: 20px; border-radius: 3px; background-color: #CD5C5C}
	input[type="submit"]:hover{background-color: #6F2224; color: #FFF; cursor: pointer;}
	h2{text-align: center; margin-top: 20px;}
	h3{text-align: center; color: #000; margin-top: 15px;}
	a{text-decoration: none; color: #333;}
	</style>
<title>ArtMix</title>
</head>
<body>
	<img src="img/logo.png"><br />
	<h2>Crie sua conta</h2>
	<form method="POST">
		<input type="text" placeholder="Nome" name="nome"><br />
		<input type="text" placeholder="Apelido" name="apelido"><br />
		<input type="email" placeholder="Email" name="email"><br />
		<input type="password" placeholder="Senha" name="pass"><br />
		<input type="submit" value="Criar" name="criar">
	</form>
	<h3>J&aacute; possui cadastro? <a href="login.php">Logue aqui!</a></h3>
</body>
</html>