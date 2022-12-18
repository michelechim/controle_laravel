<x-dash-layout>
    <h1>Inserir novo estoque</h1>
    <form id=edit action="{{route('estoque_update',$estoque->id)}}" method="POST">
        @csrf
        <table>
            <tr>
                <td>Descriçao:</td>
                <td><input type="text" name="descricao" value="{{$estoque->descricao}}"/></td>
            </tr>
            <tr>
                <td>Validade:</td>
                <td><input type="text" name="validade" value="{{$estoque->validade}}"/></td>
            </tr>
            <tr>
                <td>Quantidade:</td>
                <td><input type="text" name="qtd_estoque" value="{{$estoque->qtd_estoque}}"/></td>
            </tr>
            <tr>
                <td>Custo</td>
                <td><input type="text" name="custo" value="{{$estoque->custo}}"/></td>
            </tr>
            <tr>
                <td>Venda</td>
                <td><input type="text" name="venda" value="{{$estoque->venda}}"/></td>
            </tr>
        </table>
    </form>
    <input form=edit type="submit" name='confirmar' value="Salvar"/>
    <a href="/dashboard"><button>Cancelar</button></a>
</x-dash-layout>
