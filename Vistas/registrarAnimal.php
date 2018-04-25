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

include_once '../Controladores/animal.php';
include ('../Controladores/adoptante.php');

$adoptante = new adoptante();
$animal = new animal();

if (isset($_REQUEST['logout'])){
    extract($_REQUEST);
    $adoptante->user_logout();
}

//if($_SESSION['login'] != true)
//{
//    header("location: login.php");
//}


if (isset($_REQUEST['submit'])) {
    extract($_REQUEST);
    $register = $animal->registrar_animal( $ID, $nombre_animal, $edad_animal, $especie_animal, $raza_animal, $estado_animal, $sexo_animal, $animal_esteril, $fecha_nacimiento, $fecha_defuncion);
    if ($register) {
// Registration Success
        echo '<div class="isa_success"><i class="fa fa-check"></i>El registro se ha completado exitosamente</div>';
    } else {
// Registration Failed
        echo '<div class="isa_error"><i class="fa fa-times-circle"></i>Error al realizar el registro, por favor asegurese de que todos los valores son validos</div>';
    }
}

  $timezone = "Europe/Oslo";
  date_default_timezone_set($timezone);
  $today = date("d.m.Y");
echo $today." <br>";
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Registrar Animales</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- jQuery UI -->
    <link href="https://code.jquery.com/ui/1.10.3/themes/redmond/jquery-ui.css" rel="stylesheet" media="screen">

    <!-- Bootstrap -->
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- styles -->
    <link href="../css/style.css" rel="stylesheet">
    <link href="../css/buttons.css" rel="stylesheet">

    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
    <link href="vendors/form-helpers/css/bootstrap-formhelpers.min.css" rel="stylesheet">
    <link href="vendors/select/bootstrap-select.min.css" rel="stylesheet">
    <link href="vendors/tags/css/bootstrap-tags.css" rel="stylesheet">

    <link href="../css/forms.css" rel="stylesheet">


<script language="javascript" type="text/javascript">
        function submitreg() {
            var form = document.reg;
            if(form.ID.value == ""){
                alert( "Digite el ID del animal:." );
                return false;
            }
            else if(form.nombre_animal.value == ""){
                alert( "Digite el nombre común del animal." );
                return false;
            }
            else if(form.edad_animal.value == ""){
                alert( "Digite la edad del animal." );
                return false;
            }
            else if(form.especie_animal.value == ""){
                alert( "Digite la especie del animal." );
                return false;
            }
            else if(form.raza_animal.value == ""){
                alert( "Digite la raza del animal." );
                return false;
            }
            else if(form.estado_animal.value == ""){
                alert( "Digite el estado del animal." );
                return false;
            }
            else if(form.sexo_animal.value == ""){
                alert( "Digite el sexo científico." );
                return false;
            }
            else if(form.animal_esteril.value == ""){
                alert( "Defina si el animal es esteril." );
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
                    <li><a href="busquedaAdoptante.php"><i class="glyphicon glyphicon-stats"></i> Adoptantes </a></li>
                    <li class="current"><a href="busquedaAnimales.php"><i class="glyphicon glyphicon-list"></i> Animales </a></li>
                    <li><a href="busquedaContrato.php"><i class="glyphicon glyphicon-record"></i> Contratos </a></li>
                </ul>
             </div>
          </div>
          <div class="col-md-6">
	  					<div class="content-box-large">
			  				<div class="panel-heading">
					            <div class="panel-title">Registro de Animales</div>
					        </div>
			  				<div class="panel-body">
			  					<form action="" method="post" name="reg">
									<fieldset>
									<div class="form-group">
											<label>ID</label>
											<input name="ID" class="form-control"  type="text">
										</div>
										<div class="form-group">
											<label>Nombre</label>
											<input name="nombre_animal" class="form-control" placeholder="ejm: Poncho" type="text">
										</div>
										<div class="form-group">
											<label>Edad</label>
											<input name="edad_animal" class="form-control" placeholder="ejm: Dos a&#241;os" type="text">
										</div>
										<div class="form-group">
											<label>Especie</label>
											<input name="especie_animal" class="form-control" placeholder="ejm: ??" type="text">
										</div>
										<div class="form-group">
											<label>Raza</label>
											<input name="raza_animal" class="form-control" placeholder="ejm: Husky" type="text">
										</div>
										<div class="form-group">
											<label>Estado</label></br>
												<form>
													<input type="radio" name="estado_animal" id="Adoptado" value="Si" checked><label id ="radio" for="Adoptado"> &ensp; Adoptado</label></br>
													<input type="radio" name="estado_animal" id="No Adoptado" value="No"><label id ="radio" for="No Adoptado"> &ensp; No Adoptado</label></br>
												</form>
										</div>
										<div class="form-group">
											<label>Sexo</label></br>
												<form>
													<input type="radio" name="sexo_animal" id="F" value="F" checked><label id ="radio" for="Si"> &ensp; Femenino</label></br>
													<input type="radio" name="sexo_animal" id="M" value="M"><label id ="radio" for="No"> &ensp; Masculino</label></br>
												</form>
										</div>
										<div class="form-group">
											<label>Esteril</label></br>
												<form>
													<input type="radio" name="animal_esteril" id="Si" value="Si" checked><label id ="radio" for="Si"> &ensp; Si</label></br>
													<input type="radio" name="animal_esteril" id="No" value="No"><label id ="radio" for="No"> &ensp; No</label></br>
												</form>
										</div>
										<div>
			  								<label>Fecha de Nacimiento</label></br></br>
			  								<input name="fecha_nacimiento" type="date" value="<?php echo $today ?>"></br></br>
			  							</div>
																				<div>
			  								<label>Fecha de Defunci&#243;n</label></br></br>
			  								<input name="fecha_defuncion" type="date" value="<?php echo $today ?>"></br></br>
			  							</div>
									</fieldset>
									<div>
											<input class="btn btn-primary fa fa-save" type="submit" name="submit" value="Registrar" onclick="return(submitreg());location='busquedaAnimales.php'">
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
               Facebook <a href='#'>Website</a>
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