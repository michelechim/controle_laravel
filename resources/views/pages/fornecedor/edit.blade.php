<x-dash-layout>
    <h1>Inserir novo fornecedor</h1>
    <form id=edit action="{{route('fornecedor_update',$fornecedor->id)}}" method="POST">
        @csrf
        <table>
            <tr>
                <td>Nome:</td>
                <td><input wire:model='nome' type="text" name="nome" /></td>
            </tr>
            <tr>
                <td>Endereco:</td>
                <td><input wire:model='endereco' type="text"  name="endereco" /></td>
            </tr>
            <tr>
                <td>CNPJ:</td>
                <td><input wire:model='cnpj' type="text"  name="cnpj" /></td>
            </tr>
            <tr>
                <td>Telefone:</td>
                <td><input wire:model='telefone' type="text" name="telefone" /></td>
            </tr>
            <tr>
                <td>Email:</td>
                <td><input wire:model='email' type="text"  name="email" /></td>
            </tr>
            <tr>
                <td>Id - estado:</td>
                <td><input wire:model='estado_id' type="text"  name="estado_id" /></td>
            </tr>
        </table>
    </form>
    <input form=edit type="submit" name='confirmar' value="Salvar"/>
    <a href="/dashboard"><button>Cancelar</button></a>
</x-dash-layout>
