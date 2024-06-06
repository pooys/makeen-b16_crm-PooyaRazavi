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
class User
{
    public $name = 'mohammad';
    public $age = 24;
    public $lastName= 'mosavi';
    public function getinfo()
    {
    return "$this->name and $this->lastName And $this->age";

}
}
$user1 = New User;
$user1->name = "poya";
var_dump($user1->getinfo() );
