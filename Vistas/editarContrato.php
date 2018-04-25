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

include ('../Controladores/adoptante.php');
include ('../Controladores/contrato.php');

$adoptante = new adoptante();
$contrato = new contrato();
if (isset($_REQUEST['logout'])){
    extract($_REQUEST);
    $adoptante->user_logout();
}

//if($_SESSION['login'] != true)
//{
//    header("location: login.php");
//}

if (isset($_GET['edit'])) {
    $nombre = $_GET['edit'];

    $record = mysqli_query($contrato->db, "SELECT * FROM centro_de_manejo WHERE nombre='$nombre'");

    if (count($record) == 1 ) {
        $r = mysqli_fetch_array($record);
        $id_contrato = $r['id_contrato'];
        $ADOPTANTE_ced_adoptante = $r['ADOPTANTE_ced_adoptante'];
        $ANIMAL_id_animal = $r['ANIMAL_id_animal'];
        $fecha_contrato = $r['fecha_contrato'];
        $estado_contrato = $r['estado_contrato'];
    }

}

if (isset($_REQUEST['editar'])) {
    extract($_REQUEST);
    $update = $centro_manejo->editar($nombre_original, $nombre, $direccion, $capacidad, $cantidad_personal, $persona_a_cargo,$telefono);
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
    <title>Editar Centro de Manejo</title>
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

    <link href="css/forms.css" rel="stylesheet">


    <script language="javascript" type="text/javascript">
        function submitreg() {
            var form = document.reg;
            if(form.id_contrato.value == ""){
                alert( "Digite un id:." );
                return false;
            }
            else if(form.ADOPTANTE_ced_adoptante.value == ""){
                alert( "Ingrese un adoptante." );
                return false;
            }
            else if(form.ANIMAL_id_animal.capacidad == ""){
                alert( "Ingrese un animal." );
                return false;
            }
            else if(form.fecha_contrato.value == ""){
                alert( "Digite la fecha del contrato." );
                return false;
            }
            else if(form.estado_contrato.value == ""){
                alert( "Seleccione el estado del contrato." );
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
                    <li><a href="busquedaAnimales.php"><i class="glyphicon glyphicon-list"></i> Animales </a></li>
                    <li  class="current"><a href="busquedaContratos.php"><i class="glyphicon glyphicon-tasks"></i> Contratos</a></li>
                </ul>
             </div>
          </div>
          <div class="col-md-6">
	  					<div class="content-box-large">
			  				<div class="panel-heading">
					            <div class="panel-title">Registro Contratos</div>
					        </div>
			  				<div class="panel-body">
			  					<form action="" method="post" name="reg">
									<fieldset>
										<div class="form-group">
											<label>ID</label>
											<input name="id_contrato" class="form-control" placeholder="ejm: Centro 1" type="text" value="<?php echo $id_contrato; ?>">
										</div>
										<div class="form-group">
											<label>C&#233;dula Adoptante</label>
											<input name="ADOPTANTE_ced_adoptante" class="form-control" placeholder="ejm: 200m Norte de la guardia rural, Guadalupe" type="text" value="<?php echo $ADOPTANTE_ced_adoptante; ?>">
										</div>
										<div class="form-group">
											<label>Nombre del Animal</label>
											<input name="ANIMAL_id_animal" class="form-control" placeholder="ejm: 50" type="text" value="<?php echo $ANIMAL_id_animal; ?>">
										</div>
										<div>
			  								<label>Fecha de Contrato</label></br></br>
			  								<input type="date" name="fecha_contrato" value="<?php echo $today ?>"></br></br>
			  							</div>
										<div class="form-group">
											<label>Estado de Contrato</label></br>
												<form>
													<input type="radio" name="estado_contrato" id="Aprobado" value="Si" checked><label id ="radio" for="Aprobado"> &ensp; Aprobado</label></br>
													<input type="radio" name="estado_contrato" id="Rechazado" value="No"><label id ="radio" for="Rechazado"> &ensp; Rechazado</label></br>
												</form> 
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
