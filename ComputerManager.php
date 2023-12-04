<?php
require_once 'Computer.php';

class ComputerManager {
    private $computers = [];

    public function addComputer($type, $brand, $processor, $memory) {
        $computer = new Computer($type, $brand, $processor, $memory);
        $this->computers[] = $computer;
    }

    public function displayComputers() {
        echo "Available Computers:\n";
        foreach ($this->computers as $index => $computer) {
            $availability = $computer->isAvailable() ? "Available" : "Borrowed";
            echo ($index + 1) . ". " . $computer->getType() . " - " . $computer->getBrand() . " - " . $computer->getProcessor() . " - " . $computer->getMemory() . "GB - " . $availability . "\n";
        }
        echo "\n";
    }

    public function getComputerByIndex($index) {
        return $this->computers[$index];
    }
}
?>
