<?php

namespace controllers;

use phpDocumentor\Reflection\Types\Object_;
use PHPUnit\Framework\TestCase;

class ControllerThanksTest extends TestCase {

    public function setUp() :void {
        require_once(__NAMESPACE__."/ControllerThanks.php");
    }

    public function test_construct() {
        $construct = new \ControllerThanks(0);
        $this->assertNull($construct->__construct(0));
    }
}