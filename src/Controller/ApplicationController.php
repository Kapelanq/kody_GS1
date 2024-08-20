<?php

namespace App\Controller;

use App\Entity\Barcodes;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Services\CodesService;
use LDAP\Result;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\SerializerInterface;

class ApplicationController extends AbstractController
{
    public function __construct(
        private CodesService $codesService,
        
    )
    {
        
    }

    #[Route('/codes', name: 'app_codes')]
    public function start(): Response
    {
        $x = $this->codesService->displayAllProductsData(1);
        $serialized = $this->container->get('serializer')->serialize($x, 'json');

        $response = new Response($serialized);

    
        $response->headers->set('Content-Type', 'application/json');


        return $response;
       
   

       
    }
}
