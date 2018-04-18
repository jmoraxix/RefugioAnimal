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

//session_start();

include ('../Controladores/personal.php');

$personal = new personal();

/*if (isset($_REQUEST['logout'])){
    extract($_REQUEST);
    $personal->user_logout();
}

if($_SESSION['login'] != true)
{
    header("location: login.php");
}*/

$datos = mysqli_query($personal->db, "SELECT * FROM personal");
?>

<script>
    function search() {

        var input = document.getElementById("personal_a_buscar");
        var filter = input.value.toUpperCase();
        var table = document.getElementById("Tabla_De_Personal");
        var tr = table.getElementsByTagName("tr");

        for (i = 0; i < tr.length; i++) {
            var td_id = tr[i].getElementsByTagName("td")[0];
            var td_nombre = tr[i].getElementsByTagName("td")[1];
            var td_telefono = tr[i].getElementsByTagName("td")[2];
            var td_correo = tr[i].getElementsByTagName("td")[3];
            var td_usuario = tr[i].getElementsByTagName("td")[4];
            var td_centro_manejo = tr[i].getElementsByTagName("td")[5];
            var td_cargo = tr[i].getElementsByTagName("td")[6];

            if(td_id || td_nombre || td_usuario)
            {
                var id = td_id.innerHTML.toUpperCase();
                var nombre = td_nombre.innerHTML.toUpperCase();
                var telefono = td_telefono.innerHTML.toUpperCase();
                var correo = td_correo.innerHTML.toUpperCase();
                var usuario = td_usuario.innerHTML.toUpperCase();
                var centro_manejo = td_centro_manejo.innerHTML.toUpperCase();
                var cargo = td_cargo.innerHTML.toUpperCase();

                if (id.indexOf(filter) > -1
                    || nombre.indexOf(filter) > -1
                    || telefono.indexOf(filter) > -1
                    || correo.indexOf(filter) > -1
                    || usuario.indexOf(filter) > -1
                    || centro_manejo.indexOf(filter) > -1
                    || cargo.indexOf(filter) > -1)
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
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- styles -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/buttons.css" rel="stylesheet">

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
                    <li class="current"><a href="busquedaPersonal.php"><i class="glyphicon glyphicon-stats"></i> Personal </a></li>
                    <li><a href="registrar_personal.php"><i class="glyphicon glyphicon-calendar"></i> Registrar Personal </a></li>
                    <li><a href="busquedaAnimales.php"><i class="glyphicon glyphicon-list"></i> Animales </a></li>
                    <li><a href="registrarAnimal.php"><i class="glyphicon glyphicon-record"></i> Registrar Animal </a></li>
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
                    <div class="panel-title">Personal</div>
                </div>
                <div class="row">
                    <div class="col-xs-6">
                        <div class="dataTables_length" id="example_length"><label>
                                <select name="example_length" aria-controls="example" size="1">
                                    <option selected="selected" value="10">10</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                </select>Resultados por p&#225;gina</label>
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <input type="text" id="personal_a_buscar" onkeyup="search()"
                               placeholder="Busque por alguno de los campos de la tabla que se muestra abajo">
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
                            <th>Usuario</th>
                            <th>Centro de Manejo</th>
                            <th>Cargo</th>
                            <th colspan="2"></th>
                        </tr>
                        </thead>

                        <?php while ($row = mysqli_fetch_array($datos)) { ?>
                            <tr>
                                <td><?php echo $row['id']; ?></td>
                                <td><?php echo $row['nombre']; ?></td>
                                <td><?php echo $row['telefono']; ?></td>
                                <td><?php echo $row['correo']; ?></td>
                                <td><?php echo $row['usuario']; ?></td>
                                <td><?php echo $row['centro_de_manejo']; ?></td>
                                <td><?php echo $row['cargo']; ?></td>
                                <td>
                                    <a href="editarPersonal.php?edit=<?php echo $row['id']; ?>" class="edit_btn" >Edit</a>
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