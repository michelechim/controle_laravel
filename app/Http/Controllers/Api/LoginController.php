<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login(LoginRequest $request)
    {
        try{
            // $request->validate([
            //     'email' => 'required | email | exists:users',
            //     'password' => 'required | string'
            // ]);
            $user = User::where('email',$request->email)->first();
            if(!$user || !Hash::check($request->password, $user->password))
                throw new Exception('Senha incorreta!!');

            $ability = $user->is_admin?['is_admin']:[];
            $response = $user->createToken($request->email, $ability)->plainTextToken;
            return response()->json(['token'=>$response]);
        }catch(Exception $error){
            return response()->json([
                'erro'=>$error->getMessage()
            ],401);
        }
    }

    public function logout(Request $request){
        $auth_user = $request->user();
        if($request->input('all')){
            $auth_user->tokens()->delete();
            if(!count($auth_user->tokens)){
                return['Logout' => 'Usuário desconectado de todos os dispositivos !!'];
            }else{
                if($auth_user->currentAccessToken()->delete())
                    return['Logout' => 'Usuário desconectado !!'];
            }
            return response()->json(['Logout'=>'Falha ao desconectar usuário'],500);
        }
    }
}
