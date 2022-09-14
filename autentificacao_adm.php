<html>
        <head>
            <title>Login - Autenticacao</title>
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

            //captura o post do usuario
            $email = $_POST["email"];
            $senha = $_POST["senha"];
        
            //realiza uma query sql para buscar o adm que tem o email e a senha passado pelo usuario

            $admin = $pdo->query("SELECT * FROM ADMINISTRADOR WHERE ADM_EMAIL='" . $email . "' AND ADM_SENHA='" . $senha . "'")->fetchAll();

            //Se o retorna for vazio (0), então a senha ou email estão incorretos
            if ( count($admin) == 0) {
                echo "Usuario ou senh invalidos";
        
            } else { 
                header('Location: http://localhost:8080/projeto_P.I/paper-dashboard-master/examples/dashboard.php');
                exit();
            }
            ?>
        </body>
        </html>  