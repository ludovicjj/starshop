<?php

namespace App\Controller;

use App\Repository\StarshipRepository;
use App\Service\IssService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class MainController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function homepage(
        StarshipRepository $starshipRepository,
        IssService $IssService,
    ): Response {
        $issData = $IssService->getIssData(true);

        $ships = $starshipRepository->findAll();
        $myShip = $ships[array_rand($ships)];

        return $this->render(
            view: 'main/homepage.html.twig',
            parameters: [
                'ships' => $ships,
                'my_ship' => $myShip,
                'issData' => $issData,
            ]
        );
    }
}
