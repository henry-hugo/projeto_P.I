<?php
   
  require "conexao.php";
  if(isset($_SESSION['iduser']) && !empty($_SESSION['iduser'])){
    require_once 'adm_class.php';
    $u = new ADMINISTRADOR();

    $listlogged =$u->logged($_SESSION['iduser']);

   $nomeuser = $listlogged['ADM_NOME'];
  }else{
    $_SESSION['msg'] =" <div class='alert alert-danger'>
                         Faça o login para acessar esse site !!
                        </div>";
    header('Location:loginadministrador.php');
    exit();
  } 
  ?>