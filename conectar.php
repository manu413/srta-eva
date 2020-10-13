<?php
$host  = "localhost";
$usuario  = "ADMIN";
$contraseña  = "1234";
$baseDatos  = "srta-eva";


$tablasrtaeva  = "usuarios";

error_reporting(0);

$conectar = new mysqli($host,$usuario,$contraseña,$baseDatos);


if($conectar->connect_errno){
    echo "lo sentimos.no se puede conectar";
    exit();
}  
?>