<x-dash-layout>
    <h1>Inserir nova venda</h1>
    <form id=edit action="{{route('venda_update',$venda->id)}}" method="POST">
        @csrf
        <table>
            <tr>
                <td>Nome:</td>
                <td><input type="text" name="nome" value="{{$venda->nome}}"/></td>
            </tr>
            <tr>
                <td>Descricao:</td>
                <td><input type="text" name="descricao" value="{{$venda->descricao}}"/></td>
            </tr>
            <tr>
                <td>Valor:</td>
                <td><input type="text" name="valor" value="{{$venda->valor}}"/></td>
            </tr>
            <tr>
                <td>Pagamento:</td>
                <td><input type="text" name="pagamento" value="{{$venda->pagamento}}"/></td>
            </tr>
        </table>
    </form>
    <input form=edit type="submit" name='confirmar' value="Salvar"/>
    <a href="/dashboard"><button>Cancelar</button></a>
</x-dash-layout>
