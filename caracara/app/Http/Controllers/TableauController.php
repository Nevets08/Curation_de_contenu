<?php

namespace App\Http\Controllers;

use App\Http\Requests\TableauRequest;
use App\Models\Post;
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
        return view('home', ['tableaux' => Tableau::all(), 'user' => $user, 'allUsers' => User::all(), 'posts' => Post::orderBy('created_at', 'desc')->get()]);
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

        //Pour stocker l'image
        if(array_key_exists ( 'icone' , $data )){
            $extension = $data['icone']->extension();
            $name = Str::random(25);
            $data['icone']->storeAs('/public/icones', $name.".".$extension);

            //ATTENTION !!! ALERTE CODE PAS PROPRE (mais qui marche donc pour l'instant je touche pas)
            $url = 'https://laravel.bukal.etu.mmi-unistra.fr/Curation_de_contenu/caracara/storage/app/public/icones/'.$name.".".$extension; //ATTENTION ICI IL FAUDRA CHANGER LE CHEMIN !!!
            //ATTENTION !!!
            
            $data['url_icone'] = $url;
            unset($data['icone']);
        }

        $tableau = new Tableau();
        $tableau->fill($data);
        $tableau->user()->associate($data['user_id']); //un à plusieurs
        $tableau->save();

        $tableau->abonnes()->attach($data['user_id']); //abonner le créateur

        if(array_key_exists ( 'user' , $data )){
            $tableau->users()->attach($data['user']); //plusieurs à plusieurs
            $tableau->abonnes()->attach($data['user']);
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
        $user = Auth::user();

        //OK ALORS J'AI COMPRIS PK CA BUG
        //En fait dans le validate si des trucs sont required, il faut qu'ils y soient.
        $data = $request->validated();

        //Pour stocker l'image
        if(array_key_exists ( 'icone' , $data )){
            //si il y en avait une avant, on la suppr
            if($tableau->url_icone)
            {
                preg_match('/laravel\.bukal\.etu\.mmi-unistra\.fr\/Curation_de_contenu\/caracara\/storage\/app\/public\/icones\/(.*)/', $tableau->url_icone, $matches);
                $filename=$matches[1];
                Storage::delete('/public/icones/'.$filename);
            }

            $extension = $data['icone']->extension();
            $name = Str::random(25);
            $data['icone']->storeAs('/public/icones', $name.".".$extension);

            //ATTENTION !!! ALERTE CODE PAS PROPRE (mais qui marche donc pour l'instant je touche pas)
            $url = 'https://laravel.bukal.etu.mmi-unistra.fr/Curation_de_contenu/caracara/storage/app/public/icones/'.$name.".".$extension; //ATTENTION ICI IL FAUDRA CHANGER LE CHEMIN !!!
            //ATTENTION !!!
            
            $data['url_icone'] = $url;
            unset($data['icone']);
        }

        $tableau->fill($data);
        $tableau->save();

        if(array_key_exists ( 'user' , $data )){
            $tableau->users()->attach($data['user']); //plusieurs à plusieurs (attach pour ajouter et non-pas remplacer)
            $tableau->abonnes()->attach($data['user']);
        }
            

        //Gestions des utilisateurs (contributeur/lecteur/virer)
        if(array_key_exists ( 'userToUpdate' , $data )){
            if(array_key_exists ( 'contributeur' , $data ))
                $tableau->users()->updateExistingPivot($data['userToUpdate'], array('contributeur' => $data['contributeur']));
            else if(array_key_exists ( 'quit' , $data ) && $data['quit']){
                $tableau->users()->detach($data['userToUpdate']);
                $tableau->abonnes()->detach($data['userToUpdate']);
                if($data['userToUpdate'] == $user->id) //Si c'est nous qui avons quitté le tableau
                    return redirect()->route('tableau.index');
            }
        }

        //Abonnements
        if(array_key_exists('sabonner', $data)){
            if($data['sabonner'])
                $tableau->abonnes()->attach($data['abonne']);
            else
                $tableau->abonnes()->detach($data['abonne']);
        }

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
        if($tableau->url_icone)
        {
            preg_match('/laravel\.bukal\.etu\.mmi-unistra\.fr\/Curation_de_contenu\/caracara\/storage\/app\/public\/icones\/(.*)/', $tableau->url_icone, $matches);
            $filename=$matches[1];
            Storage::delete('/public/icones/'.$filename);
        }
        $tableau->delete();
        return redirect()->route('tableau.index');
    }
}
