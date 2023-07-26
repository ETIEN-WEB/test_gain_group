<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tache;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class TacheController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data['taches'] = Tache::paginate(50);
        return view('taches.index', $data);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('taches.create');
        //dd($type_Taches);

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
        $validator = Validator::make($request->all(), [
            'titre'=>'required|max:500',
        ], [
            'titre.required'=>'Veuillez entrer le titre de votre tâche.',
        ]);
        if(!$validator->passes()){
            session()->flash('type', 'alert-danger');
            session()->flash('message', 'Erreur dans le formulaire');
            return back()->withErrors($validator->errors())->withInput($request->input());
        }


        $tache = new Tache();
        $tache->titre  = htmlspecialchars($request->titre);
        $tache->status = 1;

        if ($tache->save()){
            session()->flash('type', 'alert-success');
            session()->flash('message', 'Nouvelle tâche enregistré avec succès!');
            return back();
            //return redirect()->route('admins.index');
        }else{
            session()->flash('type', 'alert-danger');
            session()->flash('message', 'Une erreur s\'est produite lors de l\'enregistrement.');
            return back()->withInput($request->input());
        }



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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



    public function termine($id)
    {
        $tache = Tache::where('id',$id)->first();
        $tache->status =2;
        if ($tache->update()) {
            return response()->json(['statut' => 1,'id'=>$id]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tache = Tache::where('id',$id)->first();

        if ($tache->delete()) {
            return response()->json(['statut' => 1,'id'=>$id]);
        }
    }
}
