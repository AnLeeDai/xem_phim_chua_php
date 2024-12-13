<?php

require_once PATH_MODEL . 'GenresModal.php';

class GenresController
{
    private $genres;

    public function __construct()
    {
        $genresModal = new GenresModal();
        $this->genres = $genresModal->select('*');
    }

    public function getGenres()
    {
        return $this->genres;
    }
}
