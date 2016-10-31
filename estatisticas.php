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



<!-- Fecha Menu -->

	<h2>Relatórios</h2>
	
	<form class="form" method="GET" action="relatorio.php">
		
		<p class="data">
			<?php
			//pegando a hora e data atual
			date_default_timezone_set('America/Recife');
			$date = date('d-m-Y H:i');
			?>

			 <label for="data">Data: <?php echo $date; ?></label>
	
			
		</p><br>


<?php


$tipo = $_GET['valor'];

if ($tipo == "ata") {
  header("Location: ata.php");
} else{

$dataini = (string) $_GET['dataini'];
$datafim = (string) $_GET['datafim'];

  //Pegando as propostas
      require_once 'bdconexao.php';
      $sql = "SELECT * FROM $tipo WHERE data >= '$dataini' AND data <= '$datafim'";
      $res = mysql_query($sql, $id) or die (mysql_error());
      $quantidade = mysql_num_rows($res);


echo "  <h4>Relatório de " .$dataini. " à " . $datafim . "</h4>";
echo "<b>Quantidade Total de Registros: </b>" . $quantidade . "<br><br>";
echo "<form>";
echo "<input type='button' class='botaoimprimir' name='imprimir' value='Imprimir' onclick='window.print();''>";
echo "</form><br><br>";



      // Loop pelo recordset $rs
 
        while($row = mysql_fetch_array($res)) {

        if ($tipo == "propostas") {
          if (empty($row)) {
            echo "Não encontradas";
            die;
          } else {
            // Escreve dados da pessoa
              //$strLink = "<a href = 'visualisarproposta.php?id=". urlencode($row['id'])."'> " . $row['nome'] . "</a>";
              echo "<b>Data do Lançamento: </b>" . $row['data'] . "<br>";
              echo "<b>Nome: </b>" . $row['nome'] . "<br>";
              echo "<b>Cpf/Cnpj: </b>" . $row['cpf_cnpj'] . "<br>";
              echo "<b>Lançado por: </b>" . $row['gerente'] . "<br>";
              echo "<hr>";

          
            }
        } if ($tipo == "operacao"){
             if (empty($row)) {
            echo "Não encontradas";
            die;
          } else {
            // Escreve dados da pessoa
              $strLink = "<a href = 'visualisar.php?id=". urlencode($row['id'])."'> " . $row['conta_corrente'] . "</a>";
              echo "<b>Conta Corrente: </b>" . $strLink . "<br>";
              echo "<b>Data do Lançamento: </b>" . $row['data'] . "<br>";
              echo "<b>Valor da Operação: R$</b>" . $row['valor'] . "<br>";
              echo "<b>Tipo da Operação: </b>" . $row['tipo'] . "<br>";
              echo "<b>Lançado por: </b>" . $row['gerente'] . "<br>";
              echo "<b>Finalidade: </b>" . $row['finalidade'] . "<br>";
              echo "<hr>";

            }
        }
         if ($tipo == "listagem_presentes"){
             if (empty($row)) {
            echo "Não encontradas";
            die;
          } else {
            // Escreve dados da pessoa              
              echo "<b>Nome: </b>" . $row['nome'] . "<br>";          
            }

            //Imprimindo as Justificativas

           
         

          }



      
         
        

     

        

}



}
?>
	</form>

<?php include('footer.php') ?>