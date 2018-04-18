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

include_once './Controladores/animal.php';
include ('./Controladores/personal.php');

$personal = new personal();
$animal = new animal();

if (isset($_REQUEST['logout'])){
    extract($_REQUEST);
    $personal->user_logout();
}

if($_SESSION['login'] != true)
{
    header("location: login.php");
}

if (isset($_GET['edit'])) {
    $ID = $_GET['edit'];

    $record = mysqli_query($animal->db, "SELECT * FROM animal WHERE ID=$ID");

    if (count($record) == 1 ) {
        $r = mysqli_fetch_array($record);
        $ID = $r['ID'];
        $nombre_comun = $r['nombre_comun'];
        $edad = $r['edad'];
        $especie = $r['especie'];
        $estado = $r['estado'];
        $ubicacion = $r['ubicacion'];
        $nombre_cientifico = $r['nombre_cientifico'];
        $sexo = $r['sexo'];
        $fecha_de_ingreso = $r['fecha_de_ingreso'];


    }

}

if (isset($_REQUEST['editar'])) {
    extract($_REQUEST);
    $update = $animal->editar( $ID, $nombre_comun, $edad, $especie,
        $estado,$ubicacion,$nombre_cientifico,$sexo,$fecha_de_ingreso);
    if ($update) {
// Registration Success
        echo '<div class="isa_success"><i class="fa fa-check"></i>Perfil editado exitosamente</div>';
        //header("location: login.Controladores");
    } else {
// Registration Failed
        echo '<div class="isa_error"><i class="fa fa-times-circle"></i>Error al realizar los cambios, por favor asegurese de que todos los valores son validos</div>';
    }
}
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Editar perfil de Animal</title>
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
            if(form.ID.value == ""){
                alert( "Digite el ID del animal:." );
                return false;
            }
            else if(form.nombre_comun.value == ""){
                alert( "Digite el nombre común del animal." );
                return false;
            }
            else if(form.edad.value == ""){
                alert( "Digite la edad del animal." );
                return false;
            }
            else if(form.especie.value == ""){
                alert( "Digite la especie del animal." );
                return false;
            }
            else if(form.estado.value == ""){
                alert( "Digite el estado del animal." );
                return false;
            }
            else if(form.ubicacion.value == ""){
                alert( "Digite la ubicacion del animal." );
                return false;
            }
            else if(form.nombre_cientifico.value == ""){
                alert( "Digite el nombre científico." );
                return false;
            }
            else if(form.sexo.value == ""){
                alert( "Digite el sexo del animal." );
                return false;
            }
            else if(form.fecha_de_ingreso.value == ""){
                alert( "Digite la fecha de ingreso del animal." );
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
                    <li class="current"><a href="registrarAnimal.php"><i class="glyphicon glyphicon-record"></i> Registrar Animal </a></li>
                    <li><a href="entradas_salidas.php"><i class="glyphicon glyphicon-tasks"></i> Entradas y Salidas</a></li>
                    <li class="submenu"">
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
											<input name="ID" class="form-control"  type="text" value="<?php echo $ID; ?>">
										</div>
										<div class="form-group">
											<label>Nombre Com&#250;n</label>
											<input name="nombre_comun" class="form-control" placeholder="ejm: Tortuga" type="text" value="<?php echo $nombre_comun; ?>">
										</div>
										<div class="form-group">
											<label>Nombre Cient&#237;fico</label>
											<input name="nombre_cientifico" class="form-control" placeholder="ejm: Testudines" type="text" value="<?php echo $nombre_cientifico; ?>">
										</div>
										<div class="form-group">
											<label>Edad</label>
											<input name="edad" class="form-control" placeholder="ejm: Dos a&#241;os" type="text" value="<?php echo $edad; ?>">
										</div>
										<div class="form-group">
											<label>Especie</label>
											<input name="especie" class="form-control" placeholder="ejm: Dos a&#241;os" type="text" value="<?php echo $especie; ?>">
										</div>
										<div class="form-group">
											<label>Estado</label>
											<input name="estado" class="form-control" placeholder="ejm: Delicado" type="text" value="<?php echo $estado; ?>">
										</div>
										<div class="form-group">
											<label>Centro Actual</label>
												<input name="ubicacion" class="form-control" placeholder="--select--" type="text" list="list" value="<?php echo $ubicacion; ?>">
												<datalist id="list">
													<option value="Alexandra"></option>
													<option value="Alice"></option>
													<option value="Anastasia"></option>
													<option value="Avelina"></option>
													<option value="Basilia"></option>
													<option value="Beatrice"></option>
													<option value="Cassandra"></option>
												</datalist> 
										</div>
										<div class="form-group">
											<label>Sexo</label>
											<input name="sexo" class="form-control" placeholder="ejm: Masculino" type="text" value="<?php echo $sexo; ?>">
										</div>
										<div>
			  								<label>Fecha de Ingreso</label>
			  								<div name="fecha_de_ingreso" class="bfh-datepicker" data-format="y-m-d" data-date="today"></div>
			  							</div>
									</fieldset>
									<div>
											<input class="btn btn-primary fa fa-save" type="submit" name="editar" value="Registrar" onclick="return(submitreg());">
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