<html>
        <head>
            <title>Excluir o Administrador</title>
        </head>
        <body>
            <h1>Excluir o Administrador</h1>
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

            //coleta os dados do adm

            $id = $_GET["id"];

            //realiza uma query sql para buscar o adm que tem o email e a senha passado 
            $admin = $pdo->query("SELECT * FROM ADMINISTRADOR WHERE ADM_ID=" . $id)->fetch();

            //se o retorna for vazio 0 , entao a senha ou email estao incorretos

            $nome = $admin["ADM_NOME"];
            $email = $admin["ADM_EMAIL"];
            $ativo = $admin["ADM_ATIVO"];
        ?>

            <Form Action="../excluirproc/excluirprocessamento_adm.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $id ?>">
                <br>
                Nome : 
                <input type="text" name="nome" value="<?php echo $nome ?>">
                <br>
                Email : 
                <input type="text" name="email" value="<?php echo $email ?>">
                <br>
                ATIVO :
                <input type="checkbox" id="ativo" name="ativo" value="1" checked>
                <br>
                <input type="submit" value="Enviar"> 
            </Form>
        </body>
        </html>