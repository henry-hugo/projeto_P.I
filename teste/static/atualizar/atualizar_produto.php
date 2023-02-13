<?php

require "../function/verificaratualizar.php";

$nome = $_POST["nome"];
$preco = $_POST["preco"];
$desconto = $_POST["desconto"];
$desc = $_POST["desc"];
$categoria = $_POST["categoria"];
$id =$_POST["id"];
$quantidade = $_POST["quantidade"];
if(isset($_POST["ativo"])){
    $ativo =$_POST['ativo'];
}else{
    $ativo = 0;
};

$desc = trim($desc, "'");


$admin = $pdo->query("UPDATE  PRODUTO  SET PRODUTO_ATIVO = $ativo, PRODUTO_NOME= '$nome' , PRODUTO_PRECO= '$preco' , PRODUTO_DESCONTO= '$desconto', PRODUTO_DESC= '$desc', CATEGORIA_ID= '$categoria'   WHERE PRODUTO_ID= '$id'")->fetchAll();
$admin1 = $pdo->query("UPDATE PRODUTO_ESTOQUE  SET PRODUTO_QTD='$quantidade' WHERE PRODUTO_ID= '$id'")->fetchAll();
if ( count($admin) == 0) {
    $_SESSION['msg'] =" <div class='alert alert-success'>
    produto atualizada com sucesso!
    </div>";
    header('Location: ../produto.php');
    exit();

} else {
    $_SESSION['msg'] =" <div class='alert alert-danger'>
    ERRO: tente novamente !!
    </div>";
    header('Location: ../produto.php');
    exit();
} 
if(isset($_SESSION['iduser']) && !empty($_SESSION['iduser'])): ?>
    <?php else: header ("Location:../loginadministrador.php"); endif?>