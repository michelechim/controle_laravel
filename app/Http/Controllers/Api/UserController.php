<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $statusHttp=500;
        try{
            // if (!$request->user()->tokenCan('is_admin')) {
            //     $statusHttp = 403;
            //     throw new Exception("Não possui permissão!!!");
            // }
            $perPage = $request->query('per_page');
            $paginateUsers = User::paginate($perPage);
            $paginateUsers->appends([
                'per_page'=>$perPage
            ]);
            return response()->json($paginateUsers);
        }catch(\Exception $e){
            return response()->json([
                'erro'=>$e->getMessage()
            ],$statusHttp);
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        try {
            $newUser = $request->all();
            $newUser['password'] = password_hash(
                $newUser['password'],
                PASSWORD_DEFAULT
            );
            $response = [
                'mensagem'=>'Usuário cadastrado com sucesso!',
                'user'=>User::create($newUser)
            ];
            $statusHttp = 200;

        } catch (Exception $error) {
            $statusHttp = 500;
            $response = ['error' =>$error->getMessage()];
        }
        return response()->json($response,$statusHttp);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        // return response()->json(compact('user'));
        return response()->json(['user'=>$user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
