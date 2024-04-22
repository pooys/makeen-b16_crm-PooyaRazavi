<?php

namespace App\Http\Controllers;

use App\Models\note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    public function store(Request $request){
        $notes = note::insert($request->toArray());
        return response()->json($notes);
         }


     public function index($id = null) {
         if($id){
                 $notes = note::where('id', $id)->first();
         }
         else{
             $notes = note::with('user')->get();
         }

        return response()->json($notes);

      }

     public function edit(Request $request, $id){
         $notes = note::where('id', $id)->update($request->toArray());
         return response()->json($notes);
     }
         public function delete($id){
         $notes= note::where('id', $id)->delete();
         return response()->json($notes);
     }
}
