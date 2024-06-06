<?php

namespace App\Http\Controllers;

use App\Models\file;

use App\Models\User;
use Illuminate\Http\Request;

class FileController extends Controller
{
    public function create(request $request ,$id)
    {
        $file = $request->file('image');
        $path = $file->store('store');
        $user = User::find($id)->file
        ()->create([
            'media_name' => $request->media_name,
            'size' => $file->getSize(),
            'ext' => $file->getClientOriginalExtension(),
            'path' => $path,
            'type' => 'avatar',
        ]);
        return response()->json($user);
    }
    public function profile(Request $request, $id)
    {
        $user = new User();
        $user->find($id)->addMedia($request->image)->usingName('avatar')->toMediaCollection('avatar');
        return response()->json('uplod shod');
    }

    public function download($id)
    {
        $path = file::select('image_path')->where('id',$id)->first();
        if(str_starts_with($path->image_path , 'local')){
            return response()->json('you cant download media');
        }
        return storage::download($path->image_path);
    }
    public function index($id = null) {
        if($id){
            $file = file::where('id', $id)->first();
        }
        else{
            $file = file::get();
        }

        return response()->json($file);

    }

    public function edit(Request $request, $id){
        $file = file::where('id', $id)->update($request->toArray());
        return response()->json($file);
    }
    public function delete($id){
        $file= file::where('id', $id)->delete();
        return response()->json($file);
    }
}
