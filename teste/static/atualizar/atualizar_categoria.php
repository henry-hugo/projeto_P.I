<?php
  require "../function/verificar.php";
   //coleta os dados do adm

   $id = $_GET["id"];

   //realiza uma query sql para buscar o adm que tem o email e a senha passado 
   $admin = $pdo->query("SELECT * FROM CATEGORIA WHERE CATEGORIA_ID=" . $id)->fetch();

   //se o retorna for vazio 0 , entao a senha ou email estao incorretos

   $nome = $admin["CATEGORIA_NOME"];
   $desc = $admin["CATEGORIA_DESC"];
   $ativo = $admin["CATEGORIA_ATIVO"];
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

						<li class="sidebar-item active">
							<a class="sidebar-link" href="../categoria.php">
								<i class="align-middle" data-feather="award"></i> <span class="align-middle">Categoria</span>
							</a>
						</li>

						<li class="sidebar-item ">
							<a class="sidebar-link" href="../produto.php">
								<i class="align-middle" data-feather="book"></i> <span class="align-middle">Produto</span>
							</a>
						</li>


						<li class="sidebar-item">
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
            <Form Action="atualizarform_categoria.php" method="POST">
                <input type="hidden" name="id"  value="<?php echo $id ?>">
                <br>
                nome da Categoria : 
                <input type="text" name="nome" required onchange='campobranco' value="<?php echo $nome ?>">
                <br>
                desc categoria : 
                <input type="text" name="desc" required onchange='campobranco' value="<?php echo $desc ?>">
                <br>
				ATIVO :
				<input type="checkbox" id="ativo" name="ativo" value="<?php echo $ativo ?>" checked>
                <br>
				<input type="submit" value="Enviar"> 
            </Form>
			
			</main>

			
		</div>
	</div>

	<script src="../js/app.js"></script>

</body>

</html>
<?php else: header ("Location:../loginadministrador.php"); endif ?>