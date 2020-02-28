<?php
class Order extends Model {
    public static function getItem($table, $id) {
        $req = parent::getInstance()->prepare("SELECT * FROM $table WHERE ID = $id");
        $req->execute();
        return $req->fetch(PDO::FETCH_ASSOC);
    }

    public static function getItems($table) {
        $req = parent::getInstance()->prepare("SELECT * FROM $table");
        $req->execute();
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getContenuItem($table, $id) {
        $req = parent::getInstance()->prepare("SELECT * FROM $table WHERE ID_commande = $id");
        $req->execute();
        return $req->fetch(PDO::FETCH_ASSOC);
    }

    public static function setMenu($prix) {
        $date = date('Y-m-d H:i:s');
        $req = parent::getInstance()->prepare("INSERT INTO menus VALUES (0, '$date', $prix, false, false)");
        $req->execute();
    }

    public static function getPates() {
        $req = parent::getInstance()->prepare("SELECT * FROM pates ORDER BY ID ASC");
        $req->execute();
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getLastMenu() {
        $req = parent::getInstance()->prepare("SELECT id FROM menus ORDER BY ID DESC LIMIT 1");
        $req->execute();
        return intval($req->fetch(PDO::FETCH_ASSOC)['id']);
    }

    public static function setitem($table, $id_commande, $id_ingredient) {
        $req = parent::getInstance()->prepare("INSERT INTO $table VALUES (0, $id_commande, $id_ingredient)");
        $req->execute();
        return intval($req->fetch(PDO::FETCH_ASSOC));
    }

    public static function getMenus($quantity) {
        $req = parent::getInstance()->prepare("SELECT * FROM menus ORDER BY id DESC LIMIT $quantity");
        $req->execute();
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getMenusNonPrepa() {
        $req = parent::getInstance()->prepare("SELECT id, prix FROM menus WHERE preparer = false ORDER BY id DESC");
        $req->execute();
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getMenusNonPayer() {
        $req = parent::getInstance()->prepare("SELECT id, prix FROM menus WHERE payer = false ORDER BY id DESC");
        $req->execute();
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function setMenuPrepared($id) {
        $req = parent::getInstance()->prepare("UPDATE menus SET preparer = true WHERE id = $id");
        $req->execute();
    }

    public static function setMenuNonPrepared($id) {
        $req = parent::getInstance()->prepare("UPDATE menus SET preparer = false WHERE id = $id");
        $req->execute();
    }

    public static function setMenuPayed($id) {
        $req = parent::getInstance()->prepare("UPDATE menus SET payer = true WHERE id = $id");
        $req->execute();
    }

    public static function setMenuNonPayed($id) {
        $req = parent::getInstance()->prepare("UPDATE menus SET payer = false WHERE id = $id");
        $req->execute();
    }

    public static function getCountMenusDays($days) { //$days = today - how many day
        $date = date('Y-m-d', strtotime(date('Y-m-d') .' -'.$days.'day'));
        $req = parent::getInstance()->prepare("SELECT COUNT(*) FROM menus WHERE date_commande = '$date'");
        $req->execute();
        return $req->fetch()[0];
    }

    public static function getTotalPrixMenusDays($days) { //$days = today - how many day
        $date = date('Y-m-d', strtotime(date('Y-m-d') .' -'.$days.'day'));
        $req = parent::getInstance()->prepare("SELECT * FROM menus WHERE date_commande = '$date'");
        $req->execute();
        $total = 0;
        foreach($req->fetchAll(PDO::FETCH_ASSOC) as $menu) {
            $total += intval($menu['prix']);
        }
        return $total;
    }

    public static function setProduct($table, $nom, $prix) {
        $req = parent::getInstance()->prepare("INSERT INTO $table VALUES (0, '$nom', '$prix')");
        $req->execute();
    }
}