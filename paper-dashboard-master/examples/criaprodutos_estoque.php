
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

    header('Location: icons.php');
           exit();
}else{
echo 'erro';
}    