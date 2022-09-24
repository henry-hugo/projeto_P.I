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
            $senha = $_POST["senha"];
            $id = $_POST["id"];
            if(isset($_POST["ativo"])){
                $ativo =$_POST['ativo'];
            }else{
                $ativo = 0;
            }

            //montar o comando da inserçao

            $admin = $pdo->query("UPDATE ADMINISTRADOR SET ADM_NOME= '$nome' , ADM_EMAIL= '$email' , ADM_SENHA= '$senha' , ADM_ATIVO= '$ativo' WHERE ADM_ID= '$id'")->fetchAll();

            if ( count($admin) == 0) {
               echo "<script>location.href='../tables.php'</script>";
           } else { 
               echo "erro";
           }
            ?>
        </body>
        </html>  