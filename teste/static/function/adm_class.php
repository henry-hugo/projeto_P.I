<?php



class ADMINISTRADOR{

    public function login($email , $senha){
        global $pdo;

        $sql ="SELECT * FROM ADMINISTRADOR WHERE ADM_EMAIL = :email AND ADM_SENHA = :senha";

        $sql= $pdo->prepare($sql);
        $sql->bindValue("email", $email);
        $sql->bindValue("senha", $senha);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $dado = $sql->fetch();

            $_SESSION['iduser'] = $dado['ADM_ID'];

            return true;
        
        }else{
            return false;
        }
    }

    public function logged($id){
        global $pdo;

        $array = array();

        $sql = "SELECT ADM_NOME FROM ADMINISTRADOR WHERE ADM_ID = :iduser";
        $sql = $pdo->prepare($sql);
        $sql->bindValue("iduser", $id);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $array = $sql->fetch();
        }

        return $array;
    }

}