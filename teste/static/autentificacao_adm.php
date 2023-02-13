            <?php
            require_once "function/conexao.php";
        

           if (!empty($_POST['email'])) {
                //print_r($_POST);
                $secreta = "6Lfov2oiAAAAAJiCCVl9t_nCeOjuITbJVGlWm_HJ";
                $resposta = $_POST['g-recaptcha-response'];
                $url = "https://www.google.com/recaptcha/api/siteverify";
                $variaveis = "response=". $resposta ."&secret=".$secreta;

                $ch =curl_init($url);
                curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $variaveis);
                //curl_setopt($ch, CURLOPT_FOLL0WLOCATION, 1);
                curl_setopt($ch, CURLOPT_HEADER, 0);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                $respostas = curl_exec($ch);
                //var_dump($respostas);
                $respostas = json_decode($respostas);
                if ($respostas->success == 1) {
                    if(isset($_POST['email'])){
                        $email = ($_POST['email']);
                        $senha = ($_POST["senha"]);
        
                        $sql_code ="SELECT * FROM ADMINISTRADOR WHERE ADM_EMAIL = '$email'";
                        $sql_exec =$pdo->query($sql_code) or die($pdo->error);
                        $usuario = $sql_exec-> fetch();

                        //var_dump($usuario);
                        if ($usuario["ADM_ATIVO"] == 0) {
                            $_SESSION['msg'] =" <div class='alert alert-danger'>
                                                ADM INATIVO !!
                                                </div>";
                        header('Location: loginadministrador.php');
                        exit();
                        }
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
                                $_SESSION['msg'] =" <div class='alert alert-danger'>
                                                    email ou senha incorreta 
                                                    </div>";
                                header('Location: loginadministrador.php');
                            }
                            }else{
                                $_SESSION['msg'] =" <div class='alert alert-danger'>
                                                    email ou senha incorreta 
                                                    </div>";
                                header('Location: loginadministrador.php');
                            }
                        }else{
                            $_SESSION['msg'] =" <div class='alert alert-danger'>
                                                    email ou senha incorreta 
                                                    </div>";
                            header('Location: loginadministrador.php');
                    }
                }
                }
           }else{
            $_SESSION['msg'] =" <div class='alert alert-danger'>
                                email nao informado 
                                </div>";
                    header('Location: loginadministrador.php');
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