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
   define(UPLOADEDFILES, "../htdocs/resumodocooperado/");

 
// RECEBENDO OS DADOS PREENCHIDOS DO FORMULÁRIO !

//Pegando a data e hora atual
	
			//pegando a hora e data atual
			date_default_timezone_set('America/Sao_Paulo');
			$data = date('Y-m-d');
		
$conta	= $_POST ["conta"];	//atribuição do campo "cnpj" vindo do formulário para variavel
$valor	= $_POST ["valor"];	//atribuição do campo "nome" vindo do formulário para variavel
$tipo	= $_POST ["tipo"];	//atribuição do campo "nome" vindo do formulário para variavel
$finalidade	= $_POST ["finalidade"];	//atribuição do campo "nome" vindo do formulário para variavel


   if(isset($_FILES['fileUpload']))
   {
      date_default_timezone_set("Brazil/East"); //Definindo timezone padrão
 
      $ext = strtolower(substr($_FILES['fileUpload']['name'],-4)); //Pegando extensão do arquivo
      $new_name = $conta . $ext; //Definindo um novo nome para o arquivo
      $dir = 'uploads/'; //Diretório para uploads
 
      move_uploaded_file($_FILES['fileUpload']['tmp_name'], $dir. $new_name); //Fazer upload do arquivo
   }



//Gravando no banco de dados !

$sql = "INSERT INTO operacao (conta_corrente, valor, tipo, data, finalidade, gerente) VALUES ('$conta', '$valor', '$tipo', '$data', '$finalidade', '$logado')";
mysql_query($sql, $id) or die (mysql_error());
 

?>
<br> 
<aside width="100%" height="40px" background-color="#ededed">
	<? echo "Seu cadastro foi realizado com sucesso!"; ?>
</aside>
<a href="operacao.php">click para cadastrar outra OPERAÇÃO</a> <br>
<a href="inicio.php">click para voltar para o início da página</a>
<?php include('footer.php'); ?>