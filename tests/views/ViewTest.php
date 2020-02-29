<?php

    namespace views;

    use phpDocumentor\Reflection\Types\Object_;
    use PHPUnit\Framework\TestCase;

    class ViewTest extends TestCase {

        public function setUp() :void {
            require_once(__NAMESPACE__."/View.php");
        }

        public function test_loadpage() {
            $view = new \View();
            $this->assertNull(($view->loadpage("footer")));
        }
    }