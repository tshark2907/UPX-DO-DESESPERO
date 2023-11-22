<?php 
$dbHost = 'localhost';
$dbPort = '3307';
$dbUsername = 'root';
$dbPassword = 'Astral5021#';
$dbName = 'eco_troca_db';

$conexao = new mysqli($dbHost . ':' . $dbPort, $dbUsername, $dbPassword, $dbName);

if($conexao->connect_errno){
echo "Erro na conexão";} 
else 
{echo 'Conexão efetuada com sucesso';};
?>