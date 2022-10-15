        <?php
  require "../function/verificar.php";
   //coleta os dados do adm

   $id = $_GET["id"];

   //realiza uma query sql para buscar o adm que tem o email e a senha passado 
   $admin = $pdo->query("SELECT * FROM ADMINISTRADOR WHERE ADM_ID=" . $id)->fetch();

   //se o retorna for vazio 0 , entao a senha ou email estao incorretos

   $nome = $admin["ADM_NOME"];
   $email = $admin["ADM_EMAIL"];
   $senha = $admin["ADM_SENHA"];
   $ativo = $admin["ADM_ATIVO"];
  if(isset($_SESSION['iduser']) && !empty($_SESSION['iduser'])): ?>
  <!--setcookie( 'nome', )-->
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
	<meta name="author" content="AdminKit">
	<meta name="keywords" content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link rel="shortcut icon" href="../img/icons/icon-48x48.png" />

	<link rel="canonical" href="https://demo-basic.adminkit.io/pages-blank.html" />

	<title>Blank Page | AdminKit Demo</title>

	<link href="../css/app.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<body>
		<div class="wrapper">
			<nav id="sidebar" class="sidebar js-sidebar">
				<div class="sidebar-content js-simplebar">
					<a class="sidebar-brand" href="index.html">
						<span class="align-middle">Bravo4Fun</span>
					</a>

					<ul class="sidebar-nav">
						<li class="sidebar-header">
							Pages
						</li>

						<li class="sidebar-item ">
							<a class="sidebar-link" href="../index.php">
								<i class="align-middle" data-feather="monitor"></i> <span class="align-middle">Dashboard</span>
							</a>
						</li>

						<li class="sidebar-item ">
							<a class="sidebar-link" href="../categoria.php">
								<i class="align-middle" data-feather="award"></i> <span class="align-middle">Categoria</span>
							</a>
						</li>

						<li class="sidebar-item ">
							<a class="sidebar-link" href="../produto.php">
								<i class="align-middle" data-feather="book"></i> <span class="align-middle">Produto</span>
							</a>
						</li>


						<li class="sidebar-item active">
							<a class="sidebar-link" href="../adm.php">
								<i class="align-middle" data-feather="users"></i> <span class="align-middle">ADM</span>
							</a>
						</li>
					</ul>
				</div>
			</nav>

		<div class="main">
			<nav class="navbar navbar-expand navbar-light navbar-bg">
				<a class="sidebar-toggle js-sidebar-toggle">
					<i class="hamburger align-self-center"></i>
				</a>

				<div class="navbar-collapse collapse">
					<ul class="navbar-nav navbar-align">
						<li class="nav-item dropdown">
							<a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-bs-toggle="dropdown">
								<i class="align-middle" data-feather="settings"></i>
							</a>

							<a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">
								<img src="../img/avatars/avatar.jpg" class="avatar img-fluid rounded me-1" alt="Charles Hall" /> <span class="text-dark"><?php echo $nomeuser ;?></span>
							</a>
							<div class="dropdown-menu dropdown-menu-end">
								<a class="dropdown-item" href="../function/logout.php">sair</a>
							</div>
						</li>
					</ul>
				</div>
			</nav>

			<main class="content">
                <Form class="was-validated" Action="atualizarform_adm.php" method="POST">
                    <input type="hidden" name="id"  value="<?php echo $id ?>">
                    
                    <label for="exampleFormControlInput1" class="form-label">NOME</label>
                    <input type="text" name="nome" class="form-control" required onchange='campobranco' value="<?php echo $nome ?>">
                    
                    <label for="exampleFormControlInput1" class="form-label">EMAIL</label>
                    <input type="email" name="email" class="form-control" required onchange='campobranco' value="<?php echo $email ?>" readonly>
                    
                    <label for="exampleFormControlInput1" class="form-label">SENHA</label>
                    <input type="text" name="senha" class="form-control" required onchange='campobranco' value="0">
                    
                    <label for="exampleFormControlInput1" class="form-label">ATIVO</label>
                    <input type="checkbox" id="ativo" name="ativo"  value="1" checked>
                    
                    <input type="submit" value="Enviar"> 
                </Form>
			
			</main>

			
		</div>
	</div>

	<script src="../js/app.js"></script>
	<script src="../js/teste.js"></script>

</body>

</html>
<?php else: header ("Location:../loginadministrador.php"); endif ?>