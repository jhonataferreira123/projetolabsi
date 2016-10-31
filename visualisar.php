<?php include('header.php') ?>

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

$identicicador = $_GET['id'];


// Extrair dados de acordo com o id passado no URL
	$strSQL = "SELECT * FROM operacao WHERE id=".$identicicador;
	$rs = mysql_query($strSQL);

	// Loop pelo recordset $rs
	while($row = mysql_fetch_array($rs)) {
		// Escreve dados da pessoa
		echo "<b>Conta Corrente: </b>" . $row['conta_corrente']."<br><br>";
	

?>

<form method="POST" action="cadastrandovotacaoop.php">
  <aside class="informacoes">
 <b>Valor da Proposta: R$</b><?php  echo $row['valor'];  ?><br>
 <b>Lançado Por: </b><?php  echo $row['gerente'];  ?><br>

 

</aside>

<aside class="arquivo">
  <b>Resumo do cooperado: </b>
<embed src="http://10.83.48.10/gerentes/uploads/<?php  echo $row['conta_corrente'];  }?>.pdf" width="800" height="800" style="margin-top: 30px; margin-left: 50px;" >
</aside>



<br><br><br>
<a href="javascript:window.history.go(-1)">Voltar</a>

</form>


<?php include('footer.php') ?>