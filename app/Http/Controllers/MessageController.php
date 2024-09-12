<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMessageRequest;
use App\Models\message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function store(CreateMessageRequest $request){
        $messages =message:: create($request->toArray());
        if($request->media){
            $media = $request->file('image');
            $path = $media->store('local');
            $messages->medias()->create([
                'file_name'=>$media->getClientOriginalName(),
                'path'=>$path,
                'size'=>$media->getSize(),
                'ext'=>$media->getClientOriginalExtension(),
                'type'=>'avatar'
            ]);
        }
        return response()->json($messages);
         }


     public function index($id = null) {
         if($id){
                 $messages = message::where('id', $id)->first();
         }
         else{
             $messages = message::get();
         }

        return response()->json($messages);

      }

     public function edit(CreateMessageRequest $request, $id){
         $messages = message::where('id', $id)->update($request->toArray());
         return response()->json($messages);
     }
         public function delete($id){
         $messages= message::where('id', $id)->delete();
         return response()->json($messages);
     }
}
