<?php
require_once 'Transaction.php';

class TransactionManager {
    private $computerManager;
    private $userManager;
    private $transactions = [];

    public function __construct($computerManager, $userManager) {
        $this->computerManager = $computerManager;
        $this->userManager = $userManager;
    }

    public function borrowComputer($user, $computer) {
        $transaction = new Transaction($user, $computer);
        $computerIndex = array_search($computer, $this->computerManager->getComputers());
        if ($this->computerManager->getComputers()[$computerIndex]->isAvailable()) {
            $this->computerManager->getComputers()[$computerIndex]->setAvailable(false);
            $this->transactions[] = $transaction;
        } else {
            echo "Computer not available for borrowing.\n";
        }
    }

    public function returnComputer($user, $computer) {
        $computerIndex = array_search($computer, $this->computerManager->getComputers());
        if (!$this->computerManager->getComputers()[$computerIndex]->isAvailable()) {
            $this->computerManager->getComputers()[$computerIndex]->setAvailable(true);
            foreach ($this->transactions as $key => $transaction) {
                if ($transaction->getUser() == $user && $transaction->getComputer() == $computer) {
                    unset($this->transactions[$key]);
                    break;
                }
            }
        }
    }

    public function displayTransactions() {
        echo "Transaction Details:\n";
        foreach ($this->transactions as $transaction) {
            echo "User: " . $transaction->getUser()->getName() . ", Computer: " . $transaction->getComputer()->getType() . " - " . $transaction->getComputer()->getBrand() . " - " . $transaction->getComputer()->getProcessor() . " - " . $transaction->getComputer()->getMemory() . "GB\n";
        }
        echo "\n";
    }
}
?>
