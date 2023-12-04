<?php
require_once 'User.php';

class UserManager {
    private $users = [];

    public function createUser($name) {
        $user = new User($name);
        $this->users[] = $user;
        return $user;
    }

    public function displayUsers() {
        echo "Users:\n";
        foreach ($this->users as $index => $user) {
            echo ($index + 1) . ". " . $user->getName() . "\n";
        }
        echo "\n";
    }
}
?>
