<?php
 require "../function/verificaratualizar.php";

//captura o vaor das variaves
            $nome = $_POST["nome"];
            $desc = $_POST["desc"];
            $id = $_POST["id"];
            if(isset($_POST["ativo"])){
                $ativo =$_POST['ativo'];
            }else{
                $ativo = 0;
            };

            /*$query_categoria_pes = "SELECT CATEGORIA_ID FROM CATEGORIA WHERE CATEGORIA_NOME= :nome LIMIT 1";
            $resultado_categoria =$pdo->prepare($query_categoria_pes);
            $resultado_categoria->bindParam(':nome', $_POST['nome'],PDO::PARAM_STR);
            $resultado_categoria->execute();*/

            if(($resultado_categoria) and ($resultado_categoria->rowCount() != 0)){
                $_SESSION['msg'] =" <div class='alert alert-warning'>
                                    Categoria ja existe!
                                    </div>";
                                header('Location: ../categoria.php');
            }else{
                $admin = $pdo->query("UPDATE CATEGORIA SET CATEGORIA_ATIVO= $ativo, CATEGORIA_NOME= '$nome' , CATEGORIA_DESC= '$desc'  WHERE CATEGORIA_ID= $id")->fetchAll();
            

            if ( count($admin) == 0) {
                $_SESSION['msg'] =" <div class='alert alert-success'>
                                    Categoria atualizada com sucesso!
                                    </div>";
                        header('Location: ../categoria.php');
            }
        }
        if(isset($_SESSION['iduser']) && !empty($_SESSION['iduser'])): ?>
            <?php else: header ("Location:../loginadministrador.php"); endif?>  
    ?>