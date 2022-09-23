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
            $admin = $pdo->query("SELECT * FROM USUARIO WHERE USUARIO_ID=" . $id)->fetch();

            //se o retorna for vazio 0 , entao a senha ou email estao incorretos

            $nome = $admin["USUARIO_NOME"];
            $email = $admin["USUARIO_EMAIL"];
            $senha = $admin["USUARIO_SENHA"];
            $cpf = $admin["USUARIO_CPF"];
        ?>

            <Form Action="atualizarform_usuario.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $id ?>">
                <br>
                Nome : 
                <input type="text" name="nome" value="<?php echo $nome ?>">
                <br>
                Email : 
                <input type="text" name="email" value="<?php echo $email ?>">
                <br>
                senha : 
                <input type="text" name="senha" value="<?php echo $senha ?>">
                <br>
                CPF : 
                <input type="text" name="cpf" pattern="(\d{3}\.?\d{3}\.?\d{3}-?\d{2})">
                <br>
                <input type="submit" value="Enviar"> 
            </Form>
        </body>
        </html>