<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>categoria</title>
</head>
    <body>
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
        $desc = $_POST["descricao"];

        // monta o comando da inserçao
        $cmdtext = "INSERT INTO CATEGORIA (CATEGORIA_NOME, CATEGORIA_DESC) VALUES ('" . $nome . "','" . $desc . "')";
        $cmd = $pdo->prepare($cmdtext);

        //execute o comando e verifique se teve sucesso

        $status = $cmd->execute();
        if($status){
            echo "criaçao do usuario com sucesso";
        } else {
            echo "ocorreu um erro ";
        }

        ?>
</body>
</html>