<?php

require_once 'BaseModal.php';

class UsersModal extends BaseModal
{
    protected $table = 'users';

    // Increment the coin balance of a user
    public function incrementUserCoins($userId, $amount)
    {
        $sql = "UPDATE {$this->table} SET coin_balance = coin_balance + :amount WHERE user_id = :user_id";
        $stmt = $this->getPDO()->prepare($sql);
        return $stmt->execute(['amount' => $amount, 'user_id' => $userId]);
    }
}
?>
