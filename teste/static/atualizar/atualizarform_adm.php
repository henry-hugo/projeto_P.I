<?php
require "../function/conexao.php";

 //captura o post do usuario
 $nome = $_POST["nome"];
 $email = $_POST["email"];
 $senha = $_POST ["senha"];
 $hash = password_hash($senha, PASSWORD_DEFAULT);
 $id = $_POST["id"];
 if(isset($_POST["ativo"])){
    $ativo =$_POST['ativo'];
}else{
    $ativo = 0;
};

/*
$query_adm_pes = "SELECT ADM_ID FROM ADMINISTRADOR WHERE ADM_EMAIL= :email LIMIT 1";
$resultado_adm =$pdo->prepare($query_adm_pes);
$resultado_adm->bindParam(':email', $_POST['email'],PDO::PARAM_STR);
$resultado_adm->execute();*/

if(($resultado_adm) and ($resultado_adm->rowCount() != 0)){
    $_SESSION['msg'] =" <div class='alert alert-warning'>
                        email ja existe !!
                        </div>";
                        header('Location: ../adm.php');
}else{
 $admin = $pdo->query("UPDATE ADMINISTRADOR SET ADM_ATIVO= '$ativo', ADM_NOME= '$nome' , ADM_EMAIL= '$email' , ADM_SENHA= '$hash' WHERE ADM_ID= '$id'")->fetchAll();

 if ( count($admin) == 0) {
    $_SESSION['msg'] =" <div class='alert alert-success'>
    ADMINISTRADOR atualizado com sucesso!
    </div>";
    header('Location: ../adm.php');
} else { 
    echo "erro";
}
}
if(isset($_SESSION['iduser']) && !empty($_SESSION['iduser'])): ?>
    <?php else: header ("Location:../loginadministrador.php"); endif?>
?>