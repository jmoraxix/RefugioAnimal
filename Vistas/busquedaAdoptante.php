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

$adoptante = new adoptante();

/*if (isset($_REQUEST['logout'])){
    extract($_REQUEST);
    $adoptante->user_logout();
}

if($_SESSION['login'] != true)
{
    header("location: login.php");
}*/

//$datos = mysqli_query($adoptante->db, "SELECT * FROM adoptante");
?>

<script>
    function search() {

        var input = document.getElementById("adoptante_a_buscar");
        var filter = input.value.toUpperCase();
        var table = document.getElementById("Tabla_De_Adoptante");
        var tr = table.getElementsByTagName("tr");

        for (i = 0; i < tr.length; i++) {
            var td_nombre_adoptante= tr[i].getElementsByTagName("td")[0];
            var td_ced_adoptante = tr[i].getElementsByTagName("td")[1];
            var td_num_telefono = tr[i].getElementsByTagName("td")[2];
            var td_correo_adoptante = tr[i].getElementsByTagName("td")[3];
            var td_fecha_nac_adoptante = tr[i].getElementsByTagName("td")[4];
            var td_centro_manejo = tr[i].getElementsByTagName("td")[5];
            var td_cargo = tr[i].getElementsByTagName("td")[6];

            if(td_id || td_nombre || td_usuario)
            {
                var nombre_adoptante = td_nombre_adoptante.innerHTML.toUpperCase();
                var ced_adoptante = td_ced_adoptante.innerHTML.toUpperCase();
                var num_telefono = td_num_telefono.innerHTML.toUpperCase();
                var correo_adoptante = td_correo.innerHTML.toUpperCase();
                var fecha_nac_adoptante = td_fecha_nac_adoptante.innerHTML.toUpperCase();

                if (id.indexOf(filter) > -1
                    || nombre_adoptante.indexOf(filter) > -1
					|| ced_adoptante.indexOf(filter) > -1
                    || num_telefono.indexOf(filter) > -1
                    || correo_adoptante.indexOf(filter) > -1
                    || fecha_nac_adoptante.indexOf(filter) > -1
                {
                    tr[i].style.display = "";
                }
                else
                {
                    tr[i].style.display = "none";
                }
            }
        }
    }
</script>


<!DOCTYPE html>
<html>
<head>
    <title>Personal</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- jQuery UI -->
    <link href="https://code.jquery.com/ui/1.10.3/themes/redmond/jquery-ui.css" rel="stylesheet" media="screen">

    <!-- Bootstrap -->
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- styles -->
    <link href="../css/style.css" rel="stylesheet">
    <link href="../css/buttons.css" rel="stylesheet">

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
                <h1><a href="index.php"><img src="../images/logo.png" width="70" height="60"></a></h1>
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
                    <li  class="current"><a href="busquedaAdoptante.php"><i class="glyphicon glyphicon-stats"></i> Adoptantes </a></li>
                    <li><a href="busquedaAnimales.php"><i class="glyphicon glyphicon-list"></i> Animales </a></li>
                    <li><a href="busquedaContrato.php"><i class="glyphicon glyphicon-tasks"></i> Contratos</a></li>
                </ul>
            </div>
        </div>
        <div class="col-md-6">
            <div class="content-box-large">
                <div class="panel-heading">
                    <div class="panel-title">Adoptantes</div>
                </div>
                <div class="row">
                    <div class="col-xs-4">
                        <div class="dataTables_length" id="example_length"><label>
                                <select name="example_length" aria-controls="example" size="1">
                                    <option selected="selected" value="10">10</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                </select>Resultados por p&#225;gina</label>
                        </div>
                    </div>
                    <div class="col-xs-5">
                        <input type="text" id="personal_a_buscar" onkeyup="search()"
                               placeholder="Busque por alguno de los campos de la tabla que se muestra abajo">
                    </div>
					<div class="col-xs-3">
							<input class ="btn btn-primary fa fa-save" type="submit" value="Nuevo Adoptante" onclick= "location='registrarAdoptante.php'">
                    </div>
                </div>
                <div class="panel-body">
                    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="Tabla_De_Personal">
                        <thead>
                        <tr>
                            <th>C&#233;dula</th>
                            <th>Nombre</th>
                            <th>Tel&#233;fono</th>
                            <th>Correo</th>
                            <th>Fecha de Nacimiento</th>
                            <th colspan="2"></th>
                        </tr>
                        </thead>

                        <?php while ($row = mysqli_fetch_array($datos)) { ?>
                            <tr>
                                <td><?php echo $row['ced_adoptante']; ?></td>
                                <td><?php echo $row['nombre_adoptante']; ?></td>
                                <td><?php echo $row['num_telefono']; ?></td>
                                <td><?php echo $row['correo_adoptante']; ?></td>
                                <td><?php echo $row['fecha_nac_adoptante']; ?></td>
                                <td>
                                    <a href="editarAdoptante.php?edit=<?php echo $row['id']; ?>" class="edit_btn" >Edit</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </table>
                </div>
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

<link href="vendors/datatables/dataTables.bootstrap.css" rel="stylesheet" media="screen">

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://code.jquery.com/jquery.js"></script>
<!-- jQuery UI -->
<script src="https://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="bootstrap/js/bootstrap.min.js"></script>

<script src="vendors/datatables/js/jquery.dataTables.min.js"></script>

<script src="vendors/datatables/dataTables.bootstrap.js"></script>

<script src="js/custom.js"></script>
<script src="js/tables.js"></script>
</body>
</html>