<?php

namespace App\Http\Controllers;

use App\Models\warranty;
use Illuminate\Http\Request;

class WarrantyController extends Controller
{
    public function store(Request $request){
        $warrantys = warranty::insert($request->toArray());
        return response()->json($warrantys);
         }


     public function index($id = null) {
         if($id){
                 $warrantys = warranty::where('id', $id)->first();
         }
         else{
             $warrantys = warranty::with('order')->get();
         }

        return response()->json($warrantys);

      }

     public function edit(Request $request, $id){
         $warrantys = warranty::where('id', $id)->update($request->toArray());
         return response()->json($warrantys);
     }
         public function delete($id){
         $warrantys= warranty::where('id', $id)->delete();
         return response()->json($warrantys);
     }
}
