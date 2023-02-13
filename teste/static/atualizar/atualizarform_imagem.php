<?php

require "../function/verificaratualizar.php";
$i=0;

$id = $_GET["id"];

            //realiza uma query sql para buscar o adm que tem o email e a senha passado 
            $admin = $pdo->query("SELECT * FROM PRODUTO_IMAGEM WHERE PRODUTO_ID=  $id")->fetch();

       

            if(!empty($imagem_url = $admin['IMAGEM_URL'])){
				$imagem_url = $admin['IMAGEM_URL'];
			}else{
				$query_imagem = "INSERT INTO PRODUTO_IMAGEM
				(IMAGEM_ORDEM, IMAGEM_URL,PRODUTO_ID) VALUES
				(0,'https://th.bing.com/th/id/R.7954a9a2a6c24affc155b2a454ed4a9e?rik=JcbVY8JpWjvUfw&riu=http%3a%2f%2fconkast.com.br%2fwp-content%2fuploads%2f2018%2f12%2fimagemindisponivel.png&ehk=3fMBjyj0CcaLc%2bc6ZOMJZPmk4TfEjZpDaxNoO%2b6smQI%3d&risl=&pid=ImgRaw&r=0', $id)";
			    $img = $pdo->prepare($query_imagem);
				$img->execute();
				header('Location: ../produto.php'); 
				exit();
			} 
			
          
             

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
	<style>
		img{
			width:350px;
			height:250px;
			padding: 10px;
		}
		
		
	</style>
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
				<div style="position:relative;left:100%;transform: translate(-20%);">
				<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">
					<i class="align-middle" data-feather="plus"></i>
					Adicionar Imagem
				</button>
				</div>
				

			
			<?php
			
										
										$stmt = $pdo->prepare("	SELECT * 
																FROM PRODUTO_IMAGEM 
																WHERE PRODUTO_ID = $id 
																ORDER BY IMAGEM_ORDEM");
										$stmt->execute();

										if($stmt->rowCount() > 0){
											while ($dados = $stmt->fetch(pdo::FETCH_ASSOC)){
												echo "<div style='float:left;' >";
													echo "<img   src='{$dados['IMAGEM_URL']}'><br>";
													echo "<Form class='was-validated' Action='atualizar_imagem.php' method='POST' enctype='multipart/form-data'>";
													echo "<input type='hidden' name='id' value='{$dados['IMAGEM_ID']}'>";
													echo "<input type='number' name='imagem_ordem' oninput='validity.valid||(value='');' min='0'  value='{$dados['IMAGEM_ORDEM']}' style='width:40px;' readOnly >";
													echo "<input type='file' name='imagem' id='imagem_url' class='form-label' required><br> ";  
													// value='{$dados['IMAGEM_URL']}'>											
													echo "<button type='submit'><i class='align-middle' data-feather='image'></i> <span class='align-middle'></span></button>";
													echo "</form>"; 
													$i++;
												echo "</div>";	
												
											}
											echo ("
											<div class='modal fade' id='exampleModal' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
												<div class='modal-dialog'>
													<div class='modal-content'>
														<h2>Adicionar Imagem</h2>
														<div class='modal-body'>
														<form class='was-validated' action='../criaproduto/criaprodutos_imagem.php' method='POST' enctype='multipart/form-data'>
														<input type='hidden' name='id' value='$id'>
														<input type='hidden' name='ordem' value='$i' readOnly>
														<label for='exampleFormControlInput1' class='form-label'> imagem</label>
														<input type='file' class='form-label' name='imagem[]'  ><br>
														<input type='submit' name='enviar' value='enviar'>
														</form>
																 							
														</div>
													</div>
												</div>
											</div>
											");
											
												
											}
											
										?>


                <!--<Form class="was-validated" Action="atualizar_imagem.php" method="POST">
                    <input type="hidden" name="id" value="">
                    <label for="exampleFormControlInput1" class="form-label">IMAGEM ORDEM</label>
                    <input type="number" name="imagem_ordem" oninput="validity.valid||(value='');" min="1"  required onchange='campobranco' value="<?php echo $imagem_ordem ?>">
                    <label for="exampleFormControlInput1"  class="form-label">IMAGEM URL</label>
                    <input type="url" name="imagem_url" class="form-label"  required onchange='campobranco' value="">
                    <BR>
                    <input type="submit" value="Enviar"> 
                </Form>-->
			</main>

			
		</div>
	</div>

	<script src="../js/app.js"></script>
  <script src="../js/teste3.js"></script>

</body>

</html>
<?php else: header ("Location:../loginadministrador.php"); endif ?>