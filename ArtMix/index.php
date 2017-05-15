<!DOCTYPE html>
<html>
<head>
	<link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
	<style type="text/css">
	*{font-family: 'Montserrat', cursive; margin: 0;}
	body{background: #DFDFDF;}
	div#topo{width: 100%; top: 0; background: #CD5C5C; height: 80px; position:fixed;}
	div#topo img[name="logo"]{
	float: left;
	margin-left: 220px;
	margin-top: 5px;
}
	div#topo img[name="menu"]{float:right; margin-right: 25px; margin-top: -22px;}
	div#topo input[type="text"]{display: block; margin: auto; width: 300px; border: none; border-radius: 3px; background: #F6F6F6; height: 25px; padding-left: 10px;}
	div#topo form{width: 300px; display: block; margin: auto; padding-top: 22px;}
	div#footer{bottom: 0; text-align: center; color: #666;}
	div#mid{width: 100%; top: 80px; background: #CCC; height: 100px; position:fixed;}
	div#mid img[name="img"]{float:left; width: 100%; height: 600px;}
	h1{margin-top: 50px; color: #FFF; font-size: 20px; float:right; margin-right:100px}
	</style>
</head>
<body>
	<div id="topo">
		<a href="principal.php"><img src="img/logoTrans.png" width="70" name="logo"></a>
        <a href="login.php"><h1>Login</h1></a>
        <a href="registrar.php"><h1>Registre-se</h1></a>
	  </form>
</div>
<div id="mid">
		<img src="img/img.jpg" name="img">
</div>
</body>
</html>