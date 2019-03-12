<?php
$db_host="127.0.0.1";
$db_port="3306";
$db_type="mysql";
$db_user="root";
$db_pass="";
$db_schema="smartphone";
$charset="utf8";


$dsn=$db_type.":host".$db_host.";port=".$db_port.";dbname=".$db_schema.";charset=".$charset;

try{


$db=new PDO($dsn,$db_user,$db_pass,[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

// var_dump($db);
}catch(PDOException $execption){
    echo $execption->getMessage();
    die();
}


