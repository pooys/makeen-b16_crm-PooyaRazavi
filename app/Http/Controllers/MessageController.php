<?php

namespace App\Http\Controllers;

use App\Models\message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function store(Request $request){
        $messages = message::insert($request->toArray());
    
        return response()->json($messages);
         }


     public function index($id = null) {
         if($id){
                 $messages = message::where('id', $id)->first();
         }
         else{
             $messages = message::with('order')->get();
         }

        return response()->json($messages);

      }

     public function edit(Request $request, $id){
         $messages = message::where('id', $id)->update($request->toArray());
         return response()->json($messages);
     }
         public function delete($id){
         $messages= message::where('id', $id)->delete();
         return response()->json($messages);
     }
}
