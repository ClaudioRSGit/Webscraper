<?php

namespace App\Http\Controllers;

use App\Models\SearchHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\User;

class SearchHistoryController extends Controller
{
    public function index()
    {
        $searchHistories = SearchHistory::all();
        return response()->json($searchHistories);
    }

    public function show($id)
    {
        $searchHistory = SearchHistory::find($id)->get();
        return response()->json($searchHistory);
    }
    
    public function store(Request $request)
    {
        $query = $request->input('query');

        $searchHistory = new SearchHistory();
        $searchHistory->user_id = 1;
        $searchHistory->query = $query;
        $searchHistory->save();

        return response()->json($searchHistory);
    }
}
