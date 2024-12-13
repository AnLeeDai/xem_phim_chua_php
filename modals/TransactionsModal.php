<?php
require_once PATH_MODEL . 'BaseModal.php';

class TransactionsModal extends BaseModal
{
    protected $table = 'transactions';

    public function insert($data)
    {
        $sql = "
            INSERT INTO {$this->table} (user_id, amount, transaction_type, transaction_date)
            VALUES (:user_id, :amount, :transaction_type, NOW())
        ";

        $stmt = $this->getPDO()->prepare($sql);
        $stmt->bindValue(':user_id', $data['user_id'], PDO::PARAM_INT);
        $stmt->bindValue(':amount', $data['amount'], PDO::PARAM_INT);
        $stmt->bindValue(':transaction_type', $data['transaction_type'], PDO::PARAM_STR);

        return $stmt->execute();
    }

    public function getPendingTransaction($userId)
    {
        $sql = "SELECT * FROM transactions WHERE user_id = :user_id AND transaction_type = 'deposit_pending'";
        $stmt = $this->getPDO()->prepare($sql);
        $stmt->bindValue(':user_id', $userId, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
