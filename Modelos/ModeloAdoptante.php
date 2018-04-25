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

class ModeloAdoptante
{
    private $validado = false;

    public function __construct()
    {

    }

    public function ModeloAdoptante($nombre, $centro_manejo, $cedula, $correo,
                                   $telefono,$usuario,$contrasena,$cargo)
    {
        $NombreValidado = $this->ValidarNombre($nombre);
        $CentroManejoValidado = $this->ValidarCentro_Manejo($centro_manejo);
        $CedulaValidada = $this->ValidarCedula($cedula);
        $CorreoValidado = $this->ValidarCorreo($correo);
        $TelefonoValidado = $this->ValidarTelefono($telefono);
        $UsuarioValidado = $this->ValidarUsuario($usuario);
        $ContrasenaValidada = $this->ValidarContrasena($contrasena);
        $CargoValidado = $this->ValidarCargo($cargo);


        if($NombreValidado
            AND $CentroManejoValidado
            AND $CedulaValidada
            AND $CorreoValidado
            AND $TelefonoValidado
            AND $UsuarioValidado
            AND $ContrasenaValidada
            AND $CargoValidado)
        {
            $this->validado=true;
        }
        else
        {
            $this->validado=false;
        }

    }

    public function ValidarUpdate($nombre, $centro_manejo, $correo,
                                  $telefono,$usuario,$contrasena,$cargo)
    {
        $NombreValidado = $this->ValidarNombre($nombre);
        $CentroManejoValidado = $this->ValidarCentro_Manejo($centro_manejo);
        $CorreoValidado = $this->ValidarCorreo($correo);
        $TelefonoValidado = $this->ValidarTelefono($telefono);
        $UsuarioValidado = $this->ValidarUsuario($usuario);
        $ContrasenaValidada = $this->ValidarContrasena($contrasena);
        $CargoValidado = $this->ValidarCargo($cargo);


        if($NombreValidado
            AND $CentroManejoValidado
            AND $CorreoValidado
            AND $TelefonoValidado
            AND $UsuarioValidado
            AND $ContrasenaValidada
            AND $CargoValidado)
        {
            $this->validado=true;
        }
        else
        {
            $this->validado=false;
        }

    }

    public function ValidarNombre($nombre)
    {
        if (strlen($nombre)>30)
        {
            return false;
        }
        else
        {
            return true;
        }
    }

    public function ValidarCentro_Manejo($centro_manejo)
    {
        if (strlen($centro_manejo)>40)
        {
            return false;
        }
        else
        {
            return true;
        }
    }

    public function ValidarCedula($cedula)
    {
        if($cedula>1000000000
            OR $cedula<100000000)
        {
            return false;
        }
        else
        {
            return true;
        }
    }

    public function ValidarCorreo($correo)
    {
        if(filter_var($correo,FILTER_VALIDATE_EMAIL))
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public function ValidarTelefono($telefono)
    {
        if($telefono>100000000
            OR $telefono<10000000)
        {
            return false;
        }
        else
        {
            return true;
        }
    }

    public function ValidarUsuario($usuario)
    {
        if(strlen($usuario)> 15)
        {
            return false;
        }
        else
        {
            return true;
        }
    }

    public function ValidarContrasena($contrasena)
    {
        if(strlen($contrasena)>20)
        {
            return false;
        }
        else
        {
            return true;
        }
    }

    public function ValidarCargo($cargo)
    {
        if(strlen($cargo)>30
            OR ($cargo<>"Admin" AND $cargo<>"Empleado")
        )
        {
            return false;
        }
        else
        {
            return true;
        }
    }

    /**
     * @return bool
     */
    public function isValidado()
    {
        return $this->validado;
    }

}
