<?php
// RECEBENDO OS DADOS PREENCHIDOS DO FORMULÁRIO !

//Pegando a data e hora atual

$id = $_GET["id"];
$tipo	= $_GET["tipo"];	//atribuição do campo "cnpj" vindo do formulário para variavel
$justificativa	= $_GET["justificativa"];	//atribuição do campo "nome" vindo do formulário para variavel

//Gravando no banco de dados !

$sql = "INSERT INTO status_aprovacao (id_proposta, id_usuario, posicao, justificativa) VALUES ('$id','', '$tipo', '$justificativa')";
mysql_query($sql, $id) or die (mysql_error());

 
echo "Sua votação foi concluída com sucesso!<br>Agradecemos a atenção.";





?>