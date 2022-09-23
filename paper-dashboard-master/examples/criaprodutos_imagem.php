
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

    header('Location: http://localhost:8080/projeto_P.I/paper-dashboard-master/examples/icons.php');
           exit();
}else{
echo 'erro';
}    