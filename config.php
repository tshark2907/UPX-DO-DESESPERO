<?php 
$dbHost = 'Localhost';
$dbUsername = 'root';
$dbPassword = 'Astral5021#';
$dbName = 'eco_troca_db';

$conexao = new mysqli($dbHost,$dbUsername,$dbPassword,$dbName);
if($conexao->connect_errno){
    echo "Erro na conexão"
}echo 'Conexão efetuada com sucesso'
?>