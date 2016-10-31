
<?php include('header.php'); ?>
<?php 

//PREENCHA OS DADOS DE CONEXÃO A SEGUIR:
 

require_once 'bdconexao.php';

 
// RECEBENDO OS DADOS PREENCHIDOS DO FORMULÁRIO !

//Pegando a data e hora atual
	
			//pegando a hora e data atual
			date_default_timezone_set('America/Sao_Paulo');
			$data = date('Y-m-d H:i');
		


if($_SERVER['REQUEST_METHOD'] == 'POST')
{
		$justificativa =  $_POST['justificativa'];
		$sql2 = "INSERT INTO justificar_faltas (justificativa, data) VALUES ('$justificativa', '$data')";
		mysql_query($sql2, $id) or die (mysql_error());

		//cadastrando o número da ata pegando a data como parametro.
		$sql3 = "INSERT INTO  numero_ata (data, numero_da_ata) VALUES ('$data', '')";
		mysql_query($sql3, $id) or die (mysql_error());


if(isset($_POST['presentes']))
{
	
	
	for($i=0; $i <= count($_POST['presentes']) -1; $i++)
	{
		//Gravando no banco de dados !
		$nome =  $_POST['presentes'][$i];
		$sql = "INSERT INTO listagem_presentes (nome, data) VALUES ('$nome', '$data')";
		mysql_query($sql, $id) or die (mysql_error());
	}
}
	
}

		




 
echo "Chamada realizada com sucesso!";



?>
<br> 

<a href="inicio.php">click para voltar para o início da página</a>
<?php include('footer.php'); ?>