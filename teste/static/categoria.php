<?php
  require "function/verificar.php";
  $cmd = $pdo->query("SELECT * FROM CATEGORIA") ; 
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
	<link rel="shortcut icon" href="img/icons/icon-48x48.png" />

	<link rel="canonical" href="https://demo-basic.adminkit.io/pages-profile.html" />
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<title>Profile | AdminKit Demo</title>

	<link href="css/app.css" rel="stylesheet">
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
							<a class="sidebar-link" href="index.php">
								<i class="align-middle" data-feather="monitor"></i> <span class="align-middle">Dashboard</span>
							</a>
						</li>

						<li class="sidebar-item active">
							<a class="sidebar-link" href="categoria.php">
								<i class="align-middle" data-feather="award"></i> <span class="align-middle">Categoria</span>
							</a>
						</li>

						<li class="sidebar-item">
							<a class="sidebar-link" href="produto.php">
								<i class="align-middle" data-feather="book"></i> <span class="align-middle">Produto</span>
							</a>
						</li>


						<li class="sidebar-item">
							<a class="sidebar-link" href="adm.php">
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
                				<img src="img/avatars/avatar.jpg" class="avatar img-fluid rounded me-1" alt="Charles Hall" /> <span class="text-dark"><?php echo $nomeuser ;?></span>
              				</a>
							<div class="dropdown-menu dropdown-menu-end">
								<a class="dropdown-item" href="function/logout.php">sair</a>
							</div>
						</li>
					</ul>
				</div>
			</nav>

			<main class="content">
				<div class="container-fluid p-0">
					<!-- Button trigger modal -->
					<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
						<i class="align-middle" data-feather="plus"></i> <span class="align-middle"> Nova Categoria</span>
					</button>
					<!-- Modal -->
					<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="10" aria-labelledby="staticBackdropLabel" aria-hidden="true">
						<div class="modal-dialog">
						<div class="modal-content">
							
							<div class="modal-body">
							<form action="cadastro/cadastro_categoria.php" method="POST">
							<div class="modal-header">
							<h3 class="modal-title" id="staticBackdropLabel">Cadastro de Categoria </h3>
							</div>							 
								<div class="mb-3">
									<label for="exampleFormControlInput1" class="form-label">Nome da Categoria</label>
									<input type="text" class="form-control" name="nome" size=15 required onchange='campobranco();' id="categoria_name" placeholder="TRAP">
								  </div>
								  <div class="mb-3">
									<label for="exampleFormControlTextarea1" class="form-label"> descriçao</label>
									<textarea class="form-control" name="descricao"  id="descricao" rows="3"></textarea>
								  </div>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
									<input type="submit" value="enviar" class="btn btn-primary">
								</div>
							</form>	
						</div>
						</div>
					</div>
					<div class="container-fluid p-3">
						<table class="table table-dark table-striped">

							<thead>
							  <tr>
								<th scope="col">#</th>
								<th scope="col">nome</th>
								<th scope="col">descriçao</th>
								<th scope="col">ATIVO</th>
								<th scope="col"><i class="align-middle" data-feather="edit"></i> <span class="align-middle"></span></th>
							  </tr>
							  <?php
								while($linha = $cmd->fetch()){
							  ?> 
							</thead>
							<tbody>
							  <tr>
								<th scope="row">
									<?php
										echo $linha["CATEGORIA_ID"];
									?>
								</th>
								<td>
									<?php
										echo $linha["CATEGORIA_NOME"];
									?>
								</td>
								<td>
									<?php
										echo $linha["CATEGORIA_DESC"];
									?>
								</td>
								<td>
									<?php
										$linha["CATEGORIA_ATIVO"];
									if($linha["CATEGORIA_ATIVO"] == "1"){ ?>
										<i class="align-middle" style="color:green;"  data-feather="check-circle"></i> <span class="align-middle"></span>
									<?php }else{ ?>
										<i class="align-middle" style="color:red;" data-feather="alert-octagon"></i> <span class="align-middle"></span>
									<?php
									} 

									?>
								</td> 
								<td>
									<a class="link" href="atualizar/atualizar_categoria.php?id=<?php echo $linha["CATEGORIA_ID"] ?>">
										<i class="align-middle" data-feather="edit"></i> <span class="align-middle"></span>
									</a>
								</td>
							  </tr>
							</tbody>
							<?php 
								}
							?>
						</table>	
					</div>

				</div>

			</main>
		</div>
	</div>
	
	<script src="js/app.js"></script>
	

</body>

</html>

<?php else: header ("Location:   loginadministrador.php"); endif ?>