<?php

namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Services\CodesService;


class ApplicationController extends AbstractController
{
    public function __construct(
        private CodesService $codesManager
    )
    {
        
    }

    #[Route('/codes', name: 'app_codes')]
    public function start(): Response
    {
        $this->codesManager->makeRequest();
        
        return $this->render('codes/index.html.twig', [
            
        ]);
    }
}
