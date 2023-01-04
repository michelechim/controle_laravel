<x-dash-layout>
    <h1>Editar fornecedor</h1>
    <form id=edit action="{{route('fornecedor_update',$fornecedor->id)}}" method="POST">
        @csrf
        <table>
            <tr>
                <td>Nome:</td>
                <td><input type="text" name="nome" value="{{$fornecedor->nome}}"/></td>
            </tr>
            <tr>
                <td>Endereco:</td>
                <td><input type="text"  name="endereco" value="{{$fornecedor->endereco}}" /></td>
            </tr>
            <tr>
                <td>CNPJ:</td>
                <td><input type="text"  name="cnpj" value="{{$fornecedor->cnpj}}"/></td>
            </tr>
            <tr>
                <td>Telefone:</td>
                <td><input type="text" name="telefone" value="{{$fornecedor->telefone}}"/></td>
            </tr>
            <tr>
                <td>Email:</td>
                <td><input type="text"  name="email" value="{{$fornecedor->email}}"/></td>
            </tr>
            <tr>
                <td>Id - estado:</td>
                <td><input type="text"  name="estado_id" value="{{$fornecedor->estado_id}}"/></td>
            </tr>
        </table>
    </form>
    <input form=edit type="submit" name='confirmar' value="Salvar"/>
    <a href="/dashboard"><button>Cancelar</button></a>
</x-dash-layout>
