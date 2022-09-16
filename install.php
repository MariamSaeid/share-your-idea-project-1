<?php require_once('config.php') ?>
<?php

$connection = new PDO($dsn,$dbuser,$dbupassword);
//Php DataBase Object (PDO)
$sql = "CREATE TABLE if Not Exists ideastable (
     id INT  unsigned Auto_Increment  , 
     title VARCHAR(40) NOT NULL , 
     text VARCHAR(40) Not NULL , 
     primary key(id)); ";
$connection  -> exec($sql);
echo "You are connected to the databsase successfully";

 ?>