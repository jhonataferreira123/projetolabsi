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

	<h2>Cadastrar Operação</h2>
	
	<form class="form" enctype="multipart/form-data" method="POST" action="cadastrandooperacao.php">
		
		<p class="data">
			<?php
			//pegando a hora e data atual
			date_default_timezone_set('America/Sao_Paulo');
			$date = date('d-m-Y');
			?>

		  <label for="data">Data: <?php echo $date; ?></label>
		
			
		</p><br>
		
		<p class="assunto">
			<label for="conta">Conta Corrente:</label>
			<input class="input" type="text" maxlength="6" name="conta" id="conta" placeholder="digite a conta corrente..." required/>
			
		</p><br>
		
		<p class="detalhe">
			<label for="valor">Valor:</label>
			<label>R$</label><input class="input" type="text" name="valor" id="valor" placeholder="digite o valor da operação..." required/>
			
		</p><br>

     <legend>Anexar Resumo do cooperado</legend>
    <input type="file" name="fileUpload">

<br>
  
        <fieldset>
                <legend>Escolha o tipo da operação</legend>
                
                        <input type="radio" id="1" name="tipo" value="emprestimo"/>Emprestimo <br />
                        <input type="radio" id="2" name="tipo" value="financiamento" />Financiamento<br />
                        <input type="radio" id="3" name="tipo" value="cheque especial" />Cheque Especial<br />
                        <input type="radio" id="4" name="tipo" value="conta garantida" />Conta Garantida<br />
                        <input type="radio" id="5" name="tipo" value="desconto de cheque" />Desconto de Cheque<br />
                        
        </fieldset>
        <br>



        <legend>Finalidade</legend>

        <textarea type="text" id="5" name="finalidade" />Sem Finalidade</textarea>
        <br>

		
		<p class="submit">
			<input type="submit" value="Cadastrar" />
		</p>
	</form>

<?php include('footer.php') ?>