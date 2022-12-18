<x-dash-layout>
    <h1>Inserir novo Cliente</h1>
    <form id=create action="/cliente" method="POST">
        @csrf
        {{-- <input type="hidden" name="_token" value="{{csrf_token()}}"/> --}}
        <table>
            <tr>
                <td>Nome:</td>
                <td><input type="text" name="nome" /></td>
            </tr>
            <tr>
                <td>Endereço:</td>
                <td><input type="text" name="endereco"/></td>
            </tr>
            <tr>
                <td>Telefone:</td>
                <td><input type="text" name="telefone" /></td>
            </tr>
        </table>
    </form>
    <input type="submit" value="Criar" form='create'/>
    <a href="/dashboard"><button>Cancelar</button></a>
</x-dash-layout>
