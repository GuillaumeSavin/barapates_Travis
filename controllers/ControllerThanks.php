<?php
    require_once("views/View.php");

    class ControllerThanks {
        private $_view;
        private $_error;

        public function __construct($err) {
            $this->_error = $err;
            $this->loadView();
        }

        private function loadView() {
            $this->_view = new View();
            $this->_view->loadPage("head");
            require_once("views/ViewThanks.php");
        }
    }