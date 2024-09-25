<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Services\CodesService;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Messenger\Transport\Serialization\SerializerInterface;


class ApplicationController extends AbstractController
{
    public function __construct(
        private CodesService $codesService,
        private SerializerInterface $serializer,
    )
    {
        
    }

    #[Route('/codes', name: 'get_viewCodes', methods: ['GET'])]
    public function getReturnCodesData(): Response
    {
        $products = $this->codesService->displayAllProductsData();
        $serialized = $this->container->get('serializer')->serialize($products, 'json');
        $response = new Response(
            $serialized,
            Response::HTTP_OK,
            ['content-type' => 'application/json']  
        );

        return $response;
    }

    #[Route('/codes', name: 'post_addCode', methods:['POST'])]
    public function postAddCode(Request $request): Response
    {
        $data = $request->getContent();


        $this->codesService->addCode($data);

        $response = new Response(
            'Code succesfully added!',
            Response::HTTP_OK,
            ['content-type' => 'text/html']
        );

        return $response;
    }
}
