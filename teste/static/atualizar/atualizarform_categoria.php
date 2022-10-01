<?php
 require "../function/verificar.php";

//captura o vaor das variaves
            $nome = $_POST["nome"];
            $desc = $_POST["desc"];
            $id = $_POST["id"];
            if(isset($_POST["ativo"])){
                $ativo =$_POST['ativo'];
            }else{
                $ativo = 0;
            }; 
            echo $ativo;
    
         $admin = $pdo->query("UPDATE CATEGORIA SET CATEGORIA_ATIVO= $ativo, CATEGORIA_NOME= '$nome' , CATEGORIA_DESC= '$desc'  WHERE CATEGORIA_ID= $id")->fetchAll();

        if ( count($admin) == 0) {
             echo "<script>location.href='../categoria.php'</script>";
        } else { 
           echo "erro";
        }
?>