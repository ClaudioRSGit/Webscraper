<?php

namespace App\Traits;

use Goutte\Client;

trait ScrapingTrait
{
    protected function createClient()
    {
        return new Client();
    }
    
    protected function scrapePrice($client, $link, $tag)
    {
        $crawler = $client->request('GET', $link);

        $priceText = $crawler->filter($tag)->first()->text();
        $priceNumber = preg_replace("/[^0-9,.]/", "", $priceText);
        $priceNumber = str_replace(",", ".", $priceNumber);
        
        $price = (float) $priceNumber;

        return $price;
    }
}
