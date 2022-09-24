<?php
 //dados para conexao ao mysql
 $mysqlhostname = "144.22.244.104";
 $mysqlport ="3306";
 $mysqlusername = "Bravo4Fun";
 $mysqlpassword = "Bravo4Fun";
 $mysqldatabase = "Bravo4Fun";
 
 //mostra a string de conexao ao mysql

 $dsn = 'mysql:host=' . $mysqlhostname . ';dbname=' . $mysqldatabase . ';port' . $mysqlport; 
 $pdo = new PDO($dsn, $mysqlusername, $mysqlpassword);

 //captura o post do usuario
 $nome = $_POST["nome"];
 $email = $_POST["email"];
 $senha = $_POST ["senha"];
 $id = $_POST["id"];
$ativo = $_POST["ativo"];


 $admin = $pdo->query("UPDATE ADMINISTRADOR SET ADM_ATIVO= '$ativo', ADM_NOME= '$nome' , ADM_EMAIL= '$email' , ADM_SENHA= '$senha' WHERE ADM_ID= '$id'")->fetchAll();

 if ( count($admin) == 0) {
    echo "<script>location.href='../adm.php'</script>";
} else { 
    echo "erro";
}
?>