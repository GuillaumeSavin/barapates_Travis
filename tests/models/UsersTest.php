<?php

namespace models;

use phpDocumentor\Reflection\Types\Object_;
use PHPUnit\Framework\TestCase;

class UsersTest extends TestCase {

    public function setUp() :void {
        require_once(__NAMESPACE__."/Users.php");
    }

    public function test_reqUser() {
        $this->assertNotNull(\Users::reqUser("admin"));
        $this->assertIsArray(\Users::reqUser("admin"));
    }

    public function test_setPassword() {
        $this->assertNull(\Users::setPassword("admin"));
    }
}