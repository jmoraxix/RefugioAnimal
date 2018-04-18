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

session_start();

include_once '../Controladores/personal.php';

$personal = new personal();

if (isset($_REQUEST['logout'])){
    extract($_REQUEST);
    $personal->user_logout();
}

//if($_SESSION['login'] != true)
//{
//    header("location: login.php");
//}
?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Inicio</title>
  
      <link rel="stylesheet" href="css/style.css">  
      <link rel="stylesheet" href="css/buttons.css"> 

</head>

<body>
<div class = "background-inicio">
  	<div class="header">
	     <div class="container">
	        <div class="row">
	           <div class="col-md-5">
	              <!-- Logo -->
	              <div class="logo">
	                 <h1><a href="index.php"><img src="images/logo.png" width="70" height="60"></a></h1>
	              </div>
	           </div>
	           <div class="col-md-2">
	              <div class="round">
	              	<form action="" method="post" name='form-login'>
    				  <input class ="button" type="submit" name="logout" value="Log out">
					</form>
	              </div>
	           </div>
	        </div>
	     </div>
	</div>
    <div class="page-content">
    	<div class="row">
		  <div class="col-md-2">
		  	<div class="sidebar content-box" style="display: block;">
                <ul class="nav">
                    <!-- Main menu -->
                    <li class="current"><a href="index.php"><i class="glyphicon glyphicon-home"></i> Inicio </a></li>
                    <li><a href="busquedaPersonal.php"><i class="glyphicon glyphicon-stats"></i> Personal </a></li>
                    <li><a href="registrar_personal.php"><i class="glyphicon glyphicon-calendar"></i> Registrar Personal </a></li>
                    <li><a href="busquedaAnimales.php"><i class="glyphicon glyphicon-list"></i> Animales </a></li>
                    <li><a href="registrarAnimal.php"><i class="glyphicon glyphicon-record"></i> Registrar Animal </a></li>
                    <li><a href="entradas_salidas.php"><i class="glyphicon glyphicon-tasks"></i> Entradas y Salidas</a></li>
                    <li class="submenu">
                         <a>
                            <i class="glyphicon glyphicon-list"></i> Centros de Manejo
                            <span class="caret pull-right"></span>
                         </a>
                         <!-- Sub menu -->
                         <ul>
                         	<li><a href="busquedaCentroDeManejo.php">Ver Centros</a></li>
                            <li><a href="registrar_centro_manejo.php">Registrar Centros</a></li>
                        </ul>
                    </li>
                </ul>
             </div>
		  </div>
      <footer>
         <div class="container">
         
            <div class="copy text-center">
               Copyright 2014 <a href='#'>Website</a>
            </div>
            
         </div>
      </footer>

    <script src="https://code.jquery.com/jquery.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="js/custom.js"></script>
 </div>
</body>

</html>



