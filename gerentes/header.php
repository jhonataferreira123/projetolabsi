<!DOCTYPE html>

<html>

<head>
	<title>..:SRG::.</title>
	
	<meta charset="utf-8" />
	
	
	<link rel="stylesheet" href="style.css" type="text/css" media="all" />
	<link href="css/bootstrap.min.css" rel="stylesheet">

	<script src="js/jquery.js"></script>

 	<!-- Script para data -->
	<script>
	$(document).ready(function() {
	 
	$('.date').click(function() {
	$('.data').get(0).type='date';
	$('.data').show();
	});
	 
	$('.data').change(function() {
	valor = $(this).val().split('-');
	$(this).get(0).type='text';
	$(this).val(valor[0]+"-"+valor[1]+"-"+valor[2]);
	});
	 
	});
	</script>

	<!-- Script para data -->

	<!-- Função de redirecionamento da votação-->
	<script type="text/javascript"> function redirecionar(){ alert("Votação concluída con sucesso"); window.history.go(-1); } </script>

	<script type="text/javascript"> function redirecionarop(){ alert("Você será redirecionado"); window.location="http://10.83.48.10/gerentes/votacaooperacao.php"; } </script>
	<script type="text/javascript"> function redirecionarpr(){ alert("Você será redirecionado"); window.location="http://10.83.48.10/gerentes/votacaoproposta.php"; } </script>

	
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>

    <!--Script para limitar somente a números -->
    <script type="text/javascript">
function frm_number_only_exc(){
	// allowed: numeric keys, numeric numpad keys, backspace, del and delete keys
	if ( event.keyCode == 37 || event.keyCode == 38 || event.keyCode == 39 || event.keyCode == 40 || event.keyCode == 46 || event.keyCode == 8 || event.keyCode == 9 || ( event.keyCode < 106 && event.keyCode > 95 ) ) { 
		return true;
	}else{
		return false;
	}
}

$(document).ready(function(){
						   
	$("input.frm_number_only").keydown(function(event) { 
 
        if ( frm_number_only_exc() ) { 
 
        } else { 
                if ( event.keyCode < 48 || event.keyCode > 57 ) { 
                        event.preventDefault();  
                }        
        } 
    }); 
	
});
</script>



</head>
<body>
