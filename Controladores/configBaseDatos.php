<?php

//fedora-bd2 = 
//  (DESCRIPTION=
//    (ADDRESS_LIST=
//      (ADDRESS=(PROTOCOL=TCP)(HOST=fedora-bd2.ayzekstudio.com)(PORT=1521))
//    )
//      (CONNECT_DATA=
//        (SID=orcl)
//      )
//  )

$username = 'refugio_animal';
$password = 'oracle123';
$connection_string = 'fedora-bd2';
$conn = null;


function conectarDB(){
    global $username, $password, $connection_string, $conn;
    $conn = oci_connect($username, $password, $connection_string);
    if (!$conn) {
        $e = oci_error();
        trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
    }
}

function consultarTodoAnimales(){
    global $conn;
    $stid = oci_parse($conn, 'SELECT * FROM animal');
    oci_execute($stid); 
}





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


