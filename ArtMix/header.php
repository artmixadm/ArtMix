<?php
	include("database.php");
	
	$login_cookie = $_COOKIE['login'];
	if (!isset($login_cookie)) {
		header("Location: login.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
	<style type="text/css">
	*{font-family: 'Montserrat', cursive; margin: 0;}
	body{background: #DFDFDF;}/*#F6F6F6*/
	div#topo{width: 100%; top: 0; background: #CD5C5C/*#CD5C5C*/; height: 80px; position:fixed;}
	div#topo img[name="logo"]{
	float: left;
	margin-left: 220px;
	margin-top: 5px;
}
	div#topo img[name="menu"]{float:right; margin-right: 25px; margin-top: -22px;}
	div#topo input[type="text"]{display: block; margin: auto; width: 300px; border: none; border-radius: 3px; background: #F6F6F6; height: 25px; padding-left: 10px;}
	div#topo form{width: 300px; display: block; margin: auto; padding-top: 22px;}
	div#footer{bottom: 0; text-align: center; color: #666;}
	a{text-decoration: none; color: #666;}
	</style>
</head>
<body>
	<div id="topo">
		<a href="index.php"><img src="img/logo.png" width="70" name="logo"></a>
		<form method="GET" action="pesquisar.php">
		<input type="text" placeholder="Pesquisa..." name="query" autocomplete="off"><input type="submit" hidden>
	  </form>
      	<a href="login.php"><img src="img/logout.png" width="30" name="menu"></a>
		<a href="inbox.php"><img src="img/chat.png" width="30" name="menu"></a>
		<a href="notificacoes.php"><img src="img/notificacoes.png" width="35" name="menu"></a>
		<a href="userprofile.php"><img src="img/perfil.png" width="30" name="menu"></a>
</div>
</body>
</html>