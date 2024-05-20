<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateUserRequest;
use App\Models\order;
use App\Models\User;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

                //  $user->givePermissionTo('super_admin');
                    $user->lables()->attach($request->lable_id);
                    $user->assignRole('user');
                    return response()->json($user);

        }

            public function index(Request $request){
                $user = User::get();
                if($request->hasOrder) {
                    $user = user::has('order')->get();
                }
                if($request->price){
                    $price = $request->price;
                    $user = user::whereHas('orders' , function (builder $query)use($price){
                        $query->where('first' , 'like' , '%'.$price.'%');
                    });
                           $user = $user->get();
                }
            if($request->ordersCount){
                $user = User::get()->loadCount('orders');
            }
           if($request->ordersSum){
               $user = User::get()->loadSum('orders','price');
           }

            return response()->json($user);
            }




    public function edit(Request $request, $id){
        $users = User::where('id', $id)->update($request->toArray());
        return response()->json($users);
    }
    public function delete($id){
        $users = User::destroy($id);
        return response()->json($users);
    }





    public function userOrders($id , Request $request){
    {
        $user = User::find($id);
        $orders = $user->with('orders')->first();
        return response()->json($orders);

        $price = $request->price;
        $users = new User();
        if($request->has_orders){
        $users =$users->has('orders');}
        if($request->price_filter){
            $users = User::whereHas('orders', function (Builder $query )use($id){
        return $query->where('id', $id);
            })
            ->get();
        }
        if($request->order_sum){
         $users=$users->withSum('orders','price');
            }
        if($request->order_count){
         $users=$users->withCount('orders');}
        $users=$users->get();

    }
}

}
