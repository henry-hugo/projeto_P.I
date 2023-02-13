<?php
  require "function/verificar.php";
  $_POST['produto'] = $_POST['produto']  ?? '' ; 
if($_POST['produto'] == ''){
	$query_produtos = "SELECT DISTINCT pro.PRODUTO_ATIVO, pro.PRODUTO_ID, pro.PRODUTO_NOME AS pro_PRODUTO_NOME, pro.CATEGORIA_ID, pro.PRODUTO_DESC, pro.PRODUTO_PRECO, pro.PRODUTO_DESCONTO,
	est.PRODUTO_QTD 
	FROM PRODUTO pro
	LEFT JOIN PRODUTO_ESTOQUE AS est ON est.PRODUTO_ID = pro.PRODUTO_ID
	 ";

	$result_produtos = $pdo->prepare($query_produtos);
	$result_produtos->execute();
}if($_POST['produto'] == '0'){
	$query_produtos = "SELECT DISTINCT pro.PRODUTO_ATIVO, pro.PRODUTO_ID, pro.PRODUTO_NOME AS pro_PRODUTO_NOME, pro.CATEGORIA_ID, pro.PRODUTO_DESC, pro.PRODUTO_PRECO, pro.PRODUTO_DESCONTO,
	est.PRODUTO_QTD 
	FROM PRODUTO pro
	LEFT JOIN PRODUTO_ESTOQUE AS est ON est.PRODUTO_ID = pro.PRODUTO_ID
	WHERE PRODUTO_ATIVO = 0 ";

	$result_produtos = $pdo->prepare($query_produtos);
	$result_produtos->execute();
}if($_POST['produto'] == '1'){
	$query_produtos = "SELECT DISTINCT pro.PRODUTO_ATIVO, pro.PRODUTO_ID, pro.PRODUTO_NOME AS pro_PRODUTO_NOME, pro.CATEGORIA_ID, pro.PRODUTO_DESC, pro.PRODUTO_PRECO, pro.PRODUTO_DESCONTO,
	est.PRODUTO_QTD 
	FROM PRODUTO pro
	LEFT JOIN PRODUTO_ESTOQUE AS est ON est.PRODUTO_ID = pro.PRODUTO_ID
	WHERE PRODUTO_ATIVO = 1 ";

	$result_produtos = $pdo->prepare($query_produtos);
	$result_produtos->execute();
}
					
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
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

	<link rel="canonical" href="https://demo-basic.adminkit.io/pages-blank.html" />

	<title>Blank Page | AdminKit Demo</title>

	<link href="css/app.css" rel="stylesheet">
	<style>
		td img{
			width:200px;
			height:200px;
			padding: 10px;
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
				<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">
					<i class="align-middle" data-feather="plus"></i>
					Criar Produto
				</button>
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
				
				<div >
					<input class="form-control" id="myInput" type="search"  placeholder="Procurar.." style="float:right; width:300px;">
				</div>
				
				<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
					<div class="modal-body">
					
				<form class="was-validated" action="criaproduto/criaprodutos.php" method="POST" enctype="multipart/form-data">
						<h3 class="modal-title" id="staticBackdropLabel">Cadastro de produto <input  type="range" class="form-range" min="0" max="1" id="ativo" name="ativo" value="1" style="width:50px; padding-top:13px;"></h3> 
						<label for="exampleFormControlInput1" class="form-label">Nome</label>
						<input type="text"  class="form-control is-invalid" name="nome" required onchange='campobranco' id="categoria_name" placeholder="abc">
						<label for="exampleFormControlInput1" class="form-label">Categoria</label>
						<select class="form-select is-invalid"  required aria-label="select example"  name="categoria">
							
						<?php
							$stmt = $pdo->prepare("SELECT * FROM CATEGORIA WHERE CATEGORIA_ATIVO");
							$stmt->execute();

							if($stmt->rowCount() > 0){
							while ($dados = $stmt->fetch(pdo::FETCH_ASSOC)){
								echo "<option value='{$dados['CATEGORIA_ID']}'>{$dados['CATEGORIA_NOME']}</option>";
							}
							}
						?>
						</select>
						<label for="exampleFormControlInput1" class="form-label">Descrição</label> 
						<textarea class="form-control" name="descricao" required onchange='campobranco'></textarea>
						<label for="exampleFormControlInput1" class="form-label">Preço</label>
						<input type="number" class="form-control" oninput="validity.valid||(value='');" min="1"  step="0.01" name="preco"   required onchange='campobranco'>
						<label for="exampleFormControlInput1" class="form-label">Desconto <i>(0% á 100%)</i></label>
						<input type="number" class="form-control" oninput="validity.valid||(value='');" min="0" max="100" name="desconto" required onchange='campobranco'>
						<label for="exampleFormControlInput1"  class="form-label">Quantidade Estoque<i>(1 á 999999999)</i> </label>
						<input type="number" class="form-control" oninput="validity.valid||(value='');" min="1" max="2000000000" name="quantidade" required onchange='campobranco' >
						<label for="exampleFormControlInput1" class="form-label"> imagem</label>
						<input type="file" class="form-label" name="imagem[]" multiple="multiple" >
						<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
									<input type="submit" name="SendCadUser" value="enviar" class="btn btn-primary">
								</div> 
						</form>
					</div>
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
					 <tbody id="myTable">
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
								$PRODUTO_PRECO = number_format($PRODUTO_PRECO, 2, '.', '');   
									echo "<span style='color:green;'>R$$PRODUTO_PRECO</span>" ; 
								?>
							</td>
						
							<td>
								<?php
								$PRODUTO_DESCONTO = number_format($PRODUTO_DESCONTO, 2, '.', '');
									echo "<span style='color:red;'>  $PRODUTO_DESCONTO% </span>"  ; 
								?>
							</td>
							
							<td>
								<?php
									$precoComDesconto = ($PRODUTO_PRECO /100) *($PRODUTO_DESCONTO);
									$desconto =  $PRODUTO_PRECO - $precoComDesconto ;
									$desconto = number_format($desconto, 2, '.', '');
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
								<a type="button"  href="atualizar/atualizarform_imagem.php?id=<?php echo $PRODUTO_ID; ?>"><i style="color: yellow" class="align-middle" data-feather="image"></i> <span class="align-middle"> </a>
							</td>
							<td id="ProdutoAtivo">
							<?php
							$PRODUTO_ATIVO;
							if($PRODUTO_ATIVO == "1"){ ?>
								<i class="align-middle" style="color:green;"  data-feather="check-circle"></i><span class="align-middle"></span>
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
					</tbody>
				<?php
					}
				?>
				</table>
				
			</main>

			
		</div>
	</div>

	<script src="js/app.js"></script>
	<script src="js/teste2.js"></script>
	<script src="js/procura.js"></script>

</body>

</html>
<?php else: header ("Location:   loginadministrador.php"); endif ?>