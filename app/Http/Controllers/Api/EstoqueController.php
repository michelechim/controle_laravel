<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\EstoqueRequest;
use App\Models\Estoque;
use Illuminate\Http\Request;
use \Exception;

class EstoqueController extends Controller
{
    public function index(Request $request)
    {
        $perPage = $request->query('per_page');
        $paginateEstoques = Estoque::paginate($perPage);
        $paginateEstoques->appends([
            'per_page'=>$perPage
        ]);
        return response()->json($paginateEstoques);
    }

    public function show($id)
    {
        try{
            return response()->json(Estoque::findOrFail($id));
        }catch(\Exception $error){
            $message = [
                "erro"=>"O estoque com o id:$id não foi encontrado!",
                "exception"=>$error->getMessage()
            ];
            $status = 404;
            return response()->json($message,$status);
        }
    }

    public function store(EstoqueRequest $request)
    {
        try{
            $newEstoque = $request->all();
            $storedEstoque = Estoque::create($newEstoque);
            return response()->json([
                'message'=>'Estoque cadastrado com sucesso!',
                'estoque'=>$storedEstoque
            ]);
        }catch(Exception $error){
            $message = [
                "Erro:"=>"Erro ao cadastrar novo estoque",
                "Exception:"=>$error->getMessage()
            ];
            $status = 401;//bad request
            return response()->json($message,$status);
        }
    }

    public function update(Request $request, int $id)
    {
        try{
            $data = $request->all();
            $updEstoque = Estoque::findOrFail($id);
            $updEstoque->update($data);
            return response()->json([
                'message'=>'Estoque atualizado com sucesso!',
                'estoque'=>$updEstoque
            ]);
        }catch(Exception $error){
            $message = [
                "Erro:"=>"Erro ao atualizar novo estoque",
                "Exception:"=>$error->getMessage()
            ];
            $status = 401;
            return response()->json($message,$status);
        }
    }

    public function destroy(int $id)
    {
        $status = 404;
        try {
            if (!Estoque::findOrFail($id)->delete()) {
                $status = 500;
                throw new Exception("Erro ao deletar estoque de id:$id");
            }
            return response()->json([
                'message' => "Estoque id:$id removido com sucesso!"
            ]);
        } catch (Exception $error) {
            $message = [
                "Erro:" => "Erro ao remover estoque",
                "Exception:" => $error->getMessage()
            ];
            return response()->json($message, $status);
        }
    }
}
