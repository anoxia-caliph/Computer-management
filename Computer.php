<?php
class Computer {
    private $type;
    private $brand;
    private $processor;
    private $memory;
    private $available;

    public function __construct($type, $brand, $processor, $memory) {
        $this->type = $type;
        $this->brand = $brand;
        $this->processor = $processor;
        $this->memory = $memory;
        $this->available = true;
    }

    public function getType() {
        return $this->type;
    }

    public function getBrand() {
        return $this->brand;
    }

    public function getProcessor() {
        return $this->processor;
    }

    public function getMemory() {
        return $this->memory;
    }

    public function isAvailable() {
        return $this->available;
    }

    public function setAvailable($available) {
        $this->available = $available;
    }
}
?>
