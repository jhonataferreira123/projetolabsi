<?php 

session_start($login); // Inicia a sessão
$logado = $_SESSION['login'];
$perfil = $_SESSION['tipo'];

if (!isset($_SESSION["login"])) {
    header("Location: index.php?erro=1");
} 
include('header.php') ?>


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

	<h2>Votação de Operações</h2>

	

		<form class="navbar-form navbar-left" role="search" method="GET" action="identificacaooperacao.php">
		<p class="data">
			<?php
			//pegando a hora e data atual
			date_default_timezone_set('America/Sao_Paulo');
			$date = date('d-m-Y H:i');
			?>

			<label for="data">Data: <?php echo $date; ?></label>
			
			
		</p><br>
		
			
	       <div class="form-group">
	        <input type="date" name="data" class="data" size="10">
	       </div>
	         <button type="submit" class="btn btn-default">Buscar</button>

    

          	<br><br>

	
	</form>

<?php include('footer.php') ?>