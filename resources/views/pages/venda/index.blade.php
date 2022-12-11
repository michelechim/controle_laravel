<x-main-layout>
    <h2 class='text-4xl'>Vendas</h2>
    @if (isset($vendas) && $vendas->count() > 0)
        <x-tables.vendas :vendas="$vendas" class='table-odd' type='hover'/>
        @auth
            <div style="display:flex; flex-direction: row; justify-content:flex-end">
                <a href="/venda"><button>Criar Nova Venda</button></a>
            </div>
        @endauth
    @else
        <p>Vendas não encontrados! </p>
    @endif
</x-main-layout>
