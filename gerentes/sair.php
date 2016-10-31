<?
if (!isset($_SESSION["login"])) {
    header("Location: index.php?erro=1");
} 
        
        $des = session_destroy();
        
        if($des) {
        echo "<meta HTTP-EQUIV = 'Refresh' Content = '0;URL =index.php'>";
        
        }

?>