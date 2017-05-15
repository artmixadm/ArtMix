<?php
	include("header.php");

	$infoo = mysql_query("SELECT * FROM users WHERE email='$login_cookie'");
	$info = mysql_fetch_assoc($infoo);

	if (isset($_POST['criar'])) {
		$nome = $_POST['nome'];
		$apelido = $_POST['apelido'];
		$pass = $_POST['pass'];

		if($nome==""){
			echo "<h2>Escreve o teu nome</h2>";
		}elseif($apelido==""){
			echo "<h2>Escreve o teu apelido</h2>";
		}elseif($pass==""){
			echo "<h2>Escreve uma palavra-passe</h2>";
		}else{
			$query = "UPDATE users SET `nome`='$nome', `apelido`='$apelido', `password`='$pass' WHERE email='$login_cookie'";
			$data = mysql_query($query);
			if ($data) {
				header("Location: myprofile.php");
			}else{
				echo "<h2>Algo não correu como esperávamos...</h2>";
			}
		}
	}

	if (isset($_POST['cancel'])) {
		header("Location: myprofile.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
	<style type="text/css">
	*{font-family: 'Montserrat', cursive;}
	img[name="p"]{display: block; margin: auto; margin-top: 20px; width: 200px;}
	form{text-align: center; margin-top: 10px;}
	input[type="text"]{border: 1px solid #CCC; width: 250px; height: 25px; padding-left: 10px; border-radius: 3px; margin-top: 10px;}
	input[type="email"]{border: 1px solid #CCC; width: 250px; height: 25px; padding-left: 10px; border-radius: 3px; margin-top: 10px;}
	input[type="password"]{border: 1px solid #CCC; width: 250px; height: 25px; padding-left: 10px; margin-top: 10px; border-radius: 3px;}
	input[type="submit"]{border: none; width: 120px; height: 30px; margin-top: 20px; border-radius: 3px;}
	input[type="submit"]:hover{background-color: #1E90FF; color: #FFF; cursor: pointer;}
	h2{text-align: center; margin-top: 20px;}
	h3{text-align: center; color: #1E90FF; margin-top: 15px;}
	a{text-decoration: none; color: #333;}
	</style>
</head>
<body>
	</br>
    </br>
    </br>
    </br>
	<img name="p" src="img/logo.png"><br />
	<h2>Altere suas informa&ccedil;&otilde;es</h2>
	<form method="POST">
		<input type="text" placeholder="Primeiro nome" value="<?php echo $info['nome']; ?>" name="nome"><br />
		<input type="text" placeholder="Apelido" value="<?php echo $info['apelido']; ?>" name="apelido"><br />
		<input type="password" placeholder="Palavra-passe" value="<?php echo $info['password']; ?>" name="pass"><br />
		<input type="submit" value="Atualizar Dados"criar">&nbsp;&nbsp;&nbsp;<input type="submit" value="Cancelar" name="cancel">
	</form>
</body>
</html>