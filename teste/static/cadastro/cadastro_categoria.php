<?php
 require "../function/verificar.php";

//captura o vaor das variaves
        if($_POST["nome"] == "" || $_POST["descricao"] == "" || $_POST["descricao"] == "" || $_POST["nome"] == "" ){
            header ('Location: ../categoria_erro.php');
        }else{
            $nome = $_POST["nome"];
            $desc = $_POST["descricao"];

        //monta o comando da inserçao
        $cmdtext = "INSERT INTO CATEGORIA (CATEGORIA_NOME, CATEGORIA_DESC) VALUES ('" . $nome . "','" . $desc . "')";
        $cmd = $pdo->prepare($cmdtext);

        //execute o comando e verifique se teve sucesso

        $status = $cmd->execute();
        }
        if($status){
            header ('Location: ../categoria.php');
        } else {
            echo "ocorreu um erro ";
        }

        ?>