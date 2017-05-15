<?php
	include("database.php");

	@$login_cookie = $_COOKIE['login'];

	$infoo = mysql_query("SELECT * FROM users WHERE email='$login_cookie'");
	$info = mysql_fetch_assoc($infoo);

	@$id = $_GET['from'];

	$tudo = mysql_query("SELECT * FROM users WHERE id='$id'");
	$saber = mysql_fetch_assoc($tudo);

	$email = $saber['email'];

	$sql = mysql_query("SELECT * FROM mensagens WHERE para='$login_cookie' AND de='$email' OR de='$login_cookie' AND para='$email'");

	@$mysql = "UPDATE mensagens SET status=1 WHERE para='$login_cookie' AND de='$email'";
	@$update = mysql_query($mysql);
?>
<html>
<head>
    <meta http-equiv="refresh" content="5;">
	<style type="text/css">
		html{
			font-family: Ubuntu, sans-serif;
			-webkit-animation: fadein 0s;
			-moz-animation: fadein 0s;
			-ms-animation: fadein 0s;
			-o-animation: fadein 0s;
			animation: fadein 0s;
		}

		.bubble{
			position: relative;
			margin-left: 300px;
			width: 300px;
			min-height: 120px;
			padding: 0px;
			background: #CD5C5C;
			border-radius: 25px;
		}
		.bubble span{display: block; margin-left: auto; font-size: 18px; text-align: center; color: #FFF;}
		.bubble img{display: block; margin: auto; max-width: 95%;}
		.bubble p{display: block; margin: auto; font-size: 16px; text-align: center; color: #FFF;}

		.bubble2{
			position: relative;
			width: 300px;
			min-height: 120px;
			padding: 0px;
			background: #CCC;
			border-radius: 25px;
		}
		.bubble2 span{display: block; margin-left: auto; font-size: 18px; text-align: center; color: #333;}
		.bubble2 img{display: block; margin: auto; max-width: 95%;}
		.bubble2 p{display: block; margin: auto; font-size: 16px; text-align: center; color: #333;}
	</style>
</head>
<body>
	<?php
		while (@$msg=mysql_fetch_assoc($sql)) {
			if ($msg['de']==$login_cookie) {
				if ($msg["imagem"]=="") {
					echo '<div class="bubble">
						<br />
						<span name="msg1">'.$msg["texto"].'</span>
						<br /><br />
						<p>'.$msg["data"].'</p>
						<br />
					</div><br />';
				}else{
					echo '<div class="bubble">
						<br />
						<span name="msg1">'.$msg["texto"].'</span>
						<br />
						<img src="upload/'.$msg["imagem"].'" />
						<br />
						<p>'.$msg["data"].'</p>
						<br />
					</div><br />';
				}
			}else{
				if ($msg["imagem"]=="") {
					echo '<div class="bubble2">
						<br />
						<span name="msg1">'.$msg["texto"].'</span>
						<br /><br />
						<p>'.$msg["data"].'</p>
						<br />
					</div><br />';
				}else{
					echo '<div class="bubble2">
						<br />
						<span name="msg1">'.$msg["texto"].'</span>
						<br />
						<img src="upload/'.$msg["imagem"].'" />
						<br />
						<p>'.$msg["data"].'</p>
						<br />
					</div><br />';
				}
			}
		}
	?>
	<a href="#" id="bottom"></a>
</body>
</html>