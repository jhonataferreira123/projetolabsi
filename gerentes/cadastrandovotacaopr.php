<?php 

session_start($login); // Inicia a sessão
$logado = $_SESSION['login'];
$tipo = $_SESSION['tipo'];

if (!isset($_SESSION["login"])) {
    header("Location: index.php?erro=1");
} 
else {
    include('header.php');

$logado = $_SESSION['login'];
// RECEBENDO OS DADOS PREENCHIDOS DO FORMULÁRIO !

//Pegando a data e hora atual
require_once 'bdconexao.php';

	
			//pegando a hora e data atual
			date_default_timezone_set('America/Sao_Paulo');
			$date = date('Y-m-d');
			

$identicicador = $_POST['identificador'];
$tipo = $_POST['tipo'];	//atribuição do campo "cnpj" vindo do formulário para variavel
$justificativa	= $_POST['justificativa'];	//atribuição do campo "nome" vindo do formulário para variavel
$nome = $_POST['nome'];

//Gravando no banco de dados !
$operacao = "proposta";
$sql = "INSERT INTO status_aprovacao (tipo, id_proposta, gerente, posicao, justificativa, nome, data) VALUES ('$operacao', '$identicicador', '$logado', '$tipo', '$justificativa', '$nome', '$date')";
mysql_query($sql, $id) or die (mysql_error());

 
echo "Votação Concluída com Sucesso"."<br>";
echo "<button onclick='redirecionarop();''>Clique para voltar</button>";



include_once "footer.php";


?>
<?php }?>


