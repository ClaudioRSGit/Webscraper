<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Goutte\Client;

class ScrapingController extends Controller
{
    public function scrape(Request $request)
    {
        $link = $request->input('link');
        $tag = $request->input('tag');

        $client = new Client();
        $crawler = $client->request('GET', $link);

        $price = $crawler->filter($tag)->first()->text();

        return response()->json(['price' => $price]);
    }
}
