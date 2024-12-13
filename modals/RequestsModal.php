<?php

require_once 'BaseModal.php';

class RequestsModal extends BaseModal
{
    protected $table = 'requests';

    // Insert a new request
    public function insertRequest($data)
    {
        $sql = "
            INSERT INTO {$this->table} (user_id, amount, status, created_at)
            VALUES (:user_id, :amount, :status, NOW())
        ";

        $stmt = $this->getPDO()->prepare($sql);
        $stmt->bindValue(':user_id', $data['user_id'], PDO::PARAM_INT);
        $stmt->bindValue(':amount', $data['amount'], PDO::PARAM_INT);
        $stmt->bindValue(':status', $data['status'], PDO::PARAM_STR);

        return $stmt->execute();
    }

    // Get all requests
    public function getAllRequests()
    {
        return $this->select('*', null, []);
    }

    // Get a specific request by ID
    public function getRequestById($requestId)
    {
        return $this->find('*', 'request_id = :request_id', ['request_id' => $requestId]);
    }

    // Get all pending requests for a specific user
    public function getPendingRequestByUser($userId)
    {
        return $this->find('*', 'user_id = :user_id AND status = "pending"', ['user_id' => $userId]);
    }

    // Update the status of a specific request
    public function updateRequestStatus($requestId, $status)
    {
        return $this->update(['status' => $status], 'request_id = :request_id', ['request_id' => $requestId]);
    }
}
