<?php

  require "conexao.php";
  if(isset($_SESSION['iduser']) && !empty($_SESSION['iduser'])){
    require_once 'adm_class.php';
    $u = new ADMINISTRADOR();

    $listlogged =$u->logged($_SESSION['iduser']);

   $nomeuser = $listlogged['ADM_NOME'];
  }else{
    header('Location:../loginadministrador.php');
    exit();
  } 


  ?>