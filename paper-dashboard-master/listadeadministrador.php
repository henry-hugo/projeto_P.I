<html>
    <head>
        <title>Listar os Administradores</title>
    </head>
    <body>
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

            //montar o comando de inserçao
            $cmd = $pdo->query("SELECT * FROM ADMINISTRADOR") ; 
    ?>   
        <h1>Listar os Administradores</h1>
        <br>
        <table border="1">
            <tr>
                <th>Id</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Senha</th>
                <th>Atualizacao</th>
                <th>Exclusao</th>            
            </tr>
    <?php
    while($linha = $cmd->fetch()){
    ?>    
        <tr>
            <td>
                <?php
                    echo $linha["ADM_ID"];
                ?>    
            
            </td>
            <td>
                <?php
                echo $linha["ADM_NOME"];
                ?>
            </td>
            <td>
                <?php
                echo $linha["ADM_EMAIL"];
                ?>
            </td>    
            <td>
                <?php
                echo $linha["ADM_SENHA"];
                ?>
            </td>    
            <td>
                <a href="atualizarform_adm.php?id=<?php echo $linha["ADM_ID"] ?>">Atualizar</a>
            </td>
            <td>
                <a href="../excluirform_adm.php?id=<?php echo $linha["ADM_ID"] ?>">Excluir</a>
            </td>        
        </tr>
    <?php 
    }
    ?>
        </table>
        <br>
        <a href="../index.html">Voltar para o Indice</a>
    </body>
    </html>