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
            
            $dsn = 'mysql:host=' . $mysqlhostname . ';dbname=' . $mysqldatabase . ';port' . $mysqlport; 
            $pdo = new PDO($dsn, $mysqlusername, $mysqlpassword);

            if(isset($_POST['email'])){
                $email = ($_POST['email']);
                $senha = ($_POST["senha"]);

                $sql_code ="SELECT * FROM ADMINISTRADOR WHERE ADM_EMAIL = '$email' ";
                $sql_exec =$pdo->query($sql_code) or die($pdo->error);

                $usuario = $sql_exec-> fetch();
                var_dump($usuario);
                    if (password_verify($senha, $usuario['ADM_SENHA'])) {
                        $senha_bd = $usuario['ADM_SENHA'] ;
                        require 'function/adm_class.php';

                        $u = new ADMINISTRADOR();
                        $email = addslashes($_POST["email"]);
                        $senha = ($_POST["senha"]);
        
                            if($u->login($email, $senha_bd) == true){
                                if(isset($_SESSION['iduser'])){
                                    header('Location: index.php');
                                exit();
                    }else{
                        header('Location: loginadministrador.php');
                    }
                    }else{
                        header('Location: loginadministrador.php');
                    }
                }else{
                    header('Location: loginadministrador.php');
            }
        }

                /*if(isset($_POST["email"]) && !empty($_POST["email"]) && isset($senha_bd) && !empty($senha_bd)) {

                require 'function/adm_class.php';

                $u = new ADMINISTRADOR();
                $email = addslashes($_POST["email"]);
                $senha = ($_POST["senha"]);

                    if($u->login($email, $senha) == true){
                        if(isset($_SESSION['iduser'])){
                            header('Location: index.php');
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
                }*/
                ?>