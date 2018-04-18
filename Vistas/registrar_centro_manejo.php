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

include ('../Controladores/personal.php');
include ('../Controladores/centroDeManejo.php');
include ('messages.php');

$personal = new personal();

if (isset($_REQUEST['logout'])){
    extract($_REQUEST);
    $personal->user_logout();
}

if($_SESSION['login'] != true)
{
    header("location: login.php");
}

$centro_manejo = new centroDeManejo();

if (isset($_REQUEST['submit'])) {
    extract($_REQUEST);
    $register = $centro_manejo->registrar_centro_de_manejo( $nombre, $direccion, $capacidad, $cantidad_personal,
        $persona_a_cargo,$telefono);
    if ($register) {
        // Registration Success
        echo '<div class="isa_success"><i class="fa fa-check"></i>El registro se ha completado exitosamente</div>';
    } else {
        // Registration Failed
        echo '<div class="isa_error"><i class="fa fa-times-circle"></i>Error al realizar el registro, por favor asegurese de que todos los valores son validos</div>';
    }
}
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Registrar Centro de Manejo</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- jQuery UI -->
    <link href="https://code.jquery.com/ui/1.10.3/themes/redmond/jquery-ui.css" rel="stylesheet" media="screen">

    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- styles -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/buttons.css" rel="stylesheet">

    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
    <link href="vendors/form-helpers/css/bootstrap-formhelpers.min.css" rel="stylesheet">
    <link href="vendors/select/bootstrap-select.min.css" rel="stylesheet">
    <link href="vendors/tags/css/bootstrap-tags.css" rel="stylesheet">

    <link href="css/forms.css" rel="stylesheet">


    <script language="javascript" type="text/javascript">
        function submitreg() {
            var form = document.reg;
            if(form.nombre.value == ""){
                alert( "Digite un nombre:." );
                return false;
            }
            else if(form.direccion.value == ""){
                alert( "Digite una direccion." );
                return false;
            }
            else if(form.cedula.capacidad == ""){
                alert( "Digite la capacidad de animales que pueden alojar." );
                return false;
            }
            else if(form.cantidad.value == ""){
                alert( "Digite la cantidad de personal que puede alojar." );
                return false;
            }
            else if(form.persona_a_cargo.value == ""){
                alert( "Digite el nombre de la persona a cargo." );
                return false;
            }
            else if(form.telefono.value == ""){
                alert( "Digite un numero de telefono" );
                return false;
            }
        }
    </script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
      <div class="header">
       <div class="container">
             <div class="col-md-5">
                <!-- Logo -->
                <div class="logo">
                   <h1><a href="index.php"><img src="images/logo.png" width="70" height="60"></a></h1>
                </div>
             </div>
                <div class="round">
                  <form action="" method="post" name='form-login'>
              <input class ="button" type="submit" name="logout" value="Log out">
          </form>
                </div>
       </div>
  </div>
    <div class="page-content">
        <div class="row">
          <div class="col-md-3">
            <div class="sidebar sidebar-menu content-box-menu content-box" style="display: block;">
                <ul class="nav">
                    <!-- Main menu -->
                    <li><a href="index.php"><i class="glyphicon glyphicon-home"></i> Inicio </a></li>
                    <li><a href="busquedaPersonal.php"><i class="glyphicon glyphicon-stats"></i> Personal </a></li>
                    <li><a href="registrar_personal.php"><i class="glyphicon glyphicon-calendar"></i> Registrar Personal </a></li>
                    <li><a href="busquedaAnimales.php"><i class="glyphicon glyphicon-list"></i> Animales </a></li>
                    <li><a href="registrarAnimal.php"><i class="glyphicon glyphicon-record"></i> Registrar Animal </a></li>
                    <li><a href="entradas_salidas.php"><i class="glyphicon glyphicon-tasks"></i> Entradas y Salidas</a></li>
                    <li class="current submenu">
                         <a>
                            <i class="glyphicon glyphicon-list"></i> Centros de Manejo
                            <span class="caret pull-right"></span>
                         </a>
                         <!-- Sub menu -->
                         <ul>
                         	<li><a href="busquedaCentroDeManejo.php">Ver Centros</a></li>
                            <li class="current"><a href="registrar_centro_manejo.php">Registrar Centros</a></li>
                        </ul>
                    </li>
                </ul>
             </div>
          </div>
          <div class="col-md-6">
	  					<div class="content-box-large">
			  				<div class="panel-heading">
					            <div class="panel-title">Registro Centro de Manejo</div>
					        </div>
			  				<div class="panel-body">
			  					<form action="" method="post" name="reg">
									<fieldset>
										<div class="form-group">
											<label>Nombre</label>
											<input name="nombre" class="form-control" placeholder="ejm: Centro 1" type="text">
										</div>
										<div class="form-group">
											<label>Direcci&#243;n</label>
											<input name="direccion" class="form-control" placeholder="ejm: 200m Norte de la guardia rural, Guadalupe" type="text">
										</div>
										<div class="form-group">
											<label>Capacidad de animales</label>
											<input name="capacidad" class="form-control" placeholder="ejm: 50" type="text">
										</div>
										<div class="form-group">
											<label>Cantidad de personal</label>
											<input name="cantidad_personal" class="form-control" placeholder="ejm: 10" type="text">
										</div>
										<div class="form-group">
											<label>Persona a cargo</label>
											<input name="persona_a_cargo" class="form-control" placeholder="ejm: Juan Solano Mora" type="text">
										</div>
										<div class="form-group">
											<label>Tel&#233;fono</label>
											<input name="telefono" class="form-control" placeholder="ejm: 8515-1586" type="text">
										</div>
									</fieldset>
									<div>
											<input class="btn btn-primary fa fa-save" type="submit" name="submit" value="Registrar" onclick="return(submitreg());">
									</div>
								</form>
			  				</div>
			  			</div>
	  				</div>
	  			</div>
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

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery.js"></script>
    <!-- jQuery UI -->
    <script src="https://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>

    <script src="vendors/form-helpers/js/bootstrap-formhelpers.min.js"></script>

    <script src="vendors/select/bootstrap-select.min.js"></script>

    <script src="vendors/tags/js/bootstrap-tags.min.js"></script>

    <script src="vendors/mask/jquery.maskedinput.min.js"></script>

    <script src="vendors/moment/moment.min.js"></script>

    <script src="vendors/wizard/jquery.bootstrap.wizard.min.js"></script>

     <!-- bootstrap-datetimepicker -->
     <link href="vendors/bootstrap-datetimepicker/datetimepicker.css" rel="stylesheet">
     <script src="vendors/bootstrap-datetimepicker/bootstrap-datetimepicker.js"></script> 


    <link href="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
	<script src="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/js/bootstrap-editable.min.js"></script>

    <script src="js/custom.js"></script>
    <script src="js/forms.js"></script>
  </body>
</html>
