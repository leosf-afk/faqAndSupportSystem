<h1>este es un formulario</h1>


<?php 
//connect db
include "config/config.php";

?> 


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="stylesform.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario Problemas</title>
</head>
<body>
<form method="post">
    <h1>Rellene los campos solicitados</h1>
    <input type="text" name="name" placeholder="nombre completo">
    <input type="text" name="dni" placeholder="documento">
    <input type="text" name="email" placeholder="email" >
    <input type="submit" name="enviar">





</form>


    
</body>
</html>