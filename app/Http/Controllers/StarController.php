<?php

namespace App\Http\Controllers;

use App\Models\Star;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Inertia\Response;

class StarController extends Controller
{
    private function get_image_url($star){
        $star->imagePath = asset($star->imagePath);
        return $star;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stars = Star::all()->all();
        $stars = array_map([$this,'get_image_url'],$stars);
        return Inertia::render('Star/List',['stars' => $stars]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Star/Edit', ['star' => NULL]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $star = new Star;
        $star->nom = $request->input('nom');
        $star->prenom = $request->input('prenom');
        $star->description = $request->input('description');
        $imagename = $request->file('image')->getClientOriginalName();
        $request->file('image')->storeAs('public/images',$imagename);
        $star->imagePath = 'storage/images/'.$imagename;
        $star->save();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, string $id)
    {   
        $star = Star::where('id',$id)->get();
        //id unique, on récupère donc 1 seul élément
        return Inertia::render('Star/Edit', ['star' => $star[0]]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $star = Star::where('id',$id)->get();
        //id unique, on récupère donc 1 seul élément
        if($request->input('nom')) $star[0]->nom = $request->input('nom');
        if($request->input('prenom')) $star[0]->prenom = $request->input('prenom');
        if($request->input('description')) $star[0]->description = $request->input('description');

        if($request->file('image')){
            error_log('#NOCOMMIT - has file!');
            $imagename = $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public/images',$imagename);
            $star[0]->imagePath = 'storage/images/'.$imagename;
        }

        $star[0]->save();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        $star = Star::where('id',$id)->get();
        $star[0]->delete();
    }
}
