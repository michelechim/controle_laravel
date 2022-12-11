<x-main-layout>
    <h2 class='text-4xl'>Estoques</h2>
    @if (isset($estoques) && $estoques->count() > 0)
        <x-tables.estoques :estoques="$estoques" class='table-odd' type='hover'/>
        @auth
            <div style="display:flex; flex-direction: row; justify-content:flex-end">
                <a href="/estoque"><button>Criar Novo Estoque</button></a>
            </div>
        @endauth
    @else
        <p>Estoques não encontrados! </p>
    @endif
</x-main-layout>
