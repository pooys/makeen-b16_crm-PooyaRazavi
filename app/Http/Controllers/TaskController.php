<?php

namespace App\Http\Controllers;

use App\Models\task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function store(Request $request){
        $tasks = task::insert($request->toArray());
        return response()->json($tasks);
         }


     public function index($id = null) {
         if($id){
                 $tasks = task::where('id', $id)->first();
         }
         else{
             $tasks = task::with('user')->get();
         }

        return response()->json($tasks);

      }

     public function edit(Request $request, $id){
         $tasks = task::where('id', $id)->update($request->toArray());
         return response()->json($tasks);
     }
         public function delete($id){
         $tasks= task::where('id', $id)->delete();
         return response()->json($tasks);
     }
}
