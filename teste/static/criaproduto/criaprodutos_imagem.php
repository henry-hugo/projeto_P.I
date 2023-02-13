
<?php
      require "../function/verificaratualizar.php";

      //captura o vaor das variaves ou receber dados do formulario
     $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
  //verificar se clicou no botao

  //var_dump($dados);
  $ordem = $dados['ordem'];
  $ordem = Intval ($ordem);
  $id = $dados['id'];
  //var_dump($_FILES);
  

    // Coloque aqui a chave do Serviço
    //
    $IMGUR_CLIENT_ID = "309e8da0e16e0ea";
      
    //
    // Se nao nenhum arquivo for selecionado, entao informa que precisa selecionar um 
    //
    $size = $_FILES["imagem"]["size"];
    //var_dump($size[0]);

     if($size[0] == 0){ 
      $_SESSION['msg'] =" <div class='alert alert-success'>
                          ERRO: selecione uma imagem !
                        </div>";
                        header('Location: ../produto.php');
                        exit();
       
     }else{ 
    
     $arquivo = $_FILES["imagem"];
     for ($i=0; $i < count($arquivo['name']) ; $i++) { 
        //var_dump($arquivo['name'][$i]) ;
        
     
     
     
     
    //
    // captura O nome e a extensao do arquivo
    //
     $fileName = basename($_FILES["imagem"]["name"][$i]); 
     $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 
      
    //
    // Verifica os tipo de arquivo (extensao) são os mais adequados
    //
     $allowTypes = array('jpg','png','jpeg','gif'); 
     if(in_array($fileType, $allowTypes)){ 
     
        //
        // Abre o arquivo 
        //
        $handle = fopen($_FILES['imagem']['tmp_name'][$i], "rb");
        $image_source = stream_get_contents($handle, filesize($_FILES['imagem']['tmp_name'][$i]));
        
         
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
            
            if (!empty($id)) {
              
              $ordem = $ordem + $i; 

            $query_imagem = "INSERT INTO PRODUTO_IMAGEM
                        (IMAGEM_ORDEM, IMAGEM_URL,PRODUTO_ID) VALUES
                        (:ordem, :imagens, :id)";
            $img = $pdo->prepare($query_imagem);
            $img->bindParam(':id',$dados['id'],PDO::PARAM_INT);
            $img->bindParam(':ordem',$ordem,PDO::PARAM_INT);
            $img->bindParam(':imagens',$urlImagem,PDO::PARAM_STR);
            $img->execute(); 

            $_SESSION['msg'] =" <div class='alert alert-success'>
                                Imagem adicionado com sucesso!
                                </div>";
                                header('Location: ../produto.php');
                                exit();
            }else{
              $_SESSION['msg'] =" <div class='alert alert-danger'>
              ERRO: Nao foi possivel cadastra !
              </div>";
              header('Location: ../produto.php');
              exit();
              }
        }else{ 
            // Caso tenha algum erro 
            $_SESSION['msg'] =" <div class='alert alert-danger'>
                                  ERRO: Imagem não foi inserida
                                </div>";
                                header('Location: ../produto.php');
                                exit();        
} 
     }else{ 
        // Formato de imagem nao permitido
        $_SESSION['msg'] =" <div class='alert alert-danger'>
        ERRO: Não é permitido esse formato de imagem
      </div>";
      header('Location: ../produto.php');
      exit();
     } 
   }
}

   










/*
  
  if (!empty($dados['ordem'])) {

    $query_imagem = "INSERT INTO PRODUTO_IMAGEM
                (IMAGEM_ORDEM, IMAGEM_URL,PRODUTO_ID) VALUES
                (:ordem, :imgurl, :produtoid)";
    $img = $pdo->prepare($query_imagem);
    $img->bindParam(':produtoid',$dados['produtoid'],PDO::PARAM_INT);
    $img->bindParam(':ordem',$dados['ordem'],PDO::PARAM_INT);
    $img->bindParam(':imgurl',$dados['imgurl'],PDO::PARAM_STR);
    $img->execute();            

    $_SESSION['msg'] =" <div class='alert alert-success'>
    imagem adicionado com sucesso!
    </div>";
    header('Location: ../produto.php');
}else{
echo 'erro';
}     
*/