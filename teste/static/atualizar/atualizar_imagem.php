<?php

require '../function/verificar.php';

$ordem = $_POST["imagem_ordem"];
$imagem_url = $_POST["imagem_url"];
$id =$_POST["id"];


$admin = $pdo->query("UPDATE PRODUTO_IMAGEM  SET IMAGEM_URL='$imagem_url', IMAGEM_ORDEM='$ordem'  WHERE IMAGEM_ID= $id")->fetchAll();

if ( count($admin) == 0) {
    $_SESSION['msg'] =" <div class='alert alert-success'>
    imagem atualizada com sucesso!
    </div>";
    header('Location: ../produto.php');
    } else { 
    echo "erro";
    }

if(isset($_SESSION['iduser']) && !empty($_SESSION['iduser'])): ?>
    <?php else: header ("Location:../loginadministrador.php"); endif?>