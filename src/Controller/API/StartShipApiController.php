<?php

namespace App\Controller\API;

use App\Repository\StarshipRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class StartShipApiController extends AbstractController
{
    #[Route('/api/starships', name: 'api_starships', methods: ['GET'])]
    public function getCollection(
        StarshipRepository $repository,
    ): Response {
        $starships = $repository->findAll();

        return $this->json($starships);
    }

    #[Route('/api/starships/{id<\d+>}', name: 'api_starship', methods: ['GET'])]
    public function get(int $id, StarshipRepository $repository): Response
    {
        $starship = $repository->find($id);

        if (!$starship) {
            throw $this->createNotFoundException('Starship not found');
        }

        return $this->json($starship);
    }
}
