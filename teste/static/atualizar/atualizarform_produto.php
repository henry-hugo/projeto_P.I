<?php

require "../function/verificaratualizar.php";

$id = $_GET["id"];

            //realiza uma query sql para buscar o adm que tem o email e a senha passado 
            $admin = $pdo->query("SELECT * FROM PRODUTO WHERE PRODUTO_ID=" . $id)->fetch();
            $admin1 = $pdo->query("SELECT * FROM PRODUTO_ESTOQUE WHERE PRODUTO_ID=" . $id)->fetch();
            //$admin2 = $pdo->query("SELECT * FROM PRODUTO_IMAGEM WHERE PRODUTO_ID=" . $id)->fetch();

            //se o retorna for vazio 0 , entao a senha ou email estao incorretos

            $nome = $admin["PRODUTO_NOME"];
            $preco = $admin["PRODUTO_PRECO"];
            $desconto = $admin["PRODUTO_DESCONTO"];
            $desc = $admin["PRODUTO_DESC"];
            $ativo = $admin["PRODUTO_ATIVO"];
			if(isset($admin1["PRODUTO_QTD"])) {
				$quantidade = $admin1["PRODUTO_QTD"];
			}else{
				$quantidade = '0';
			}
            
            //$imagem = $admin2["IMAGEM_URL"];
            //$imagem_ordem = $admin2["IMAGEM_ORDEM"];

            if(isset($_SESSION['iduser']) && !empty($_SESSION['iduser'])): ?>

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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link rel="preconnect" href="https://fonts.gstatic.com">
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

						<li class="sidebar-item active ">
							<a class="sidebar-link" href="../produto.php">
								<i class="align-middle" data-feather="book"></i> <span class="align-middle">Produto</span>
							</a>
						</li>


						<li class="sidebar-item ">
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
      <Form class="was-validated" Action="atualizar_produto.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $id ?>">
                <label for="exampleFormControlInput1"  class="form-label">NOME</label>
                <input type="text" name="nome" class="form-control"  required onchange='campobranco' value="<?php echo $nome ?>">
                <label for="exampleFormControlInput1" class="form-label">PREÇO</label>
                <input type="number" oninput="validity.valid||(value='');" min="1"  step="0.01" name="preco" class="form-control" required onchange='campobranco' value="<?php echo $preco ?>">
                <label for="exampleFormControlInput1" class="form-label">CATEGORIA</label>
                <select class="form-control" name="categoria">
                  <?php
                    $stmt = $pdo->prepare("SELECT * FROM CATEGORIA WHERE CATEGORIA_ATIVO ");
                    $stmt->execute();

                    if($stmt->rowCount() > 0){
                      while ($dados = $stmt->fetch(pdo::FETCH_ASSOC)){
                        echo "<option value='{$dados['CATEGORIA_ID']}'>{$dados['CATEGORIA_NOME']}</option>";
                      }
                    }
                  ?>
                </select>
                <label for="exampleFormControlInput1" class="form-label" >DESCONTO<i style="font-size:12px;">(de 0% á 100%)</i></label>
                <input type="number" name="desconto" oninput="validity.valid||(value='');" min="0" max="100"  class="form-control" required onchange='campobranco' value="<?php echo $desconto ?>">
                <label for="exampleFormControlInput1" class="form-label">DESCRIÇÃO</label>
                <textarea name="desc" class="form-control" required onchange='campobranco'><?php echo $desc ?></textarea>
                <label for="exampleFormControlInput1" class="form-label">QUANTIDADE<i style="font-size:12px;">(de 1 á 2000000000)</i></label>
                <input type="number" name="quantidade" oninput="validity.valid||(value='');" min="1" max="2000000000" class="form-control" required onchange='campobranco' value="<?php echo $quantidade ?>">
				<br>
                <label for="exampleFormControlInput1" class="form-label">PRODUTO ATIVO</label>
				<input  type="range" class="form-range" min="0" max="1" id="ativo" name="ativo" value="1" style="width:50px; padding-top:13px;">
                <BR>
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

