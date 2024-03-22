<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Goutte\Client;
use App\Traits\ScrapingTrait;

class ScrapingController extends Controller
{
    use ScrapingTrait;

    public function scrape(Request $request)
    {
        $link = $request->input('link');
        $tag = $request->input('tag');

        $client = $this->createClient();
        $price = $this->scrapePrice($client, $link, $tag);
        
        return response()->json(['price' => $price]);
    }
}
