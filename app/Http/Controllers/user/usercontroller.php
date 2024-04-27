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
    public function logout(CreateUserRequest $request){
        $request->user()->currentAccessToken()->delete();
        return response()->json('user loggen out');
    }
        public function admin(CreateUserRequest $request){
                    $user = user::create($request->merge([
                        'password'=> Hash::make($request->password)
                    ])->toArray());
                    $user->lables()->attach($request->lable_id);
                    $user->assignRole('admin');
                    return response()->json($user);


        }
        public function super_admin(CreateUserRequest $request){
            $user = user::create($request->merge([
                    'password'=> Hash::make($request->password)
                ])->toArray());
                $user->lables()->attach($request->lable_id);
                $user->assignRole('super_admin');
                return response()->json($user);
        }


    public function store(CreateUserRequest $request)
    {
            $user = User::create($request->merge([
                "password" => Hash::make($request->password)])->toArray());
                 $user->givePermissionTo('super_admin');
                 $user->lables()->attach($request->lable_id);
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
        $users = User::destroy($id);
        return response()->json($users);
    }
}
