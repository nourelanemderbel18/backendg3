<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
     
    public function index()
    {
        try{
            $categories = Categorie::all();
            return response()->json($categories);
        
    }   catch (\Exception $e){
        return response()->json(['probléme de récupération des catégories' => 'Error'], 500);
    }

    /**
     * Store a newly created resource in storage.
     */
}
    public function store(Request $request)
    {
        try{
            $categorie = new Categorie([
             "nomcategorie"=>$request->input("nomcategorie"),
             "imagecategorie"=>$request->input("imagecategorie"), ]);
             $categorie->save();
             return response()->json($categorie);

        }catch (\Exception $e ){
        return response()->json(['probléme de récupération des catégories' => 'Error'], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show( $id)
    { 
        try{
            $categorie = Categorie::findOrFail($id);
            return response()->json($categorie);

    } catch (\Exception $e ){
        return response()->json($e ->getMessage());
        }
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    { 
        try{
            $categorie = Categorie::findOrFail($id);
            $categorie->update($request->all());

    } catch (\Exception $e ){
        return response()->json($e ->getMessage());
          //
    }}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    { try {
        $categorie = Categorie::findOrFail($id);
        $categorie->delete();
        return response()->json("catégorie supprimé avec suuccée");

    } catch (\Exception $e ){
        return response()->json($e ->getMessage());
        //
    }
}
} 