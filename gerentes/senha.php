<?php

 
// RECEBENDO OS DADOS PREENCHIDOS DO FORMULÁRIO !

$login = $_POST["login"];
$senha = $_POST["senha"];


if (empty($login) or empty($senha)) {
 
  header('location:index.php?error=2');

} 


  require_once 'bdconexao.php';

  $sql = "SELECT * FROM usuario WHERE login = '$login' AND senha = '$senha' ";
  $result = mysql_query($sql, $id) or die (mysql_error());

        while($row = mysql_fetch_array($result)) {
            $tipo = $row['tipo'];

        }


  $row = mysql_fetch_array($result);

  if(mysql_num_rows($result) > 0 ){ 

      session_start($login); // Inicia a sessão

      $_SESSION['login'] = $login;
      $_SESSION['tipo'] = $tipo;
      
        
      header('location:inicio.php'); 
    }

    else{
    unset ($_SESSION['login']);
    unset ($_SESSION['senha']);
   

   header('location:index.php?error=2');
  }
  









?> 

