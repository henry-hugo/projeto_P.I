<?php
     require "../function/verificaratualizar.php";

        //captura o vaor das variaves
        $nome = $_POST["nome"];
        $email = $_POST["email"];
        $senha = $_POST["senha"];
        if(isset($_POST["ativo"])){
            $ativo =$_POST['ativo'];
        }else{
            $ativo = 0;
        }
        


        $hash = password_hash($senha, PASSWORD_DEFAULT);

        //validar se tem adm
        $query_adm_pes = "SELECT ADM_ID FROM ADMINISTRADOR WHERE ADM_EMAIL= :email LIMIT 1";
        $resultado_adm =$pdo->prepare($query_adm_pes);
        $resultado_adm->bindParam(':email', $_POST['email'],PDO::PARAM_STR);
        $resultado_adm->execute();

        if(($resultado_adm) and ($resultado_adm->rowCount() != 0)){
            $_SESSION['msg'] =" <div class='alert alert-warning'>
                                email ja existe !!
                                </div>";
                                header('Location: ../adm.php');
                                exit();
        }else{
             // monta o comando da inserçao
            $cmdtext = "INSERT INTO ADMINISTRADOR (ADM_NOME, ADM_EMAIL, ADM_SENHA, ADM_ATIVO) VALUES ('" . $nome . "','" . $email . "','" . $hash . "','" . $ativo . "')";
            $cmd = $pdo->prepare($cmdtext);

            //execute o comando e verifique se teve sucesso

            $status = $cmd->execute();
            if($status){
                $_SESSION['msg'] =" <div class='alert alert-success'>
                                     ADMINISTRADOR cadastrado com sucesso!
                                    </div>";
                                    header('Location: ../adm.php');
                                    exit();
            } else {
                $_SESSION['msg'] =" <div class='alert alert-danger'>
                ERRO:ADMINISTRADOR nao pode ser cadastrado !!
               </div>";
               header('Location: ../adm.php');
               exit();
            }
        }
       

        ?>
