<?php

namespace App\Services;

use App\Entity\Barcodes;
use App\Interfaces\BarcodesRepositoryInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class CodesService
{
    public function __construct(
        private BarcodesRepositoryInterface $barcodesRepository,
        private HttpClientInterface $client
        ){}

    public function displaySingleProductData(int $id): Barcodes
    {
        $singleProduct = $this->barcodesRepository->findById($id);

        return $singleProduct;
    }

    public function displayAllProductsData(): Array
    {
        $products = $this->barcodesRepository->findAllCodes();
        return $products;
    }

    public function addCode($code)
    {
        $product = new Barcodes();
        $product->setCode($code);

        $response = $this->client->request('GET', 'https://mojegs1.pl/api/v2/products', [
            'auth_basic' => ['75979', '4857401d9534962a61d764362d46e11e'],
             'query' => [
                 'filter[keyword]' => $code, 
             ]
         ]);

         $responseArray = $response->toArray();
         if (isset($responseArray['data'][0]))
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
         $this->barcodesRepository->persistData($product);
         $this->barcodesRepository->flushQuery();
         
         return $productInfo;

    }

    public function updateCodes()
    {
        // kontroler wymaga tego, żeby w bazie danych znajdowały się już jakieś kody
       
        //zmienna do szukania ilości wszystkich kodów w tabeli
        $allProducts = $this->barcodesRepository->findAllCodes();

         foreach($allProducts as $value)
         { 
            //zmienna odwołująca się do poszczególnego kodu
            $product = $this->barcodesRepository->findById($value->getId());
           
            //wysyłanie zapytania do api GS1
            $response = $this->client->request('GET', 'https://mojegs1.pl/api/v2/products', [
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
             if (isset($responseArray['data'][0]))
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
             $this->barcodesRepository->flushQuery();
         }
       

    }
}
