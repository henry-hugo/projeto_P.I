<?php
  require "function/verificar.php";
  $query_produtos = "SELECT DISTINCT pro.PRODUTO_ATIVO, pro.PRODUTO_ID, pro.PRODUTO_NOME AS pro_PRODUTO_NOME, pro.CATEGORIA_ID, pro.PRODUTO_DESC, pro.PRODUTO_PRECO, pro.PRODUTO_DESCONTO,
									est.PRODUTO_QTD 
									FROM PRODUTO pro
									LEFT JOIN PRODUTO_ESTOQUE AS est ON est.PRODUTO_ID = pro.PRODUTO_ID
									";

					$result_produtos = $pdo->prepare($query_produtos);
					$result_produtos->execute();

					
  if(isset($_SESSION['iduser']) && !empty($_SESSION['iduser'])): ?>
  <!--setcookie( 'nome', )-->
<!DOCTYPE html>
<html lang="pt-BR">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
	<meta name="author" content="AdminKit">
	<meta name="keywords" content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link rel="shortcut icon" href="img/icons/icon-48x48.png" />

	<link rel="canonical" href="https://demo-basic.adminkit.io/pages-blank.html" />

	<title>Blank Page | AdminKit Demo</title>

	<link href="css/app.css" rel="stylesheet">
	<style>
		td img{
			width:450px;
			height:450px;
		}
		
		
	</style>
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

						<li class="sidebar-item active">
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
				<div id="msg"  style="text-align:center; padding-left:50%;transform: translate(-50%);" >
				<?php
					if (isset($_SESSION['msg'])) {
					echo ($_SESSION['msg']);
					unset ($_SESSION['msg']);
					/*echo "	<head>
							<meta http-equiv='refresh' content='5; produto.php'>
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
				<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo"><i class="align-middle" data-feather="plus"></i> Criar Produto</button>
				<!-- Button trigger modal -->
				<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
						<i class="align-middle" data-feather="plus"></i> <span class="align-middle"> Adicionar Estoque</span>
				</button>
				<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalToggle"><i class="align-middle" data-feather="plus"></i> <span class="align-middle"> Adicionar Fotos</button>
				<div class="modal fade" id="exampleModalToggle" tabindex="-1" aria-hidden="true" aria-labelledby="exampleModalToggleLabel">
				<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-body">	
						<form class="was-validated" action="criaproduto/criaprodutos_imagem.php" method="POST">
						<h3 class="modal-title">Adicionar foto</h3>
						<label for="exampleFormControlInput1" class="form-label">ordem imagem</label>
						<input type="number" name="ordem" oninput="validity.valid||(value='');" min="1" required onchange='campobranco' class="form-control">
						<label for="exampleFormControlInput1" class="form-label">produto</label>
						<select name="produtoid"  class="form-select is-invalid"  required aria-label="select example">
						
						<?php
					
							$stmt = $pdo->prepare("SELECT * FROM PRODUTO");
							$stmt->execute();

							if($stmt->rowCount() > 0){
							while ($dados = $stmt->fetch(pdo::FETCH_ASSOC)){
								echo "<option value='{$dados['PRODUTO_ID']}'>{$dados['PRODUTO_NOME']}</option>";
							}
						}					  
						?>
						</select>
						<label for="exampleFormControlInput1" class="form-label">url imagem</label>
						<input type="url" required onchange='campobranco' class="form-control" name="imgurl">
						<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
									<input type="submit" value="enviar" class="btn btn-primary">
								</div> 
						</form>
					</div>
					</div>
				</div>
				</div>
				<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
					<div class="modal-body">
					
				<form class="was-validated" action="criaproduto/criaprodutos.php" method="POST">
						<h3 class="modal-title" id="staticBackdropLabel">Cadastro de produto <input type="checkbox" id="ativo" name="ativo" value="1" checked></h3>
						<label for="exampleFormControlInput1" class="form-label">Nome</label>
						<input type="text"  class="form-control is-invalid" name="nome" required onchange='campobranco' id="categoria_name" placeholder="abc">
						<label for="exampleFormControlInput1" class="form-label">Categoria</label>
						<select class="form-select is-invalid"  required aria-label="select example"  name="categoria">
							
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
						<label for="exampleFormControlInput1" class="form-label">Descrição</label> 
						<input type="text" class="form-control" name="descricao" required onchange='campobranco'>
						<label for="exampleFormControlInput1" class="form-label">Preço</label>
						<input type="number" class="form-control" oninput="validity.valid||(value='');" min="1" name="preco" required onchange='campobranco'>
						<label for="exampleFormControlInput1" class="form-label">Desconto</label>
						<input type="number" class="form-control" oninput="validity.valid||(value='');" min="0" max="100" name="desconto" required onchange='campobranco'>
						<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
									<input type="submit" value="enviar" class="btn btn-primary">
								</div> 
						</form>
					</div>
					</div>
				</div>
				</div>
				<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="10" aria-labelledby="staticBackdropLabel" aria-hidden="true">
						<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
							<h3>Quantidade Estoque</h3>
							</div>
							<div class="modal-body">
							<form class="was-validated" action="criaproduto/criaprodutos_estoque.php" method="POST">
								<label for="exampleFormControlInput1" class="form-label">Nome Categoria</label>
								<select name="produtoid" class="form-select">
									
									<?php
									
										$stmt = $pdo->prepare("SELECT * FROM PRODUTO");
										$stmt->execute();

										if($stmt->rowCount() > 0){
											while ($dados = $stmt->fetch(pdo::FETCH_ASSOC)){
											echo "<option value='{$dados['PRODUTO_ID']}'>{$dados['PRODUTO_NOME']}</option>";
											}
										}  
										?>
									</select>
									<label for="exampleFormControlInput1"  class="form-label">Quantidade Estoque </label>
									<input type="number" class="form-control" oninput="validity.valid||(value='');" min="1" max="2000000000" name="quantidade" required onchange='campobranco' >
									<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
									<input type="submit" value="enviar" class="btn btn-primary">
									</div>  
								</div>
							</form>	
						</div>
						</div>
					</div>
				<table class="table table-dark table-striped">
					<tr>
						<th>Id</th>
						<th>Nome</th>
						<th>Categoria</th>
						<th>Preço</th>
						<th>desconto</th>
						<th>Preço Desconto</th>
						<th>descriçao</th>
						<th>qtd estoque</th>
						
						<th>imagem</th>
						<th>ATIVO</th>

						<th><i class="align-middle" data-feather="edit"></i> <span class="align-middle"></span></th>
						<!--<th>Excluir</th>-->           
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
								echo "<span style='color:green;'>R$$PRODUTO_PRECO</span>" ; 
							?>
						</td>
					
						<td>
							<?php
								echo "<span style='color:red;'>  $PRODUTO_DESCONTO% </span>"  ; 
							?>
						</td>
						
						<td>
							<?php
								$precoComDesconto = ($PRODUTO_PRECO /100) *($PRODUTO_DESCONTO);
								$desconto =  $PRODUTO_PRECO - $precoComDesconto ; 
								echo " <span style='color:yellow;'> R$$desconto</span> "; 
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
						
						<td >
							<a type="button"  data-bs-toggle="modal" data-bs-target="#mymodal<?php echo $PRODUTO_ID; ?>"><i style="color: yellow" class="align-middle" data-feather="image"></i> <span class="align-middle"> </a>
							<div class="modal body" id="mymodal<?php echo $PRODUTO_ID;  $capituraid = $PRODUTO_ID; ?>" tabindex="-1" aria-hidden="true" aria-labelledby="exampleModalToggleLabel">
								<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-body">
									
									<?php
									
									$stmt = $pdo->prepare("SELECT * FROM PRODUTO_IMAGEM WHERE PRODUTO_ID = $capituraid");
									$stmt->execute();

									if($stmt->rowCount() > 0){
										while ($dados = $stmt->fetch(pdo::FETCH_ASSOC)){
											"{$dados['IMAGEM_ID']}";
											echo "<img  src='{$dados['IMAGEM_URL']}'>";
											echo "{$dados['IMAGEM_ORDEM']}";
											echo "<a style='position:relative; left:46%; ' href='atualizar/atualizarform_imagem.php?id={$dados['IMAGEM_ID']} '><i class='align-middle' data-feather='image'></i> <span class='align-middle'></span></a>";
										}
									 
										}
									?>
									<br>
									<br>
									<br>
									<div class="modal-footer" >
											<button type="button"  class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
									</div>
										</div> 
									</div>
								</div>
								</div>
							</div>    
						</td>
						<td>
						<?php
						$PRODUTO_ATIVO;
						if($PRODUTO_ATIVO == "1"){ ?>
							<i class="align-middle" style="color:green;"  data-feather="check-circle"></i> <span class="align-middle"></span>
						<?php }else{ ?>
							<i class="align-middle" style="color:red;" data-feather="alert-octagon"></i> <span class="align-middle"></span>
						<?php
						} 
						?>
						</td> 
						<td>
							<a href="atualizar/atualizarform_produto.php?id=<?php echo $PRODUTO_ID ?>"><i class="align-middle" data-feather="edit"></i> <span class="align-middle"></span></a>
						</td>
					<!-- <td>
							<a href="excluirform_adm.php?id=<?php// echo $linha["PRODUTO_ID"] ?>">Excluir</a>
						</td> -->
					</tr>
				<?php
					}
				?>
				</table>
				
			</main>

			
		</div>
	</div>

	<script src="js/app.js"></script>
	<script src="js/teste2.js"></script>

</body>

</html>
<?php else: header ("Location:   loginadministrador.php"); endif ?>