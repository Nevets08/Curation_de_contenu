<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    function search(Request $request)
    {
        if (isset($_GET['search_general'])) {
            $search_text = $_GET['search_general'];
            $tableaux = DB::table('tableaux')->where('nom', 'LIKE', '%' . $search_text . '%')
                ->orWhere('description', 'LIKE', '%' . $search_text . '%')
                ->paginate(25);
            $tableaux->appends($request->all());
            return view('search.index', ['tableaux' => $tableaux, 'search_text' => $search_text]);
        } else {
            return view('search.index');
        }
    }
}
