<?php
include "db_config.php";
include_once '../Modelos/ModeloAdoptante.php';


class adoptante
{
    public $db;

    public function __construct()
    {
       
    }
    
    

    /*** registration process/proceso de registro ***/
    public function registrar_personal($nombre_adoptante, $ced_adoptante, $num_telefono, $correo_adoptante, $fecha_nac_adoptante)
    {
        //Validaciones
        $ModeloAdoptante = new ModeloAdoptante();
        $ModeloAdoptante->ModeloAdoptante($nombre_adoptante, $ced_adoptante, $num_telefono, $correo_adoptante, $fecha_nac_adoptante);
        
        if($ModeloAdoptante->isValidado())
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
    public function login($usuario, $contrasena)
    {
        function validate_password($pass_user, $pass_oracle)
        {
            if(strcmp($pass_user, $pass_oracle) == 0){
                return true;
            }
        }
        
        $ModeloAdoptante = new ModeloAdoptante();

        if($ModeloAdoptante->ValidarUsuario($usuario)
            AND $ModeloAdoptante->ValidarContrasena($contrasena))
        {
            $conn = oci_connect(DB_USERNAME, DB_PASSWORD, DB_CONN_STRING);
            
              if (!$conn) {
                    $e = oci_error();
                    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
              }
              
              
             $record = oci_parse($conn,  "SELECT * FROM usuario WHERE nombre_usuario='$usuario'");
            oci_execute($record);
//            $record = mysqli_query($conn, "SELECT * FROM personal WHERE usuario='$usuario'");
            $r = oci_fetch_array($record);
            $contrasenaHash = $r['CONTRA_USUARIO'];
            
            
            //$contrasenaVerificada = password_verify($contrasena,$contrasenaHash);
            $contrasenaVerificada = validate_password($contrasena,$contrasenaHash);
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

    public function editar($nombre_adoptante, $ced_adoptante, $num_telefono, $correo_adoptante, $fecha_nac_adoptante)
    {
        //Validaciones
        $ModeloAdoptante = new ModeloAdoptante();
        $ModeloAdoptante->ValidarUpdate($nombre_adoptante, $ced_adoptante, $num_telefono, $correo_adoptante, $fecha_nac_adoptante);

        if($ModeloAdoptante->isValidado())
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