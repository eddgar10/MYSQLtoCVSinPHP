<!-- Exportar datos a un fichero CSV mediante PHP y MySQL
https://programacion.net/articulo/como_exportar_datos_a_un_fichero_csv_mediante_php_y_mysql_1887
-->

<!--EL EJEMPLO FUNCIONA BAJO ESTA BASE DE DATOS CREADA PREVIAMENTE EN PHPMYADMIN
    *ESTE CODIGO DEBE TRABAJAR CON UNA BASE PREVIAMENTE CREADA MEDIANTE UN PHP EL CUAL CREA Y CARGA INFORMACION BASANDOSE EN EL ARCHIVO CSV INGRESADO

CREATE DATABASE emp;
CREATE TABLE IF NOT EXISTS `emp` (
`emp_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'primary key',
`emp_name` varchar(255) NOT NULL COMMENT 'employee name',
`emp_email` varchar(100) NOT NULL,
`emp_salary` double NOT NULL COMMENT 'employee salary',
`emp_age` int(11) NOT NULL COMMENT 'employee age',
PRIMARY KEY (`emp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;


*AL IMPLEMENTAR ESTE MODULO DE DESCARGA DEBE SER PERONALIZABLE PARA CADA QWERY REQUERIDO GENERANDO 'n' ARCHIVOS 'exportData.php' como se requiera
-->

<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading">
            Archivo Generado
            <a href="exportData.php" class="btn btn-success pull-right">Export Members</a>
        </div>
        <div class="panel-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Edad</th>
                    <th>Salario($)</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                   
                include __DIR__ . '/dbConfig.php';
                
                

                $sql = "SELECT * FROM emp ";
                $resultset = mysqli_query($db, $sql) or die("database error:". mysqli_error($conn));
                if(mysqli_num_rows($resultset)) {
                while( $rows = mysqli_fetch_assoc($resultset) ) {
                ?>
            <tr>
            <td><?php echo $rows['emp_id']; ?></td>
            <td><?php echo $rows['emp_name']; ?></td>
            <td><?php echo $rows['emp_email']; ?></td>
            <td><?php echo $rows['emp_salary']; ?></td>
            <td><?php echo $rows['emp_age']; ?></td>
            </tr>
                <?php } } else { ?>
                <tr><td colspan="5">Sin información para mostrar</td></tr>
                <?php }
                
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>