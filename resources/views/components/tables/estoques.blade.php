<table {{ $attributes->merge(['class' => 'table table-' . $type]) }}>
    @vite('resources/css/table.css')
    <thead>
        <tr>
            <th>Id</th>
            <th>Descrica</th>
            <th>Validade</th>
            <th>Quantidade</th>
            <th>Custo</th>
            <th>Venda</th>
            @if(Auth::user() && Route::is('dashboard'))
                <th>Acoes</th>
            @endif
        </tr>
    </thead>
    <tbody>
        @foreach ($estoques as $estoque)
            <tr>
                @if(Auth::user() && Route::is('dashboard'))
                     <td><a href="{{route('estoque.single-dash',$estoque->id) }}">{{ $estoque->id }}</a></td>
                     <td><a href="{{route('estoque.single-dash',$estoque->id) }}">{{ $estoque->descricao }}</a></td>
                @else
                    <td><a href="/estoques/{{ $estoque->id }}">{{ $estoque->id }}</a></td>
                    <td><a href="/estoques/{{ $estoque->id }}">{{ $estoque->descricao }}</a></td>
                @endif

                <td>{{ $estoque->validade }}</td>
                <td>{{ $estoque->qtd_estoque }}</td>
                <td>{{ $estoque->custo }}</td>
                <td>{{ $estoque->venda }}</td>

                @if(Auth::user() && Route::is('dashboard'))
                    <td><a href="{{ route('estoque_edit', $estoque->id) }}">editar</a> |
                        <a href="{{ route('estoque_delete', $estoque->id) }}">deletar</a>
                    </td>
                @endif
            </tr>
        @endforeach
    </tbody>
</table>
