<?php
 require_once "../function/verificar.php";

 $nome = $_POST["nome"];
 $desc = $_POST["descricao"];

//captura o vaor das variaves
        /*if($_POST["nome"] == "" || $_POST["descricao"] == "" || $_POST["descricao"] == "" || $_POST["nome"] == "" ){
            header ('Location: ../categoria_erro.php');
        }else{
            $nome = $_POST["nome"];
            $desc = $_POST["descricao"];
*/
        //monta o comando da inserçao
        $query_categoria_pes = "SELECT CATEGORIA_ID FROM CATEGORIA WHERE CATEGORIA_NOME= :nome LIMIT 1";
        $resultado_categoria =$pdo->prepare($query_categoria_pes);
        $resultado_categoria->bindParam(':nome', $_POST['nome'],PDO::PARAM_STR);
        $resultado_categoria->execute();

        if(($resultado_categoria) and ($resultado_categoria->rowCount() != 0)){
           
        }else{
        $cmdtext = "INSERT INTO CATEGORIA (CATEGORIA_NOME, CATEGORIA_DESC) VALUES ('" . $nome . "','" . $desc . "')";
        $cmd = $pdo->prepare($cmdtext);

        //execute o comando e verifique se teve sucesso

        $status = $cmd->execute();
        }
        if($status){
            $_SESSION['msg'] =" <div class='alert alert-success'>
                                Categoria cadastrada!
                                </div>";
                    header('Location: ../categoria.php');
        } else {
            $_SESSION['msg'] =" <div class='alert alert-danger'>
                                categoria ja existe !!
                                </div>";
            header('Location: ../categoria.php');
        }

        ?>