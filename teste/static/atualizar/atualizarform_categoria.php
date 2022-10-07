<?php
 require "../function/verificar.php";

//captura o vaor das variaves
            $nome = $_POST["nome"];
            $desc = $_POST["desc"];
            $id = $_POST["id"];
            if(isset($_POST["ativo"])){
                $ativo =$_POST['ativo'];
            }else{
                $ativo = 0;
            };
            
     
         $admin = $pdo->query("UPDATE CATEGORIA SET CATEGORIA_ATIVO= $ativo, CATEGORIA_NOME= '$nome' , CATEGORIA_DESC= '$desc'  WHERE CATEGORIA_ID= $id")->fetchAll();

        if ( count($admin) == 0) {
            $_SESSION['msg'] =" <div class='alert alert-success'>
                                Categoria atualizada com sucesso!
                                </div>";
                    header('Location: ../categoria.php');
        } else { 
           echo "erro";
        }
?>