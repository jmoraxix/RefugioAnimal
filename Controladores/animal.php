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

include_once './Modelos/ModeloAnimal.php';

class animal
{
    public $db;

    public function __construct()
    {
       
    }



    /*** animal registration process/proceso de registro de animales ***/
    public function registrar_animal($ID, $nombre_comun, $edad, $especie,
                                     $estado,$ubicacion,$nombre_cientifico,$sexo,$fecha_de_ingreso)
    {
        //Validaciones
        $ModeloAnimal = new ModeloAnimal();
        $ModeloAnimal->ModeloAnimal($ID, $nombre_comun, $edad, $especie,
            $estado,$ubicacion,$nombre_cientifico,$sexo,$fecha_de_ingreso);

        if($ModeloAnimal->isValidado())
        {

            $sql = "SELECT * FROM animal WHERE ID='$ID'";
            //checking if the animal exists in the db
            $check = $this->db->query($sql);
            $count_row = $check->num_rows;
            //if the animal is not in db then insert to the table
            if ($count_row == 0)
            {
                $sql1 = "INSERT INTO animal SET ID= '$ID',
                nombre_comun='$nombre_comun', edad='$edad', especie='$especie', estado = '$estado',
                ubicacion= '$ubicacion',nombre_cientifico='$nombre_cientifico',sexo='$sexo', fecha_de_ingreso='$fecha_de_ingreso'";
                $result = mysqli_query($this->db, $sql1) or
                die(mysqli_connect_errno() . "No se pudo insertar el animal en los resgitros ");
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



    public function editar($ID, $nombre_comun, $edad, $especie,
                           $estado,$ubicacion,$nombre_cientifico,$sexo,$fecha_de_ingreso)
    {
        //Validaciones
        $ModeloAnimal = new ModeloAnimal();
        $ModeloAnimal->ValidarUpdate($ID, $nombre_comun, $edad, $especie,
            $estado,$ubicacion,$nombre_cientifico,$sexo,$fecha_de_ingreso);

        if($ModeloAnimal->isValidado())
        {
            $sql1 = "UPDATE animal SET ID= '$ID',
                nombre_comun='$nombre_comun', edad='$edad', especie='$especie', estado = '$estado',
                ubicacion= '$ubicacion',nombre_cientifico='$nombre_cientifico',sexo='$sexo', fecha_de_ingreso='$fecha_de_ingreso'
                WHERE ID=$ID";
            $result = mysqli_query($this->db, $sql1) or
            die(mysqli_connect_errno() . "No se pudo editar la información del animal");
            return $result;
        }
        else
        {
            return false;
        }
    }



}
?>