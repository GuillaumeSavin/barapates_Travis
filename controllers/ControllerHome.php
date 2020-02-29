<?php
require_once("views/View.php");

class ControllerHome {
    private $_view;

    public function __construct($url) {
        $this->loadView($url);
    }

    private function loadView($url) {
        $this->_view = new View();
        $this->_view->loadPage("head");
        require_once("views/ViewHome.php");

        if(isset($_POST['connexion'])) {
            $login = htmlspecialchars($_POST['login']);

            if(password_verify(htmlspecialchars($_POST['password']), Users::reqUser($login)['password'])) {
                $_SESSION['login'] = $login;
                header('Location: dashboard');
            }
        }

        if(isset($_GET['disconnect'])) {
            session_destroy();
            header('Location: index');
        }

        if(isset($_SESSION['login'])) {
            header('Location: dashboard');

        }
    }
}