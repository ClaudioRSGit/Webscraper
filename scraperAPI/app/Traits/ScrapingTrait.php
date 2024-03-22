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
        $price = $crawler->filter($tag)->first()->text();

        return $price;
    }
}
