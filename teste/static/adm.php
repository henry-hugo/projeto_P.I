<?php
  require "function/verificar.php";
  $_POST['produto'] = $_POST['produto']  ?? '' ;
  //$cmd = $pdo->query("SELECT * FROM ADMINISTRADOR");
  if($_POST['produto'] == ''){
  	$cmd = $pdo->query("SELECT * FROM ADMINISTRADOR"); 
  }
  if($_POST['produto'] == '0'){
	$cmd = $pdo->query("SELECT * FROM ADMINISTRADOR WHERE ADM_ATIVO = 0");
}
if($_POST['produto'] == '1'){
	$cmd = $pdo->query("SELECT * FROM ADMINISTRADOR WHERE ADM_ATIVO = 1");
} 
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
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link rel="canonical" href="https://demo-basic.adminkit.io/ui-buttons.html" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

	<title>Buttons | AdminKit Demo</title>

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

						<li class="sidebar-item">
							<a class="sidebar-link" href="categoria.php">
								<i class="align-middle" data-feather="award"></i> <span class="align-middle">Categoria</span>
							</a>
						</li>

						<li class="sidebar-item">
							<a class="sidebar-link" href="produto.php">
								<i class="align-middle" data-feather="book"></i> <span class="align-middle">Produto</span>
							</a>
						</li>


						<li class="sidebar-item active">
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
				<div id="msg" style="text-align:center; padding-left:50%;transform: translate(-50%);" >
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
						<i class="align-middle" data-feather="plus"></i> <span class="align-middle"> Nova Administrador</span>
					</button>
					
					<!-- Modal -->
					<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="10" aria-labelledby="staticBackdropLabel" aria-hidden="true">
						<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
							</div>
							<div class="modal-body">
							<form class="was-validated" action="criaprocesso/criarprocessamento.php" method="POST">
							<h3 class="modal-title" id="staticBackdropLabel">Cadastro de Administrador <input type="checkbox" id="ativo" name="ativo" value="1" checked></h3> 
								<div class="mb-3">
									<label for="exampleFormControlInput1" class="form-label">Nome</label>
									<input type="text" class="form-control" name="nome" required onchange='campobranco' id="categoria_name" placeholder="abc">
								  </div>
								  <div class="mb-3">
									<label for="exampleFormControEMAIL" class="form-label"> Email</label>
									<input type="email" class="form-control" name="email" required onchange='campobranco' required onchange='confere(email, confirme_email, "email")';  id="email" placeholder="abc@gmail.com">
								  </div>
								  <div class="mb-3">
									<label for="exampleFormControEMAIL" class="form-label"> Confirme o Email</label>
									<input type="email" class="form-control" name="confirme_email" required onchange='confereemail();' id="confirme_email" placeholder="abc@gmail.com">
								  </div>
								  <div class="mb-3">
									<label for="exampleFormControsenha" class="form-label"> Senha</label>
									<input type="password" class="form-control" name="senha" size=15 required onchange='campobranco' required onchange='confere(senha, confirme_senha, "senhas")'; id="senha" placeholder="****">
								  </div>
								
								<div class="mb-3">
									<label for="exampleFormControsenha" class="form-label"> Confirme a Senha</label>
									<input type="password" class="form-control" name="confirme_senha" size=15 required onchange='conferesenha();' id="confirme_senha" placeholder="****">
								</div>
								  <div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
									<input type="submit" value="enviar" class="btn btn-primary">
								</div>
							</div>  
							</form>	
						</div>
						</div>
					</div>				
				
				<div style="float:right;" >
						<a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown" aria-expanded="false">
							<span class="text-dark">filtro</span>
						</a>
						<div class="dropdown-menu dropdown-menu-end">
							
								<form action="" id="FormId" method="post" style="text-align:center;">
									<div > 
										<input type="radio" onclick="document.getElementById('FormId').submit();"  name="produto" id="" value="">
										<label for="todos" class="form-label" ><span style="color:blue;">TODOS</span></label>
									</div>
									<div>
										<input type="radio" onclick="document.getElementById('FormId').submit();" name="produto" id="" value="1">
										<label for="ativo" class="form-label"><span style="color:blue;">ATIVO</span></label>
									</div>
									<div>
										<input type="radio" onclick="document.getElementById('FormId').submit();" name="produto" id="" value="0">
										<label for="desativo" class="form-label"><span style="color:blue;">DESATIVO</span></label>
									</div>
								</form>
							
						</div>
					</div>
					<div>
						<input class="form-control" id="myInput" type="search"  placeholder="Procurar.." style="float:right; width:300px;">
					</div>
				<table class="table table-dark table-striped">
					<tr>
						<th scope="col">ID</th>
						<th scope="col">NOME</th>
						<th scope="col">EMAIL</th>
						<th scope="col">SENHA</th>
						<th scope="col"><span style="color:green;" >AT<span style="color:#FFFF00;" >I</span><span style="color:red;" >VO</span></th>
						<th scope="col"><i class="align-middle"  data-feather="edit"></i> <span class="align-middle"></span></th>
						<th scope="col"><i class="align-middle" style="color:black;"  data-feather="trash-2"></i> <span class="align-middle"></span></th>            
					</tr>
			<?php
			while($linha = $cmd->fetch()){
			?>  
			<tbody id="myTable">  
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
						$linha["ADM_SENHA"];
						echo ("***********");
						?>
					</td>
					<td>
						<?php
						 	$linha["ADM_ATIVO"];
						if($linha["ADM_ATIVO"] == "1"){ ?>
							<i class="align-middle" style="color:green;"  data-feather="check-circle"></i> <span class="align-middle"></span>
						<?php }else{ ?>
							<i class="align-middle" style="color:red;" data-feather="alert-octagon"></i> <span class="align-middle"></span>
						<?php
						} 

						?>
					</td>    
					<td>
						<a href="atualizar/atualizar_adm.php?id=<?php echo $linha["ADM_ID"] ?>"><i class="align-middle" style="color:#fff;" data-feather="edit"></i> <span class="align-middle"></span></a>
					</td>
					<td>
						<a href="excluirform_adm.php"><i class="align-middle" style="color:black;" data-feather="trash-2"></i> <span class="align-middle"></span></a>
					</td>        
				</tr>
			</tbody>
			<?php 
			}
			?>
			</table>
			</main>
		</div>
	</div>

	<script src="js/app.js"></script>
	<script src="js/teste.js"></script>
	<script src="js/teste2.js"></script>
	<script src="js/procura.js"></script>

</body>

</html>
<?php else: header ("Location:   loginadministrador.php"); endif ?>