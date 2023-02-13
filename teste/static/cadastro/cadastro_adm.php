<?php
 require "../function/verificaratualizar.php";
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cadastro adm</title>
</head>
<body>
    <h1>Cria um novo Administrador</h1>
    <br>    
    <Form class="was-validated"  Action="../criaprocesso/criarprocessamento.php" method="POST">
        <br>
        Nome : 
        <input type="text" name="nome">
        <br>
        Email : 
        <input type="text" name="email">
        <br>
        Senha : 
        <input type="password" name="senha">
        <br>
        ATIVO :
        <input type="checkbox" id="ativo" name="ativo" value="1" checked>
        <br>
        <input type="submit" value="Enviar"> 
    </Form>  
</body>
</html>