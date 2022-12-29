<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\VendaRequest;
use App\Models\Venda;
use Illuminate\Http\Request;
use \Exception;

class VendaController extends Controller
{
    public function index(Request $request)
    {
        $perPage = $request->query('per_page');
        $paginateVendas = Venda::paginate($perPage);
        $paginateVendas->appends([
            'per_page'=>$perPage
        ]);
        return response()->json($paginateVendas);
    }

    public function show($id)
    {
        try{
            return response()->json(Venda::findOrFail($id));
        }catch(\Exception $error){
            $message = [
                "erro"=>"A venda com o id:$id não foi encontrada!",
                "exception"=>$error->getMessage()
            ];
            $status = 404;
            return response()->json($message,$status);
        }
    }

    public function store(VendaRequest $request)
    {
        try{
            $newVenda = $request->all();
            $storedVenda = Venda::create($newVenda);
            return response()->json([
                'message'=>'Venda cadastrada com sucesso!',
                'venda'=>$storedVenda
            ]);
        }catch(Exception $error){
            $message = [
                "Erro:"=>"Erro ao cadastrar nova venda",
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
            $updVenda = Venda::findOrFail($id);
            $updVenda->update($data);
            return response()->json([
                'message'=>'Venda atualizada com sucesso!',
                'venda'=>$updVenda
            ]);
        }catch(Exception $error){
            $message = [
                "Erro:"=>"Erro ao atualizar nova venda",
                "Exception:"=>$error->getMessage()
            ];
            $status = 401;
            return response()->json($message,$status);
        }
    }

    public function remove(int $id)
    {
        $status = 404;
        try {
            if (!Venda::findOrFail($id)->delete()) {
                $status = 500;
                throw new Exception("Erro ao deletar venda de id: $id");
            }
            return response()->json([
                'message' => "Venda id: $id removida com sucesso!"
            ]);
        } catch (Exception $error) {
            $message = [
                "Erro:" => "Erro ao remover venda",
                "Exception:" => $error->getMessage()
            ];
            return response()->json($message, $status);
        }
    }
}
