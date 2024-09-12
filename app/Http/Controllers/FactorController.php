<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateFactorRequest;
use App\Models\factor;
use App\Models\order;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;



class FactorController extends Controller
{
    public function store(CreateFactorRequest $request){
   $factors = factor::insert($request->toArray());
   return response()->json($factors);
    }


public function index($id = null) {
    if($id){
            $factors = factor::where('id', $id)->first();
    }
    else{
        $factors = factor::get();
    }

   return response()->json($factors);

 }

public function edit(CreateFactorRequest $request, $id){
    $factors = factor::where('id', $id)->update($request->toArray());
    return response()->json($factors);
}
    public function delete($id){
    $factors= factor::where('id', $id)->delete();
    return response()->json($factors);
}

}
