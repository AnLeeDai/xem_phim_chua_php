<?php

require_once PATH_MODEL . 'BaseModal.php';

class GenresModal extends BaseModal
{
    protected $table = 'genres';

    public function insertGenre($genreName)
    {
        $sql = "INSERT INTO {$this->table} (genre_name) VALUES (:genre_name)";
        $stmt = $this->getPDO()->prepare($sql);
        $stmt->bindValue(':genre_name', $genreName, PDO::PARAM_STR);

        return $stmt->execute();
    }

    public function getAllGenres()
    {
        $sql = "SELECT * FROM {$this->table}";
        $stmt = $this->getPDO()->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
