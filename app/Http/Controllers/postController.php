<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class postController extends Controller
{
    public function createGet() {
        return view('posts.create');
    }
    public  function editGet($id) {
        $post = DB::table('posts')->where('id', $id)->first();
        return view('posts.edit', ['post' => $post]);
    }
    public function index() {
        $posts = DB::table('posts')->get();
    return view('posts.index', ["posts" => $posts]);
}
public function createPost(Request $request) {
    DB::table('posts')->insert([
        "name" => $request->name,
        "brand" => $request->brand,
        "cat" => $request->cat,
    ]);
    return redirect(route('posts.index'));
}
public function editPost(Request $request,$id) {

    DB::table('posts')->where('id', $id)->update([

        "name" => $request->name,
        "brand" => $request->brand,
        "cat" => $request->cat,
    ]);
    return redirect(route('posts.index'));
}
public  function delete($id) {

    DB::table('posts')->where('id', $id)->delete();

    return redirect('/posts/index');
}
}
