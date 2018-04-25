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


class contrato
{
    public $db;

    public function __construct()
    {
//        $this->db = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
//        if (mysqli_connect_errno()) {
//            echo "Error: No se pudo conectar a la base de datos.";
//            exit;
//        }
    }

    public function registrar_centro_de_manejo($id_contrato, $ADOPTANTE_ced_adoptante, $ANIMAL_id_animal, $fecha_contrato, $estado_contrato)
    {
        //Validaciones

        $ModeloContrato = new ModeloContrato();
        $ModeloContrato->ModeloContrato($id_contrato, $ADOPTANTE_ced_adoptante, $ANIMAL_id_animal, $fecha_contrato, $estado_contrato);


        if($ModeloContrato->isValidado())
        {
            $sql = "SELECT * FROM centro_de_manejo WHERE nombre='$nombre'";
            //checking if the username or email is available in db
            $check = $this->db->query($sql);
            $count_row = $check->num_rows;
            //if the username is not in db then insert to the table
            if ($count_row == 0)
            {
                $sql1 = "INSERT INTO centro_de_manejo SET nombre= '$nombre',
                direccion='$direccion', capacidad='$capacidad', 
                cantidad_personal='$cantidad_personal', 
                persona_a_cargo = '$persona_a_cargo',
                telefono= '$telefono'";
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

    public function editar($id_contrato, $ADOPTANTE_ced_adoptante, $ANIMAL_id_animal, $fecha_contrato, $estado_contrato)
    {
        //Validaciones

        $ModeloContrato = new ModeloContrato();
        $ModeloContrato->ModeloContrato($id_contrato, $ADOPTANTE_ced_adoptante, $ANIMAL_id_animal, $fecha_contrato, $estado_contrato);


        if($ModeloContrato->isValidado())
        {

            $sql1 = "UPDATE contrato SET nombre= '$nombre',
                direccion='$direccion', capacidad='$capacidad', 
                cantidad_personal='$cantidad_personal', 
                persona_a_cargo = '$persona_a_cargo',
                telefono= '$telefono'
                WHERE nombre = '$nombre_original'";
            $result = mysqli_query($this->db, $sql1) or
            die(mysqli_connect_errno() . "No se pudieron insertar los registros");
            return $result;
        }
        else
        {
            return false;
        }

    }
}