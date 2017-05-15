<?php
	include("header.php");

	$pubs = mysql_query("SELECT * FROM amizades WHERE de='$login_cookie' or para='$login_cookie' ORDER BY id desc");
?>
<html>
<header>
	<style type="text/css">
	h2{text-align: center; padding-top: 30px; color: #CD5C5C;}
	div.pub{width: 400px; min-height: 70px; max-height: 1000px; display: block; margin: auto; border: none; border-radius: 5px; background-color: #FFF; box-shadow: 0 0 6px #A1A1A1; margin-top: 30px;}
	div.pub a{color: inherit; text-decoration: none;}
	div.pub a:hover{color: #CD5C5C; text-decoration: none;}
	div.pub p{margin-left: 10px; color: #666; padding-top: 10px;}
	div.pub span{display: block; margin: auto; width: 380px; margin-top: 10px; text-align: center; font-size: 24px;}
	</style>
</header>
<body>
	</br>
    </br>
    </br>
	<h2>Amigos</h2>
	<?php
		while (@$pub=mysql_fetch_assoc($pubs)) {
			if ($pub['de']==$login_cookie) {
				$para = $pub['para'];
				$info = mysql_query("SELECT * FROM users WHERE email = '$para'");
				$amigoinfo = mysql_fetch_assoc($info);
				echo '<div class="pub">
					<p>Amigos desde '.$pub["data"].'</p>
					<span><a href="profile.php?id='.$amigoinfo['id'].'">'.$amigoinfo['nome'].'</a></span><br />
				</div>';
			}else{
				$de = $pub['de'];
				$info = mysql_query("SELECT * FROM users WHERE email = '$de'");
				$amigoinfo = mysql_fetch_assoc($info);
				echo '<div class="pub">
					<p>Amigos desde '.$pub["data"].'</p>
					<span><a href="profile.php?id='.$amigoinfo['id'].'">'.$amigoinfo['nome'].'</a></span><br />
				</div>';
			}
		}
	?>
	<br />
	<div id="footer">
	  <p>&copy; ArtMix, 2017 - Todos os direitos reservados</p></div><br />
</body>
</html>