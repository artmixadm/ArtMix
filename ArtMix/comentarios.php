<?php
	include("header.php");

	if (isset($_GET['id'])) {
		$id = $_GET['id'];
	}else{
		header("Location: ./principal.php");
	}

	$pubs = mysql_query("SELECT * FROM comentarios WHERE post='$id'");

	if (isset($_POST['publish'])) {
		$texto = $_POST["texto"];
		$hoje = date("Y-m-d");

		$post = mysql_query("SELECT * FROM pubs WHERE id='$id'");
		$postinfo = mysql_fetch_assoc($post);
		$userinfo = $postinfo['user'];

		if ($texto == "") {
			echo "<script language='javascript' type='text/javascript'>alert('A publica&ccedil;&atilde;o n&atilde;o pode estar em branco...');</script>";
		}else{
			$query = "INSERT INTO comentarios (user,texto,post,data) VALUES ('$login_cookie','$texto','$id','$hoje')";
			$data = mysql_query($query) or die();
			if ($data) {
				$not = mysql_query("INSERT INTO notificacoes (`userde`,`userpara`,`tipo`,`post`,`data`) VALUES ('$login_cookie','$userinfo','2','$id','$hoje')");
				header("Location: comentarios.php?id=".$id);
			}else{
				echo "Alguma coisa não correu lá muito bem... Tenta outra vez mais tarde";
			}
		}
	}
?>
<html>
<title>ArtMix</title>
<header>
	<style type="text/css">
	div#publish{width: 400px; height: 170px; display: block; margin: auto; border: none; border-radius: 5px; background: #FFF; box-shadow: 0 0 6px #A1A1A1; margin-top: 30px;}
	div#publish textarea{width: 365px; height: 100px; display: block; margin: auto; border-radius: 5px; padding-left: 5px; padding-top: 5px; border-width: 1px; border-color: #A1A1A1;}
	div#publish input[type="submit"]{width: 90px; height: 30px; border-radius: 3px; float: right; margin-right: 15px; border: none; margin-top: 10px; background: #4169E1; color: #FFF; cursor: pointer;}
	div#publish input[type="submit"]:hover{background: #001F3F;}

	div.pub{width: 400px; min-height: 70px; max-height: 1000px; display: block; margin: auto; border: none; border-radius: 5px; background-color: #FFF; box-shadow: 0 0 6px #A1A1A1; margin-top: 30px;}
	div.pub a{color: #666; text-decoration: none;}
	div.pub a:hover{color: #111; text-decoration: none;}
	div.pub p{margin-left: 10px; content: #666; padding-top: 10px;}
	div.pub span{display: block; margin: auto; width: 380px; margin-top: 10px;}
	</style>
</header>
<body>
	</br>
    </br>
    </br>
	<div id="publish">
		<form method="POST" enctype="multipart/form-data">
			<br />
			<textarea placeholder="Comente..." name="texto"></textarea>
			<input type="submit" value="Comentar" name="publish" />
		</form>
	</div>
	<?php
		while ($pub=mysql_fetch_assoc($pubs)) {
			$email = $pub['user'];
			$saberr = mysql_query("SELECT * FROM users WHERE email='$email'");
			$saber = mysql_fetch_assoc($saberr);
			$nome = $saber['nome']." ".$saber['apelido'];

			echo '<div class="pub">
				<p><a href="profile.php?id='.$saber['id'].'">'.$nome.'</a> - '.$pub["data"].'</p>
				<span>'.$pub['texto'].'</span><br />
			</div>';
		}
	?>
	<br />
	<div id="footer"><p>&copy; ArtMix</p></div><br />
</body>
</html>