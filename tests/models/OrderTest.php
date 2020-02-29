<?php

namespace models;

use phpDocumentor\Reflection\Types\Object_;
use PHPUnit\Framework\TestCase;

class OrderTest extends TestCase {

    public function setUp() :void {
        require_once(__NAMESPACE__."/Order.php");
    }

    public function test_getItem() {
        $this->assertIsArray(\Order::getItem("pates", 3));
        $this->assertNotNull(\Order::getItem("pates", 3));
    }

    public function test_getItems() {
        $this->assertIsArray(\Order::getItems("pates"));
        $this->assertNotNull(\Order::getItems("pates"));
    }

    public function test_getContenuItem() {
        $this->assertIsArray(\Order::getContenuItem("contenu_pates", 26));
        $this->assertNotNull(\Order::getContenuItem("contenu_pates", 26));
    }

    public function test_setMenu() {
        $this->assertNull(\Order::setMenu(5));
    }

    public function test_getPates() {
        $this->assertIsArray(\Order::getPates());
        $this->assertNotNull(\Order::getPates());
    }

    public function test_getLastMenu() {
        $this->assertIsInt(\Order::getLastMenu());
        $this->assertNotNull(\Order::getLastMenu());
    }

    public function test_setItem() {
        $this->assertIsInt(\Order::setitem("contenu_pates", 26, 3));
        $this->assertNotNull(\Order::setitem("contenu_pates", 26, 3));
    }

    public function test_getMenus() {
        $this->assertIsArray(\Order::getMenus(20));
        $this->assertNotNull(\Order::getMenus(20));
    }

    public function test_getMenusNonPrepa() {
        $this->assertIsArray(\Order::getMenusNonPrepa());
        $this->assertNotNull(\Order::getMenusNonPrepa());
    }

    public function test_getMenusNonPayer() {
        $this->assertIsArray(\Order::getMenusNonPayer(20));
        $this->assertNotNull(\Order::getMenusNonPayer(20));
    }

    public function test_setMenusNonPrepared() {
        $this->assertNull(\Order::setMenuNonPrepared(20));
    }

    public function test_setMenuNonPayed() {
        $this->assertNull(\Order::setMenuNonPayed(20));
    }

    public function test_getMenusPrepared() {
        $this->assertNull(\Order::setMenuNonPrepared(20));
    }

    public function test_setMenuPayed() {
        $this->assertNull(\Order::setMenuPayed(20));
    }

    public function test_getCountMenusDays() {
        $this->assertIsString(\Order::getCountMenusDays(20));
        $this->assertNotNull(\Order::getCountMenusDays(20));
    }

    public function test_getTotalPrixMenusDays() {
        $this->assertNull(\Order::setMenuPayed(26));
    }

    public function test_setProduct() {
        $this->assertNull(\Order::setProduct("pates", "nom", 2));
    }
}