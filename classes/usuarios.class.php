<?php
class Usuarios {

    public function login($email, $senha) {
        global $pdo;

        $sql = $pdo->prepare("SELECT id FROM usuarios WHERE email = :email AND senha = :senha");
        $sql->bindValue(":email", $email);
        $sql->bindValue(":senha", md5($senha));
        $sql->execute();

        if($sql->rowCount() > 0) {
            $dado = $sql->fetch();
            $_SESSION['cLogin'] = $dado['id'];
            return true;
        } else {
            return false;
        }

    }
}