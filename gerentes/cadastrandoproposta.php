<?php

session_start($login); // Inicia a sessão
$logado = $_SESSION['login'];
$tipo = $_SESSION['tipo'];

if (!isset($_SESSION["login"])) {
    header("Location: index.php?erro=1");
} 

include('header.php'); 



//PREENCHA OS DADOS DE CONEXÃO A SEGUIR:
 

require_once 'bdconexao.php';

 
// RECEBENDO OS DADOS PREENCHIDOS DO FORMULÁRIO !

//Pegando a data e hora atual
	
			//pegando a hora e data atual
			date_default_timezone_set('America/Sao_Paulo');
			$data = date('Y-m-d');
		
$cpf_cnpj	= $_POST ["cpf_cnpj"];	//atribuição do campo "cnpj" vindo do formulário para variavel
$nome	= $_POST ["nome"];	//atribuição do campo "nome" vindo do formulário para variavel

//Gravando no banco de dados !

$sql = "INSERT INTO propostas (cpf_cnpj, nome, data, gerente) VALUES ('$cpf_cnpj', '$nome', '$data', '$logado')";
mysql_query($sql, $id) or die (mysql_error());

 
echo "Seu cadastro foi realizado com sucesso!";



?>
<br> 
<a href="proposta.php">click para cadastrar outra proposta de abertura</a> <br>
<a href="inicio.php">click para voltar para o início da página</a>
<?php include('footer.php'); ?>