<table {{ $attributes->merge(['class' => 'table table-' . $type]) }}>
    @vite('resources/css/table.css')
    <thead>
        <tr>
            <th>Id</th>
            <th>Nome</th>
            <th>Descrição</th>
            <th>Valor</th>
            <th>Pagamento</th>
            @if(Auth::user() && Route::is('dashboard'))
                <th>Ações</th>
            @endif
        </tr>
    </thead>
    <tbody>
        @foreach ($vendas as $venda)
            <tr>
                @if(Auth::user() && Route::is('dashboard'))
                     <td><a href="{{route('venda.single-dash',$venda->id) }}">{{ $venda->id }}</a></td>
                     <td><a href="{{route('venda.single-dash',$venda->id) }}">{{ $venda->nome }}</a></td>
                @else
                    <td><a href="/vendas/{{ $venda->id }}">{{ $venda->id }}</a></td>
                    <td><a href="/vendas/{{ $venda->id }}">{{ $venda->nome }}</a></td>
                @endif

                <td>{{ $venda->descricao }}</td>
                <td>{{ $venda->valor }}</td>
                <td>{{ $venda->pagamento }}</td>

                @if(Auth::user() && Route::is('dashboard'))
                    <td><a href="{{ route('venda_edit', $venda->id) }}">editar</a> |
                        <a href="{{ route('venda_delete', $venda->id) }}">deletar</a>
                    </td>
                @endif
            </tr>
        @endforeach
    </tbody>
</table>
