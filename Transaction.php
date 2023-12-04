<?php
class Transaction {
    private $user;
    private $computer;

    public function __construct($user, $computer) {
        $this->user = $user;
        $this->computer = $computer;
    }

    public function getUser() {
        return $this->user;
    }

    public function getComputer() {
        return $this->computer;
    }
}
?>
