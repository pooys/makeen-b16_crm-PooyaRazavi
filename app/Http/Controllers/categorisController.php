<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class categorisController extends Controller
{
    public  function createGet() {
        return view('categoris.create');
    }
    public  function createPost(Request $request) {
        DB::table('categoris')->insert([$request->except('_token')]);
        return redirect('categoris/create');
        }
}
