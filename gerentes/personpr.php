<?php 

session_start($login); // Inicia a sessão
$logado = $_SESSION['login'];
$tipo = $_SESSION['tipo'];

if (!isset($_SESSION["login"])) {
    header("Location: index.php?erro=1");
} 
else {
    include('header.php');

?>


<body>

<!-- Menu -->
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

      <?php include('menu.php') ?>


    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<?php
require_once 'bdconexao.php';

$identicicador = $_GET["id"];
// Extrair dados de acordo com o id passado no URL
	$strSQL = "SELECT * FROM propostas WHERE id=".$identicicador;
	$rs = mysql_query($strSQL);

	// Loop pelo recordset $rs
	while($row = mysql_fetch_array($rs)) {
		// Escreve dados da pessoa
		$nome = $row['nome'];
	}

?>

<form method="POST" action="cadastrandovotacaopr.php">
<b>Conta Corrente: </b><input type="text" readonly="true" class="nome_identificador" name="nome" value="<?php echo "$nome"; ?>"/><br><br>
<b>Nº identificador: </b><input type="text" readonly="true" class="identificador" name="identificador" value="<?php echo "$identicicador"; ?>"/><br><br>
<input type="radio" id="1" name="tipo" value="favorável"/><b>Favorável </b><br />
<input type="radio" id="2" name="tipo" value="desfavorável" /><b>Desfavorável</b><br />
<h4>Justificativa</h4>
<textarea rows="4" cols="50" name="justificativa">justificativa Padrão</textarea>
<a href="javascript:window.history.go(-1)">Voltar</a>

<p class="submit">
	<input type="submit" value="Votar" />
</p>
</form>


<?php include('footer.php') ?>

<?php }?>