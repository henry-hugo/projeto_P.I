<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>adm</title>
</head>
    <body>
        <br>
        <?php
        //dados para conexao ao mysql
        $mysqlhostname = "144.22.244.104";
        $mysqlport ="3306";
        $mysqlusername = "Bravo4Fun";
        $mysqlpassword = "Bravo4Fun";
        $mysqldatabase = "Bravo4Fun";

        //mostra a string de conexao ao mysql

        $dsn = 'mysql:host=' . $mysqlhostname . ';dbname=' . $mysqldatabase . ';port' . $mysqlport; 
        $pdo = new PDO($dsn, $mysqlusername, $mysqlpassword);

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
        // monta o comando da inserçao
        $cmdtext = "INSERT INTO ADMINISTRADOR (ADM_NOME, ADM_EMAIL, ADM_SENHA, ADM_ATIVO) VALUES ('" . $nome . "','" . $email . "','" . $hash . "','" . $ativo . "')";
        $cmd = $pdo->prepare($cmdtext);

        //execute o comando e verifique se teve sucesso

        $status = $cmd->execute();
        if($status){
            header ("Location: ../adm.php");
        } else {
            echo "ocorreu um erro ";
        }

        ?>
</body>
</html>