<?php

namespace controllers;

use phpDocumentor\Reflection\Types\Object_;
use PHPUnit\Framework\TestCase;

class ControllerHomeTest extends TestCase {

    public function setUp() :void {
        require_once(__NAMESPACE__."/ControllerHome.php");
    }

    public function test_construct() {
        $construct = new \ControllerHome("");
        $this->assertNull($construct->__construct(""));
    }
}