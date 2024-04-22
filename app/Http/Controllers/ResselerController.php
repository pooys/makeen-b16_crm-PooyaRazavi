<?php

namespace App\Http\Controllers;

use App\Models\resseler;
use Illuminate\Http\Request;

class ResselerController extends Controller

    {
        public function store(Request $request){
       $resselers = resseler::insert($request->toArray());
       return response()->json($resselers);
        }


    public function index($id = null) {
        if($id){
                $resselers = resseler::where('id', $id)->first();
        }
        else{
            $resselers = resseler::with('user')->get();
        }

       return response()->json($resselers);

     }

    public function edit(Request $request, $id){
        $resselers = resseler::where('id', $id)->update($request->toArray());
        return response()->json($resselers);
    }
        public function delete($id){
        $resselers= resseler::where('id', $id)->delete();
        return response()->json($resselers);
    }

}
