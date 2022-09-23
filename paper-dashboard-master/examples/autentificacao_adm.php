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
            session_start();
            global $pdo;
            try{
            $dsn = 'mysql:host=' . $mysqlhostname . ';dbname=' . $mysqldatabase . ';port' . $mysqlport; 
            $pdo = new PDO($dsn, $mysqlusername, $mysqlpassword);
        
            }catch(PDOException $e){
                echo "erro : ".$e->getMessage();
                exit;
            }

            //captura o post do usuario
        if (isset($_POST["email"]) && !empty($_POST["email"]) && isset($_POST["senha"]) && !empty($_POST["senha"])) {

            require 'adm_class.php';

            $u = new ADMINISTRADOR();
            $email = addslashes($_POST["email"]);
            $senha = addslashes($_POST["senha"]);

            if($u->login($email, $senha) == true){
                if(isset($_SESSION['iduser'])){
                    header('Location: dashboard.php');
                exit();

                }else{
                    header('Location: loginadministrador.php');
                exit();
                };

            }else{
                header('Location: loginadministrador.php');
                exit();
            };
 
              
        }else{
            header('Location: loginadministrador.php');
                exit();
        }
            ?>
        </body>
        </html>  