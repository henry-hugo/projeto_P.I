<?php
    include_once 'function/conexao.php';
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="loginadministradorcss.css" rel="stylesheet">
    <link rel="shortcut icon" href="img/favicon-32x32.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Login Administrador Bravo 4 Fun</title>
</head>
<body>
    <img src="img/logo.png" alt="Logo da Empresa Bravo 4 Fun">
    <div class="textologin">
        <h2> Login Administrador</h2>
        <h3>Entre com os seus dados corretamente para acessar o sistema</h3>
    </div>
    <div style="padding-left: 45%; padding-right: 10%;" class="container">
        <div id="msg" style="text-align:center;" >
            <?php
                if (isset($_SESSION['msg'])) {
                echo ($_SESSION['msg']);
                unset ($_SESSION['msg']);
                /*echo "	<head>
							<meta http-equiv='refresh' content='5; adm.php'>
						</head>";*/
                }
            ?>
        </div>
        <form id="formulario" class="row g-3 was-validated"  method="POST" action="autentificacao_adm.php">
            <div class="row g-3">
                <label for="validationFormEmail2" class="form-label" class="email">E-mail:</label>
                <input class="form-control is-invalid" style="color:pink;" id="validationFormEmail2" class="caixaemail" type="email" name="email"   id="email" placeholder="bravo4fun@bravo4fun.com" required>
            </div>
            <div class="row g-3">
                <label for="validationFormPassword1" class="form-label" class="senha">Senha:</label>
                <input class="form-control is-invalid" style="color:pink;" id="validationFormPassword1" class="caixasenha" type="password" name="senha"   id="senha" placeholder="Amand@123" required>
            </div>
           
            <input class="g-recaptcha" data-sitekey="6Lfov2oiAAAAAKRxoaoWNgSQxs3OSebaT5cPoQIT" data-callback="onSubmit" type="submit" value="Enviar" >  
        </form>
    </div>
    <script src="js/teste2.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script>
       function onSubmit(token) {
         document.getElementById("formulario").submit();
       }
     </script>
</body>

</html>