<?php

namespace App\Http\Controllers;

use App\Models\factor;
use App\Models\order;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;



class FactorController extends Controller
{
    public function store(Request $request){
   $factors = factor::insert($request->toArray());
   return response()->json($factors);
    }


public function index($id = null) {
    if($id){
            $factors = factor::where('id', $id)->first();
    }
    else{
        $factors = factor::with('order')->get();
    }

   return response()->json($factors);

 }

public function edit(Request $request, $id){
    $factors = factor::where('id', $id)->update($request->toArray());
    return response()->json($factors);
}
    public function delete($id){
    $factors= factor::where('id', $id)->delete();
    return response()->json($factors);
}

}
