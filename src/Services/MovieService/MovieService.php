<?php

namespace WhatToWatch\Services\MovieService;

class MovieService 
{
    private MovieRepository $repository;

    public function __construct(MovieRepository $repository) {
        $this->repository = $repository;
    }

    public function getMovie(string $imdbId) {
        return $this->repository->findMovieById($imdbId);
    }
}