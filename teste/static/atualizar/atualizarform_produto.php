<?php

require '../conexao.php';

$id = $_GET["id"];

            //realiza uma query sql para buscar o adm que tem o email e a senha passado 
            $admin = $pdo->query("SELECT * FROM PRODUTO WHERE PRODUTO_ID=" . $id)->fetch();
            $admin1 = $pdo->query("SELECT * FROM PRODUTO_ESTOQUE WHERE PRODUTO_ID=" . $id)->fetch();
            $admin2 = $pdo->query("SELECT * FROM PRODUTO_IMAGEM WHERE PRODUTO_ID=" . $id)->fetch();

            //se o retorna for vazio 0 , entao a senha ou email estao incorretos

            $nome = $admin["PRODUTO_NOME"];
            $preco = $admin["PRODUTO_PRECO"];
            $desconto = $admin["PRODUTO_DESCONTO"];
            $desc = $admin["PRODUTO_DESC"];
            $ativo = $admin["PRODUTO_ATIVO"];
            $quantidade = $admin1["PRODUTO_QTD"];
            $imagem = $admin2["IMAGEM_URL"];
            $imagem_ordem = $admin2["IMAGEM_ORDEM"];
        ?>

            <Form Action="atualizar_produto.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $id ?>">
                <br>
                Nome : 
                <input type="text" name="nome" value="<?php echo $nome ?>">
                <br>
                Preço : 
                <input type="text" name="preco" value="<?php echo $preco ?>">
                <br>
                Categoria :
                <select name="categoria">
                  <?php
                    $stmt = $pdo->prepare("SELECT * FROM CATEGORIA");
                    $stmt->execute();

                    if($stmt->rowCount() > 0){
                      while ($dados = $stmt->fetch(pdo::FETCH_ASSOC)){
                        echo "<option value='{$dados['CATEGORIA_ID']}'>{$dados['CATEGORIA_NOME']}</option>";
                      }
                    }
                  ?>
                </select>
                <br>
                Desconto : 
                <input type="text" name="desconto" value="<?php echo $desconto ?>">
                <br>
                Descriçao : 
                <input type="text" name="desc" value="<?php echo $desc ?>">
                <br>
                QUANTIDADE : 
                <input type="number" name="quantidade" value="<?php echo $quantidade ?>">
                <br>
                IMAGEM URL : 
                <input type="text" name="imagem_url" value="<?php echo $imagem ?>">
                <br>
                IMAGEM ORDEM : 
                <input type="number" name="ordem" value="<?php echo $imagem_ordem ?>">
                <br>
                PRODUTO ATIVO : 
                <input type="checkbox" id="ativo" name="ativo" value="1" checked>
                <br>
                <input type="submit" value="Enviar"> 
            </Form>
        </body>
        </html>

