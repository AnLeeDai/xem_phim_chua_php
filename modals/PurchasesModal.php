<?php
require_once PATH_MODEL . 'BaseModal.php';

class PurchasesModal extends BaseModal
{
    protected $table = 'purchases';

    public function hasPurchased($userId, $movieId)
    {
        $result = $this->find('*', 'user_id = :user_id AND movie_id = :movie_id', [
            'user_id' => $userId,
            'movie_id' => $movieId
        ]);
        return $result ? true : false;
    }

    public function addPurchase($userId, $movieId)
    {
        return $this->insert([
            'user_id' => $userId,
            'movie_id' => $movieId
        ]);
    }

    public function getPurchasedMoviesByUser($userId)
    {
        $sql = "
            SELECT m.movie_id, m.title, m.banner, m.release_date, m.genre_id, g.genre_name, m.price
            FROM purchases p
            INNER JOIN movies m ON p.movie_id = m.movie_id
            INNER JOIN genres g ON m.genre_id = g.genre_id
            WHERE p.user_id = :user_id
            ORDER BY p.purchase_date DESC
        ";

        $stmt = $this->getPDO()->prepare($sql);
        $stmt->bindValue(':user_id', $userId, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
