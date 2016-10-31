<?php include('header.php') ?>
<section class="pagina_ata">

  <img src="img/logo_unicred.png" width="300px" height="60px"><br>
<?php



$dataini = (string) $_GET['dataini'];


  //Pegando as propostas

      require_once 'bdconexao.php';

      //Consultar Presentes na Reunião
      $sql_participantes = "SELECT * FROM  listagem_presentes WHERE data = '$dataini'";
      $res_participantes = mysql_query($sql_participantes, $id) or die (mysql_error());
      
      //Consultar Faltosos da Reunião
      $sql_faltosos = "SELECT * FROM  justificar_faltas WHERE data = '$dataini'";
      $res_faltosos = mysql_query($sql_faltosos, $id) or die (mysql_error());

//Esse código é necessário para pegar a data atual e diminuir um dia.
$datas = explode("-", $dataini);
$numero = 1;
$dia_menor = (string)$datas[2] - $numero;
if ($datas[2] <= 9) {
  $dia_menor2 = str_pad($dia_menor, 2, '0', STR_PAD_LEFT);
}

$data_real = $datas[0]."-".$datas[1]."-".$dia_menor2 ;



      //Consultar abertura de conta
      $sql_abertura = "SELECT * FROM  propostas WHERE data >= '$data_real' and data <= '$dataini'";
      $res_abertura = mysql_query($sql_abertura, $id) or die (mysql_error());

      //Consultar operações de crédito
      $sql_operacao = "SELECT * FROM  operacao WHERE data >= '$data_real' and data <= '$dataini'";
      $res_operacao = mysql_query($sql_operacao, $id) or die (mysql_error());

      //Consultar assuntos diversos
      $sql_diversos = "SELECT * FROM  diversos WHERE data >= '$data_real' and data <= '$dataini'";
      $res_diversos = mysql_query($sql_diversos, $id) or die (mysql_error());

      //Consultar Votações de propostas de abertura de conta
      $sql_votacao = "SELECT DISTINCT * 
      FROM  `status_aprovacao` 
      WHERE  data >= '$dataini' and tipo = 'proposta' and posicao = 'favorável' GROUP BY id_proposta
      ORDER BY  `id_proposta` ASC";
      $res_votacao = mysql_query($sql_votacao, $id) or die (mysql_error());

      //Consultar Votações de operação de crédito
      $sql_votacao_operacao = "SELECT DISTINCT * 
      FROM  `status_aprovacao` 
      WHERE  data >= '$dataini' and tipo = 'operacao' and posicao = 'favorável' GROUP BY id_proposta
      ORDER BY  `id_proposta` ASC";
      $res_votacao_operacao = mysql_query($sql_votacao_operacao, $id) or die (mysql_error());

      //consultando numeração da ata
      $consulta = "SELECT * FROM  numero_ata WHERE data = '$dataini'";
      $res_consulta = mysql_query($consulta, $id) or die (mysql_error());
   


echo "





<b>ATA DE NÚMERO "; while($row_consulta = mysql_fetch_array($res_consulta)) {    

        echo $row_consulta['numero_da_ata'];
         } echo "</b><br>
<b>COMITÊ DE CRÉDITO DA UNICRED CENTRO PARAIBANA</b><br>
<b>Campina Grande $dataini</b>

<hr width='100%'>

<b>Data: </b>$dataini | 
<b>Local: </b>Sala de Reunião |
<b>Coordenador da Reunião: </b>Rubens Reinaldo

<hr width='100%'>


Os objetivos desta reunião é aprovar ou desaprovar algumas propostas de abertura de conta, e algumas operações 
de crédito, além de discutir sobre diversos assuntos de cunho gerencial. Estiveram presentes na reunião em questão os gerentes 

";
      while($row_participantes = mysql_fetch_array($res_participantes)) {
        $contador = 0;
        // Escreve dados da pessoa
        //$strLink = "<a href = 'visualisarproposta.php?id=". urlencode($row['id'])."'> " . $row['nome'] . "</a>";
        $lista = array($contador => $row_participantes['nome']);
        $contador = $contador + 1;


   
      echo strtoupper("<b>".$lista[0].", </b>");

        }     
    

echo "os demais ";
      while($row_faltosos = mysql_fetch_array($res_faltosos)) {
       

        //$strLink = "<a href = 'visualisarproposta.php?id=". urlencode($row['id'])."'> " . $row['nome'] . "</a>";
        echo $row_faltosos["justificativa"].". ";
    

        } 

echo "As propostas de abertura de conta foram ";

      while($row_abertura = mysql_fetch_array($res_abertura)) {
        //$strLink = "<a href = 'visualisarproposta.php?id=". urlencode($row['id'])."'> " . $row['nome'] . "</a>";
        echo "<b>Nome: </b>". strtoupper($row_abertura["nome"].", ");
        echo "<b>Cpf/cnpj: </b>".strtoupper($row_abertura["cpf_cnpj"].", ");
        echo "<b>Lançado(s) por: </b>".strtoupper($row_abertura["gerente"]."; ");
       

      } 


echo " Tiveram também operações de crédito a serem avaliadas, foram elas: ";

      while($row_operacao = mysql_fetch_array($res_operacao)) {
        //$strLink = "<a href = 'visualisarproposta.php?id=". urlencode($row['id'])."'> " . $row['nome'] . "</a>";
        echo "<b>conta: </b>". $row_operacao["conta_corrente"].", ";
        echo "<b>Valor: </b>"."R$ ".$row_operacao["valor"].", ";
        echo "<b>Tipo da Operação: </b>".strtoupper($row_operacao["tipo"].", ");
        echo "<b>Lançado por: </b>".strtoupper($row_operacao["gerente"]."; ");
       

      } 


echo "Foram conversados alguns assuntos diversos, são eles ";

      while($row_diversos = mysql_fetch_array($res_diversos)) {

         if (empty($row_diversos)) {
            echo "Sem assuntos diversos";
            die;
          }else {
        //$strLink = "<a href = 'visualisarproposta.php?id=". urlencode($row['id'])."'> " . $row['nome'] . "</a>";
        echo "<b>Assuntos: </b>". $row_diversos["assuntos"].", ";
        echo "<b>Comentários: </b>".$row_diversos["comentarios"].", ";
        echo "<b>Lançado por: </b>".$row_diversos["gerente"]."; ";
        }
       

      } 



echo ". As propostas de abertura de conta foram aprovadas pelos gerentes listados: ";

  ?>
<!--Aqui é consultado as aberturas de conta que foram votadas, e é retornado o nome dos gerentes que votaram -->

<?php
     
      while($row_votacao = mysql_fetch_array($res_votacao)) {

      
          $id_proposta = $row_votacao["id_proposta"];
          $tipo = $row_votacao["tipo"];
          $nome = $row_votacao["nome"];
          $posicao = $row_votacao["posicao"];
          $gerente = $row_votacao["gerente"];

       
          //echo $row_votacao["nome"];
          echo $tipo;
          echo " de " ;
          echo "<b>".$nome."</b>";
          echo " aprovada(s) por ";


      //Consultar gerentes que aprovaram alguma proposta na Reunião
      $sql_gerentes = "SELECT * FROM  status_aprovacao WHERE data = '$dataini' and posicao = 'favorável'
      and id_proposta = '$id_proposta' GROUP BY id_proposta";
      $res_gerentes = mysql_query($sql_gerentes, $id) or die (mysql_error());

    while($row_gerentes = mysql_fetch_array($res_gerentes)) {
        $contador = 0;
        // Escreve dados da pessoa
        //$strLink = "<a href = 'visualisarproposta.php?id=". urlencode($row['id'])."'> " . $row['nome'] . "</a>";
        $lista_gerentes = array($contador => $row_gerentes['gerente']);
        $contador = $contador + 1;


   
      echo strtoupper("<b>".$lista_gerentes[0].", </b>");

        }
 } 
?>
<!--Aqui é consultado as operações de crédito que foram votadas, e é retornado o nome dos gerentes que votaram -->

<?php
     echo ". As operações de crédito foram aprovadas pelos gerentes listados: ";
   

      while($row_votacao_operacao = mysql_fetch_array($res_votacao_operacao)) {

        
          $id_proposta_operacao = $row_votacao_operacao["id_proposta"];
          $tipo_operacao = $row_votacao_operacao["tipo"];
          $nome_operacao = $row_votacao_operacao["nome"];
          $posicao_operacao = $row_votacao_operacao["posicao"];
          $gerente_operacao = $row_votacao_operacao["gerente"];

       
          //echo $row_votacao["nome"];
          echo $tipo_operacao;
          echo " de " ;
          echo "<b>".$nome_operacao."</b>";
          echo " aprovada(s) por ";



      //Consultar gerentes que aprovaram alguma proposta na Reunião
      $sql_gerentes_operacao = "SELECT * FROM  status_aprovacao WHERE data = '$dataini' and posicao = 'favorável'
      and id_proposta = '$id_proposta_operacao' GROUP BY id_proposta";
      $res_gerentes_operacao = mysql_query($sql_gerentes_operacao, $id) or die (mysql_error());

    while($row_gerentes_operacao = mysql_fetch_array($res_gerentes_operacao)) {
        $contador_operacao = 0;
        // Escreve dados da pessoa
        //$strLink = "<a href = 'visualisarproposta.php?id=". urlencode($row['id'])."'> " . $row['nome'] . "</a>";
        $lista_gerentes_operacao = array($contador_operacao  => $row_gerentes_operacao['gerente']);
        $contador_operacao = $contador_operacao + 1;


   
      echo strtoupper("<b>".$lista_gerentes_operacao[0].", </b>");

        }
 } 
?>

<?php  
echo "<br><br><br>";
echo "<aside class='esquerda'>_______________________________<br>
 Rubens Reinaldo Barreto Filho<br></aside>";

echo "<aside class='direita'>_______________________________<br>";
echo "Antônio Luiz de Franca Neto<br></aside>";

echo "<aside class='esquerda'>_______________________________<br>";
echo "renato Sátiro<br></aside>";

echo "<aside class='direita'>_______________________________<br>";
echo "Erika Pachu<br></aside>";

echo "<aside class='esquerda'>_______________________________<br>";
echo "Moacir Brasil<br></aside>";

echo "<aside class='direita'>_______________________________<br>";
echo "jonate Maciel<br></aside>";

echo "<aside class='esquerda'>_______________________________<br>";
echo "Vânia Pedrosa<br></aside>";

echo "<aside class='direita'>_______________________________<br>";
echo "Amanda Gomes<br></aside>";

echo "<aside class='esquerda'>_______________________________<br>";
echo "Erick Morais<br></aside>";

echo "<aside class='direita'>_______________________________<br>";
echo "Gedeon Vitorio<br></aside>";

?>
<br><br><br><br><br><br><br><br><br><br><br><br>
<!--
  <table class="tabela" border="1" width="600px">
     <td><b>Nome  ou Conta</b></td>
     <td><b>Tipo</b></td>
     <td><b>Gerente</b></td>
     <td><b>Posição</b></td>
<?php
     // while($row_votacao = mysql_fetch_array($res_votacao)) {
      
    
       
?>
        <tr>
        <td><?php // echo $row_votacao["nome"]; ?></td>
        <td><?php // echo $row_votacao["tipo"]; ?></td>
        <td><?php  //echo $row_votacao["gerente"]; ?></td>
        <td><?php  //echo $row_votacao["posicao"];  ?></td>
        </tr>
     <?php   ?>
</table>
-->

<br><br><form>
<input type='button' class='botaoimprimir' name='imprimir' value='Imprimir' onclick='window.print()';>
</form>



<a href="javascript:window.history.go(-1)">Voltar</a>
</section>
<?php include('footer.php') ?>