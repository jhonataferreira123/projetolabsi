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

	<h2>Chamada do dia</h2>
	
	<form class="form" method="POST" action="cadastrandopresentes.php">
		
		<p class="data">
			<?php
			//pegando a hora e data atual
			date_default_timezone_set('America/Recife');
			$date = date('d-m-Y H:i');
			?>

			 <label for="data">Data: <?php echo $date; ?></label>
	
			
		</p><br>


  
        <fieldset>
                <legend>Quem está presente a reunião?</legend>

                <!-- Pac SEDE -->
                        
                        <input type="checkbox" id="5" name="presentes[]" value="Rubens Reinaldo" />Rubens Reinaldo <br>
                        <input type="checkbox" id="1" name="presentes[]" value="Renato Sátiro "/>Renato Sátiro <br />
                        <input type="checkbox" id="2" name="presentes[]" value="Amanda Di Pace" />Amanda Di Pace<br />
                        <input type="checkbox" id="3" name="presentes[]" value="Erick Morais" />Erick Morais<br />
                        <input type="checkbox" id="4" name="presentes[]" value="Gedeon Vitorio" />Gedeon Vitorio<br />
                        <input type="checkbox" id="5" name="presentes[]" value="Erika Pachu" />Erika Pachu<br />
                        <input type="checkbox" id="5" name="presentes[]" value="Moacir Brasil" />Moacir Brasil<br />
                        <input type="checkbox" id="5" name="presentes[]" value="Antônio Luiz França" />Antônio Luiz França<br />
                <!-- Pac Prata -->

                        <input type="checkbox" id="1" name="presentes[]" value="Maria Rosivânia"/>Maria Rosivânia <br/>
                        <input type="checkbox" id="2" name="presentes[]" value="Jonate Maciel" />Jonate Maciel<br>

                <!-- Justificativa -->
                <legend>Justificativas</legend>
                        <textarea type="text" id="5" name="justificativa" placeholder="Sem Justificativas"/>Sem Justificativas</textarea><br /><br />
                    
                        
        </fieldset>
        <br>

		
		<p class="submit">
			<input type="submit" value="Salvar" />
		</p>
	</form>

<?php include('footer.php') ?>