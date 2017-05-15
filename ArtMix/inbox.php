<?php
	include("header.php");

	$sql = mysql_query("SELECT * FROM mensagens WHERE para='$login_cookie' GROUP BY de ORDER BY id");

	$ups = mysql_query("SELECT * FROM mensagens WHERE para='$login_cookie' AND  status=0");
	@$contagem = mysql_num_rows($ups);
?>
<html>
	<header>
		<style type="text/css">
			a{text-decoration: none;}
			div#box p{text-align: center; cursor: pointer; color: #333;}
			div#box p:hover{color: #CD5C5C;}
			div#box{min-width: 100px; max-width: 500px; display: block; margin: auto;}
			div#box:hover{box-shadow: inset 0 0 6px #AAA; border-radius: 5px;}
			hr{width: 400px; display: block; margin: auto; border: 1px solid #555;}
			h1{text-align: center; color: #CD5C5C;}
			h3{text-align: center; color: #AAA;}
		</style>
	</header>
	<body>
		</br>
        </br>
        </br>
        </br>
        </br>
		<h1>Conversas</h1>
		<form method="POST">
			<div>
				<?php
					while (@$msg=mysql_fetch_assoc($sql)) {
							$from = $msg["de"];
							$tudo = mysql_query("SELECT * FROM users WHERE email='$from'");
							$img = mysql_fetch_assoc($tudo);
							$conta = mysql_query("SELECT * FROM mensagens WHERE de='$from' AND para='$login_cookie' AND status=0");
							$contar = mysql_num_rows($conta);

							echo '<br /><a name="d" href="chat.php?from='.$img["id"].'"><div id="box">
									<br /><p>'.$img["nome"].' '.$img["apelido"].' - '.$contar.' mensagens novas</p><br />
									</div></a><br />
									<hr />';
						}
				?>
			</div>
		</form>
	<br /><br />
	<div id="footer">
	  <p>&copy; ArtMix</p></div><br />
	</body>
</html>