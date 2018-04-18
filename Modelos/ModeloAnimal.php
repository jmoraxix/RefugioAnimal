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

class ModeloAnimal
{
    private $validado = false;

    public function __construct()
    {

    }

    public function ModeloAnimal($ID, $nombre_comun, $edad, $especie,
                                 $estado,$ubicacion,$nombre_cientifico,$sexo,$fecha_de_ingreso)
    {
        $IDValidado = $this->ValidarID($ID);
        $NombreComunValidado = $this->ValidarNombre_Comun($nombre_comun);
        $EdadValidada = $this->ValidarEdad($edad);
        $EspecieValidada = $this->ValidarEspecie($especie);
        $EstadoValidado = $this->ValidarEstado($estado);
        $UbicacionValidada = $this->ValidarUbicacion($ubicacion);
        $NombrecCientificoValidado = $this->ValidarNombre_Cientifico($nombre_cientifico);
        $SexoValidado = $this->ValidarSexo($sexo);
        $FechaDeIngresoValidada = $this->ValidarFecha_De_Ingreso($fecha_de_ingreso);


        if($IDValidado
            AND $NombreComunValidado
            AND $EdadValidada
            AND $EspecieValidada
            AND $EstadoValidado
            AND $UbicacionValidada
            AND $NombrecCientificoValidado
            AND $SexoValidado
            AND $FechaDeIngresoValidada)
        {
            $this->validado=true;
        }
        else
        {
            $this->validado=false;
        }

    }

    public function ValidarUpdate($ID, $nombre_comun, $edad, $especie,
                                  $estado,$ubicacion,$nombre_cientifico,$sexo,$fecha_de_ingreso)
    {
        $IDValidado = $this->ValidarID($ID);
        $NombreComunValidado = $this->ValidarNombre_Comun($nombre_comun);
        $EdadValidada = $this->ValidarEdad($edad);
        $EspecieValidada = $this->ValidarEspecie($especie);
        $EstadoValidado = $this->ValidarEstado($estado);
        $UbicacionValidada = $this->ValidarUbicacion($ubicacion);
        $NombrecCientificoValidado = $this->ValidarNombre_Cientifico($nombre_cientifico);
        $SexoValidado = $this->ValidarSexo($sexo);
        $FechaDeIngresoValidada = $this->ValidarFecha_De_Ingreso($fecha_de_ingreso);


        if($IDValidado
            AND $NombreComunValidado
            AND $EdadValidada
            AND $EspecieValidada
            AND $EstadoValidado
            AND $UbicacionValidada
            AND $NombrecCientificoValidado
            AND $SexoValidado
            AND $FechaDeIngresoValidada)
        {
            $this->validado=true;
        }
        else
        {
            $this->validado=false;
        }

    }

    public function ValidarID($ID)
    {
        //TODO : revisar que se requiere verficar del ID de los animales
        if ($ID>100000000
        OR $ID<0)
        {
            return false;
        }
        else
        {
            return true;
        }
    }

    public function ValidarNombre_Comun($nombre_comun)
    {
        if (strlen($nombre_comun)>30)
        {
            return false;
        }
        else
        {
            return true;
        }
    }

    public function ValidarEdad($edad)
    {
        if($edad>200
            OR $edad<0)
        {
            return false;
        }
        else
        {
            return true;
        }
    }

    public function ValidarEspecie($especie)
    {
        if(strlen($especie)>30)
        {
            return false;
        }
        else
        {
            return true;
        }
    }

    public function ValidarEstado($estado)
    {
        //TODO : agregar los demas posibles estados para los animales
        if(strlen($estado)>30
            OR ($estado<>"Estable" AND $estado<>"Critico"))
        {
            return false;
        }
        else
        {
            return true;
        }
    }

    public function ValidarUbicacion($ubicacion)
    {
        if(strlen($ubicacion)>30)
        {
            return false;
        }
        else
        {
            return true;
        }
    }

    public function ValidarNombre_Cientifico($nombre_cientifico)
    {
        if(strlen($nombre_cientifico)>40)
        {
            return false;
        }
        else
        {
            return true;
        }
    }

    public function ValidarSexo($sexo)
    {
        if(strlen($sexo)>1
            OR ($sexo<>"F" AND $sexo<>"M")
        )
        {
            return false;
        }
        else
        {
            return true;
        }
    }

    public function ValidarFecha_De_Ingreso($fecha_de_ingreso)
    {
        //TODO : agregar validacion de fechas
        if(strlen($fecha_de_ingreso)>30
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
