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

	<h2>Cadastrar Assuntos Diversos</h2>
	
	<form class="form" method="POST" action="cadastrandodiversos.php">
		
		<p class="data">
			<?php
			//pegando a hora e data atual
			date_default_timezone_set('America/Sao_Paulo');
			$date = date('d-m-Y H:i');
			?>

				<label for="data">Data: <?php echo $date; ?></label>
			
			
		</p><br>
		
		<p class="assuntos">
			<label for="assuntos">Assuntos:</label>
			<input class="input" type="text" name="assuntos" id="assunto" placeholder="separe-os por ponto e virg." required/>
			
		</p><br>
		
		<p class="comentarios">
			<label for="comentarios">Comentários</label>
			<textarea rows="4" cols="150" type="text" name="comentarios" id="nome" placeholder="insira os comentários aqui..." required/></textarea>
			
		</p><br>

		
		<p class="submit">
			<input type="submit" value="Cadastrar" />
		</p>
	</form>

<?php include('footer.php') ?>