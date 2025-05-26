<?php
namespace Tests;

use PHPUnit\Framework\TestCase;
use Src\Triqui;

class TriquiTest extends TestCase {
    private $triqui;

    protected function setUp(): void {
        $this->triqui = new Triqui();
    }

    public function testMarcarCasillaValida() {
        $this->assertTrue($this->triqui->marcar(0, 0));
        $this->assertFalse($this->triqui->marcar(0, 0));
    }

    public function testHayGanador() {
        $this->triqui->marcar(0, 0); 
        $this->triqui->marcar(1, 0); 
        $this->triqui->marcar(0, 1); 
        $this->triqui->marcar(1, 1); 
        $this->triqui->marcar(0, 2); 
        $this->assertEquals('X', $this->triqui->hayGanador());
    }

    public function testHayEmpate() {
        
        $this->triqui->marcar(0, 0); 
        $this->triqui->marcar(0, 1); 
        $this->triqui->marcar(0, 2); 
        $this->triqui->marcar(1, 1); 
        $this->triqui->marcar(1, 0); 
        $this->triqui->marcar(2, 0); 
        $this->triqui->marcar(1, 2); 
        $this->triqui->marcar(2, 2); 
        $this->triqui->marcar(2, 1); 
        
        $this->assertTrue($this->triqui->hayEmpate());
    }
}