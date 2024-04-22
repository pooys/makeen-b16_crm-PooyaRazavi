<?php

namespace App\Http\Controllers;

use App\Models\task;
use App\Models\ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function store(Request $request){
        $tickets = ticket::insert($request->toArray());
        return response()->json($tickets);
         }


     public function index($id = null) {
         if($id){
                 $tickets = ticket::where('id', $id)->first();
         }
         else{
             $tickets = ticket::with('user')->get();
         }

        return response()->json($tickets);

      }

     public function edit(Request $request, $id){
         $tickets = ticket::where('id', $id)->update($request->toArray());
         return response()->json($tickets);
     }
         public function delete($id){
         $tickets= ticket::where('id', $id)->delete();
         return response()->json($tickets);
     }
}
