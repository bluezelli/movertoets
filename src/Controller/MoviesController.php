<?php

namespace App\Controller;

use App\Entity\Genre;
use App\Repository\MovieRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MoviesController extends AbstractController
{
    #[Route('/genre', name: 'app_genre')]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $genres = $entityManager->getRepository(Genre::class)->findAll();

        return $this->render('movies/index.html.twig', [
        'genre'=>$genres
        ]);
    }

    #[Route('/movie/{id}', name: 'app_movie')]
    public function showMovies(MovieRepository $movieRepository, Genre $genre): Response
    {
        $movies = $movieRepository->find(['genre', $genre]);
    }

}
