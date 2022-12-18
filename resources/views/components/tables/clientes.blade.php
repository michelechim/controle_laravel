<table {{ $attributes->merge(['class' => 'table table-' . $type]) }}>
    @vite('resources/css/table.css')
    <thead>
        <tr>
            <th>Id</th>
            <th>Nome</th>
            <th>Endereço</th>
            <th>Telefone</th>
            @if(Auth::user() && Route::is('dashboard'))
                <th>Ações</th>
            @endif
        </tr>
    </thead>
    <tbody>
        @foreach ($clientes as $cliente)
            <tr>
                @if(Auth::user() && Route::is('dashboard'))
                     <td><a href="{{route('cliente.single-dash',$cliente->id) }}">{{ $cliente->id }}</a></td>
                     <td><a href="{{route('cliente.single-dash',$cliente->id) }}">{{ $cliente->nome }}</a></td>
                @else
                    <td><a href="/clientes/{{ $cliente->id }}">{{ $cliente->id }}</a></td>
                    <td><a href="/clientes/{{ $cliente->id }}">{{ $cliente->nome }}</a></td>
                @endif

                <td>{{ $cliente->endereco }}</td>
                <td>{{ $cliente->telefone }}</td>

                @if(Auth::user() && Route::is('dashboard'))
                    <td><a href="{{ route('cliente_edit', $cliente->id) }}">editar</a> |
                        <a href="{{ route('cliente_delete', $cliente->id) }}">deletar</a>
                    </td>
                @endif
            </tr>
        @endforeach
    </tbody>
</table>
