<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

use App\Models\User;
use JWTAuth;
use Auth;

class userController extends Controller
{
    //

    public function getUser(Request $request)
    {
        $user=Auth::guard('api')->user();

        $getUser=User::find($user['id']);
        //->load(['favorites','favorites.word.publisher']);

        return response()->json([
            'success'=>true,
            'message'=>'User Successfully Loaded',
            'payload'=>$getUser
        ]);
    }

    public function updateUser(Request $request)
    {

        //return $request->all();
        $user=Auth::guard('api')->user();

        //validate inputs
        $validate = Validator::make(request()->all(), [
            'userNameI'=>"required",
            'userImgI'=>'image|max:512'
        ]);

        if ($validate->fails()) {
            return response()->json([
                'success'=>false,
                'message'=>'Validation Error',
                'payload'=>$validate->errors()
            ],400);
        }
        
        $updateUser=User::find($user['id']);
        if($request->hasFile('userImgI')){
            $image = base64_encode(file_get_contents($request->file('userImgI')->path()));
        }
        else{
            $image=$updateUser['picture'];
        }
        
        
        //update user
        $updateUser->name=$request->input('userNameI');
        $updateUser->picture=$image;

        if($updateUser->save()){
            return response()->json([
                'success'=>true,
                'message'=>'User Successfully Updated',
                'payload'=>$updateUser
            ],200);
        }
        else{
            return response()->json([
                'success'=>false,
                'message'=>'Unable To Update User',
                'payload'=>null
            ],400);
        }
    }

    public function authenticateUserGoogleReq()
    {
        $google=Socialite::driver('google')->stateless()->redirect()->getTargetUrl();

        return response()->json([
            'success'=>true,
            'payload'=>['google'=>$google]
        ]);
    }

    public function authenticateUserGoogleExec()
    {   

        // $user = Socialite::driver('google')->stateless()->user();

        $user = Socialite::driver('google')->userFromToken('ya29.a0Aa4xrXNtBA9ykS32QInmNjndRHfusG9HjwvD7-7sCIiuakEGQIYDCSIWVSXzIstbmhJwPtEQ9JQ4bkYMW-xeQSUf0uL6eNdDS6Qv8pt6M7hILPtL3kF6fYZ0zKmEXyMCbS3Q7tp4dWJMVHc0r9FqfHFbf8GhOgaCgYKATASAQASFQEjDvL9aJBJBaLAJGwtc0KQ4lW1pA0165');
        
        $email=$user['email'];
        
        //check if has email 
        $checkUser=User::where('email',$email)->get();
        if($checkUser->count() > 0){

            //generate auth token
            $token = JWTAuth::fromUser($checkUser[0]);
            return response()->json([
                'success'=>true,
                'message'=>'User Successfully Logged-in',
                'payload'=>[
                    "User"=>$checkUser[0],
                    "Token"=>$token
                ]
            ]);
        }
        else{

            //generate img b64 from url
            $img=base64_encode(Storage::get('avatar.png'));
            
            //generate random password
            $password=md5(uniqid(time(), true));


            //register new user
            $saveUser = new User([
                'name'=>$user['name'],
                'email'=>$email,
                'password'=>$password,
                'picture'=>$img
            ]);

            if($saveUser->save()){

                //generate auth token
                $token = JWTAuth::fromUser($saveUser);

                return response()->json([
                    'success'=>true,
                    'message'=>'User Successfully Registerd',
                    'payload'=>[
                        'User'=>$saveUser,
                        'Token'=>$token
                    ]
                ]);
            }
            else{
                return response()->json([
                    'success'=>false,
                    'message'=>'Unable To Register User',
                    'payload'=>null
                ],400);
            }
        }
    }


    // public function authenticateUserFacebookReq()
    // {
    //     $facebook=Socialite::driver('facebook')->stateless()->redirect()->scopes([
    //         'email',
    //     ])->getTargetUrl();

    //     return response()->json([
    //         'success'=>true,
    //         'payload'=>['facebook'=>$facebook]
    //     ]);
    // }

    // public function authenticateUserFacebookExec()
    // {   
    //     $user = Socialite::driver('facebook')->stateless()->user();

    //     return $user->user;
    // }

}
