       <html>
        <head>
            <title>Processamento de Exclusao de Administrador</title>
        </head>
        <body>
            <h1>Processamento de Exclusao de Administrador</h1>
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

            //capitura os valor das variaves 

            $nome = $_POST["nome"];
            $email = $_POST["email"];
            $id = $_POST["id"];

            //montar o comando da inserçao

            $cmdtext = "DELETE FROM ADMINISTRADOR WHERE ADM_ID=" .$id;
            $cmd = $pdo->prepare($cmdtext);
            
            // executa o comando e verifica se teve sucesso

            $status = $cmd->execute();
            if($status) {
                echo "Exclusão com sucesso!";
            } else {
                echo "Ocorreu um erro ao excluir!";
            }

            ?>
            <a href="listaradmins.php">Voltar para a Pagina de Lista</a>
        </body>
        </html>  