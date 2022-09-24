<?php
 require "../function/verificar.php";

//captura o vaor das variaves
        if($_POST["nome"] == "" || $_POST["desc"] == "" || $_POST["desc"] == "" || $_POST["nome"] == "" ){
            header ('Location: ../categoria_atualizar_erro.php');
        }else{
            $nome = $_POST["nome"];
            $desc = $_POST["desc"];
            $id = $_POST["id"]; 

         $admin = $pdo->query("UPDATE CATEGORIA SET CATEGORIA_NOME= '$nome' , CATEGORIA_DESC= '$desc' WHERE CATEGORIA_ID= '$id'")->fetchAll();

        }if ( count($admin) == 0) {
             echo "<script>location.href='../categoria.php'</script>";
        } else { 
           echo "erro";
        }
?>