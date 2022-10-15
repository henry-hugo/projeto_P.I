<?php
require '../function/verificar.php';
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
 $senha = $_POST["senha"];
 $cpf =$_POST["cpf"];
 $id = $_POST["id"];

 //realiza uma query sql para buscar o adm que tem o email e a senha passado pelo usuario

 $admin = $pdo->query("UPDATE USUARIO SET USUARIO_NOME= '$nome' , USUARIO_EMAIL= '$email' , USUARIO_SENHA= '$senha' ,USUARIO_CPF= '$cpf' WHERE USUARIO_ID= '$id'")->fetchAll();

 if ( count($admin) == 0) {
    echo "<script>location.href='../tables.php'</script>";
} else { 
    echo "erro";
}

if(isset($_SESSION['iduser']) && !empty($_SESSION['iduser'])): ?>
    <?php else: header ("Location:../../loginadministrador.php"); endif?>
?>