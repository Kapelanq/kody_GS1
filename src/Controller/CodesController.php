<?php

namespace App\Controller;

use App\Entity\KodyKreskowe;
use Countable;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Console\Helper\Dumper;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use function PHPUnit\Framework\any;

class CodesController extends AbstractController
{
    #[Route('/codes', name: 'app_codes')]
    public function codesManager(EntityManagerInterface $entityManager, HttpClientInterface $client): Response
    {
        // kontroler wymaga tego, żeby w bazie danych znajdowały się już jakieś kody
        // jest tutaj jeszcze dużo miejsca na ewentualne poprawki czy nowe funkcjonalności

        //połączenie z bazą danych i tabelą kody
        $repository = $entityManager->getRepository(KodyKreskowe::class);

        //zmienna do szukania ilości kodów w tabeli
        $allProducts = $repository->findAll();

         for ($i=1; $i <= count($allProducts); $i++)
         { 
            //zmienna odwołująca się do poszczególnego kodu
            $product = $repository->find($i);
           
            //wysyłanie zapytania do api GS1
            $response = $client->request('GET', 'https://mojegs1.pl/api/v2/products', [
                'auth_basic' => ['75979', '4857401d9534962a61d764362d46e11e'],
                 'query' => [
                     'filter[keyword]' => $product->getCode(), 
                 ]
             ]);

            //zmienna przechowująca dane zwrotne z api w postaci tabeli
            $responseArray = $response->toArray();
             
            // sprawdza czy istnieją informacje o produkcie; kiedy są wtedy pojawia się
            // zagnieżdżona tablica z indyfikatorem '0', co umożliwia wypisanie
            // informacji o produkcji z api, albo że nie ma tego produktu w ich spisie
             if (array_key_exists(0, $responseArray['data']))
             {
                $productInfo = $responseArray['data'][0]['attributes'];
            
                $product->setBrandName($productInfo['brandName']);
                $product->setCommonName($productInfo['commonName']);
                $product->setDescription($productInfo['description']);
                $product->setDescriptionLanguage($productInfo['descriptionLanguage']);
                $product->setGpcCode($productInfo['gpcCode']);
                $product->setInternalSymbol($productInfo['internalSymbol']);
                $product->setLastModificationDate($productInfo['lastModificationDate']);
                $product->setName($productInfo['name']);
                $product->setNetContent($productInfo['netContent']);
                $product->setNetContentUnit($productInfo['netContentUnit']);
                $product->setPackaging($productInfo['packaging']);
                $product->setProductImage($productInfo['productImage']);
                $product->setProductWebsite($productInfo['productWebsite']);
                $product->setQualityDetails(implode($productInfo['qualityDetails']['suggestions']));
                $product->setStatus($productInfo['status']);
                $product->setSubBrandName($productInfo['subBrandName']);
                $product->setTargetMarket(implode(",", $productInfo['targetMarket']));
                $product->setVariant($productInfo['variant']);
             }
             else
             {
                $product->setDescription("Nie ma informacji o tym produkcie w GS1");    
             }
             $entityManager->flush();
         }

         //renderuje widok, można tutaj wypisywać dane z bazy w przyszłości
        return $this->render('codes/index.html.twig', [
            'codes' => 'codes',
        ]);
    }
}
