<?php

require_once 'BaseModal.php';

class MoviesModal extends BaseModal
{
    protected $table = 'movies';

    public function getMoviesWithFilters($search = '', $genreId = '', $offset = 0, $perPage = PHP_INT_MAX)
    {
        $conditions = [];
        $params = [];

        if (!empty($search)) {
            $conditions[] = 'm.title LIKE :search';
            $params['search'] = '%' . $search . '%';
        }

        if (!empty($genreId) && is_numeric($genreId)) {
            $conditions[] = 'm.genre_id = :genre_id';
            $params['genre_id'] = $genreId;
        }

        $whereClause = count($conditions) > 0 ? 'WHERE ' . implode(' AND ', $conditions) : '';

        $sql = "
        SELECT m.movie_id, m.title, m.banner, m.release_date, m.price, m.genre_id, g.genre_name
        FROM movies m
        INNER JOIN genres g ON m.genre_id = g.genre_id
        $whereClause
        ORDER BY m.movie_id DESC
        LIMIT :offset, :perPage
    ";

        $stmt = $this->getPDO()->prepare($sql);
        $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
        $stmt->bindValue(':perPage', $perPage, PDO::PARAM_INT);

        foreach ($params as $key => $value) {
            $stmt->bindValue(':' . $key, $value, is_numeric($value) ? PDO::PARAM_INT : PDO::PARAM_STR);
        }

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public function countMoviesWithFilters($search, $genreId)
    {
        $conditions = [];
        $params = [];

        if (!empty($search)) {
            $conditions[] = 'title LIKE :search';
            $params['search'] = '%' . $search . '%';
        }

        if (!empty($genreId) && is_numeric($genreId)) {
            $conditions[] = 'genre_id = :genre_id';
            $params['genre_id'] = $genreId;
        }

        $whereClause = count($conditions) > 0 ? 'WHERE ' . implode(' AND ', $conditions) : '';

        $sql = "
            SELECT COUNT(*) as total
            FROM movies
            $whereClause
        ";

        $stmt = $this->getPDO()->prepare($sql);

        foreach ($params as $key => $value) {
            $stmt->bindValue(':' . $key, $value, is_numeric($value) ? PDO::PARAM_INT : PDO::PARAM_STR);
        }

        $stmt->execute();

        return $stmt->fetchColumn();
    }

    public function insertMovie($data)
    {
        $sql = "
        INSERT INTO movies (title, genre_id, release_date, price, description, banner, video_url, download_url)
        VALUES (:title, :genre_id, :release_date, :price, :description, :banner, :video_url, :download_url)
    ";
        $stmt = $this->getPDO()->prepare($sql);
        $stmt->bindValue(':title', $data['title'], PDO::PARAM_STR);
        $stmt->bindValue(':genre_id', $data['genre_id'], PDO::PARAM_INT);
        $stmt->bindValue(':release_date', $data['release_date'], PDO::PARAM_STR);
        $stmt->bindValue(':price', $data['price'], PDO::PARAM_INT);
        $stmt->bindValue(':description', $data['description'], PDO::PARAM_STR);
        $stmt->bindValue(':banner', $data['banner'], PDO::PARAM_STR);
        $stmt->bindValue(':video_url', $data['video_url'], $data['video_url'] ? PDO::PARAM_STR : PDO::PARAM_NULL);
        $stmt->bindValue(':download_url', $data['download_url'], $data['download_url'] ? PDO::PARAM_STR : PDO::PARAM_NULL);

        return $stmt->execute();
    }


    // Get a single movie by ID
    public function getMovieById($movieId)
    {
        $sql = "SELECT * FROM movies WHERE movie_id = :movie_id";
        $stmt = $this->getPDO()->prepare($sql);
        $stmt->bindValue(':movie_id', $movieId, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Update a movie
    public function updateMovie($movieId, $data)
    {
        $sets = implode(', ', array_map(fn($key) => "$key = :$key", array_keys($data)));

        $sql = "UPDATE {$this->table} SET $sets WHERE movie_id = :movie_id";
        $stmt = $this->getPDO()->prepare($sql);

        foreach ($data as $key => $value) {
            $stmt->bindValue(":$key", $value !== null ? $value : null, $value !== null ? (is_numeric($value) ? PDO::PARAM_INT : PDO::PARAM_STR) : PDO::PARAM_NULL);
        }
        $stmt->bindValue(':movie_id', $movieId, PDO::PARAM_INT);

        return $stmt->execute();
    }

    // Delete a movie
    public function deleteMovie($movieId)
    {
        $sql = "DELETE FROM {$this->table} WHERE movie_id = :movie_id";
        $stmt = $this->getPDO()->prepare($sql);
        $stmt->bindValue(':movie_id', $movieId, PDO::PARAM_INT);
        return $stmt->execute();
    }
}
