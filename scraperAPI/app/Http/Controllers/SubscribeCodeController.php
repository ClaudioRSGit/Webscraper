<?php

namespace App\Http\Controllers;

use App\Models\SubscribeCode;
use Illuminate\Http\Request;

class SubscribeCodeController extends Controller
{
    public function index()
    {
        $subscribeCodes = SubscribeCode::all();
        return response()->json($subscribeCodes);
    }
}
