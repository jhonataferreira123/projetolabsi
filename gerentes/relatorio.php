<?php 

if (isset($_SESSION["login"])) {
    header("Location: index.php?erro=1");
} 



session_start(); // Inicia a sessão
$logado = $_SESSION['login'];
$perfil = $_SESSION['tipo'];

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

        <?php 
      if ($perfil == "a") {
        include('menu.php');
      } else {
        include('menu2.php');
      }
      
     ?>


    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>



<!-- Fecha Menu -->

	<h2>Relatórios</h2>
	
	<form class="form" method="GET" action="estatisticas.php">
		
		<p class="data">
			<?php
			//pegando a hora e data atual
			date_default_timezone_set('America/Sao_Paulo');
			$date = date('d-m-Y H:i');
			?>

			 <label for="data">Data: <?php echo $date; ?></label>
	
			
		</p><br>


  
<div class="form-group">
  <label for="sel1">Selecione aqui o tipo de Relatório:</label>
  <select name="valor" class="form-control" id="sel1" >
    <option>Selecione</option>
    <option value="propostas">Aberturas Disponíveis</option>
    <option value="operacao">Operações Disponíveis</option>
    <option value="listagem_presentes">Listar Presentes</option>
  
  </select>

</div>
        <br>

        <h4>Data Inicial:</h4>
         <div class="form-group">
          <input required type="date" name="dataini" class="data" size="10">
         </div>
    

        <h4>Data Final:</h4>    
         <div class="form-group">
          <input required type="date" name="datafim" class="data" size="10">
         </div>
   

    

            <br><br>

		
		<p class="submit">
			<input type="submit" value="Gerar" />
		</p>
	</form>

<?php include('footer.php') ?>