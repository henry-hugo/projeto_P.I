
<?php
     require_once '../function/conexao.php';

      //captura o vaor das variaves ou receber dados do formulario
     $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
  //verificar se clicou no botao

  var_dump($dados);
  
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