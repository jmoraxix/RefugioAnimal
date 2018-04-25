<?php
/* 
 * Lenguaje de Consulta de Base de Datos
 * 
 * Marcela Cascante
 * Bernardo Gonzalez
 * Kimberly Mora
 * Jose Mora
 * 
 * Primer cuatrimestre, 2018
 */

error_reporting(E_ALL);
ini_set('display_errors', '1');
include_once '../Controladores/adoptante.php';

$adoptante = new adoptante();
if (isset($_REQUEST['submit'])){
    extract($_REQUEST);
    $login = $adoptante->login($usuario, $contrasena);
    if ($login) {;
        header("location: index.php");
    } else {
// Registration Failed
        echo '<div class="isa_error"><i class="fa fa-times-circle"></i>Login Failed</div>';
    }
}
?>

<!DOCTYPE html>
<html lang="en" >
<head>
    <meta http-equiv="Content-Type" content="text/html; charset= "ISO-8859-1">
    <title>Login Form</title>

    <link rel="stylesheet" href="../css/style.css">

</head>

<body>
<html lang="en-US">

<video id="video-background" playsinline autoplay muted loop>
    <source src="videos/videoprueba.mp4" type="video/mp4">
</video>
<head>
    <meta charset="utf-8">
    <title>Login</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400,700">



</head>
<div id="login">

    <form action="" method="post" name='form-login'>
        <span class="fontawesome-user"></span>
        <td><input type="text" name="usuario" placeholder="Usuario" required></td>

        <span class="fontawesome-lock"></span>
        <td><input type="password" name="contrasena" placeholder="Contrase&#241;a" required></td>

        <input type="submit" name="submit" value="Ingresar">

    </form>


</body>
</html>
