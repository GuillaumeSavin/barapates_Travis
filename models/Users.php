<?php
class Users extends Model {
    public static function reqUser($login) {
        $req = Model::getInstance()->prepare("SELECT * FROM user WHERE login = '$login'");
        $req->execute();
        return $req->fetch(PDO::FETCH_ASSOC);
    }
    public static function setPassword($password) {
        $password = password_hash($password, PASSWORD_BCRYPT);
        $req = parent::getInstance()->prepare("UPDATE user SET `password` = '$password' WHERE login = 'admin'");
        $req->execute();
    }
}