<?php

namespace App\Http\Controllers;

use App\Models\team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function store(Request $request){
   $teams = team::insert($request->toArray());
   return response()->json($teams);
    }


public function index($id = null) {
    if($id){
            $teams = team::where('id', $id)->first();
    }
    else{
        $teams = team::with('user')->get();
    }

   return response()->json($teams);

 }

public function edit(Request $request, $id){
    $teams = team::where('id', $id)->update($request->toArray());
    return response()->json($teams);
}
    public function delete($id){
    $teams= team::where('id', $id)->delete();
    return response()->json($teams);
}

}
