<?php

namespace App\Http\Controllers;

use App\Http\Requests\TableauRequest;
use App\Models\Tableau;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class TableauController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        return view('tableau.index', ['tableaux' => Tableau::all(), 'user' => $user, 'allUsers' => User::all()]);
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
    public function store(TableauRequest $request)
    {
        $data = $request->validated();

        //Pour stocker l'image CA MARCHE PAS
        if(array_key_exists ( 'icone' , $data )){
            //quand on a une icône ça passe bien la dedans. après... ?
            $extension = $data['icone']->extension();
            $name = Str::random(25);
            $data['icone']->storeAs('/public/icones', $name.".".$extension);
            $url = Storage::url($name.".".$extension);
            $data['url_icone'] = $url;
            unset($data['icone']);
        }

        $tableau = new Tableau();
        $tableau->fill($data);
        $tableau->user()->associate($data['user_id']); //un à plusieurs
        $tableau->save();

        if(array_key_exists ( 'user' , $data )){
            $tableau->users()->attach($data['user']); //plusieurs à plusieurs
        }

        $user = Auth::user();
        return redirect()->route('tableau.show', ['tableau' => $tableau, 'user' => $user, 'allTableaux' => Tableau::all()]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tableau  $tableau
     * @return \Illuminate\Http\Response
     */
    public function show(Tableau $tableau)
    {
        $user = Auth::user();
        return view('tableau.show', ['tableau' => $tableau, 'user' => $user, 'allTableaux' => Tableau::all(), 'allUsers' => User::all()]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tableau  $tableau
     * @return \Illuminate\Http\Response
     */
    public function edit(Tableau $tableau)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tableau  $tableau
     * @return \Illuminate\Http\Response
     */
    public function update(TableauRequest $request, Tableau $tableau)
    {
        //OK ALORS J'AI COMPRIS PK CA BUG
        //En fait dans le validate si des trucs sont required, il faut qu'ils y soient.

        $data = $request->validated();

        //Pour stocker l'image CA MARCHE PAS
        /*
        if(array_key_exists ( 'icone' , $data )){
            //quand on a une icône ça passe bien la dedans. après... ?
            $extension = $data['icone']->extension();
            $name = Str::random(25);
            $data['icone']->storeAs('/public/icones', $name.".".$extension);
            $url = Storage::url($name.".".$extension);
            $data['url_icone'] = $url;
            unset($data['icone']);
        }
        */

        $tableau->fill($data);
        $tableau->save();

        if(array_key_exists ( 'user' , $data ))
            $tableau->users()->attach($data['user']); //plusieurs à plusieurs (attach pour ajouter et non-pas remplacer)

        $user = Auth::user();
        return redirect()->route('tableau.show', ['tableau' => $tableau, 'user' => $user, 'allTableaux' => Tableau::all()]);
        // die('it works');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tableau  $tableau
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tableau $tableau)
    {
        $tableau->delete();
        return redirect()->route('tableau.index');
    }
}
