<?php

namespace App\Http\Controllers;

use App\Models\lable;
use Illuminate\Http\Request;

class LableController extends Controller
{
    public function store(Request $request){
        $lables = lable::insert($request->toArray());
        return response()->json($lables);
         }


     public function index($id = null) {
         if($id){
                 $lables = lable::where('id', $id)->first();
         }
         else{
             $lables = lable::get();
         }

        return response()->json($lables);

      }

     public function edit(Request $request, $id){
         $lables = lable::where('id', $id)->update($request->toArray());
         return response()->json($lables);
     }
         public function delete($id){
         $lables= lable::where('id', $id)->delete();
         return response()->json($lables);
     }
}
