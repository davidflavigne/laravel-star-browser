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
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stars = Star::all();
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
        $star->save();
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, string $id)
    {
        $star = Star::where('id',$id)->get();
        return Inertia::render('Star/Display', ['star' => $star]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, string $id)
    {   
        $star = Star::where('id',$id)->get();
        return Inertia::render('Star/Edit', ['star' => $star]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $star = Star::where('id',$id)->get();
        if($request->input('nom')) $star->nom = $request->input('nom');
        if($request->input('prenom')) $star->prenom = $request->input('prenom');
        if($request->input('description')) $star->description = $request->input('description');
        $star->save();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id): RedirectResponse
    {
        $star = Star::where('id',$id)->get();
        $star->delete();

        return Redirect::to('/dashboard');
    }
}
