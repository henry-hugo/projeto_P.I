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

            $query_produtos = "SELECT pro.PRODUTO_ID, pro.PRODUTO_NOME AS pro_PRODUTO_NOME, pro.CATEGORIA_ID, pro.PRODUTO_DESC, pro.PRODUTO_PRECO, pro.PRODUTO_DESCONTO, 
                               est.PRODUTO_QTD, img.IMAGEM_ORDEM, img.IMAGEM_URL
                               FROM PRODUTO pro
                               INNER JOIN PRODUTO_ESTOQUE AS est ON est.PRODUTO_ID = pro.PRODUTO_ID
                               INNER JOIN PRODUTO_IMAGEM AS img ON img.PRODUTO_ID = pro.PRODUTO_ID ";

            $result_produtos = $pdo->prepare($query_produtos);
            $result_produtos->execute();

            ?>

            <table border="1">
            <tr>
                <th>Id</th>
                <th>Nome</th>
                <th>Categoria</th>
                <th>Preço</th>
                <th>desconto</th>
                <th>descriçao</th>
                <th>qtd estoque</th>
                <th>url imagem</th>
                <th>Atualizar</th>
                <th>Excluir</th>           
            </tr>
            <?php
            while($row_produto = $result_produtos->fetch(PDO::FETCH_ASSOC)){
              //  var_dump($row_produto);
                extract($row_produto);
            ?>
            <tr>
                <td>
                    <?php
                        echo $PRODUTO_ID;
                    ?>
                </td>
                <td>
                    <?php   
                        echo $pro_PRODUTO_NOME; 
                    ?>
                </td>
            
                <td>
                    <?php    
                        echo  $CATEGORIA_ID ; 
                    ?>
                </td>
        
                <td>
                    <?php
                        echo $PRODUTO_PRECO ; 
                    ?>
                </td>
            
                <td>
                    <?php
                        echo  $PRODUTO_DESCONTO ; 
                    ?>
                </td>
        
                <td>
                    <?php
                        echo  $PRODUTO_DESC ;
                    ?>
                </td>
            
                <td>
                    <?php
                        echo  $PRODUTO_QTD ;
                    ?>
                </td>
        
                <td>
                    <?php
                        echo $IMAGEM_URL;
                    ?>        
                </td>
                <td>
                    <a href="atualizarform_adm.php?id=<?php echo $linha["PRODUTO_ID"] ?>">Atualizar</a>
                </td>
                <td>
                    <a href="excluirform_adm.php?id=<?php echo $linha["PRODUTO_ID"] ?>">Excluir</a>
                </td> 
            </tr>
        <?php
            }
        ?>
        </table>