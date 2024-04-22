<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\Sanctum;


class usercontroller extends Controller
{
    // public function createGet() {
    //     return view('users.create');
    // }
    // public function editGet($id) {
    //     $user = DB::table('users')->where('id', $id)->first();
    //     return view('users.edit', ['user' => $user]);
    // }

    // public function createPost(CreateUserRequest $request ) {

    //     $validated = $request->validate([
    //         'name' => 'required',

    //     ],[
    //             'name.required'=>'لطفا اسم خود را وارد کنید',
    //     ]);

    //     $user = DB::table('users')->insert([
    //         $request->except('_token')
    //         ]);

    //         return response()->json($user);
    // }

    // public function editPost(Request $request,$id) {

    //     DB::table('users')->where('id', $id)->update([
    //         "name" => $request->name,
    //         "codemeli" => $request->codemeli,
    //         "mobile" => $request->mobile,
    //         "tarikht_tavalod" => $request->tarikht_tavalod,
    //         "sex" => $request->sex,
    //         // "email" => $request->email,
    //         "password" => $request->password,
    //     ]);
    //     return redirect(route('users.index'));
    // }
    // public function delete($id) {

    //     DB::table('users')->where('id', $id)->delete();

    //     return redirect('/users/index');
    // }\
    public function login(Request $request)
    {
        $user = User::select('id','mobile', 'password')
        ->where('mobile', $request->mobile)
        ->first();
        if(!$user) {
            return response()->json('user not found');
        }
        if(!Hash::check($request->password, $user->password)){
                return response()->json('pass error');
        }
        $token = $user->createToken($request->mobile)->plainTextToken;
        return response()->json($token);
    }
    public function logout(Request $request){
        $request->user()->currentAccessToken()->delete();
        return response()->json('user loggen out');
    }



    public function store(Request $request)
    {
            $user = User::create($request->merge([
                "password" => Hash::make($request->password)])->toArray());

            return response()->json($user);

        }



    public function index($id = null) {
        if($id){
                $users = User::where('id', $id)->first();
        }
        else{
            $users = User::orderby('id','desc')->paginate(2);
        }

       return response()->json($users);

     }

    public function edit(Request $request, $id){
        $users = User::where('id', $id)->update($request->toArray());
        return response()->json($users);
    }
    public function delete($id){
        $users = User::where('id', $id)->delete();
        return response()->json($users);
    }
}
