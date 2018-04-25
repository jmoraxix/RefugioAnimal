<?php
include "db_config.php";
include_once '../Modelos/ModeloPersonal.php';
//include_once '/opt/lampp/htdocs/TESTDE/sinac-input-output/Modelos/ModeloPersonal.php';

class personal
{
    public $db;

    public function __construct()
    {
       
    }

    /*** registration process/proceso de registro ***/
    public function registrar_personal($nombre, $centro_manejo, $cedula, $correo,
                                       $telefono,$usuario,$contrasena,$cargo)
    {
        //Validaciones
        $ModeloPersonal = new ModeloPersonal();
        $ModeloPersonal->ModeloPersonal($nombre, $centro_manejo, $cedula, $correo,
            $telefono,$usuario,$contrasena,$cargo);

        if($ModeloPersonal->isValidado())
        {
            $contrasena = password_hash($contrasena,PASSWORD_DEFAULT,['cost'=>10]);
            $sql = "SELECT * FROM personal WHERE id='$cedula'";
            //checking if the username or email is available in db
            $check = $this->db->query($sql);
            $count_row = $check->num_rows;
            //if the username is not in db then insert to the table
            if ($count_row == 0)
            {
                $sql1 = "INSERT INTO personal SET id= $cedula,
                contrasena='$contrasena', nombre='$nombre', telefono='$telefono', correo = '$correo',
                usuario= '$usuario',centro_de_manejo='$centro_manejo',cargo='$cargo'";
                $result = mysqli_query($this->db, $sql1) or
                die(mysqli_connect_errno() . "No se pudieron insertar los registros");
                return $result;
            }
            else
            {
                return false;
            }
        }
        else
        {
            return false;
        }

    }

    /*** login process/inicio de sesion ***/
    public function login( $usuario, $contrasena)
    {
        $ModeloPersonal = new ModeloPersonal();

        if($ModeloPersonal->ValidarUsuario($usuario)
            AND $ModeloPersonal->ValidarContrasena($contrasena))
        {
            $record = mysqli_query($this->db, "SELECT * FROM personal WHERE usuario='$usuario'");
            $r = mysqli_fetch_array($record);
            $contrasenaHash = $r['contrasena'];
            $contrasenaVerificada = password_verify($contrasena,$contrasenaHash);
            if ($contrasenaVerificada) {
                // this login var will use for the session thing
                session_start();
                $_SESSION['login'] = true;
                $_SESSION['uid'] = $user_data['uid'];
                return true;
            } else {
                return false;
            }
        }
        else
        {
            return false;
        }

    }

    public function editar($nombre, $centro_manejo, $cedula, $correo,
                           $telefono,$usuario,$contrasena,$cargo)
    {
        //Validaciones
        $ModeloPersonal = new ModeloPersonal();
        $ModeloPersonal->ValidarUpdate($nombre, $centro_manejo, $correo,
            $telefono,$usuario,$contrasena,$cargo);

        if($ModeloPersonal->isValidado())
        {
            $sql1 = "UPDATE personal SET contrasena='$contrasena',
                nombre='$nombre', telefono='$telefono', correo = '$correo',
                usuario= '$usuario',centro_de_manejo='$centro_manejo',cargo='$cargo'
                WHERE id=$cedula";
            $result = mysqli_query($this->db, $sql1) or
            die(mysqli_connect_errno() . "No se pudieron editar los registros");
            return $result;
        }
        else
        {
            return false;
        }
    }


    /*** starting the session ***/
    public function get_session()
    {
        return $_SESSION['login'];
    }

    public function user_logout()
    {
        $_SESSION['login'] = FALSE;
		session_start();
        session_destroy();
        header("location: ../index.php");
    }
}
?>