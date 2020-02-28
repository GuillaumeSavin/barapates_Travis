<?php
require_once("views/View.php");

class ControllerError {
    private $_view;
    private $_error;

    public function __construct($err) {
        $this->_error = $err;
        $this->loadView();
    }

    private function loadView() {
        $this->_view = new View();

        if(is_array($this->_error)) {
            $err = "";
        } else {
            $err = $this->_error;
        }

        $this->_view->loadPage("head");
        require_once("views/ViewError.php");
    }
}