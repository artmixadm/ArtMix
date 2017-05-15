<?php
	include("header.php");

	@$id = $_GET["from"];

	$tudo = mysql_query("SELECT * FROM users WHERE id='$id'");
	$saber = mysql_fetch_assoc($tudo);

	$email = $saber["email"];

	$sql = mysql_query("SELECT * FROM mensagens WHERE para='$login_cookie' AND de='$email' OR de='$login_cookie' AND para='$email' ORDER BY id");

	if (isset($_POST["send"])) {
		$msg = $_POST['text'];
		$data = date("Y/m/d");

		if ($msg=="") {
			echo "<h3>A mensagem est&aacute; em branco!</h3>";
		}else{
			$query = "INSERT INTO mensagens (`de`,`para`,`texto`,`status`,`data`) VALUES ('$login_cookie','$email','".mysql_real_escape_string($msg)."',0,'$data')";
			$data = mysql_query($query);
			if ($data) {
				header("refresh:0;");
			}else{
				echo "<h3>Algo deu errado ao enviar a sua mensagem... Desculpa</h3>".mysql_error();
			}
		}
	}
?>
<html>
	<head>
		<style type="text/css">
		h2{text-align: center; font-size: 32px; color: #CD5C5C;}
		h3{text-align: center; font-size: 25px; color: #666;}
		a{color: #CD5C5C; text-decoration: none;}
		div#box{display: block; margin: auto; width: 650px; height: 400px;}
		div#send{display: block; margin: auto; width: 700px; text-align: center; font-size: 20px;}
		div#send input[name="image"]{width: 100px; height: 35px; border: none; border-radius: 3px; font-size: 16px; background: #CD5C5C; color: #FFF; cursor: pointer;}
		div#send input[name="text"]{width: 300px; height: 35px; border: none; border-radius: 3px; font-size: 16px; padding-left: 10px;}
		div#send input[name="send"]{width: 100px; height: 35px; border: none; border-radius: 3px; font-size: 16px; background: #CD5C5C; color: #FFF; cursor: pointer;}
		</style>
    <title>ArtMix</title>
	</head>
	<body>
    </br>
    </br>
    </br>
    </br>
    </br>
		<h2><a href="profile.php?id=<?php echo $id; ?>"><?php echo $saber["nome"]; ?></a></h2><br /><br /><br />
		<form method="POST">
			<div id="box">
				<object type="text/html" data="bubble.php?from=<?php echo $id; ?>#bottom" width="635px" height="390px" style="overflow: auto;">
				  <embed src="bubble.php?from=<?php echo $id; ?>#bottom" width="635px" height="390px"></embed>
				</object>
			</div>
			<br />
			<div id="send">
				<a href="image.php?id=<?php echo $id; ?>"><input value="Imagem" type="button" name="image"></a>&nbsp;&nbsp;&nbsp;<input type="text" name="text" placeholder="Escreve aqui uma mensagem..." autocomplete="off">&nbsp;&nbsp;&nbsp;<input type="submit" name="send" value="Enviar">
			</div>
		</form>
	</body>
</html>