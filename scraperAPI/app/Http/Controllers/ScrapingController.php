<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Goutte\Client;

class ScrapingController extends Controller
{
    public function scrape(Request $request)
    {
        //$link = 'https://www.worten.pt/produtos/tv-samsung-tq55s95catxxc-oled-55-140-cm-4k-ultra-hd-smart-tv-7733131';
        //$tag = '.price';

        $link = $request->input('link');
        $tag = $request->input('tag');

        $client = new Client();
        $crawler = $client->request('GET', $link);

        $price = $crawler->filter($tag)->first()->text();

        return response()->json(['price' => $price]);
    }
}
