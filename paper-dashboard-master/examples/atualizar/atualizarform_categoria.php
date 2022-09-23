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
 $desc = $_POST["desc"];
$id = $_POST["id"]; 
 //realiza uma query sql para buscar o adm que tem o email e a senha passado pelo usuario

 $admin = $pdo->query("UPDATE CATEGORIA SET CATEGORIA_NOME= '$nome' , CATEGORIA_DESC= '$desc' WHERE CATEGORIA_ID= '$id'")->fetchAll();

 if ( count($admin) == 0) {
    echo "<script>location.href='../user.php'</script>";
} else { 
    echo "erro";
}
?>