<?php

namespace App\Http\Controllers;

use App\Models\media;
use App\Models\User;
use Illuminate\Http\Request;

class MediaController extends Controller
{
    public function create(request $request ,$id)
    {
        $media = $request->file('image');
        $path = $media->store('store');
        $user = User::find($id)->media()->create([
            'media_name' => $request->media_name,
            'size' => $media->getSize(),
            'ext' => $media->getClientOriginalExtension(),
            'path' => $path,
            'type' => 'avatar',
        ]);
        return response()->json($user);
    }

    public function index($id = null) {
        if($id){
            $medias = media::where('id', $id)->first();
        }
        else{
            $medias = media::get();
        }

        return response()->json($medias);

    }

    public function edit(Request $request, $id){
        $medias = media::where('id', $id)->update($request->toArray());
        return response()->json($medias);
    }
    public function delete($id){
        $medias= media::where('id', $id)->delete();
        return response()->json($medias);
    }
}
