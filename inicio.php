<?php 

if (isset($_SESSION["login"])) {
    header("Location: index.php?erro=1");
} 


else {
session_start(); // Inicia a sessão
$logado = $_SESSION['login'];
$perfil = $_SESSION['tipo'];

    include('header.php');

?>


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

	<h2>Seja bem vindo, <?php echo $logado; ?></h2>

	


<?php 
include('footer.php') 

?>

<?php } ?>