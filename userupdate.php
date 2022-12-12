<!DOCTYPE html>
<html>
<head>
  <title>Registro</title>
  <link rel="stylesheet" type="text/css" href="styleslogin.css">
</head>
<body>

	<ul>
		<li><a onclick="window.location.href='login.php'">Login</a></li>
	    <li><a onclick="window.location.href='register.php'">Registro</a></li>
	    
	</ul>

  <form action="registroDestino.php" method="POST">
    <table id="tablaForm">

             <h3>Cambio de contraseña</h3>

    	<tr>
    		<td>Usuario:</td> <td><input type="text" name="txtUsuario"></td>
    	</tr>

    	<tr>
    		<td>Nueva contraseña:</td> <td><input type="text" name="txtClave"></td>
		</tr>

        <tr>
    		<td>Codigo de Seguridad:</td> <td><input type="text" name="txtCodigo"></td>
		</tr>

		<tr>   
   		<td></td><td><input class="button" style="width: 100%" type="submit" name="btnEnviar" id="btnEnviar" value="Registrar"/></td>
		</tr>
	</table>
  </form>

</body>
</html>