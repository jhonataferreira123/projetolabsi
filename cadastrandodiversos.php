
<?php include('header.php'); ?>
<?php 

//PREENCHA OS DADOS DE CONEXÃO A SEGUIR:
 

require_once 'bdconexao.php';

 
// RECEBENDO OS DADOS PREENCHIDOS DO FORMULÁRIO !

//Pegando a data e hora atual
	
			//pegando a hora e data atual
			date_default_timezone_set('America/Sao_Paulo');
			$data = date('Y-m-d');
		
$assuntos	= $_POST ["assuntos"];	//atribuição do campo "cnpj" vindo do formulário para variavel
$comentarios	= $_POST ["comentarios"];	//atribuição do campo "nome" vindo do formulário para variavel

//Gravando no banco de dados !

$sql = "INSERT INTO diversos (assuntos, comentarios, data) VALUES ('$assuntos', '$comentarios', '$data')";
mysql_query($sql, $id) or die (mysql_error());

 
echo "Seu cadastro foi realizado com sucesso!<br>Agradecemos a atenção.";



?>
<br> 
<a href="diversos.php">click para cadastrar outra PROPOSTA</a> <br>
<a href="inicio.php">click para voltar para o início da página</a>
<?php include('footer.php'); ?>