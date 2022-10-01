
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="loginadministradorcss.css" rel="stylesheet">
    <link rel="shortcut icon" href="img/favicon-32x32.png" type="image/x-icon">
    <title>Login Administrador Bravo 4 Fun</title>
</head>
<body>
    <img src="img/logo.png" alt="Logo da Empresa Bravo 4 Fun">
    <div class="textologin">
        <h2> Login Administrador</h2>
        <h3>Entre com os seus dados corretamente para acessar o sistema</h3>
    </div>
    <div class="dados">
        <form method="POST" action="autentificacao_adm.php">
            <label class="email">E-mail:</label>
            <input class="caixaemail" type="password" name="email" required onchange='campobranco' id="email" placeholder="bravo4fun@bravo4fun.com">
            <label class="senha">Senha:</label>
            <input class="caixasenha" type="password" name="senha" required onchange='campobranco' id="senha" placeholder="Amand@123">
            <div class="caixadolembrarme">
            <input type="checkbox" id="lembrarme" name="lembrarme" value="">
            <label class="lembrarme">Lembrar-me</label>
            </div>
            <input class="enviar" type="submit" name="enviar" value="Enviar">  
        </form>
    </div>
</body>
</html>