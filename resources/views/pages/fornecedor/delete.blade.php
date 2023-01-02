<x-dash-layout>
    @if ($fornecedor)
        <h1>{{ $fornecedor->nome }}</h1>
        <ul>
            <li>Endereco: {{ $fornecedor->endereco }}</li>
            <li>CNPJ: {{ $fornecedor->cnpj }}</li>
            <li>Telefone: {{ $fornecedor->telefone }}</li>
            <li>Email: {{ $fornecedor->email }}</li>
            <li>Id - estado: {{ $fornecedor->estado_id }}</li>
        </ul>
        <form action="{{ route('fornecedor_remove', $fornecedor->id) }}" method="post">
            @csrf
            <h4 style="color:red;font-weight:bold">Confirmar a exclusão deste item?</h4>
            <input type="submit" name='confirmar' value="Deletar" />
            <input type="submit" name='confirmar' value="Cancelar" />
        </form>
    @else
        <p>Fornecedores não encontrados! </p>
        <a href="/dashboard">Voltar</a>
    @endif
</x-dash-layout>
