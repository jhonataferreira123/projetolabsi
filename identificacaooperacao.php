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

	<h2>Votação </h2>
	

  <?php
require_once 'bdconexao.php';


$data = (string) $_GET['data'];


if (empty($data)) {
   echo "Insira uma data específica"."<br>"; 
   echo "<a href=\"http://10.83.48.10/gerentes/votacaooperacao.php\">Voltar<a/>";
   die;
} else {

  //Pegando as propostas
   

      $sql = "SELECT * FROM operacao WHERE data = '$data'";
      $res = mysql_query($sql, $id) or die (mysql_error());

      // Loop pelo recordset $rs
       echo "<h2>Operação</h2>";
        while($row = mysql_fetch_array($res)) {


          if (empty($row)) {
            echo "Operação não encontradas";
            die;
          } else {
            // Escreve dados da pessoa
              $strLink = "<a href = 'personop.php?id=". urlencode($row['id'])."'> " . $row['conta_corrente'] . "</a>";
              echo "nome: " . $strLink . "<br>";
          
            }
         
        

        }

        

}
  //Pegando as operações
           

 



  ?>


<?php include('footer.php') ?>