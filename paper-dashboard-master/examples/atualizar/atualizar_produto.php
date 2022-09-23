<?php

require '../conexao.php';


$nome = $_POST["nome"];
$preco = $_POST["preco"];
$desconto = $_POST["desconto"];
$desc = $_POST["desc"];
$categoria = $_POST["categoria"];
$id =$_POST["id"];
$quantidade = $_POST["quantidade"];
$ordem = $_POST["ordem"];
$imagem_url = $_POST["imagem_url"];
if(isset($_POST["ativo"])){
    $ativo =$_POST['ativo'];
}else{
    $ativo = 0;
};


$admin = $pdo->query("UPDATE PRODUTO  SET PRODUTO_NOME= '$nome' , PRODUTO_PRECO= '$preco' , PRODUTO_DESCONTO= '$desconto', PRODUTO_DESC= '$desc', CATEGORIA_ID= '$categoria'   WHERE PRODUTO_ID= '$id'")->fetchAll();
$admin1 = $pdo->query("UPDATE PRODUTO_ESTOQUE  SET PRODUTO_QTD='$quantidade' WHERE PRODUTO_ID= '$id'")->fetchAll();
$admin2 = $pdo->query("UPDATE PRODUTO_IMAGEM  SET IMAGEM_URL='$imagem_url', IMAGEM_ORDEM='$ordem'  WHERE PRODUTO_ID= '$id'")->fetchAll();
if ( count($admin) == 0) {
echo "<script>location.href='../user.php'</script>";
} else { 
echo "erro";
}
?>