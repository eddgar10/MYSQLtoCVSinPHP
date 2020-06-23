<!--ESTE ARCHIVO PUEDE EMPATARSE CON EL CONTENIDO DE db_connect.php  PARA EL MANEJO DE UN UNICO SU FUNCION ES LA DE REALIZAR LA CONEXION A MYSQL SE DEBEN OMITIR LOS COMENTARIOS YA INCLUIDO ESTE MODULO DEBIDO A QUE SE DESCARGAN COMO PARTE DEL ARCHIVO GENERADO-->
<?php
//DB details
$dbHost     = 'localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbName     = 'emp'; //$_POST['namebd']; // $dbName SE VA A DEFINIR COMO VARIABLE PARA LA SECCION DE CRUCE DE DATOS, PARA LA SECCION DE GENERAR ARCHIVOS SE MANEJARA DE FORMA GENERICA YA QUE ESTARA DENTRO DE UN SWITCH CASE

//Create connection and select DB
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

if($db->connect_error){
    die("Unable to connect database: " . $db->connect_error);
}
?>