<?php

namespace models;

use phpDocumentor\Reflection\Types\Object_;
use PHPUnit\Framework\TestCase;

class ModelTest extends TestCase {

    public function setUp() :void {
        require_once(__NAMESPACE__."/Model.php");
    }

    public function test_getInstance() {
        $this->assertNotNull(\Model::getInstance());
    }
}