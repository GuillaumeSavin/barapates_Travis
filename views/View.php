<?php
class View {
    public function loadPage($page) {
        echo $this->generateFile("views/main/".$page.".php");
    }

    private function generateFile($file) {
        ob_start();
        require_once($file);
        return ob_get_clean();
    }
}