<x-dash-layout>
    <h1>Inserir novo cliente</h1>
    <form id=edit action="{{route('cliente_update',$cliente->id)}}" method="POST">
        @csrf
        <table>
            <tr>
                <td>Nome:</td>
                <td><input type="text" name="nome" value="{{$cliente->nome}}"/></td>
            </tr>
            <tr>
                <td>Endereco:</td>
                <td><input type="text" name="endereco" value="{{$cliente->endereco}}"/></td>
            </tr>
            <tr>
                <td>Telefone:</td>
                <td><input type="text" name="telefone" value="{{$cliente->telefone}}"/></td>
            </tr>
        </table>
    </form>
    <input form=edit type="submit" name='confirmar' value="Salvar"/>
    <a href="/dashboard"><button>Cancelar</button></a>
</x-dash-layout>
