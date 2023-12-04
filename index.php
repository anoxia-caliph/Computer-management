<?php
require_once 'ComputerManager.php';
require_once 'UserManager.php';
require_once 'TransactionManager.php';

// Initialize computer, user, and transaction managers
$computerManager = new ComputerManager();
$userManager = new UserManager();
$transactionManager = new TransactionManager($computerManager, $userManager);

// Add computers
$computerManager->addComputer("Desktop", "Dell", "Core i5", 8);
$computerManager->addComputer("Laptop", "HP", "Core i7", 16);

// Display available computers
$computerManager->displayComputers();

// Create users
$user1 = $userManager->createUser("Alice");
$user2 = $userManager->createUser("Bob");

// Display users
$userManager->displayUsers();

// Users perform transactions
$transactionManager->borrowComputer($user1, $computerManager->getComputerByIndex(0));
$transactionManager->borrowComputer($user2, $computerManager->getComputerByIndex(1));

// Display transaction details
$transactionManager->displayTransactions();

// Users return computers
$transactionManager->returnComputer($user1, $computerManager->getComputerByIndex(0));
$transactionManager->returnComputer($user2, $computerManager->getComputerByIndex(1));

// Display available computers after returns
$computerManager->displayComputers();
?>
