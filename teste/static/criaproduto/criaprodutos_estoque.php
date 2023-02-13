
<?php
       require "../function/verificaratualizar.php";
      //captura o vaor das variaves ou receber dados do formulario
     $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
  //verificar se clicou no botao

 // var_dump($dados);
  
  if (!empty($dados['produtoid'])) {

    $query_ESTOQUE = "INSERT INTO PRODUTO_ESTOQUE
                (PRODUTO_ID, PRODUTO_QTD) VALUES
                (:produtoid, :quantidade)";
    $estoque = $pdo->prepare($query_ESTOQUE);
    $estoque->bindParam(':produtoid',$dados['produtoid'],PDO::PARAM_INT);
    $estoque->bindParam(':quantidade',$dados['quantidade'],PDO::PARAM_INT);
    $estoque->execute();            

    $_SESSION['msg'] =" <div class='alert alert-success'>
    estoque adicionado com sucesso!
    </div>";
    header('Location: ../produto.php');
    exit();
}else{
  $_SESSION['msg'] =" <div class='alert alert-danger'>
  estoque nao pode ser adicionado!
  </div>";
  header('Location: ../produto.php');
  exit();
}    