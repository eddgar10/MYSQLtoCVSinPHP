<!-- Exportar datos a un fichero CSV mediante PHP y MySQL
https://programacion.net/articulo/como_exportar_datos_a_un_fichero_csv_mediante_php_y_mysql_1887
-->

<!--EL EJEMPLO FUNCIONA BAJO ESTA BASE DE DATOS CREADA PREVIAMENTE EN PHPMYADMIN
    *ESTE CODIGO DEBE TRABAJAR CON UNA BASE PREVIAMENTE CREADA MEDIANTE UN PHP EL CUAL CREA Y CARGA INFORMACION BASANDOSE EN EL ARCHIVO CSV INGRESADO

CREATE TABLE `members` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
 `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
 `phone` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
 `created` datetime NOT NULL,
 `modified` datetime NOT NULL,
 `status` enum('1','0') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
 PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


-->

<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading">
            Members list
            <a href="exportData.php" class="btn btn-success pull-right">Export Members</a>
        </div>
        <div class="panel-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Phone</th>
                      <th>Created</th>
                      <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    //include database configuration file
                    include 'dbConfig.php';
                    
                    //get records from database
                    $query = $db->query("SELECT * FROM members ORDER BY id DESC");
                    if($query->num_rows > 0){ 
                        while($row = $query->fetch_assoc()){ ?>                
                    <tr>
                      <td><?php echo $row['name']; ?></td>
                      <td><?php echo $row['email']; ?></td>
                      <td><?php echo $row['phone']; ?></td>
                      <td><?php echo $row['created']; ?></td>
                      <td><?php echo ($row['status'] == '1')?'Active':'Inactive'; ?></td>
                    </tr>
                    <?php } }else{ ?>
                    <tr><td colspan="5">No member(s) found.....</td></tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>