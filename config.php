<?php 
$dbHost = 'localhost';
$dbPort = '3306';
$dbUsername = 'root';
$dbPassword = '/*Apagado por privacidade*/';
$dbName = '/*Apagado por privacidade*/';

$conexao = new mysqli($dbHost . ':' . $dbPort, $dbUsername, $dbPassword, $dbName);

if($conexao->connect_errno){
echo "Erro na conexão";} 
else 
{echo 'Conexão efetuada com sucesso';};
?>