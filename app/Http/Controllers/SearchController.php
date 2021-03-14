<?php

namespace App\Http\Controllers;

use App\Models\Tableau;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search_text = $request->input('search_general');
		if(trim($search_text) === ''){
			return view('search.index');
		}
		$tableaux = Tableau::where('nom', 'LIKE', '%' . $search_text . '%')
                ->orWhere('description', 'LIKE', '%' . $search_text . '%')
                ->paginate(25);
		return view('search.index', ['tableaux' => $tableaux, 'search_text' => $search_text]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tableau;
     * @return \Illuminate\Http\Response
     */
    public function show(Tableau $tableau)
    {
        return view('search.show', ['tableau' => $tableau]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
