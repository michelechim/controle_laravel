<x-dash-layout>
    @if ($cliente)
        <h1>{{ $cliente->nome }}</h1>
        <ul>
            <li>Endereco: {{ $cliente->endereco }}</li>
            <li>Telefone: {{ $cliente->telefone }}</li>
        </ul>
        <form action="{{ route('remove', $cliente->id) }}" method="post">
            @csrf
            <h4 style="color:red;font-weight:bold">Confirmar a exclusão deste item?</h4>
            <input type="submit" name='confirmar' value="Deletar" />
            <input type="submit" name='confirmar' value="Cancelar" />
        </form>
    @else
        <p>Clientes não encontrados! </p>
        <a href="/dashboard">Voltar</a>
    @endif
</x-dash-layout>
