<!DOCTYPE html>
<html>
<head>
	<title>login</title>
	<link rel="stylesheet" type="text/css" href="styleslogin.css">
</head>
<body>
	<ul>
		<li><a onclick="window.location.href='login.php'">Login</a></li>
	    <li><a onclick="window.location.href='register.php'">Registro</a></li>
	    
	</ul>

	<form action="loginDestino.php" method="POST">
		<table id="tablaForm"><tr><td>
		Usuario:</td> <td><input type="text" name="txtUsuario"></td></tr>
        <tr><td>Contraseña:</td><td> <input type="text" name="txtClave"></td></tr>
		<tr><td></td><td><input class="button" style="width: 100%" type="submit" name="btnEnviar" id="btnEnviar" value="Acceder"/></td></tr></table>
	</form>

</body>
</html>