<?php

namespace controllers;

use phpDocumentor\Reflection\Types\Object_;
use PHPUnit\Framework\TestCase;

class ControllerSettingsTest extends TestCase {

    public function setUp() :void {
        require_once(__NAMESPACE__."/ControllerSettings.php");
    }

    public function test_construct() {
        $construct = new \ControllerSettings("");
        $this->assertNull($construct->__construct(""));
    }
}