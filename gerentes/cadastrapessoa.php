<?php
require_once 'info.php';
require 'classes/datas.php';
$classeDatas = new Datas();
session_start("usuario");

$nome = $_POST["nome"];
$conta = $_POST["conta"];
$cpf = $_POST["cpf"];
$telefone = $_POST["telefone"];
$celular = $_POST["celular"];
$codGerente = $_POST["codGerente"];
$profissao = $_POST["profissao"];
$emprego = $_POST["emprego"];


$sql = "INSERT INTO pessoas (nome, conta, cpf, telefone, celular, codGerente, profissao, emprego) VALUES ('$nome', '$conta', '$cpf', '$telefone', '$celular', '$codGerente', '$profissao', '$emprego')";
mysql_query($sql, $id) or die (mysql_error());

header("Location: estrutura.php?corpo=novapessoa&mensagem=1");
?>