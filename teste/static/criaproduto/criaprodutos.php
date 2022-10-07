 <?php
        //dados para conexao ao mysql
        require_once '../function/conexao.php';

        //captura o vaor das variaves ou receber dados do formulario
       $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
    //verificar se clicou no botao 
       if (!empty($dados['nome'])) {
        $query_PRODUTO = "INSERT INTO PRODUTO 
                    (PRODUTO_NOME, CATEGORIA_ID, PRODUTO_DESC, PRODUTO_PRECO, PRODUTO_DESCONTO, PRODUTO_ATIVO) VALUES
                    (:nome, :categoria, :descricao, :preco, :desconto, :ativo)";
        $cad_produto = $pdo->prepare($query_PRODUTO);
        $cad_produto->bindParam(':nome',$dados['nome'],PDO::PARAM_STR);
        $cad_produto->bindParam(':descricao',$dados['descricao'],PDO::PARAM_STR);
        $cad_produto->bindParam(':preco',$dados['preco']);
        $cad_produto->bindParam(':desconto',$dados['desconto'],PDO::PARAM_INT);
        $cad_produto->bindParam(':categoria',$dados['categoria'],PDO::PARAM_INT);
        $cad_produto->bindParam(':ativo',$dados['ativo'],PDO::PARAM_INT);         
        $cad_produto->execute();

        

        $_SESSION['msg'] =" <div class='alert alert-success'>
        produto adicionado com sucesso!
        </div>";
        header('Location: ../produto.php');

        }else{
        echo "ERRO DE CADASTRO";
       }



















