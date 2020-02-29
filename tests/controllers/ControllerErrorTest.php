<?php

namespace controllers;

use phpDocumentor\Reflection\Types\Object_;
use PHPUnit\Framework\TestCase;

class ControllerErrorTest extends TestCase {

    public function setUp() :void {
        require_once(__NAMESPACE__."/ControllerError.php");
    }

    public function test_construct() {
        $construct = new \ControllerError(404);
        $this->assertNull($construct->__construct(404));
    }
}