<?php
class Router {
    private $_ctrl;

    public function routeReq() {
        try {
            spl_autoload_register(function($class) {
                require_once('models/'.$class.".php");
            });

            $url = "";

            if(isset($_GET["p"])) {
                $url = explode("/", filter_var(stripcslashes(trim(htmlspecialchars($_GET['p']))), FILTER_SANITIZE_URL));
                $controller = ucfirst(strtolower($url[0]));
                $controllerClass = "Controller".$controller;
                $controllerFile = "controllers/".$controllerClass.".php";

                if(file_exists($controllerFile)) {
                    require_once($controllerFile);
                        $this->_ctrl = new $controllerClass($url);
                } else {
                    require_once("controllers/ControllerError.php");
                    $this->_ctrl = new ControllerError(404);
                }
            } else {
                require_once("controllers/ControllerHome.php");
                $this->_ctrl = new ControllerHome($url);
            }
        } catch(Exception $e) {
            require_once("controllers/ControllerError.php");
            $this->_ctrl = new ControllerError($e);
        }
    }

}