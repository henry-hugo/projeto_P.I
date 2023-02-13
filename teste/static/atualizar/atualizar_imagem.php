<?php

require "../function/verificaratualizar.php";
$idImagem = $_POST["id"]; 
$ImagemOrdem = $_POST["imagem_ordem"];  

//var_dump();


   //
    // Coloque aqui a chave do Serviço
    //
    $IMGUR_CLIENT_ID = "309e8da0e16e0ea";
      
    //
    // Se nao nenhum arquivo for selecionado, entao informa que precisa selecionar um 
    //
     if(empty($_FILES["imagem"]["name"])){ 
        $_SESSION['msg'] =" <div class='alert alert-danger'>
                            ERRO: imagem não foi selecionada !! 
                            </div>";
                            header('Location: ../produto.php'); 
                            exit();
     } 

     //$arquivo = $_FILES["imagem"];
     
    //
     // captura O nome e a extensao do arquivo
    //
     $fileName = basename($_FILES["imagem"]["name"]); 
     $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 
      
    //
    // Verifica os tipo de arquivo (extensao) são os mais adequados
    //
     $allowTypes = array('jpg','png','jpeg','gif'); 
     if(in_array($fileType, $allowTypes)){ 
     
        //
        // Abre o arquivo 
        //
        $handle = fopen($_FILES['imagem']['tmp_name'], "rb");
        $image_source = stream_get_contents($handle, filesize($_FILES['imagem']['tmp_name']));
        
         
        //
        // Post image to Imgur via Web Service API 
        //
    
    
        // Inicia o metodo para upload via POST do HTTP
        $ch = curl_init(); 
        //Configura a url de destino
        curl_setopt($ch, CURLOPT_URL, 'https://api.imgur.com/3/image.json'); 
        //Estabelece que sera via POST
        curl_setopt($ch, CURLOPT_POST, TRUE); 
        //Adiciona a Chave do servico ao cabecalho da requisicao
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Client-ID ' . $IMGUR_CLIENT_ID)); 
        //Adiciona os campos 
        curl_setopt($ch, CURLOPT_POSTFIELDS, array('image' => $image_source)); 
        //Estabelece detalhes do processo
        curl_setopt($ch, CURLOPT_VERBOSE, true);
        //Informa que aguardara o retorno
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    
        //
        // Inicia o upload
        //
        $response = curl_exec($ch); 
    
        //
        // Se ocorreu algum erro no processo de upload para o Servico IMGUR
        //
        if(curl_errno($ch)) {
            echo 'Curl erro: '.curl_error($ch);
            die();
        }
        
     
        //
        // Captura a resposta do upload
        //
        curl_close($ch); 
        $responseArr = json_decode($response); 
        
        //
        // Se o conteudo enviado nao for vazio, ou seja, tem um Link para a imagem, a exibe
        //
        if(!empty($responseArr->data->link)){ 
            //AQUI VOCE VAI INSERRIR NO BANCO O LINK ABAIXO
    
            // $responseArr->data->link retorna o Link da imagem
            // Exibe a imagem
            // echo '<img src="' . $responseArr->data->link . '"</>';
            // Link para ir para o IMGUR
            //echo "<br>";
            $urlImagem = $responseArr->data->link;
            //echo ($urlImagem);
        
            if (!empty($idImagem)) {
                $admin = $pdo->query("  UPDATE PRODUTO_IMAGEM  
                                        SET IMAGEM_URL='$urlImagem', IMAGEM_ORDEM='$ImagemOrdem'  
                                        WHERE IMAGEM_ID= $idImagem")->fetchAll();

                    $_SESSION['msg'] =" <div class='alert alert-success'>
                    Imagem atualizada com sucesso !!
                    </div>";
                    header('Location: ../produto.php');
                    exit(); 

             
            }else{
               echo "ERRO DE CADASTRO";
              }
        }else{ 
            // Caso tenha algum erro    
            $_SESSION['msg'] =" <div class='alert alert-danger'>
            ERRO: Imagem não foi inserida !
        </div>";
        header('Location: ../produto.php');   
        exit();  
            
        } 
     }else{ 
        // Formato de imagem nao permitido
        $_SESSION['msg'] =" <div class='alert alert-danger'>
        Não é permitido esse formato de imagem !!
        </div>";
        header('Location: ../produto.php');
        exit();

     } 
   

/*
 
$admin = $pdo->query("UPDATE PRODUTO_IMAGEM  SET IMAGEM_URL='$imagem_url', IMAGEM_ORDEM='$ordem'  WHERE IMAGEM_ID= $id")->fetchAll();

if ( count($admin) == 0) {
    $_SESSION['msg'] =" <div class='alert alert-success'>
    imagem atualizada com sucesso!
    </div>";
    header('Location: ../produto.php');
    } else { 
    echo "erro";
    }

if(isset($_SESSION['iduser']) && !empty($_SESSION['iduser'])): ?>
    <?php else: header ("Location:../loginadministrador.php"); endif?>
    */